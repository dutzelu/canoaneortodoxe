<?php 

include "db.php";
include "functii.php";

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

 
<h1 class="titlu mb-3">Despre proiect</h1>


<div class="row mt-5">
    
    <div class="col-12 col-sm-4 mb-3">
        <img src="imagini/canoanele-bisericii-ortodoxe-nicolae-floca.jpg" width="100%" alt="Arhid. Prof. Dr. Ioan N. Floca, Canoanele Bisericii Ortodoxe. Note și comentarii., Editura Institutului Bibilic şi de Misiune a Bisericii Ortodoxe Române, Sibiu 2005" class="">
    </div>

    <div class="col-12 col-sm-8">
    <p>Acest site conţine toată colecţia canoanelor Bisericii Ortodoxe. Conţinutul este luat în totalitate din lucrarea <em>părintelui Arhid. Prof. Dr. Ioan N. Floca, Canoanele Bisericii Ortodoxe. Note și comentarii., Editura Institutului Bibilic şi de Misiune a Bisericii Ortodoxe Române, Sibiu 2005, tipărită cu binecuvântarea Prea Fericitului Patriarh Teoctist.</em></p>

<p>Aici veţi găsi <b>canoanele ortodoxe împărţite pe cinci categorii</b> la fel ca şi-n lucrarea părintelui Floca:</p>
<ul>
    <li>Canoanele Sfinţilor Apostoli,</li>
    <li> Canoanele Sinoadelor Ecumenice,</li>
    <li>Canoanele Sinoadelor Locale,</li>
    <li> Canoanele Sfinţilor Părinţi și</li>
    <li>Canoanele Întregitoare</li>
</ul>    

<p>și în plus <b>3 instrumente de cercetare</b> foarte necesare:</p> 

   <ul>
    <li>Îndrumătorul Canonic</li>
    <li>Indicele Canonic și</li>
    <li>Repertoriul canonic</li>
   </ul>
   
<p>plus două module de căutare care vă vor ajuta să cercetați detaliat temele care vă interesează.</p>

<p>Site-ul dedicat Canoanelor Bisericii Ortodoxe este primul proiect al Asociației Ortodoxia Tinerilor și a apărut prima dată în anul 2008 pe site-ul www.canoaneortodoxe.net, care astăzi nu mai există. La vremea respectivă site-ul oferea toată colecția canoanelor împărțite pe categorii în format pdf.</p>

<p>În luna aprilie 2024 am lansat un nou site cu aceeași colecție de canoane, dar data aceasta cu instrumente de cercetare foarte utile și cu <b>conexiuni dinamice pe teme între cele 907 de canoane</b>.</p>
    </div>
</div>

    </div>

</div>

<?php include "footer.php"; ?>