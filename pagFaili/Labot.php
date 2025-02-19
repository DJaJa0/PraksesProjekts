<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nosaukums = trim($_POST['nosaukums'] ?? '');
    $apraksts = trim($_POST['apraksts'] ?? '');
    $kabinets = trim($_POST['kabinets'] ?? '');

    // Pārbauda, vai lauki ir aizpildīti
    if (empty($nosaukums) || empty($apraksts) || empty($kabinets)){
        echo "Visi lauki ir jāaizpilda!";
        exit;
    }

    // Saglabā datus CSV failā
    $data = "{$nosaukums},{$apraksts},{$kabinets}\n";
    $result = file_put_contents('data.csv', $data, FILE_APPEND);

    if ($result){
        echo "Dati veiksmīgi saglabāti!";
    }else{
        echo "Kļūda datu saglabāšanā!";
    }
}
?>
