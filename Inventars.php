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
    <title>Inventarizācijas</title>
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
			<h2>Skolas inventāra datubāze</h2>
			<p>Sveicināts atpakaļ, <?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?>!</p>
		</div>
    </div>
        
    <form>
        <label for="inventars"><h3>Izvēlaties vienu:</h3></label>
        <select name="inventars" id="inventars">
            <option value="none">Izvēlaties</option>
            <option value="dators">Datori</option>
            <option value="monitors">Monitori</option>
            <option value="projektori">Projektori</option>
            <option value="tumbas">Tumbas</option>
            <option value="printeri">Printeri</option>
            <option value="dok">Dok_kam_nosaukums</option>
        </select>
        <input type="text" id="searchInput" placeholder="Meklēt...">
    </form>

    <div id="saturs">
    <h3>Detaļas:</h3>
    <div id="inventāraDetaļas"></div>
    <button onclick="pievienotJaunu()">Jauns</button>
    </div>

    <div id="labotFormu" style="display: none;">
    <input type="hidden" id="ierakstaID">

    <h3>Veikt labošanu vai pievienošanu:</h3>
    <form onsubmit="saglabatDatus(); return false;">
    
        <label for="nosaukums">Nosaukums:</label>
        <input type="text" id="nosaukums" name="nosaukums" required>
        

        <label for="apraksts">Inventāra Nr.:</label>
        <input type="text" id="apraksts" name="apraksts" required>
        

        <label for="kabinets">Kabineta Nr.:</label>
        <input type="text" id="kabinets" name="kabinets" required>
        

        <div class="button-container">
        <button type="submit">Saglabāt</button>
        <button type="button" onclick="aizvertFormu()">Aizvērt</button>
        </div>
        
    </form>
    </div>
</div>


<img src="assets/photos/skolasbilde22.jpg" alt="Fona attēls" class="background-img">



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
