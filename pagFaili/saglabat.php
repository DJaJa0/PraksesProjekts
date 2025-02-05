
//saglabās datus no datu bāzā, kad tie tiks rediģēti
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


$input = json_decode(file_get_contents("php://input"), true);

if (isset($input["nosaukums"], $input["numurs"], $input["kabinets"])) {
    $nosaukums = $conn->real_escape_string($input["nosaukums"]);
    $numurs = $conn->real_escape_string($input["numurs"]);
    $kabinets = $conn->real_escape_string($input["kabinets"]);

    $sql = "INSERT INTO inventarizacija_2024 (Nosaukums, Numurs, Kab) VALUES ('$nosaukums', '$numurs', '$kabinets')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Dati veiksmīgi saglabāti"]);
    } else {
        echo json_encode(["error" => "Kļūda saglabājot datus: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Nepareizi ievades dati"]);
}

$conn->close();
?>