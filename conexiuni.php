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

        <div class="col-lg-8 zona-principala p-5">

        <h1 class="titlu">Canon principal + conexiuni </h1>
<?php

    $url =  "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $slug_canon = basename($url);

    $sql_slug="SELECT * FROM canoane WHERE adresa_url=?";
    $stmt = $conn->prepare($sql_slug);
    $stmt->bind_param('s', $slug_canon);
    $rezul = $stmt->execute();
    $rezul = $stmt->get_result();

    
    while ($data = mysqli_fetch_assoc($rezul)){    
        $id_canon = $data['id'];
        $titlu = $data['DenumireExplicativa'];
        $text = $data['Conexiuni'];

        include "conex-canoane.php";



        afiseaza_canon ($id_canon);

        
        $iduri_canoane = explode ("-",$id_uri_canoane_conex);

        echo '<hr style="border:2px solid #000">
            <div class="iduri_secundare">';

        foreach ($iduri_canoane as $ids) {
            afiseaza_canon ($ids);    
            echo "<hr>";
        }

    }

    echo "</div>";
    echo "</div>";


    include "footer.php";
?>