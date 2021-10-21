<?php

include "conexiune.php";

if (isset($_GET['can'])) {
    $can = $_GET['can'];
} else {$can="";}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {$id="";}


$sql = "SELECT `cuvant_cheie` FROM `indice_canonic` WHERE `id`= $id";
$rez_sql = mysqli_query($conn, $sql);

    while ($data = mysqli_fetch_assoc($rez_sql)) {
        $titlu_pg = 'Canoane despre: ' . $data['cuvant_cheie'];
        include "header.php";
        echo '<h1>Canoane despre: <span style="color:red">' . $data['cuvant_cheie'] . '</span></h1>';
    }

    

if ( isset($_GET['id']) && isset($_GET['can']) ) {

    $can = explode ("-",$can);

    echo '<hr style="border:2px solid #000">
        <div class="iduri_secundare">';

    foreach ($can as $c) {
        afiseaza_canon ($c);    
        echo "<hr>";
    }

    echo "</div>";



 
}


?>