<?php
include "../db.php";
if(isset($_SESSION['username'])){
    include "../functii.php";
    include "../titluri-pagini.php"; 

 
$b = $_GET['id'];

// dacă se apasă butonul de Submit, se modifică baza de date

if(isset ($_POST["submit"]) ) {

  $denumire = $_POST["denumire"];
  $continut = $_POST["continut"];
  $pedeapsa = $_POST["pedeapsa"];
  $conexiuni = $_POST["conexiuni"];
  $comentarii = $_POST["comentarii"];
  $talcuire = $_POST["talcuire"];
  $simfonie = $_POST["simfonie"];
  $adresa_url = $_POST["adresa_url"];
  

  $query="UPDATE canoane 
          SET `DenumireExplicativa` = '$denumire',
              `Continut` = '$continut',
              `Pedeapsa` = '$pedeapsa',
              `Conexiuni` = '$conexiuni',         
              `Comentarii` = '$comentarii',   
              `Talcuire` = '$talcuire',         
              `Simfonie` = '$simfonie',
              `adresa_url` = '$adresa_url'
          WHERE `id` = '$b';";
  
  
  
  $rez=mysqli_query($conn, $query);
  
}   

else {
echo "Problem updating record. MySQL Error: " . mysql_error();}

// redirectionare inapoi catre pagina de editare a canonului, având acum datele modificate din baza de date

header('Location:../admin/edit.php/' . '?id=' . $b );
  
}?>