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

            
 
              //  Afișare categorii

                if (isset($_GET['nume'])) {

                        $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE '%$prescurtare%' ORDER BY `id`";
                        $rezultate=mysqli_query($conn, $sql_ap);
                       
                        while ($data = mysqli_fetch_assoc($rezultate)){    

                          
                           
                            $id_canon = $data['id'];
                            $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);

                            echo 
                            '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                            .'<a href="http://localhost/canoane/page.php/'. $url_articol . '?id=' . $id_canon . '">' .$data['DenumireExplicativa'] .'</a></span> <a style="color:red; text-align:right" href="http://localhost/canoane/admin/edit.php/?id=' . $id_canon . '">[edit] </a></p>'
                            
                            .'<p style="continut">'.$data['Continut'].'</p>';

                         

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
                                echo '<p style="margin-top:14px"><a class="btn btn-outline-primary btn-sm" href="http://localhost/canoane/grup.php?id=' . $id_canon . '&conex=' .$id_uri_canoane_conex . '">Canon + conexiuni »</a></p>';
                            } 
                
                            if ($data["Comentarii"]==NULL || $data["Comentarii"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Comentarii: </span>' .$data['Comentarii']."<br>";}

                            if ($data["Talcuire"]==NULL || $data["Talcuire"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Talcuire: </span>' .$data['Talcuire']."<br>";}

                            if ($data["Simfonie"]==NULL || $data["Simfonie"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Simfonie: </span>' .$data['Simfonie']."<br>";}


                              
                            echo '<hr class="linie"';
                                 
                        }
                                        
                }  
            
                
              
                
            ?>
            
            
            
            
            

<?php 

include "footer.php";

?>