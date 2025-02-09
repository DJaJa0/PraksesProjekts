<?php
session_start();

$DATABASE_HOST = 'sql7.freesqldatabase.com';
$DATABASE_USER = 'sql7761322';
$DATABASE_PASS = 'taU4zHrvby';
$DATABASE_NAME = 'sql7761322';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    exit('Neizdevās pievienoties MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['password'])) {
    $_SESSION['error_message'] = 'Aizpildi gan lietotājvārda, gan paroles laukus!';
    header('Location: Login.php');
    exit;
}

$username = htmlspecialchars(trim($_POST['username']));
$password = trim($_POST['password']);

if (empty($username) || empty($password)) {
    $_SESSION['error_message'] = 'Aizpildi visus laukus!';
    header('Location: Login.php'); 
    exit;
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            
            session_regenerate_id(true);
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $username;
            $_SESSION['id'] = $id;

            header('Location: ../Inventars.php');
            exit;
        } else {
            $_SESSION['error_message'] = 'Nepareizs lietotājvārds un/vai parole!';
            header('Location: Login.php');
            exit;
        }
    } else {
        $_SESSION['error_message'] = 'Nepareizs lietotājvārds un/vai parole!';
        header('Location: Login.php');
        exit;
    }
    $stmt->close();
}

$con->close();
?>
