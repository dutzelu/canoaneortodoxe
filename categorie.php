
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
    <title><?php echo $titlu_pg;?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://canoaneortodoxe.ro/style.css">
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