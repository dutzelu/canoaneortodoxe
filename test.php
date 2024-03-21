<?php 
include 'header.php';


$slug = 'apostolice';

echo "<form>";

$sql = 'SELECT canoane.id as id_canon, canoane.Nume, canoane.DenumireExplicativa, titluri_capitole.prescurtare, titluri_capitole.id_inceput, titluri_capitole.id_sfarsit
    FROM canoane
    LEFT JOIN titluri_capitole
    ON canoane.id_titlu_capitol = titluri_capitole.id 
    WHERE titluri_capitole.slug LIKE ?
    ORDER BY id_canon';

$stmt = $conn->prepare($sql);
$stmt->bind_param ('s', $slug);
$stmt->execute();
$result = $stmt->get_result();

$nav_all='';

echo '<select class="form-control choices-single" data-live-search="true">';
while ($data = mysqli_fetch_assoc($result)) {   
    
    $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);
    $nr_can = rtrim($data['Nume'],$data['prescurtare']);
    $id_canon = $data['id_canon'];
    $nr_canoane = $data['id_sfarsit'] - $data['id_inceput'];
    // $nav ='<a href="http://localhost/canoane/page.php' . $url_articol . '?id=' . $id_canon . '">'.$nr_can.'</a>'.', ';
    $url ='http://localhost/canoane/page.php' . $url_articol . '?id=' . $id_canon . '">'.$nr_can;
    
    echo '<option value="'. $nav . '">' . $nr_can . '</option>';
    $nav_all.=$nav; 
    
} 
echo '</select>';
echo '<input type="submit" class="form-control">';
echo '</form>';
$nav_all=substr($nav_all, 0, -2);


?>
 