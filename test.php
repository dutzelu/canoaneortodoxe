<?php 
 
include 'db.php';
include 'functii.php';

$url =  "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$slug_canon = parse_url($url, PHP_URL_PATH);
$slug_canon = explode('/', parse_url($slug_canon, PHP_URL_PATH));
$slug_canon = end($slug_canon);


$sql_slug="SELECT * FROM canoane WHERE adresa_url=?";
$stmt = $conn->prepare($sql_slug);
$stmt->bind_param('s', $slug_canon);
$rezultate2 = $stmt->execute();
$rezultate2 = $stmt->get_result();


// interogarea 1 pentru canon

while ($data = mysqli_fetch_assoc($rezultate2)){    
  echo $id_canon = $data['id'];
  $id_canon_inainte = $id_canon+1;
  $id_canon_inapoi = $id_canon+1;
}

$sql_canon_inainte="SELECT * FROM canoane WHERE id=?";
$stmt = $conn->prepare($sql_canon_inainte);
$stmt->bind_param('s', $id_canon_inainte);
$rez = $stmt->execute();
$rez = $stmt->get_result();








?>

