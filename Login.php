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
<main class="login-container">
    <div class="login-box">
        <h1>Pieteikšanās Datubāzē</h1>
        <form method="post" action="Inventars.php">
            
            <input type="text" id="lietotajs" name="lietotajs" class="input-field" placeholder="Ievadi lietotājvārdu..." required >
            
            
            <input type="password" id="parole" name="parole" class="input-field" maxlength="255" placeholder="Ievadi paroli..." required>
            
            <button type="submit" name="ienakt" class="login-button">Ienākt</button>
        </form>
    </div>
</main>
</body>
</html>

