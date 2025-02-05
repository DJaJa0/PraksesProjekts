<?php
header('Content-Type: application/json');

$servername = "sql7.freesqldatabase.com";
$username = "sql7761322";
$password = "taU4zHrvby";
$dbname = "sql7761322";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Savienojuma kļūda: " . $conn->connect_error]));
}


if (isset($_GET['tips'])) {
    $tips = strtolower($_GET['tips']); 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
    $limit = 5;
    $offset = ($page - 1) * $limit; 

   
    $lauki = [
        "datori" => ["Datora_nosaukums", "Datora_nr"],
        "monitori" => ["Monitora_nosaukums", "Monitora_nr"],
        "projektori" => ["Projektora_nosaukums", "Projektora_nr"]
    ];

    if (isset($lauki[$tips])) {
        $nosaukums = $lauki[$tips][0];
        $numurs = $lauki[$tips][1];

        $sql = "SELECT Kab AS kabinets, $nosaukums AS nosaukums, $numurs AS numurs 
                FROM inventarizacija_2024 
                LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);

        if ($result === false) {
            echo json_encode(["error" => "SQL kļūda: " . $conn->error]);
        } else {
            $dati = [];
            while ($row = $result->fetch_assoc()) {
                $dati[] = $row;
            }

            echo json_encode($dati);
        }
    } else {
        echo json_encode(["error" => "Nepareizs tips!"]);
    }
} else {
    echo json_encode(["error" => "Trūkst tips parametra!"]);
}

$conn->close();
?>
