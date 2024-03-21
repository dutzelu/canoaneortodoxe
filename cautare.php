<?php 

$titlu_pg = "Indice Canonic";
include "header.php";

if (isset ($_GET['litera'])) {
    $litera_link = $_GET['litera'];
} else {$litera_link = '';}

$extra_linkuri = "";

?>

<h2 class="titlu">Căutare</h2>

<div class="container">
<div class="row">


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
                    $Nume = $row['Nume'];
                    $Denumire = $row['DenumireExplicativa'];
                    $Continut = $row['Continut'];

                    if (strlen($Continut) > 200  ) 
                    {
                      $Continut = wordwrap($Continut, 200);
                      $Continut = substr($Continut, 0, strpos($Continut, "\n"));
                      $Continut = $Continut . '<a href="https://localhost/canoane/page.php/' . $id . '-' . creare_url_din_titlu($Denumire) .'"> (continuare »)</a>';
                    }
                  
                    $Pedeapsa = $row['Pedeapsa'];
                    $Conexiuni = $row['Conexiuni'];

                    echo '<tr class="clickable-row">';
                        echo '<td>' . $Nume . '</a></td>';
                        echo '<td><a href="https://localhost/canoane/page.php/' . $id . '-' . creare_url_din_titlu($Denumire) .'">' . $Denumire . '</a></td>';
                        echo '<td>' . $Continut . '</td>';
                        // echo '<td>' . $Pedeapsa . '</td>';
                        // echo '<td>' . $Conexiuni . '</td>';
                    echo '</tr>';
                }

                ?>

            </tbody>
        </table>
</div>
</div>
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