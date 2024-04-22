<?php 
 
include 'db.php';
include 'functii.php';



$sql_ap="SELECT * FROM `canoane` ORDER BY ID";
$stmt = $conn->prepare($sql_ap);
$rezultate = $stmt->execute();
$rezultate = $stmt->get_result();

$i = 1;
while ($data = mysqli_fetch_assoc($rezultate)){    

  $id = $data['id'];
  $slug = trim($data['adresa_url']);

  // echo $id . ' ' . $slug . "<br>";
  // $i++;


  $sql_update = "
    UPDATE canoane 
    SET 
      adresa_url = '$slug' 
    WHERE id = '$id'
    ";

  $rez=mysqli_query($conn, $sql_update);

  echo "<br>";

}

?>
