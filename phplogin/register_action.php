<?php
session_start();
$DATABASE_HOST = 'sql7.freesqldatabase.com';
$DATABASE_USER = 'sql7761322';
$DATABASE_PASS = 'taU4zHrvby';
$DATABASE_NAME = 'sql7761322';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()){
    exit('Neizdevās pieslēgties MySQL: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    if (empty($username) || empty($password) || empty($email)){
        $_SESSION['message'] = "Lūdzu, aizpildiet visus laukus!";
        $_SESSION['message_type'] = "error";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['message'] = "Nederīgs e-pasta formāts!";
        $_SESSION['message_type'] = "error";
    }else{
        $stmt = $con->prepare('SELECT id FROM accounts WHERE username = ? OR email = ?');
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0){
            $_SESSION['message'] = "Lietotājvārds vai e-pasts jau tiek izmantots!";
            $_SESSION['message_type'] = "error";
        }else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $username, $hashed_password, $email);
            if ($stmt->execute()){
                $_SESSION['message'] = "Reģistrācija veiksmīga! Tagad vari <a href='Login.php'>pieslēgties</a>.";
                $_SESSION['message_type'] = "success";
            }else{
                $_SESSION['message'] = "Kļūda: " . $stmt->error;
                $_SESSION['message_type'] = "error";
            }
        }
        $stmt->close();
    }
    $con->close();
    header("Location: register.php"); 
    exit;
}
?>
