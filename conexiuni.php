<?php 

include "db.php";
include "functii.php";
include "titluri-pagini.php"; 

    // Opresc codul ca să afișez $titlu_pg
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <title>Canon principal + conexiuni</title>
    <?php include "header.php";?>

    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala">

<?php

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