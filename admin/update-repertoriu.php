<?php
include "../conexiune.php";

 
$b = $_GET['id'];

// dacă se apasă butonul de Submit, se modifică baza de date

if(isset ($_POST["submit"]) ) {

  $continut = $_POST["continut"];
  $conexiuni = $_POST["conexiuni"];
  $anexe = $_POST["anexe"];

  

  $query="UPDATE capitole_repertoriu_canonic 
          SET `continut` = '$continut',
              `conexiuni` = '$conexiuni',
              `anexe` = '$anexe'
          WHERE `id` = '$b'";
  
  
  
  $rez=mysqli_query($conn, $query);
  
}   

else {
echo "Problem updating record. MySQL Error: " . mysql_error();}

// redirectionare inapoi catre pagina de editare a canonului, având acum datele modificate din baza de date

header('Location:../admin/edit-repertoriu.php/' . '?id=' . $b );
  
?>