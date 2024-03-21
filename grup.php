<?php
$titlu_pg = "Canon principal + conexiuni";
include "header.php";

if (isset($_GET['id'])) {
    $b = $_GET['id'];
} else {$b="";}

?>

<h1 class="titlu"> Canon principal + conexiuni </h1>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_canon = $_POST['id_canon'];
    $id_uri_canoane_conex = $_POST['id_uri_canoane_conex'];

    afiseaza_canon ($id_canon);

    $id_uri_canoane_conex = explode ("-",$id_uri_canoane_conex);

    echo '<hr style="border:2px solid #000">
        <div class="iduri_secundare">';

    foreach ($id_uri_canoane_conex as $ids) {
        afiseaza_canon ($ids);    
        echo "<hr>";
    }

    echo "</div>";



 
}


?>