<?php 

include "db.php";
include "functii.php";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $cautare = $_POST['search'];

} else {$cautare='Caută cuvinte cheie';}

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Căutare în canoane</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/canoane/style.css">
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

        <div class="col-lg-8 zona-principala">

 
<h1 class="titlu">Căutare în tot siteul</h1>
<p class="mb-5">în lista de canoane, în indicele canonic, în repertoriul canonic și în îndrumarul canonic.</p>


<form method="post">
    <div class="row">
        <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Caută cuvinte cheie" ><br>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<div class="rezultatele_cautarii">

<?php if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {?>

    <p class="bg-light p-2">Rezultate:<b> <?php echo $cautare;?></b></p>

    <div class="p-2">
        
        
        <?php 

            // Căutare în Canoane (Denumirea Explicativa + Conținut)

            $cautare_cu_tag = "%$cautare%"; // prepare the $name variable 
            $sql = "SELECT * FROM canoane Where `DenumireExplicativa` LIKE ? UNION SELECT * FROM canoane Where `Continut`LIKE ? ORDER BY `id` ASC; "; // SQL with parameters
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("ss",  $cautare_cu_tag,  $cautare_cu_tag); // here we can use only a variable
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched

            if (!empty($rows)) {
    
            echo '<p><span class="badge bg-primary">Canoane</span></p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_canon = $row['id'];
                $url_articol = creare_url_din_titlu ($row['DenumireExplicativa']);
                $continut = $row['Continut'];
                $nr_cuvinte = 12;

                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/page.php/'. $url_articol . '?id=' . $id_canon . '&cautare='. $cautare . '">' .$row['DenumireExplicativa'] . '</a></li>';
            
                $paragraf_cautare = ellipse($cautare,$continut,$nr_cuvinte);
                $cuvant_cautat_html = '<b>' . $cautare . '</b>';
                echo str_replace($cautare, $cuvant_cautat_html, $paragraf_cautare);
            

            }
            echo "</ul>";
        }

        // Căutare în Îndrumătorul canonic

        $cautare = "%$cautare%"; // prepare the $name variable 
        $sql = "SELECT * FROM indrumator_canonic Where `cuvant_cheie` LIKE ? UNION SELECT * FROM indrumator_canonic Where `continut`LIKE ? ORDER BY `id` ASC; "; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $cautare, $cautare); // here we can use only a variable
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched
        
        if (!empty($rows)) {
            echo '<p><span class="badge bg-secondary">Îndrumător canonic</span></p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_indrum = $row['id'];
                $cuvant_cheie = $row['cuvant_cheie'];
                $id_indice = explode (' ', replaceSpecialChars($cuvant_cheie) );
                $prima_litera = ucfirst(substr(replaceSpecialChars($cuvant_cheie),0,1));
                $url_articol = creare_url_din_titlu ($cuvant_cheie);
    
                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/indrumator-canonic.php?litera=' . $prima_litera . '#'. strtolower($id_indice[0]) . '">' .$cuvant_cheie .'</a></li>';
            }
            echo "</ul>";
        }


        // Căutare în Indicele canonic

        $cautare = "%$cautare%"; // prepare the $name variable 
        $sql = "SELECT * FROM indice_canonic Where `cuvant_cheie` LIKE ? ORDER BY `id` ASC; "; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $cautare); // here we can use only a variable
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched
        
        if (!empty($rows)) {
            echo '<p><span class="badge bg-success">Indice canonic</span></p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_indrum = $row['id'];
                $cuvant_cheie = $row['cuvant_cheie'];
                $id_indice = explode (' ', replaceSpecialChars($cuvant_cheie) );
                $prima_litera = ucfirst(substr(replaceSpecialChars($cuvant_cheie),0,1));
                $url_articol = creare_url_din_titlu ($cuvant_cheie);
    
                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/indice-canonic.php?litera=' . $prima_litera . '#'. strtolower($id_indice[0]) . '">' .$cuvant_cheie .'</a></li>';
            }
            echo "</ul>";
        }


        // Căutare în Repertoriul canonic

        $cautare = "%$cautare%"; // prepare the $name variable 
        $sql = "SELECT * FROM capitole_repertoriu_canonic Where `continut` LIKE ? ORDER BY `id` ASC; "; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $cautare); // here we can use only a variable
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched
        
        if (!empty($rows)) {
            echo '<p><span class="badge bg-warning">Repertoriu canonic</span></p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_cap = $row['id'];
                $continut = $row['continut'];
                $id_indice = explode (' ', replaceSpecialChars($continut) );
                $prima_litera = ucfirst(substr(replaceSpecialChars($continut),0,1));
                $url_cap = creare_url_din_titlu ($continut);

                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/capitol.php/' . $url_cap . '?id=' . $id_cap . '">' .$continut .'</a></li>';
            }
            echo "</ul>";
        }



    }


     ?>



    </div>

</div>