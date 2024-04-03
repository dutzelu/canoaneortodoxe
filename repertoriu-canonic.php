<?php 

    include "db.php";
    include "functii.php";
    include "titluri-pagini.php"; 

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repertoriu canonic general</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/canoane/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ywpqronwp4p5zyx3ymuriis579s5rjamd0k04eqknrk9pd4c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    
    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala">


<h2 class="titlu">REPERTORIU CANONIC GENERAL PE TEME, ANEXAT LA COLECŢIA OFICIALĂ DE CANOANE A BISERICII ORTODOXE</h2>
<p><strong>NOMOCANONUL ÎN 14 TITLURI ALCĂTUIT LA 883 ŞI APROBAT DE SINODUL DIN CONSTANTINOPOL DIN 920</strong></p>
<p>Pentru rezultate complete în cercetarea canoanelor vă recomandăm să folosiți acest acest repertoriu canonic împreună cu funcția de <a href="http://localhost/canoane/cautare.php">căutare</a> și cu <a href="http://localhost/canoane/indice-canonic.php?litera=A">indicele canonic</a>.</p>
            
             <?php

                $sql_titlu= "SELECT * FROM `titluri_repertoriu_canonic`";
                $rez_titlu = mysqli_query($conn, $sql_titlu);
                       
                while ($data = mysqli_fetch_assoc($rez_titlu)){    
                    
                    $id_titlu = $data['id'];
                    $nume_titlu = $data['nume'];
                    $continut_titlu = $data['continut'];

                    // afișez titlul tabului

                    echo'<button class="accordion"><span class="badge bg-primary">' . $nume_titlu . " </span>" . $continut_titlu . ' </button>';

                    // afișez continutul tabului
                    echo '<div class="panel">' . '<ul class="list-group">';

                    // iau fiecare titlu în parte și afișez capitolele aferente lui
                    $sql_cap = "SELECT * FROM `capitole_repertoriu_canonic` WHERE `nr_titlu` = $id_titlu ORDER BY `nume`";
                    
                    $rez_cap = mysqli_query($conn, $sql_cap);

                    while ($data1 = mysqli_fetch_assoc($rez_cap)) {

                        $id_cap = $data1['id'];
                        $nume_cap = $data1['nume'];
                        $continut_cap = $data1['continut'];
                        $conexiuni_cap = $data1['conexiuni'];
                        $anexe = $data1['anexe'];

                        echo '<li class="list-group-item"><strong>' . 'Cap. ' . $nume_cap . ":</strong>" . " " . $continut_cap . 
                        ' <a href="http://localhost/canoane/admin/edit-repertoriu.php/?id=' . $id_cap . '" style="color:red;">[edit]</a>' . "<br>";


                        $text="(" . $data1['conexiuni'] . ")";
                        
                        // introduc conexiunile cu link
                        echo '<p class="conexiuni-repertoriu">';
                   
                        include "conex-canoane.php";
                        echo '</p>';

                        
                        if ($anexe==NULL){echo "";} 
                        else {echo $anexe ."<br>";}

                        $url_cap = creare_url_din_titlu ($continut_cap);

                        echo '<p style="margin-top:14px;"><a class="btn btn-outline-primary btn-sm" href="http://localhost/canoane/capitol.php/' . $url_cap . '?id=' . $id_cap . '">Capitol + canoane »</a></p>';

                        echo "</li>";
                    }
                    echo "</ul></div>";
                }
                
include "footer.php";

?>
