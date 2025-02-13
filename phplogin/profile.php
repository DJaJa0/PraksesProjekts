<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: Login.php');
	exit;
}
 
$DATABASE_HOST = 'sql7.freesqldatabase.com';
$DATABASE_USER = 'sql7761322';
$DATABASE_PASS = 'taU4zHrvby';
$DATABASE_NAME = 'sql7761322';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="../assets/style2.css" rel="stylesheet" type="text/css">
		<script src="../assets/script.js" defer></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">


	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>
					<img src="../assets/photos/icon.png" alt="Skolas logo" class="logo" onclick="window.location.href='../inventars.php';">
                    Liepājas Draudzīgā aicinājuma vidusskola
                </h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profils</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Iziet</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profils</h2>
			<div>
				<p>Jūsu konta informācija:</p>

				<table>
                <tr>
                    <td>Lietotājvārds:</td>
                    <td><?= htmlspecialchars($_SESSION['name'], ENT_QUOTES) ?></td>
                </tr>
                <tr>
    				<td>Parole:</td>
    				<td>
        			<?php if (isset($_SESSION['real_password'])): ?>
            		<span id="password-text"><?= htmlspecialchars($_SESSION['real_password'], ENT_QUOTES) ?></span>
            		<button id="hide-password-button" class="hide-password-button" onclick="hidePassword()"> Paslēpt paroli</button>
            		<?php unset($_SESSION['real_password']); ?>
        			<?php else: ?>
            			********
            		<button class="show-password-button" onclick="document.getElementById('password-form').style.display='block'">👁 Rādīt paroli</button>
       			 	<?php endif; ?>
    				</td>
				</tr>
                <tr>
                    <td>E-pasts:</td>
                    <td><?= htmlspecialchars($email, ENT_QUOTES) ?></td>
                </tr>
            </table>

			<div id="password-form" style="display: none;">
                <form action="verify_password.php" method="post">
					<h2 class="account-delete-h2">Konta paroles apskatīšana</h2>
					<p class="account-delete-p">Lūdzu, ievadiet savu konta paroli:</p>
                    <input type="password" name="password" placeholder="Ievadiet paroli..." required>
                    <input type="submit" value="Apstiprināt" class="confirm-show-button">
					<button type="button" onclick="hidePasswordForm()" class="close-form-button">Aizvērt formu</button>
                </form>
            </div>

				<br>
        			<a href="../inventars.php" class="back-button">Atpakaļ</a>

					<button onclick="showDeleteForm()" class="delete-button">🗑 Dzēst kontu</button>

					<?php if (isset($_SESSION['error_message'])): ?>
    					<p id="error-message" class="error-message"><?= $_SESSION['error_message'] ?></p>
    					<?php unset($_SESSION['error_message']); ?>
					<?php endif; ?>

				<div id="delete-form" style="display: none;">
					<form action="delete_account.php" method="post">
						<h2 class="account-delete-h2">Konta dzēšana</h2>
						<p class="account-delete-p">Lūdzu, ievadiet savu konta paroli konta dzēšanai:</p>
						<input type="password" name="password" placeholder="Ievadiet paroli..."required>
						<input type="submit" value="Apstiprināt dzēšanu" class="confirm-delete-button">
						<button type="button" onclick="hideDeleteForm()" class="close-form-button">Aizvērt formu</button>
					</form>
				</div>
			</div>
		</div>

	

		<footer>
    <div class="footerBottom">
        <p>&copy;2025; Liepājas Draudzīgā aicinājuma vidusskola</p>
    </div>
	</footer>

	</body>
</html>