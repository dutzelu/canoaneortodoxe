<?php 

    include "db.php";
    include "functii.php";
    include "titluri-pagini.php"; 

?>

<!DOCTYPE html>
<html lang="ro">
<head>

    <title>Repertoriu canonic general</title>
    <?php include "header.php"; ?>
    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala p-5">


<h2 class="titlu">REPERTORIU CANONIC GENERAL PE TEME, ANEXAT LA COLECŢIA OFICIALĂ DE CANOANE A BISERICII ORTODOXE</h2>
<p><strong>NOMOCANONUL ÎN 14 TITLURI ALCĂTUIT LA 883 ŞI APROBAT DE SINODUL DIN CONSTANTINOPOL DIN 920</strong></p>

            
             <?php

                $sql_titlu= "SELECT * FROM `titluri_repertoriu_canonic`";
                $rez_titlu = mysqli_query($conn, $sql_titlu);
                       
                while ($data = mysqli_fetch_assoc($rez_titlu)){    
                    
                    $id_titlu = $data['id'];
                    $nume_titlu = $data['nume'];
                    $continut_titlu = $data['continut'];

                    // afișez titlul tabului

                    echo'<button class="accordion"><span class="badge bg-primary">' . $nume_titlu . " </span>" . $continut_titlu . ' <span style="color:red">↓</span> </button>';

                    // afișez continutul tabului
                    echo '<div class="panel">' . '<ul class="list-group">';

                    // iau fiecare titlu în parte și afișez capitolele aferente lui
                    $sql_cap = "SELECT * FROM `capitole_repertoriu_canonic` WHERE `nr_titlu` = ? ORDER BY `nume`";

                    $stmt = $conn->prepare($sql_cap);
                    $stmt->bind_param('i', $id_titlu);
                    $rez_cap = $stmt->execute();
                    $rez_cap = $stmt->get_result();
                    

                    while ($data1 = mysqli_fetch_assoc($rez_cap)) {

                        $id_cap = $data1['id'];
                        $nume_cap = $data1['nume'];
                        $continut_cap = $data1['continut'];
                        $conexiuni_cap = $data1['conexiuni'];
                        $anexe = $data1['anexe'];

                        echo '<li class="list-group-item"><strong>' . 'Cap. ' . $nume_cap . ":</strong>" . " " . $continut_cap;
                        
                        if(isset($_SESSION['username'])){
                            echo ' <a href="' .  BASE_URL . 'admin/edit-repertoriu.php/?id=' . $id_cap . '" style="color:red;">[edit]</a>' . "<br>";
                        } else {echo "<br>";}

                        $text="(" . $data1['conexiuni'] . ")";
                        
                        // introduc conexiunile cu link
                        echo '<p class="conexiuni-repertoriu">';
                   
                        include "conex-canoane.php";
                        echo $links;
                        echo '</p>';

                        
                        if ($anexe==NULL){echo "";} 
                        else {echo $anexe ."<br>";}

                        $url_cap = creare_url_din_titlu ($continut_cap);

                        echo '<p style="margin-top:14px;"><a class="btn btn-outline-primary btn-sm" href="' .  BASE_URL . 'repertoriu.php/' . $url_cap . '">Vezi canoane »</a></p>';

                        echo "</li>";
                    }
                    echo "</ul></div>";
                }
?>

</div>

</div>
</div>    
<script src="<?php echo BASE_URL;?>js/acordeon.js"></script>

<?php include "footer.php"; ?>