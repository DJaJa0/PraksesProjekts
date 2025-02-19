<?php
session_start();

if (!isset($_SESSION['loggedin'])){
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

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $password = $_POST['password'];

    $stmt = $con->prepare('SELECT password FROM accounts WHERE id = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)){
        
        $stmt = $con->prepare('DELETE FROM accounts WHERE id = ?');
        $stmt->bind_param('i', $_SESSION['id']);
        $stmt->execute();
        $stmt->close();
        $con->close();

        session_destroy();
        header('Location: Login.php');
        exit;
    }else{
        $_SESSION['error_message'] = "Nepareiza parole! Konts netika dzēsts.";
        header('Location: profile.php');
        exit;
    }
}
?>