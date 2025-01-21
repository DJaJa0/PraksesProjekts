<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
<main class="login-container">
    <div class="login-box">
        <h1>Pieteikšanās 5.vsk Datubāzē</h1>
        <form method="post" action="Inventars.php">

            <div class="input-container">
                <i class="fas fa-user icon"></i>   
            <input type="text" id="lietotajs" name="lietotajs" class="input-field" placeholder="Ievadi lietotājvārdu..." required >
            </div>
            
            <div class="input-container">
                <i class="fas fa-user icon"></i> 
            <input type="password" id="parole" name="parole" class="input-field" maxlength="255" placeholder="Ievadi paroli..." required>
            </div>
            
            <button type="submit" name="ienakt" class="login-button">Ienākt</button>
        </form>
    </div>
</main>
</body>
</html>

