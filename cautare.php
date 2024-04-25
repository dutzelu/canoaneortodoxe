<?php 

include "db.php";
include "functii.php";
include "titluri-pagini.php"; 

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Căutare în canoane</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://canoaneortodoxe.ro/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ywpqronwp4p5zyx3ymuriis579s5rjamd0k04eqknrk9pd4c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    

    
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