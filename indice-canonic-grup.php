<?php

include "conexiune.php";

// var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_indice_canonic = $_POST['id_indice_canonic'];
    $id_uri_canoane_conex = $_POST['id_uri_canoane_conex'];

    $sql = "SELECT cuvant_cheie FROM indice_canonic WHERE id= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id_indice_canonic);
    $rez = $stmt->execute();
    $rez = $stmt->get_result();

     while ($data = mysqli_fetch_assoc($rez)) {
         $titlu_pg = 'Canoane despre: ' . $data['cuvant_cheie'];
         include "header.php";
         echo '<h1>Canoane despre: <span style="color:red">' . $data['cuvant_cheie'] . '</span></h1>';
     }

    
     $can = explode ("-",$id_uri_canoane_conex);

     echo '<hr style="border:2px solid #000">
         <div class="iduri_secundare">';

     foreach ($can as $c) {
         afiseaza_canon ($c);    
         echo "<hr>";
     }

     echo "</div>";
 
 }


?>