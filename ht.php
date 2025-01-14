<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DatuBāze</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <form method="post">
    <label for="inventars">Izvēlaties vienu:</label>
    <select name="inventars" id="inventars">
        <option value="dators">Datori</option>
        <option value="monitors">Monitori</option>
        <option value="projektors">Projektori</option>
        <option value="unc">Un citi</option>
    </select>
</form>

<div id="saturs">
<h3>Detaļas:</h3>
<p id ="inventāraDetaļas"></p> <!-- izveide caur js -->
<button onlick="labot()">Labot</button>
</div>

<div id="editForm">
<h3>Veikt labošanu:</h3>
<form method="post" action=""></form>



</div>
<button onclick="window.location.href='Login.php';">Iziet</button> <!-- Poga Iziet(burtiski) -->
</body>
</html>
