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
    

    <title>Canoane Ortodoxe</title>
    <?php include "header.php"; ?>
    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala p-5">

 
<div class="row mb-3">
    
    <div class="col-12">
        <p>Acest site conţine toată colecţia de <b>960 de canoane</b> a Bisericii Ortodoxe. Conţinutul este luat în totalitate din lucrarea <em>părintelui Arhid. Prof. Dr. Ioan N. Floca, Canoanele Bisericii Ortodoxe. Note și comentarii.</em>, Editura Institutului Bibilic şi de Misiune a Bisericii Ortodoxe Române, Sibiu 2005, tipărită cu binecuvântarea Prea Fericitului Patriarh Teoctist.</p>

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
        
        <p>plus <b>două module de căutare</b> care vă vor ajuta să cercetați detaliat temele care vă interesează.</p>

    </div>

</div>

<div class="row g-3">

<h2>Teme de interes</h2>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="card h-100">
        <img src="https://canoaneortodoxe.ro/imagini/intreita-afundare.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Întreita afundare</h5>
            <p class="card-text">Botezul copilului se face prin afundarea de 3 ori în cristelniță.</p>
            <a href="https://canoaneortodoxe.ro/unic.php/botezul-se-savarseste-prin-trei-afundari" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col-12 col-sm-6 col-md-4">
         <div class="card h-100">
         <img src="https://canoaneortodoxe.ro/imagini/impartasire.jpg" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Cum stăm la împărtășire</h5>
             <p class="card-text">Când ne împărtășim ar trebui să ținem mâinile în formă de cruce pe piept</p>
             <a href="https://canoaneortodoxe.ro/unic.php/randuiala-pentru-primirea-cuminecaturii" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           

    <div class="col-12 col-sm-6 col-md-4">
        <div class="card h-100">
        <img src="https://canoaneortodoxe.ro/imagini/ingenuncherea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Când să îngenunchem?</h5>
            <p class="card-text">În zi de duminică nu ar trebuie să îngenunchem în biserică</p>
            <a href="https://canoaneortodoxe.ro/unic.php/randuiala-ingenuncherii-in-biserica" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="card h-100">
        <img src="https://canoaneortodoxe.ro/imagini/adulter.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Adulter</h5>
            <p class="card-text">Canoane despre înșelarea soțului sau soției.</p>
            <a href="https://canoaneortodoxe.ro/indice-canonic-conexiuni.php/adulter" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col-12 col-sm-6 col-md-4">
         <div class="card h-100">
         <img src="https://canoaneortodoxe.ro/imagini/pariuri-sportive.png" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Jocurile de noroc</h5>
             <p class="card-text">Cei care joacă jocuri de noroc și nu încetează după avertizarea sunt excluși din comunitatea Bisericii</p>
             <a href="https://canoaneortodoxe.ro/unic.php/osandirea-jocurilor-de-noroc-si-a-betiei" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           

     <div class="col-12 col-sm-6 col-md-4">
        <div class="card h-100">
        <img src="https://canoaneortodoxe.ro/imagini/casatorie.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Canoane despre căsătorie</h5>
            <p class="card-text">Căsătoria este una din temele preponderente ale canoanelor Bisericii Ortodoxe.</p>
            <a href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=C#casatorie" class="btn btn-primary">Afurisire</a>
        </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="card h-100">
        <img src="https://canoaneortodoxe.ro/imagini/anatema.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Anatema</h5>
            <p class="card-text">Este cea mai grea pedeapsa pe care o poate da Biserica. Ea presupune excomunicare, blestem, afurisanie și reprezintă actul religios prin care Biserica înlătură din rândurile sale pe cei care se fac vinovați de grave încălcări ale doctrinei și dogmei creștine. </p>
            <a href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=A#anatema" class="btn btn-primary">Citește</a>
        </div>
        </div>
    </div>

     <div class="col-12 col-sm-6 col-md-4">
         <div class="card h-100">
         <img src="https://canoaneortodoxe.ro/imagini/caterisire.jpg" class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Caterisirea clericilor</h5>
             <p class="card-text">Caterisirea înseamnă luarea tuturor drepturilor de a sluji vreo lucrare sfințitoare a Bisericii și trecerea vinovatului în rândul mirenilor. Caterisirea înseamnă decăderea din har, apostazia clerului caterisit, acesta nemaiavând darul de a săvârși Sfintele Taine</p>
             <a href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=C#caterisire" class="btn btn-primary">Citește</a>
         </div>
         </div>
     </div>           


    <div class="col-12 col-sm-6 col-md-4">
        <div class="card h-100">
        <img src="https://canoaneortodoxe.ro/imagini/excomunicarea.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Ce este afurisirea sau excomunicarea?</h5>
            <p class="card-text">Afurisirea sau excomunicarea este excluderea credinciosului din comunitatea Bisericii, când se face vinovat de pacate contra credinței sau a moralei </p>
            <a href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=A#afurisire" class="btn btn-primary">Afurisire</a>
            <a href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=E#excomunicare" class="btn btn-warning">Excomunicare</a>
        </div>
        </div>
    </div>

</div>
 
</div>

</div>
</div>

<?php include "footer.php"; ?>