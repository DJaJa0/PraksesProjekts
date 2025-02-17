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
    <title>Sākums</title>
    <link rel="stylesheet" href="assets/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="assets/script.js" defer></script>
    <link rel="icon" type="image/png" href="assets/photos/icon.png">
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
			<h2>Sākums</h2>
		</div>
    </div>
        
    <div class="container3">
            <h1 class="title">Laipni lūgti!</h1>
            <p class="subtitle">Izvēlieties kādu no sadaļām:</p>
    
            <div class="menu-grid">
                <a href="inventars.php" class="menu-item active">
                    <i class="fas fa-boxes"></i>
                    <span>Inventarizācijas lapa</span>
                </a>
                <div class="menu-item disabled">
                    <i class="fas fa-clock"></i>
                    <span>Drīzumā</span>
                </div>
                <div class="menu-item disabled">
                    <i class="fas fa-clock"></i>
                    <span>Drīzumā</span>
                </div>
                <div class="menu-item disabled">
                    <i class="fas fa-clock"></i>
                    <span>Drīzumā</span>
                </div>
            </div>
    </div>


</div>


<img src="assets/photos/skolasbilde99.jpg" alt="Fona attēls" class="background-img">



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