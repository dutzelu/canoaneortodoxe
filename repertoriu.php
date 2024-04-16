<?php 

include "db.php";
include "functii.php";
include "titluri-pagini.php"; 

    // aflu id capitol repertoriu din url

    $url =  "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $slug_repertoriu = basename($url);
    $regex_rep = '/(.*)-(\d+)/m';
    preg_match_all($regex_rep, $slug_repertoriu, $afla_id, PREG_SET_ORDER, 0);
    $id_cap = $afla_id[0][2];
    $alias_cap = $afla_id[0][1];


    $sql_id_cap = "SELECT * FROM `capitole_repertoriu_canonic` WHERE `id` = ?";
    $stmt = $conn->prepare($sql_id_cap);
    $stmt->bind_param('i', $id_cap);
    $rez_id_cap = $stmt->execute();
    $rez_id_cap = $stmt->get_result();

    while ($data2 = mysqli_fetch_assoc($rez_id_cap)) {
    
        $nume_cap = $data2['nume'];
        $continut_cap = $data2['continut'];
        $url_cap = creare_url_din_titlu($data2['continut']);
        $id_titlu = $data2['nr_titlu'];

    $titlu_pg =  'Cap. '. $nume_cap . ": "  .$continut_cap ;

    if (trim($url_cap) !== trim($alias_cap)) {
        trigger_error("Error: URL inexistent", E_USER_ERROR);
    }
    

    // Opresc codul ca să afișez $titlu_pg
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

    // Continui codul

    $sql_id_titlu = "SELECT * FROM `titluri_repertoriu_canonic` WHERE `id` = ? ";

    $stmt = $conn->prepare($sql_id_titlu);
    $stmt->bind_param('s', $id_titlu);
    $rez_id_titlu = $stmt->execute();
    $rez_id_titlu = $stmt->get_result();

   

    while ($data = mysqli_fetch_assoc($rez_id_titlu)) {
        
        $nume_titlu = $data['nume'];
        $nume_titlu = str_replace(":", "",$nume_titlu);
        $continut_titlu = $data['continut'];

    
        $id_uri_canoane_conex = "";

        echo '<a href="http://localhost/canoane/repertoriu-canonic.php"><span class="badge bg-secondary">Repertoriu Canonic</span> <span class="badge bg-primary">' . $nume_titlu . " </span></a>";
        echo '<h3 class="capitol"><strong>' . 'Cap. '. $nume_cap . ": </strong>" . $continut_cap . "</h3>   " . '<a href="http://localhost/canoane/admin/edit-repertoriu.php/?id=' . $id_cap . '"  style="color:red;">[edit]</a>' . "<br>";

    }    
    
    // afisez linkurile capitolelor din titlu


    // afișez canoanele

    $iduri_canoane = id_uri_canone_din_conexiuni ($data2['conexiuni']);

    } 

    $iduri_canoane = explode ("-",$iduri_canoane);


    echo '<hr style="border:2px solid #000">
        <div class="">';

    foreach ($iduri_canoane as $ids) {
        afiseaza_canon ($ids);    
        echo "<hr>";
    }

    echo "</div>";



  



?>