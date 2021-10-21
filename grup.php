<?php
$titlu_pg = "Canon principal + conexiuni";
include "header.php";
if (isset($_GET['id'])) {
    $b = $_GET['id'];
} else {$b="";}

?>

<h1 class="titlu"> Canon principal + conexiuni </h1>

<?php

if ( isset($_GET['id']) && isset($_GET['conex']) ) {


    $id_principal = $_GET['id'];
    $iduri_secundare = $_GET['conex'];

    afiseaza_canon ($b);

    $iduri_secundare = explode ("-",$iduri_secundare);

    echo '<hr style="border:2px solid #000">
        <div class="iduri_secundare">';

    foreach ($iduri_secundare as $ids) {
        afiseaza_canon ($ids);    
        echo "<hr>";
    }

    echo "</div>";



 
}


?>