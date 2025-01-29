<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: Login.php');
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
    <div class="loggedin">
		<nav class="navtop">
			<div>
				<h1>
                    <img src="assets/photos/icon.png" alt="Skolas logo" class="logo">
                    Liepājas Draudzīgā aicinājuma vidusskola
                </h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profils</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Iziet</a>
			</div>
		</nav>
		<div class="content">
			<h2>Skolas inventāra datubāze</h2>
			<p>Sveicināts atpakaļ, <?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?>!</p>
		</div>
    </div>
        
    <form>
        <label for="inventars">Izvēlaties vienu:</label>
        <select name="inventars" id="inventars">
            <option value="none">Izvēlieties</option>
            <option value="dators">Datori</option>
            <option value="monitors">Monitori</option>
        </select>
        <a href="phplogin/Login.php" class="btn">Iziet</a>
    </form>

    <div id="saturs">
    <h3>Detaļas:</h3>
    <div id="inventāraDetaļas"></div>
    <button onclick="pievienotJaunu()">Jauns</button>
</div>

<div id="labotFormu" style="display: none;">
    <h3>Veikt labošanu vai pievienošanu:</h3>
    <form onsubmit="saglabatDatus(); return false;">
        <label for="nosaukums">Nosaukums:</label>
        <input type="text" id="nosaukums" name="nosaukums" required>
        <br>

        <label for="apraksts">Inventāra Nr.:</label>
        <input type="text" id="apraksts" name="apraksts" required>
        <br>

        <label for="kabinets">Kabineta Nr.:</label>
        <input type="text" id="kabinets" name="kabinets" required>
        <br>

        <button type="submit">Saglabāt</button>
    </form>
</div>




    
</body>
</html>
