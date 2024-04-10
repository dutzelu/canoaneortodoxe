<?php 

include "db.php";
include "functii.php";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $cautare = $_POST['search'];

} else {$cautare='Caută cuvinte cheie';}

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Căutare în canoane</title>
    
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

 
<h1 class="titlu">Căutare generală (în canoane, indice, repertoriu, îndrumător)</h1>



<div class="row g-3">

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/intreita-afundare.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Întreita afundare</h5>
            <p class="card-text">Botezul copilului se face prin afundarea de 3 ori în cristelniță.</p>
            <a href="http://localhost/canoane/unic.php/botezul-se-savarseste-prin-trei-afundari-50" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col">
         <div class="card h-100">
         <img src="http://localhost/canoane/imagini/impartasire.jpg" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Cum stăm la împărtășire</h5>
             <p class="card-text">Când ne împărtășim ar trebui să ținem mâinile în formă de cruce pe piept</p>
             <a href="http://localhost/canoane/unic.php-278" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/ingenuncherea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Când să îngenunchem?</h5>
            <p class="card-text">În zi de duminică nu ar trebuie să îngenunchem în biserică</p>
            <a href="https://localhost/canoane/unic.php/randuiala-ingenuncherii-in-biserica-267" class="btn btn-primary">Citește</a>
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
            <a href="http://localhost/canoane/indice-canonic-conexiuni.php/canoane-adulter?indice=7" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col">
         <div class="card h-100">
         <img src="http://localhost/canoane/imagini/impartasire.jpg" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Cum stăm la împărtășire</h5>
             <p class="card-text">Când ne împărtășim ar trebui să ținem mâinile în formă de cruce pe piept</p>
             <a href="http://localhost/canoane/unic.php-278" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           

    <div class="col">
        <div class="card h-100">
        <img src="http://localhost/canoane/imagini/ingenuncherea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Când să îngenunchem?</h5>
            <p class="card-text">În zi de duminică nu ar trebuie să îngenunchem în biserică</p>
            <a href="https://localhost/canoane/unic.php/randuiala-ingenuncherii-in-biserica-267" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

</div>
 
            
            







    </div>

</div>