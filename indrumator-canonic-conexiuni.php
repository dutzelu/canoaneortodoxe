<?php

    include "db.php";
    include "functii.php";

if ( isset($_GET['conex']) ) {
    $id_uri_canoane_conex = $_GET['conex'];
}

if ( isset($_GET['tema']) ) {
    $cuvant_cheie = $_GET['tema'];
}

    
    $titlu_pg = $cuvant_cheie;

        // opresc codul ca să afișez $title_pg

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <title><?php echo $titlu_pg;?></title>
    <?php include "header.php";?>
    

</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala p-5">




<?php
    // Continui while loop-ul

         echo '<h1>Temă: <span class="cuvant-cheie-rosu">' . $cuvant_cheie . '</span></h1>';
         echo '<a href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=A">←Îndrumător canonic</a>';
     

    
     $can = explode ("-",$id_uri_canoane_conex);

     echo '<hr style="border:2px solid #000">
         <div class="iduri_secundare">';

     foreach ($can as $c) {
         afiseaza_canon ($c);    
         echo "<hr>";
     }

     echo "</div>";
     echo "</div>";
 
 
     include "footer.php";

?>