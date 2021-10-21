<?php 
$titlu_pg = "Repertoriu Canonic";
include "header.php";

?>

<h2 class="titlu">REPERTORIU CANONIC GENERAL PE TEME, ANEXAT LA COLECŢIA OFICIALĂ DE CANOANE A BISERICII ORTODOXE</h2>
<p><strong>NOMOCANONUL ÎN PATRUSPREZECE TITLURI ALCĂTUIT LA 883 ŞI APROBAT DE SINODUL DIN CONSTANTINOPOL DIN 920</strong></p>

            
             <?php

                $sql_titlu= "SELECT * FROM `titluri_repertoriu_canonic`";
                $rez_titlu = mysqli_query($conn, $sql_titlu);
                       
                while ($data = mysqli_fetch_assoc($rez_titlu)){    
                    
                    $id_titlu = $data['id'];
                    $nume_titlu = $data['nume'];
                    $continut_titlu = $data['continut'];

                    // afișez titlul tabului

                    echo'<button class="accordion"><span class="badge badge-danger">' . $nume_titlu . " </span>" . $continut_titlu . ' <span class="sageata-repertoriu">&#8628;</span> </button>';

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
