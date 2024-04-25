<?php

    include "db.php";
    include "functii.php";
    include "titluri-pagini.php"; 

        // aflu alias pentru a-l compara cu cel din baza de date

        $url =  "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $slug_indice = basename($url);

        // extrag indicele canonic din db

        $sql = "SELECT * FROM indice_canonic WHERE adresa_url LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $slug_indice);
        $rez = $stmt->execute();
        $rez = $stmt->get_result();
    
         while ($rezultat = mysqli_fetch_assoc($rez)) {
             $cuvant_cheie = $rezultat['cuvant_cheie'];
             $titlu_pg = 'Canoane despre ' . $rezultat['cuvant_cheie'];
             $text="(" . $rezultat['conexiuni'] . ")";
             include "conex-canoane.php";
            
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

         echo '<h1>Canoane despre <span class="cuvant-cheie-rosu">' . $rezultat['cuvant_cheie'] . '</span></h1>';
         echo '<a href="https://canoaneortodoxe.ro/indice-canonic.php?litera=A">←Indice canonic</a>';
     }

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

