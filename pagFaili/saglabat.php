<?php
header('Content-Type: application/json');
ini_set('display_errors', 1); // Parāda kļūdas
ini_set('log_errors', 1); // Aktivizē kļūdu žurnālu
error_log('/path_to_error_log'); // Norādiet pareizu ceļu uz kļūdu žurnālu

// Savienojuma dati
$servername = "sql7.freesqldatabase.com";
$username = "sql7761322";
$password = "taU4zHrvby";
$dbname = "sql7761322";

// Savienojuma izveide
$conn = new mysqli($servername, $username, $password, $dbname);

// Pārbauda savienojumu
if ($conn->connect_error) {
    error_log("Savienojuma kļūda: " . $conn->connect_error); // Saglabā kļūdu žurnālā
    echo json_encode(["error" => "Savienojuma kļūda: " . $conn->connect_error]);
    exit;
}

// Saņem JSON un pārveido par PHP masīvu
$input = json_decode(file_get_contents("php://input"), true);

// Ja nav saņemti dati vai formāts nederīgs
if (!$input) {
    error_log("Nepareizs JSON formāts vai dati nav saņemti!"); // Kļūdas reģistrēšana
    echo json_encode(["error" => "Nepareizs JSON formāts vai dati nav saņemti!"]);
    exit;
}

// Pārbauda, vai ir nepieciešamie lauki
if (!isset($input["nosaukums"], $input["numurs"], $input["kabinets"])) {
    error_log("Nepilnīgi dati!"); // Kļūdas reģistrēšana
    echo json_encode(["error" => "Nepilnīgi dati!"]);
    exit;
}

// SQL drošībai
$nosaukums = $conn->real_escape_string($input["nosaukums"]);
$numurs = $conn->real_escape_string($input["numurs"]);
$kabinets = $conn->real_escape_string($input["kabinets"]);

// Ja ir ID, tad tiek labots, citādi pievienots jauns ieraksts
if (!empty($input["id"])) {
    $id = intval($input["id"]);
    $sql = "UPDATE inventarizacija_2024 
            SET Datora_nosaukums='$nosaukums', Datora_nr='$numurs', Kab='$kabinets' 
            WHERE id=$id";
} else {
    $sql = "INSERT INTO inventarizacija_2024 (Datora_nosaukums, Datora_nr, Kab) 
            VALUES ('$nosaukums', '$numurs', '$kabinets')";
}

// Izpilda SQL
if ($conn->query($sql) === TRUE) {
    if (!empty($input["id"])) {
        echo json_encode(["message" => "Ieraksts veiksmīgi atjaunināts", "id" => $input["id"]]);
    } else {
        echo json_encode(["message" => "Jauns ieraksts veiksmīgi pievienots", "id" => $conn->insert_id]);
    }
} else {
    error_log("Kļūda saglabājot: " . $conn->error); // Kļūdas reģistrēšana
    echo json_encode(["error" => "Kļūda saglabājot: " . $conn->error]);
}

// Aizver savienojumu
$conn->close();
?>