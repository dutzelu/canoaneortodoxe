<?php

    include "db.php";
    include "functii.php";
    include "titluri-pagini.php"; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_indice_canonic = $_POST['id_indice_canonic'];
        $id_uri_canoane_conex = $_POST['id_uri_canoane_conex'];
    
        $sql = "SELECT cuvant_cheie FROM indice_canonic WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $id_indice_canonic);
        $rez = $stmt->execute();
        $rez = $stmt->get_result();
    
         while ($data = mysqli_fetch_assoc($rez)) {
             $titlu_pg = 'Canoane despre ' . $data['cuvant_cheie'];

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

        <div class="col-lg-8 zona-principala">




<?php
    // Continui while loop-ul

         echo '<h1>Canoane despre <span class="cuvant-cheie-rosu">' . $data['cuvant_cheie'] . '</span></h1>';
         echo '<a href="http://localhost/canoane/indice-canonic.php?litera=A">←Indice canonic</a>';
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