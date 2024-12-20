# Karel

Tento projekt je implementací aplikace **Karel**, která umožňuje manipulaci objektu ("Karla") na gridu o velikosti 10x10 pomocí předdefinovaných příkazů. Aplikace je k dispozici ve dvou verzích:

1. **Frontendová verze** - manipulace probíhá kompletně na straně klienta pomocí JavaScriptu.
2. **Serverová verze** - manipulace probíhá na straně serveru s použitím PHP.

## Frontendová verze

### Jak funguje
V této verzi jsou všechny akce prováděny pomocí JavaScriptu v prohlížeči uživatele. Grid a objekt Karel se aktualizují okamžitě po zadání příkazu a jeho provedení.

### Hlavní soubory
- `index.html`: Obsahuje HTML strukturu aplikace.
- `style.css`: Definuje styly pro aplikaci.
- `script.js`: Obsahuje logiku manipulace gridu a vykonávání příkazů.

### Ukázka použití
1. Otevřete `index.html` ve webovém prohlížeči.
2. Do textového pole napište příkazy, např.:
   ```
   KROK 3
   VLEVOBOK
   KROK 2
   POLOZ
   RESET
   ```
3. Klikněte na tlačítko **Proveď**.
4. Sledujte, jak Karel provádí zadané akce na gridu.

## Serverová verze

### Jak funguje
V této verzi jsou příkazy odesílány na server, který je zpracuje pomocí PHP. Grid a Karel jsou aktualizovány na základě serverových výpočtů a výsledky jsou zobrazeny uživateli.

### Hlavní soubory
- `index.php`: Obsahuje HTML strukturu a PHP logiku aplikace.
- `style.css`: Definuje styly pro aplikaci.

### Ukázka použití
1. Nahrajte všechny soubory na server s podporou PHP.
2. Otevřete `index.php` v prohlížeči.
3. Do textového pole napište příkazy, např.:
   ```
   KROK 4
   VLEVOBOK 2
   POLOZ
   RESET
   ```
4. Klikněte na tlačítko **Proveď**.
5. Výsledky se zobrazí na gridu po zpracování serverem.

## Příkazy
- **KROK [n]**: Posune Karla o `n` míst ve směru jeho otočení. Pokud není parametr uveden, provede se 1 krok.
- **VLEVOBOK [n]**: Otočí Karla vlevo o `n` otočení. Pokud není parametr uveden, otočí se 1x.
- **POLOZ**: Položí značku na aktuální pozici Karla.
- **RESET**: Resetuje grid, nastaví Karla do levého horního rohu a vymaže všechny značky.

## Požadavky
- Frontendová verze: Webový prohlížeč s podporou JavaScriptu.
- Serverová verze: Server s podporou PHP (např. Apache nebo Nginx).

## Náhled
![image](https://github.com/user-attachments/assets/a2223cd6-4662-49ed-838f-7610c9d4283d)




