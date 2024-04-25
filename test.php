<?php 
 
include 'db.php';
include 'functii.php';

$slug = 'prelungirea-afurisirii';

$sql_slug="SELECT * FROM canoane WHERE adresa_url=?";
$stmt = $conn->prepare($sql_slug);
$stmt->bind_param('s', $slug);
$rezul = $stmt->execute();
$rezul = $stmt->get_result();


while ($data = mysqli_fetch_assoc($rezul)){    
    $id_canon = $data['id'];
 echo   $conexiuni = $data['Conexiuni'];

}


 ?>