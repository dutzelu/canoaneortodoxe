<?php
include "../db.php";
if(isset($_SESSION['username'])){
 
$b = $_GET['id'];

// dacă se apasă butonul de Submit, se modifică baza de date

if(isset ($_POST["submit"]) ) {

  $continut = $_POST["continut"];
  $cuvant_cheie = $_POST["cuvant_cheie"];

  

  $query="UPDATE indrumator_canonic 
          SET `continut` = '$continut',
              `cuvant_cheie` = '$cuvant_cheie'
          WHERE `id` = ?";
  
  $stmt = $conn->prepare($query);
  $stmt->bind_param('i', $b);
  $rez = $stmt->execute();
  $rez = $stmt->get_result();
}   

else {
echo "Problem updating record. MySQL Error: " . mysql_error();}

// redirectionare inapoi catre pagina de editare a canonului, având acum datele modificate din baza de date

header('Location:../admin/edit-indrumator.php/' . '?id=' . $b );
  
} ?>