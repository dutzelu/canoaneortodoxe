
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
    <title>Canoane Ortodoxe</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/canoane/style.css">
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

        <div class="col-lg-8 zona-principala">

        <h1 class="titlu">Canoane de larg interes pentru public</h1>

            
            <?php

            // Navigație

             numere_url_din_categ  ($a);

             // afisez toate numerele de canoane cu url din categoria respectivă
             
 
              //  Afișare categorii

                if (isset($_GET['nume'])) {

                        $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE '%$prescurtare%' ORDER BY `id`";
                        $rezultate=mysqli_query($conn, $sql_ap);

                  
                         // afișare canon

                        while ($data = mysqli_fetch_assoc($rezultate)){    

                            $id_canon = $data['id'];
                            $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);
                            $comentarii = $data["Comentarii"];
                            $talcuire = $data["Talcuire"];
                            $simfonie = $data["Simfonie"];

                            echo 
                            '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                            .'<a href="http://localhost/canoane/page.php/'. $url_articol . '?id=' . $id_canon . '">' .$data['DenumireExplicativa'] .'</a></span> <a style="color:red; text-align:right" href="http://localhost/canoane/admin/edit.php/?id=' . $id_canon . '">[edit] </a></p>'
                            
                            .'<div class="continut">'.$data['Continut'].'</div>';

                             

                            if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-'){echo "";} 
                                else {echo 'Pedeapsa: ' .$data['Pedeapsa']."<br>";} 
                        
                            if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-'){echo "";} 
                            else {
            
                                $text=$data['Conexiuni'];
                                echo 'Conexiuni: ';
                                
                                // introduc conexiunile cu link
                                include "conex-canoane.php";
                                
                                // butonul Canon + conexiuni


                                echo '<form action="conexiuni.php?'. $url_articol . '?id='. $id_canon . '" method="POST">';
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
            


<div class="row g-3">

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/intreita-afundare.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Întreita afundare</h5>
            <p class="card-text">Botezul copilului se face prin afundarea de 3 ori în cristelniță.</p>
            <a href="http://localhost/canoane/page.php/botezul-se-savarseste-prin-trei-afundari?id=50" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col">
         <div class="card h-100">
         <img src="http://localhost/canoane/imagini/impartasire.jpg" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Cum stăm la împărtășire</h5>
             <p class="card-text">Când ne împărtășim ar trebui să ținem mâinile în formă de cruce pe piept</p>
             <a href="http://localhost/canoane/page.php?id=278" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/ingenuncherea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Când să îngenunchem?</h5>
            <p class="card-text">În zi de duminică nu ar trebuie să îngenunchem în biserică</p>
            <a href="https://localhost/canoane/page.php/randuiala-ingenuncherii-in-biserica?id=267" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

</div>

<!-- Canoane despre desfrânare-->
            
<div class="row mt-4 g-3">

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/adulter.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Adulter</h5>
            <p class="card-text">Canoane despre înșelarea soțului sau soției.</p>
            <a href="http://localhost/canoane/indice-canonic-conexiuni.php/canoane-adulter?id=7&conex=61-264-270-275-322-328-335-755-757-766-769" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col">
         <div class="card h-100">
         <img src="http://localhost/canoane/imagini/impartasire.jpg" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Cum stăm la împărtășire</h5>
             <p class="card-text">Când ne împărtășim ar trebui să ținem mâinile în formă de cruce pe piept</p>
             <a href="http://localhost/canoane/page.php?id=278" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/ingenuncherea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Când să îngenunchem?</h5>
            <p class="card-text">În zi de duminică nu ar trebuie să îngenunchem în biserică</p>
            <a href="https://localhost/canoane/page.php/randuiala-ingenuncherii-in-biserica?id=267" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

</div>
 
            
            










<?php include "footer.php"; ?>