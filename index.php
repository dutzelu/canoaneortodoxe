<?php 
$titlu_pg = 'Canoane Ortodoxe';
include "conexiune.php";
if (isset($_GET['nume'])) {
    $a = $_GET['nume'];
} else {$a="";}

include "titluri-pagini.php"; 
include "header.php";
 
?>

<h1 class="titlu"> <?php echo $titlu_pg; ?> </h1>

            
             <?php

             // Navigație

      
            
             numere_url_din_categ  ($a);
            if ($nr_canoane>1) {
                echo '<p><span class="bold">Navighează: </span>';
            }
   
            print_r($nav_all);
            
             // afisez toate numerele de canoane cu url din categoria respectivă
             

            
 
              //  Afișare categorii

                if (isset($_GET['nume'])) {

                        $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE '%$prescurtare%' ORDER BY `id`";
                        $rezultate=mysqli_query($conn, $sql_ap);

     
                  
                         // afișare canon

                        while ($data = mysqli_fetch_assoc($rezultate)){    

                        //   var_dump($data);
                           
                            $id_canon = $data['id'];
                            $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);
                            $comentarii = $data["Comentarii"];
                            $talcuire = $data["Talcuire"];
                            $simfonie = $data["Simfonie"];

                            echo 
                            '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                            .'<a href="http://localhost/canoane/page.php/'. $id_canon . '-' . $url_articol . '">' .$data['DenumireExplicativa'] .'</a></span> <a style="color:red; text-align:right" href="http://localhost/canoane/admin/edit.php/?id=' . $id_canon . '">[edit] </a></p>'
                            
                            .'<p style="continut">'.$data['Continut'].'</p>';

                             

                            if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Pedeapsa: </span>' .$data['Pedeapsa']."<br>";} 
                        
                            if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-'){echo "";} 
                            else {
            
                                $text=$data['Conexiuni'];
                                echo '<span class="rosu">Conexiuni: </span>';
                                
                                // introduc conexiunile cu link
                                include "conex-canoane.php";
                                
                                // butonul Canon + conexiuni


                                echo '<form action="grup.php" method="POST">';
                                echo '<input type="hidden" name="id_canon" value="' . $id_canon . '">';
                                echo '<input type="hidden" name="id_uri_canoane_conex" value="' . $id_uri_canoane_conex . '">';
                                echo '<input style="margin-top:14px" class="btn btn-outline-primary btn-sm" type="submit" value="Canon + conexiuni">';
                                echo '</form>';

                            } 

                
                            // if ($comentarii ==NULL) {echo "";} 
                            //         else {echo '<span class="rosu">Comentarii: </span>' . $comentarii ."<br>";}
                                
                
                            // if ($talcuire ==NULL) {echo "";} 
                            //         else {echo '<span class="rosu">Comentarii: </span>' .$talcuire."<br>";}
                                
                
                            // if ($simfonie ==NULL){echo "";} 
                            //         else {echo '<span class="rosu">Comentarii: </span>' .$simfonie."<br>";}
                                 
                 

                              
                            echo '<hr class="linie"';
                                 
                        }
                                        
                }  
            
                
              
                
            ?>
            
            
            
            
            

<?php 

include "footer.php";

?>