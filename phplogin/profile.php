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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>
                    <img src="../assets/photos/icon.png" alt="Skolas logo" class="logo">
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
						<td><?=htmlspecialchars($_SESSION['name'], ENT_QUOTES)?></td>
					</tr>
					<tr>
						<td>Parole:</td>
						<td><?=htmlspecialchars($password, ENT_QUOTES)?></td>
					</tr>
					<tr>
						<td>E-pasts:</td>
						<td><?=htmlspecialchars($email, ENT_QUOTES)?></td>
					</tr>
				</table>
				<br>
        			<a href="../inventars.php" class="back-button">Atpakaļ</a>
			</div>
		</div>

		<footer>

	<footer>
    <div class="footerBottom2">
        <p>&copy;2025; Liepājas Draudzīgā aicinājuma vidusskola</p>
    </div>
	</footer>

	</body>
</html>