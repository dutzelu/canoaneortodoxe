<?php

// Extrag din db titlurile paginilor și prescurtarea
 
if (isset($_GET['nume'])) {
    $a = $_GET['nume'];
} else {$a=""; $titlu_pg = "Canoane Ortodoxe";}

$sql_presc="SELECT * FROM `titluri_capitole` WHERE `slug` LIKE '$a'";
$rez_sql_presc = mysqli_query($conn, $sql_presc);

while ($data_presc = mysqli_fetch_assoc($rez_sql_presc)){   
    $prescurtare = $data_presc['prescurtare'];
    $titlu_pg = $data_presc['titlu'];
} 

?>