<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: phplogin/Login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par mums</title>
    <link rel="stylesheet" href="assets/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="assets/script.js" defer></script>
</head>

<body>

<div class="content2">

    <div class="loggedin">
        <nav class="navtop">
            <div>
                <h1>
                    <img src="assets/photos/icon.png" alt="Skolas logo" class="logo" onclick="window.location.href='inventars.php';">
                    Liepājas Draudzīgā aicinājuma vidusskola
                </h1>
                <a href="phplogin/profile.php"><i class="fas fa-user-circle"></i> Profils</a>
                <a href="phplogin/logout.php"><i class="fas fa-sign-out-alt"></i> Iziet</a>
            </div>
        </nav>
        <div class="content">
            <h2>Kontakti</h2>

            <section class="contacts-container">
                <div class="contacts-header">
                    <h2><i class="fas fa-phone-alt"></i> Kontakti</h2>
                    <p><strong>Liepājas Draudzīgā aicinājuma vidusskola</strong></p>
                    <p>Rīgas iela 50, Liepāja, LV-3401, Latvija</p>
                </div>

                 <div class="contact-info">
                    <h3><i class="fas fa-phone"></i> Telefoni</h3>
                        <ul class="contact-list">
                            <li><strong>Direktore, kanceleja:</strong> +371 634 23551; 27875612</li>
                            <li><strong>Direktores vietnieces izglītības jomā:</strong> +371 63424716; 29185776</li>
                            <li><strong>Uzskaitvede:</strong> +371 63423569</li>
                            <li><strong>Medicīnas māsas:</strong> +371 29416015</li>
                            <li><strong>Pamatskolas skolotāju istaba:</strong> +371 63424668</li>
                        </ul>
                </div>

            <div class="contact-info">
                <h3><i class="fas fa-envelope"></i> E-pasts</h3>
                    <ul class="contact-list">
                        <li><strong>Kanceleja:</strong> <a href="mailto:draudzigavsk@liepaja.edu.lv">draudzigavsk@liepaja.edu.lv</a></li>
                        <li><strong>Uzskaitvedība:</strong> <a href="mailto:zigrida.timbare@liepaja.edu.lv">zigrida.timbare@liepaja.edu.lv</a></li>
                    </ul>
            </div>
        </section>

</div>

<footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href="https://www.facebook.com/5vsk.liepaja.edu.lv/"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/draudzigavsk/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.youtube.com/@dalp5.vsk.30/videos"><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
            <ul>
                <li><a href="inventars.php">Mājas</a></li>
                <li><a href="parmums.php">Par mums</a></li>
                <li><a href="kontakti.php">Kontakti</a></li>
            </ul>
        </div>
    </div>
    <div class="footerBottom">
        <p>&copy;2025 Liepājas Draudzīgā aicinājuma vidusskola</p>
    </div>
</footer>

<button onclick="scrollToTop()" id="scrollTopBtn" title="Uz augšu">
    <i class="fas fa-chevron-up"></i>
</button>

</body>
</html>