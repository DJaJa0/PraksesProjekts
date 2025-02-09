<?php
session_start();
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reģistrācija</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>LDAV datubāze</h1>
        <h2>Reģistrācija</h2>           

        <?php
        if (isset($_SESSION['message'])) {
            $message_type = ($_SESSION['message_type'] == "success") ? "success" : "error";
            echo '<p class="message ' . $message_type . '">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']); 
            unset($_SESSION['message_type']);
        }
        ?>

        <form action="register_action.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" id="username" placeholder="Lietotājvārds" required>

            <label for="email">
                <i class="fas fa-envelope"></i>
            </label>
            <input type="email" name="email" id="email" placeholder="E-pasts" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" id="password" placeholder="Parole" required>

            <input type="submit" value="Reģistrēties">
        </form>

            <a href="Login.php" class="register-button">Pieslēgties</a>
    </div>
</body>
</html>


