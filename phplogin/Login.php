<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="style.css">
        <script src="../assets/script.js" defer></script>
	</head>
	<body>
		<div class="login">
            <h1>LDAV datubāze</h1>
			<h2>Pieslēgties</h2>

			<?php
            if (isset($_SESSION['error_message'])) {
                echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']); 
            }
            ?>

			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Lietotājvārds" id="username" required>
				<label for="password">
        			<i class="fas fa-lock"></i>
    			</label>
    				<div class="password-container">
        				<input type="password" name="password" placeholder="Parole" id="password" required>
        				<span class="password-toggle" id="togglePassword">
           				 <i class="fas fa-eye"></i>
        				</span>
    				</div>

    			<input type="submit" value="Pieslēgties">
				
			</form>
	
			<a href="register.php" class="register-button">Reģistrēties</a>
			
		</div>

	</body>
</html>

