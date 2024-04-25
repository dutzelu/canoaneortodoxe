<?php 

include "db.php";
include "functii.php";
include "titluri-pagini.php"; 

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    

    <title>Căutare în canoane</title>   
    <?php include "header.php"; ?>

    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala p-5">


<?php

if (isset ($_GET['litera'])) {
    $litera_link = $_GET['litera'];
} else {$litera_link = '';}

$extra_linkuri = "";

?>

<h1 class="titlu mb-4">Căutare în toate cele 960 de canoane</h1>





<div class="table-responsive">
        <table id="example" class="table">

            <thead>
                <tr>
                <th scope="col">Nume</th>
                <th scope="col">Denumire</th>
                <th scope="col">Conținut</th>
                <!-- <th scope="col">Pedeapsă</th> -->
                <!-- <th scope="col">Conexiuni</th> -->
                </tr>
            </thead>

            <tbody>

            <?php
            
                $sql = "Select * FROM canoane ORDER BY id ASC";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
                $result = $stmt->get_result();

                while ($row = mysqli_fetch_assoc($result)) { 

                    $id = $row['id'];
                    $url = $row['adresa_url'];
                    $Nume = $row['Nume'];
                    $Denumire = $row['DenumireExplicativa'];
                    $Continut = $row['Continut'];
                    $Pedeapsa = $row['Pedeapsa'];
                    $Conexiuni = $row['Conexiuni'];

                    echo '<tr class="clickable-row">';
                        echo '<td width="10%">' . $Nume . '</a></td>';
                        echo '<td width="30%"><a href="https://canoaneortodoxe.ro/unic.php/' . $url . '">' . $Denumire . '</a></td>';
                        echo '<td width="60%">' . $Continut . '</td>';
                        // echo '<td>' . $Pedeapsa . '</td>';
                        // echo '<td>' . $Conexiuni . '</td>';
                    echo '</tr>';
                }

                ?>

            </tbody>
        </table>
</div>


<script>


$(document).ready(function () {
    $('#example').DataTable({
        "order": [],
        language: {
            url: 'js/dataTablesRomana.json'
        }
    });
});


</script>

</div>

</div>
</div>


<?php include "footer.php";?>