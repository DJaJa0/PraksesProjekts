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
    <title>DatuBāze</title>
    <link rel="stylesheet" href="assets/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="assets/script.js" defer></script>
</head>

<body>

<div class="content2">

    <div class="loggedin">
		<nav class="navtop">
			<div>
				<h1>
                <img src="assets/photos/icon.png" alt="Skolas logo" class="logo" onclick="window.location.href='index.php';">
                    Liepājas Draudzīgā aicinājuma vidusskola
                </h1>
				<a href="phplogin/profile.php"><i class="fas fa-user-circle"></i>Profils</a>
				<a href="phplogin/logout.php"><i class="fas fa-sign-out-alt"></i>Iziet</a>
			</div>
		</nav>
		<div class="content">
			<h2>Par mums</h2>
			
		</div>
    </div>
        
    <section class="about-container">
                <div class="about-content">
                    <h2>LDAV</h2>
                <p>
            <strong>Liepājas Draudzīgā aicinājuma vidusskola</strong> ir viena no vadošajām skolām reģionā, piedāvājot kvalitatīvu izglītību un modernu mācību vidi. Mūsu mērķis ir sagatavot skolēnus nākotnes izaicinājumiem, nodrošinot inovatīvas mācību metodes un draudzīgu vidi.
                </p>
            </div>

             <div class="values-section">
                <h3><i class="fas fa-star"></i> Mūsu vērtības</h3>
                    <ul class="values-list">
                     <li><i class="fas fa-book-open"></i> Izcilība izglītībā</li>
                     <li><i class="fas fa-lightbulb"></i> Radošums un inovācijas</li>
                     <li><i class="fas fa-handshake"></i> Draudzīgums un cieņa</li>
                     <li><i class="fas fa-leaf"></i> Videi draudzīga domāšana</li>
                 </ul>
            </div>

        <div class="achievements-section">
            <h3><i class="fas fa-trophy"></i> Sasniegumi un tradīcijas</h3>
        <p>
            Mūsu skola lepojas ar daudziem sasniegumiem zinātnē, mākslā un sportā. Skolēni piedalās dažādos konkursos un olimpiādēs, iegūstot augstas vietas gan valsts, gan starptautiskā līmenī.
        </p>
    </div>
    </section>

            <section class="container2">
                <h3 class="h33">Attēli</h3> 
                <div class="slider-wrapper">
                <div class="slider" id="slider">
                    <img src="assets/photos/skolasbilde22.jpg" alt="Skolas bilde 1"/>
                    <img src="assets/photos/skolasbilde33.jpg" alt="Skolas bilde 2"/>
                    <img src="assets/photos/skolasbilde44.jpg" alt="Skolas bilde 3"/>
                    <img src="assets/photos/skolasbilde.jpg" alt="Skolas bilde 4"/>
                    <img src="assets/photos/skolasbilde99.jpg" alt="Skolas bilde 5"/>
                </div>
                <div class="slider-nav">
                    <span class="nav-dot" onclick="changeSlide(0)"></span>
                    <span class="nav-dot" onclick="changeSlide(1)"></span>
                    <span class="nav-dot" onclick="changeSlide(2)"></span>
                    <span class="nav-dot" onclick="changeSlide(3)"></span>
                    <span class="nav-dot" onclick="changeSlide(4)"></span>
                </div>
                </div>
            </section>

</div>






<footer>
<div class="footerContainer">
    <div class="socialIcons">
        <a href="https://www.facebook.com/5vsk.liepaja.edu.lv/events/?key=events&ref=page_internal&locale=lv"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/draudzigavsk/"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://www.youtube.com/@dalp5.vsk.30/videos"><i class="fa-brands fa-youtube"></i></a>
    </div>
    <div class="footerNav">
        <ul>
            <li><a href="index.php">Mājas</a></li>
            <li><a href="parmums.php">Par mums</a></li>
            <li><a href="kontakti.php">Kontakti</a></li>
        </ul>
    </div>
    
</div>
    <div class="footerBottom">
        <p>&copy;2025; Liepājas Draudzīgā aicinājuma vidusskola</p>
    </div>
</footer>

    <button onclick="scrollToTop()" id="scrollTopBtn" title="Uz augšu">
    <i class="fas fa-chevron-up"></i>
    </button>

</body>
</html>