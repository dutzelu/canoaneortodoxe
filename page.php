<?php

//  Afișare articol
include "conexiune.php";

if (isset($_GET['nume'])) {
    $a = $_GET['nume'];
} else {$a="";}

$url =  "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$slug_canon = basename($url);
$slug_canon = explode('-', $slug_canon);
$id_canon = (int)$slug_canon[0];


if (isset($_GET['id'])) {
    $id_canon = $_GET['id'];
} 

include "titluri-pagini.php"; 

        // querry după id pentru canon în baza de date 
   

        $sql_id="SELECT * FROM canoane WHERE id=?";
        $stmt = $conn->prepare($sql_id);
        $stmt->bind_param('i', $id_canon);
        $rezultate2 = $stmt->execute();
        $rezultate2 = $stmt->get_result();

 

        // interogarea 1 pentru canon

        while ($data = mysqli_fetch_assoc($rezultate2)){    
     
            // querry după categorie canon, slug și numerele celorlalte canoane
            $sql_cap="  SELECT titlu, slug, prescurtare, id_inceput, id_sfarsit 
                        FROM canoane
                        LEFT JOIN titluri_capitole
                        ON canoane.id_titlu_capitol = titluri_capitole.id
                        WHERE canoane.id=?";

            $stmt = $conn->prepare($sql_cap);
            $stmt->bind_param('i', $id_canon);
            $sql_cap_rez = $stmt->execute();
            $sql_cap_rez = $stmt->get_result();
            
            $titlu_pg = $data['Nume'] . " " .$data['DenumireExplicativa'];
            include "header.php";


            
 
             // interogarea 2 pentru categorie canon, slug și numere celorlalte canoane

            while ($data2 = mysqli_fetch_assoc($sql_cap_rez)){    

                $nr_canoane = $data2['id_sfarsit'] - $data2['id_inceput'];
                $prescurtare=$data2['prescurtare'];
                $comentarii = $data["Comentarii"];
                $talcuire = $data["Talcuire"];
                $simfonie = $data["Simfonie"];
 
                echo '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span>' . ' <a style="color:red; text-align:right" href="http://localhost/canoane/admin/edit.php/?id=' . $id_canon . '">[edit] </a></p>'; 
                echo '<h2 class="titlu_canon">' . $data['DenumireExplicativa'] .'</h2>';
                echo '<span class="bold">Categorie: </span><a href="http://localhost/canoane?nume=' . $data2['slug'] .'">'. $data2['titlu'] .'</a> <br>';

                if ($nr_canoane>1) {
                    echo '<p><span class="bold">Navighează: </span>';
                }

                 // afisez toate numerele de canoane cu url din categoria respectivă
                $url_baza="page.php";
                lista_numere_url ($prescurtare,$id_canon,$url_baza);
               
        

                // afisez continutul canonului, pedeapsa, conexiuni, comentarii si simfonie
            
                echo '<div class="continut">'.$data['Continut'].'</div>';


                if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-'){echo "";} 
                else {echo '<span class="rosu">Pedeapsa: </span>' .$data['Pedeapsa']."<br>";} 
           
                if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-'){echo "";} 
                else {
                    // echo '<span class="rosu">Conexiuni: </span>' .$data['Conexiuni']."<br>"; conexiuni fara link

                    $text=$data['Conexiuni'];
                    echo '<span class="rosu">Conexiuni: </span>';

                    // introduc conexiunile cu link
                    include "conex-canoane.php";

                    

                     // butonul Canon + conexiuni
                    //  echo '<p style="margin-top:14px"><a class="btn btn-outline-primary btn-sm" href="http://localhost/canoane/grup.php?id=' . $_GET['id'] . '&conex=' .$id_uri_canoane_conex . '">Canon + conexiuni »</a></p>';

                     echo '<form action="http://localhost/canoane/grup.php" method="POST">';
                     echo '<input type="hidden" name="id_canon" value="' . $id_canon . '">';
                     echo '<input type="hidden" name="id_uri_canoane_conex" value="' . $id_uri_canoane_conex . '">';
                     echo '<input style="margin-top:14px" class="btn btn-outline-primary btn-sm" type="submit" value="Canon + conexiuni">';
                     echo '</form>';
                
                } 

                if ($comentarii ==NULL) {echo "";} 
                else {echo '<span class="rosu">Comentarii: </span>' . $comentarii ."<br>";}
            

                if ($talcuire ==NULL) {echo "";} 
                        else {echo '<span class="rosu">Tâlcuire: </span>' .$talcuire."<br>";}
                    

                if ($simfonie ==NULL){echo "";} 
                        else {echo '<span class="rosu">Simfonie: </span>' .$simfonie."<br>";}
             
                
            }
        }

 