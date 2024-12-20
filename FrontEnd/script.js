const grid = document.getElementById("grid");
const commandsInput = document.getElementById("commands");
const size = 10;
let karelX = 0, karelY = 0, direction = 0;

function createGrid() {
    grid.innerHTML = "";
    for (let i = 0; i < size * size; i++) {
        const cell = document.createElement("div");
        cell.classList.add("cell");
        grid.appendChild(cell);
    }
    updateKarel();
}

function updateKarel() {
    document.querySelectorAll(".cell").forEach(cell => cell.classList.remove("karel"));
    const index = karelY * size + karelX;
    grid.children[index].classList.add("karel");
}

function executeCommands() {
    const commands = commandsInput.value.split("\n");
    commands.forEach(command => {
        const parts = command.toUpperCase().split(" ");
        switch (parts[0]) {
            case "KROK":
                moveKarel(parseInt(parts[1] || 1));
                break;
            case "VLEVOBOK":
                turnLeft(parseInt(parts[1] || 1));
                break;
            case "POLOZ":
                placeItem(parts[1] || "");
                break;
            case "RESET":
                reset();
                break;
        }
    });
}

function moveKarel(steps) {
    for (let i = 0; i < steps; i++) {
        if (direction === 0 && karelX < size - 1) karelX++;
        if (direction === 1 && karelY > 0) karelY--;
        if (direction === 2 && karelX > 0) karelX--;
        if (direction === 3 && karelY < size - 1) karelY++;
        updateKarel();
    }
}

function turnLeft(times) {
    direction = (direction + times) % 4;
}

function placeItem(item) {
    const index = karelY * size + karelX;
    grid.children[index].classList.add("poloz");
}

function reset() {
    karelX = 0;
    karelY = 0;
    direction = 0;
    createGrid();
}


createGrid();
