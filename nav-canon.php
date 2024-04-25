<?php 

$url =  "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$slug_canon = parse_url($url, PHP_URL_PATH);
$slug_canon = explode('/', parse_url($slug_canon, PHP_URL_PATH));
$slug_canon = end($slug_canon);

$sql_slug="SELECT canoane.id, canoane.Nume, canoane.DenumireExplicativa, titluri_capitole.id_inceput, titluri_capitole.id_sfarsit FROM canoane LEFT JOIN titluri_capitole ON canoane.id_titlu_capitol = titluri_capitole.id Where canoane.adresa_url = ?";

$stmt = $conn->prepare($sql_slug);
$stmt->bind_param('s', $slug_canon);
$rezultate2 = $stmt->execute();
$rezultate2 = $stmt->get_result();


// interogarea 1 pentru canon
$id_canon_next = NULL;
$id_canon_back = NULL;
while ($data = mysqli_fetch_assoc($rezultate2)){    
 
    $id_canon = $data['id'];
    $id_inceput = $data['id_inceput'];
    $id_sfarsit = $data['id_sfarsit'];
    $id_canon_back = $id_canon-1;
    $id_canon_next = $id_canon+1;
    
    if ($id_canon_next >= $id_sfarsit) {
        $id_canon_next = $id_sfarsit;
    }  

    if ($id_canon == $id_sfarsit) {
        $stop_final = TRUE;} 
    else {$stop_final = FALSE;}

    if ($id_canon == $id_inceput) {
        $stop_start = TRUE;} 
    else {$stop_start = FALSE;}

    if ($id_canon_back == 0) {
        $id_canon_back = $id_canon;
    }  

    
    // echo "<br>";
    // echo "id_inceput = " . $id_inceput;
    // echo "<br>";
    // echo "id_canon_back = " . $id_canon_back;
    // echo "<br>";
    // echo "id_canon = " . $id_canon;
    // echo "<br>";
    // echo "id_canon_next = " . $id_canon_next;
    // echo "<br>";
    // echo "id_sfarsit = " . $id_sfarsit;

    // aflu adresa_url canon_next

    $sql_canon_next="SELECT * FROM canoane Where canoane.id = ?;";
    
    $stmt = $conn->prepare($sql_canon_next);
    $stmt->bind_param('i', $id_canon_next);
    $rez = $stmt->execute();
    $rez = $stmt->get_result();

    while ($data1 = mysqli_fetch_assoc($rez)){ 
        $adresa_url_next = $data1['adresa_url'];
    }

    // aflu adresa_url canon_back

    $sql_canon_back="SELECT * FROM canoane Where canoane.id = ?;";
    
    $stmt = $conn->prepare($sql_canon_back);
    $stmt->bind_param('i', $id_canon_back);
    $rez = $stmt->execute();
    $rez = $stmt->get_result();

    while ($data2 = mysqli_fetch_assoc($rez)){ 
        $adresa_url_back = $data2['adresa_url'];
    }

}



?>

