<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DatuBāze</title>
    <link rel="stylesheet" href="assets/style2.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <form>
        <label for="inventars">Izvēlaties vienu:</label>
        <select name="inventars" id="inventars">
            <option value="none">Izvēlieties</option>
            <option value="dators">Datori</option>
            <option value="monitors">Monitori</option>
        </select>
    </form>

    <div id="saturs" style="display: none;">
        <h3>Detaļas:</h3>
        <p id="inventāraDetaļas"></p> <!-- Dinamiski ģenerē datus (ķipa)-->
        <button id="labotPoga" onclick="labot()">Labot</button>
    </div>

    <div id="labotFormu" style="display: none;">
        <h3>Veikt labošanu:</h3>
        <form onsubmit="saglabatDatus(); return false;">
            <label for="nosaukums">Nosaukums:</label>
            <input type="text" id="nosaukums" name="nosaukums" required>
            <br>

            <label for="apraksts">Inventāra Nr.:</label>
            <input type="text" id="apraksts" name="apraksts" required>
            <br>

            <label for="kabinets">Kabineta Nr.:</label>
            <input type="text" id="kabinets" name="kabinets" required>
            <br>

            <button type="submit">Saglabāt</button>
        </form>
    </div>

    <button onclick="window.location.href='Login.php';">Iziet</button>
</body>
</html>
