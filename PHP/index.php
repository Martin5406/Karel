<?php
session_start();

if (!isset($_SESSION['karelX'])) {
    $_SESSION['karelX'] = 0;
    $_SESSION['karelY'] = 0;
    $_SESSION['direction'] = 0;
    $_SESSION['grid'] = array_fill(0, 10 * 10, "");
}

$size = 10;
$grid = &$_SESSION['grid'];
$karelX = &$_SESSION['karelX'];
$karelY = &$_SESSION['karelY'];
$direction = &$_SESSION['direction'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["commands"])) {
    $commands = explode("\n", strtoupper(trim($_POST["commands"])));

    foreach ($commands as $command) {
        $parts = explode(" ", trim($command));
        $action = $parts[0];

        switch ($action) {
            case "KROK":
                $steps = isset($parts[1]) ? (int)$parts[1] : 1;
                for ($i = 0; $i < $steps; $i++) {
                    if ($direction === 0 && $karelX < $size - 1) $karelX++;
                    if ($direction === 1 && $karelY > 0) $karelY--;
                    if ($direction === 2 && $karelX > 0) $karelX--;
                    if ($direction === 3 && $karelY < $size - 1) $karelY++;
                }
                break;
            case "VLEVOBOK":
                $times = isset($parts[1]) ? (int)$parts[1] : 1;
                $direction = ($direction + $times) % 4;
                break;
            case "POLOZ":
                $index = $karelY * $size + $karelX;
                $grid[$index] = "poloz";
                break;
            case "RESET":
                $_SESSION['grid'] = array_fill(0, $size * $size, "");
                $_SESSION['karelX'] = 0;
                $_SESSION['karelY'] = 0;
                $_SESSION['direction'] = 0;
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karel - Serverová verze</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Karel</h1>
    <div id="app">
        <div id="controls">
            <form method="post">
                <textarea name="commands" id="commands" placeholder="Zadejte příkazy"><?= isset($_POST["commands"]) ? htmlspecialchars($_POST["commands"]) : "" ?></textarea>
                <button type="submit">Proveď</button>
            </form>
        </div>
        <div id="grid">
            <?php
            for ($y = 0; $y < $size; $y++) {
                for ($x = 0; $x < $size; $x++) {
                    $index = $y * $size + $x;
                    $class = "";
                    if ($x === $karelX && $y === $karelY) $class = "karel";
                    elseif ($grid[$index] === "poloz") $class = "poloz";
                    echo "<div class='cell $class'></div>";
                }
            }
            ?>
        </div>
    </div>
    <div id="prikazy-popis">
        <h3>Možné příkazy:</h3>
        <ul>
            <li><b>KROK</b> - Karel se v poli posune o tolik míst ve svém směru natočení, kolik mu je za příkazem určeno (např. KROK 4). V případě, že se parametr neuvede, Karel provede jeden krok.</li>
            <li><b>VLEVOBOK</b> - Karel se otočí vlevo. Opět můžeme zadat parametrem, kolikrát se tato operace provede.</li>
            <li><b>POLOZ</b> - Na pozici Karla se položí parametr příkazu (např. POLOZ A).</li>
            <li><b>RESET</b> - Vyčistí pole a nastaví Karla do levého horního místa.</li>
        </ul>
        <p>Příkazy je možné zadávat jak velkými, tak i malými písmeny abecedy. Každý příkaz musí být na nové řádce.</p>
    </div>
</body>
</html>
