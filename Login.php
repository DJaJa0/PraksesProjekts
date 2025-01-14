<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>

</head>
<body>
<main>
    <form method="post" action="Inventars.php">
        <h3>Pieteikšanās Datubāzē:</h3>
        <br>
        <label for="lietotajs">Lietotājs:</label><br>
        <input type="text" id="lietotajs" name="lietotajs">
        <br><br>
        
        <label for="parole">Parole:</label><br>
        <input type="password" id="parole" name="parole" maxlength="255" required>
        <br><br>
        
        <button type="submit" name="ienakt">Ienākt</button>
    </form>
</main>
</body>
</html>
