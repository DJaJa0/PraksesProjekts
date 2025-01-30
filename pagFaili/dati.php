<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "Gayfag.09";
$dbname = "inventars";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Savienojuma kļūda: " . $conn->connect_error]));
}


if (isset($_GET['tips'])) {
    $tips = $_GET['tips'];

    $lauki = [
        "dators" => ["Datora_nosaukums", "Datora_nr"],
        "monitors" => ["Monitora_nosaukums", "Monitora_nr"],
        "projektors" => ["Projektora_nosaukums", "Projektora_nr"]
    ];

    if (isset($lauki[$tips])) {
        $nosaukums = $lauki[$tips][0];
        $numurs = $lauki[$tips][1];

        $sql = "SELECT Kab AS kabinets, $nosaukums AS nosaukums, $numurs AS numurs FROM inventarizacija_2024";
        $result = $conn->query($sql);

        $dati = [];
        while ($row = $result->fetch_assoc()) {
            $dati[] = $row;
        }

        echo json_encode($dati);
    } else {
        echo json_encode(["error" => "Nepareizs tips!"]);
    }
} else {
    echo json_encode(["error" => "Trūkst tips parametra!"]);
}

$conn->close();
?>
