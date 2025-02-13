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
            <h2>Par mūsu skolu</h2>
            
            <div class="slideshow-container">
                <img class="slide active" src="assets/photos/skolasbilde22.jpg" alt="Skolas bilde 1">
                <img class="slide" src="assets/photos/skolasbilde2.jpg" alt="Skolas bilde 2">
                <img class="slide" src="assets/photos/skolasbilde3.jpg" alt="Skolas bilde 3">
                
                <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                <button class="next" onclick="changeSlide(1)">&#10095;</button>
            </div>

            <p>
                Liepājas Draudzīgā aicinājuma vidusskola ir viena no vadošajām skolām reģionā, piedāvājot kvalitatīvu izglītību un modernu mācību vidi. Mūsu mērķis ir sagatavot skolēnus nākotnes izaicinājumiem, nodrošinot inovatīvas mācību metodes un draudzīgu vidi.
            </p>
            
            <h3>Mūsu vērtības:</h3>
            <ul>
                <li>Izcilība izglītībā</li>
                <li>Radošums un inovācijas</li>
                <li>Draudzīgums un cieņa</li>
                <li>Videi draudzīga domāšana</li>
            </ul>
            
            <h3>Sasniegumi un tradīcijas:</h3>
            <p>
                Mūsu skola lepojas ar daudziem sasniegumiem zinātnē, mākslā un sportā. Skolēni piedalās dažādos konkursos un olimpiādēs, iegūstot augstas vietas gan valsts, gan starptautiskā līmenī.
            </p>
        </div>
    </div>

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


