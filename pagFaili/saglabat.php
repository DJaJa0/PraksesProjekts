<?php
header('Content-Type: application/json');
ini_set('display_errors', 1); 
ini_set('log_errors', 1); 
error_log('/path_to_error_log'); 


$servername = "sql7.freesqldatabase.com";
$username = "sql7761322";
$password = "taU4zHrvby";
$dbname = "sql7761322";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error){
    error_log("Savienojuma kļūda: " . $conn->connect_error); 
    echo json_encode(["error" => "Savienojuma kļūda: " . $conn->connect_error]);
    exit;
}


$input = json_decode(file_get_contents("php://input"), true);


if (!$input){
    error_log("Nepareizs JSON formāts vai dati nav saņemti!"); 
    echo json_encode(["error" => "Nepareizs JSON formāts vai dati nav saņemti!"]);
    exit;
}


if (!isset($input["nosaukums"], $input["numurs"], $input["kabinets"], $input["tips"])){
    error_log("Nepilnīgi dati!"); 
    echo json_encode(["error" => "Nepilnīgi dati!"]);
    exit;
}

$nosaukums = $conn->real_escape_string($input["nosaukums"]);
$numurs = $conn->real_escape_string($input["numurs"]);
$kabinets = $conn->real_escape_string($input["kabinets"]);
$tipaVeids = $input["tips"];  


if (!empty($input["id"])){
    $id = intval($input["id"]);
    switch ($tipaVeids){
        case 'dators':
            $sql = "UPDATE inventarizacija_2024 SET Datora_nosaukums='$nosaukums', Datora_nr='$numurs', Kab='$kabinets' WHERE id=$id";
            break;
        case 'monitors':
            $sql = "UPDATE inventarizacija_2024 SET Monitora_nosaukums='$nosaukums', Monitora_nr='$numurs', Kab='$kabinets' WHERE id=$id";
            break;
        case 'projektori':
            $sql = "UPDATE inventarizacija_2024 SET Projektora_nosaukums='$nosaukums', Projektora_nr='$numurs', Kab='$kabinets' WHERE id=$id";
            break;
        case 'tumbas':
            $sql = "UPDATE inventarizacija_2024 SET Tumbas_nosaukums='$nosaukums', Tumbas_nr='$numurs', Kab='$kabinets' WHERE id=$id";
            break;
        case 'printeri':
            $sql = "UPDATE inventarizacija_2024 SET Printera_nosaukums='$nosaukums', Printera_nr='$numurs', Kab='$kabinets' WHERE id=$id";
            break;
        case 'dok':
            $sql = "UPDATE inventarizacija_2024 SET Dok_kam_nosaukums='$nosaukums', Dok_kam_nr='$numurs', Kab='$kabinets' WHERE id=$id";
            break;
    }
}else{
    switch ($tipaVeids){
        case 'dators':
            $sql = "INSERT INTO inventarizacija_2024 (Datora_nosaukums, Datora_nr, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
            break;
        case 'monitors':
            $sql = "INSERT INTO inventarizacija_2024 (Monitora_nosaukums, Monitora_nr, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
            break;
        case 'projektori':
            $sql = "INSERT INTO inventarizacija_2024 (Projektora_nosaukums, Projektora_nr, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
            break;
        case 'tumbas':
            $sql = "INSERT INTO inventarizacija_2024 (Tumbas_nosaukums, Tumbas_nr, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
            break;
        case 'printeri':
            $sql = "INSERT INTO inventarizacija_2024 (Printera_nosaukums, Printera_nr, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
            break;
        case 'dok':
            $sql = "INSERT INTO inventarizacija_2024 (Dok_kam_nosaukums, Dok_kam_nr, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
            break;
    }
}

if ($conn->query($sql) === TRUE){
    echo json_encode(["message" => "Ieraksts veiksmīgi atjaunināts", "id" => $conn->insert_id]);
}else{
    error_log("Kļūda saglabājot: " . $conn->error); 
    echo json_encode(["error" => "Kļūda saglabājot: " . $conn->error]);
}

$conn->close();
?>