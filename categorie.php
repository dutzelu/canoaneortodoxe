
<?php 

include "db.php";
include "functii.php";
include "titluri-pagini.php"; 

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <title><?php echo $titlu_pg;?></title>
    <?php include "header.php"; ?>
    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala p-5">

        <h1 class="titlu"><?php echo $titlu_pg;?></h1>

            
            <?php

            // Navigație

             numere_url_din_categ  ($a);

             // afisez toate numerele de canoane cu url din categoria respectivă
             
 
              //  Afișare categorie

                if (isset($_GET['nume'])) {

                        $prescurtare = "%$prescurtare%";
                        $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE ? ORDER BY `id`";
                        $stmt = $conn->prepare($sql_ap);
                        $stmt->bind_param('s', $prescurtare);
                        $rezultate = $stmt->execute();
                        $rezultate = $stmt->get_result();

                  
                         // afișare canon

                        while ($data = mysqli_fetch_assoc($rezultate)){    

                            $id_canon = $data['id'];
                            $url_articol = trim($data['adresa_url']);
                            $comentarii = $data["Comentarii"];
                            $talcuire = $data["Talcuire"];
                            $simfonie = $data["Simfonie"];
                            $adresa_url = $data["adresa_url"];

                            echo 
                            '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                            .'<a href="https://canoaneortodoxe.ro/unic.php/'. $url_articol . '">' .$data['DenumireExplicativa'] .'</a></span>';
                            
                            if(isset($_SESSION['username'])){
                                echo ' <a style="color:red; text-align:right" href="https://canoaneortodoxe.ro/admin/edit.php/?id=' . $id_canon . '">[edit] </a></p>';
                            } else {echo '</p>';}

                            echo '<div class="continut">'.$data['Continut'].'</div>';

                             

                            if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-'){echo "";} 
                                else {echo 'Pedeapsa: ' .$data['Pedeapsa']."<br>";} 
                        
                            if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-'){echo "";} 
                            else {
            
                                $text=$data['Conexiuni'];
                                echo 'Conexiuni: ';
                                
                                // introduc conexiunile cu link
                                include "conex-canoane.php";
                                echo $links;
                                // butonul Canon + conexiuni

                                echo '<p class="mt-3"><a class="btn btn-outline-primary btn-sm" href="https://canoaneortodoxe.ro/conexiuni.php/' .  $adresa_url . '"role="button">Canon + conexiuni</a></p>';

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
            



            </div>
        </div>
    </div>
    
    <?php include "footer.php"; ?>


