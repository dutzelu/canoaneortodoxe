<?php


include "conexiune.php";

if (isset($_GET['id'])) {


    $id_cap = $_GET['id'];

    $sql_id_cap = "SELECT * FROM `capitole_repertoriu_canonic` WHERE `id` = ?";
    $stmt = $conn->prepare($sql_id_cap);
    $stmt->bind_param('i', $id_cap);
    $rez_id_cap = $stmt->execute();
    $rez_id_cap = $stmt->get_result();

    while ($data2 = mysqli_fetch_assoc($rez_id_cap)) {
    
        $nume_cap = $data2['nume'];
        $continut_cap = $data2['continut'];
        $id_titlu = $data2['nr_titlu'];

    $titlu_pg =  'Cap. '. $nume_cap . ": "  .$continut_cap ;
    include "header.php";


    $sql_id_titlu = "SELECT * FROM `titluri_repertoriu_canonic` WHERE `id` = $id_titlu ";
    $rez_id_titlu = mysqli_query($conn, $sql_id_titlu);

            
   

    while ($data = mysqli_fetch_assoc($rez_id_titlu)) {
        
        $nume_titlu = $data['nume'];
        $nume_titlu = str_replace(":", "",$nume_titlu);
        $continut_titlu = $data['continut'];

    
        $id_uri_canoane_conex = "";

        echo '<a href="http://localhost/canoane/repertoriu-canonic.php"><span class="badge badge-primary">Repertoriu Canonic</span> <span class="badge badge-danger">' . $nume_titlu . " </span></a>";
        echo '<h3 class="capitol"><strong>' . 'Cap. '. $nume_cap . ": </strong>" . $continut_cap . "</h3>   " . '<a href="http://localhost/canoane/admin/edit-repertoriu.php/?id=' . $id_cap . '"  style="color:red;">[edit]</a>' . "<br>";

    }    
    
    // afisez linkurile capitolelor din titlu


    // afișez canoanele

    $iduri_canoane = id_uri_canone_din_conexiuni ($data2['conexiuni']);

    } 

    $iduri_canoane = explode ("-",$iduri_canoane);


    echo '<hr style="border:2px solid #000">
        <div class="iduri_secundare">';

    foreach ($iduri_canoane as $ids) {
        afiseaza_canon ($ids);    
        echo "<hr>";
    }

    echo "</div>";



  
}


?>