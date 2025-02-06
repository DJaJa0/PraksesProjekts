<?php
$servername = "sql7.freesqldatabase.com";
$username = "sql7761322";
$password = "taU4zHrvby";
$dbname = "sql7761322";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Savienojuma kļūda: " . $conn->connect_error);
}
echo "Savienojums veiksmīgs!";
?>
