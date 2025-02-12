<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Savienojuma parametri
$servername = "sql7.freesqldatabase.com";
$username = "sql7761322";
$password = "taU4zHrvby";
$dbname = "sql7761322";

// Izveido savienojumu
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Savienojuma kļūda: " . $conn->connect_error]);
    exit;
}

// Iegūst un dekodē saņemto JSON
$input = json_decode(file_get_contents("php://input"), true);

if (!$input) {
    echo json_encode(["error" => "Dati nav saņemti vai JSON ir nederīgs"]);
    exit;
}

// Pārbauda, vai ir nepieciešamie dati
if (!isset($input["nosaukums"], $input["numurs"], $input["kabinets"])) {
    echo json_encode(["error" => "Nepilnīgi dati"]);
    exit;
}

// Attīra datus SQL drošībai
$nosaukums = $conn->real_escape_string($input["nosaukums"]);
$numurs = $conn->real_escape_string($input["numurs"]);
$kabinets = $conn->real_escape_string($input["kabinets"]);

// Ja ir ID, tad veicam labošanu, pretējā gadījumā pievienojam jaunu ierakstu
if (!empty($input["id"])) {
    $id = intval($input["id"]); // Drošāka ID konvertācija
    $sql = "UPDATE inventarizacija_2024 
            SET Nosaukums='$nosaukums', Numurs='$numurs', Kab='$kabinets' 
            WHERE id=$id";
} else {
    $sql = "INSERT INTO inventarizacija_2024 (Nosaukums, Numurs, Kab) 
            VALUES ('$nosaukums', '$numurs', '$kabinets')";
}

// Izpilda vaicājumu un atgriež rezultātu
if ($conn->query($sql) === TRUE) {
    if (!empty($input["id"])) {
        echo json_encode(["message" => "Ieraksts veiksmīgi atjaunināts", "id" => $input["id"]]);
    } else {
        echo json_encode(["message" => "Jauns ieraksts veiksmīgi pievienots", "id" => $conn->insert_id]);
    }
} else {
    echo json_encode(["error" => "Kļūda saglabājot datus: " . $conn->error]);
}

// Debug fails, lai redzētu ienākošos datus
file_put_contents("debug_log.txt", json_encode($input, JSON_PRETTY_PRINT) . "\n", FILE_APPEND);

// Aizver savienojumu
$conn->close();
?>
