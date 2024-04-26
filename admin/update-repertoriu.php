<?php
include "../db.php";
if(isset($_SESSION['username'])){
 
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
          WHERE `id` = ?";
  
  
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $b);
  $rez = $stmt->execute();
  $rez = $stmt->get_result();
  
}   

else {
echo "Problem updating record. MySQL Error: " . mysql_error();}

// redirectionare inapoi catre pagina de editare a canonului, având acum datele modificate din baza de date

header('Location:../admin/edit-repertoriu.php/' . '?id=' . $b );
  
}?>