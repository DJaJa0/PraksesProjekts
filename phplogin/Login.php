<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="assets/style.css">
        <script src="assets/script.js" defer></script>
	</head>
	<body>
		<div class="login">
            <h1>5.vsk datubāze</h1>
			<h2>Login</h2>           
			<form action="Inventars.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Lietotājvārds" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Parole" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>

