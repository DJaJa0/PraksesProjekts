<?php
$servername = "localhost";
$username = "root";
$password = "Gayfag.09"; // Parole norādīta instalācijas laikā(lūdzu bez komentāriem)
$dbname = "inventars"; // Datubāzes nosaukums


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Savienojuma kļūda: " . $conn->connect_error);
}
echo "Savienojums veiksmīgs!";
?>
