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
        <h1>Pieteikšanāss Datubāzē</h1>
        <form method="post" action="Inventars.php">
            <label for="lietotajs">Lietotājs:</label>
            <input type="text" id="lietotajs" name="lietotajs" class="input-field" required>
            
            <label for="parole">Parole:</label>
            <input type="password" id="parole" name="parole" class="input-field" maxlength="255" required>
            
            <button type="submit" name="ienakt" class="login-button">Ienākt</button>
        </form>
        <p class="signup-text">or, <a href="#">sign up</a></p>
    </div>
</main>
</body>
</html>

