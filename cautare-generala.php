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

        <div class="col-lg-8 zona-principala p-5">

 
<h1 class="titlu">Căutare generală (în canoane, indice, repertoriu, îndrumător)</h1>
<p class="mb-4">Folosiți la căutare cuvinte cheie pentru a obține rezultatele dorite. Încercați mai multe variante ale aceluiași cuvânt. De exemplu pentru Sfânta Împărtășanie, căutați: "euharistie", "cuminecătură", "cuminecare", "împărtășanie", "împărtășire".


<div class="rezultatele_cautarii">

<?php if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {


        

            // Căutare în Canoane (Denumirea Explicativa + Conținut)

            $cautare_cu_tag = "%$cautare%"; // prepare the $name variable 
            $sql = "
            SELECT * FROM canoane Where `DenumireExplicativa` LIKE ? 
            UNION 
            SELECT * FROM canoane Where `Continut` LIKE ?
            UNION
            SELECT * FROM canoane Where `Nume` LIKE ? ORDER BY `id` ASC

            ;"; // SQL with parameters
            $stmt = $conn->prepare($sql); 
            $stmt->bind_param("sss",  $cautare_cu_tag,  $cautare_cu_tag,  $cautare_cu_tag); // here we can use only a variable
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched

            echo '<p class="bg-light p-2">Căutare după: <b>'  . $cautare . '</b></p>';

            echo '<div class="p-2">';

            if (!empty($rows)) {
    
            echo '<p><span class="badge bg-primary">Canoane </span> (' . count($rows) . (count($rows)==1 ? ' rezultat' : ' rezultate') . ')</p>';
            echo '<ul class="rezultat_cautare_canoane">';
            foreach ($rows as $row) {
                $id_canon = $row['id'];
                $nume = $row['Nume'];
                $url_articol = $row['adresa_url'];
                $continut = $row['Continut'];
                $nr_cuvinte = 12;

                echo '<li class="titlu_cautari">
                
                <span class="badge bg-danger">' . $nume . '</span>
                <a href="http://localhost/canoane/unic.php/'. $url_articol . '?cautare='. $cautare . '">' .$row['DenumireExplicativa'] . ' »</a></li>';
            
                // afisarea paragraf care cuprinde cuvantul cautat

                $regex = '/((?:\S+\s){0,15}\S*)(' . $cautare . ')(\S*(?:\s\S+){0,15})/mi';
                preg_match_all($regex, trim($continut), $matches, PREG_SET_ORDER, 0);

                foreach ($matches as $x => $y) {
                    $cuvant_cautat_html = '<b>' . $cautare . '</b>';
                    $paragraf = str_ireplace($cautare, $cuvant_cautat_html, strip_tags($y[0]));
        
                        echo '<div class="paragraf_cuvant_cautat">(..) ' . $paragraf . '</div>';
                }

            

            }
            echo "</ul>";
        }

        // Căutare în Îndrumătorul canonic

        $cautare_cu_tag = "%$cautare%"; // prepare the $name variable 
        $sql = "SELECT * FROM indrumator_canonic Where `cuvant_cheie` LIKE ? UNION SELECT * FROM indrumator_canonic Where `continut`LIKE ? ORDER BY `id` ASC; "; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss",  $cautare_cu_tag,  $cautare_cu_tag); // here we can use only a variable
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $rows = $result->fetch_all(MYSQLI_ASSOC); // all rows matched
        
        if (!empty($rows)) {
            echo '<p class="mt-4"><span class="badge bg-info ">Îndrumător canonic</span> (' . count($rows) . (count($rows)==1 ? ' rezultat' : ' rezultate') . ')</p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_indrum = $row['id'];
                $cuvant_cheie = $row['cuvant_cheie'];
                $id_indice = explode (' ', replaceSpecialChars($cuvant_cheie) );
                $prima_litera = ucfirst(substr(replaceSpecialChars($cuvant_cheie),0,1));
                $url_articol = creare_url_din_titlu ($cuvant_cheie);
                $continut_indrum = $row['continut'];
    
                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/indrumator-canonic.php?litera=' . $prima_litera . '#'. strtolower($id_indice[0]) . '">' .$cuvant_cheie .'</a></li>';


                // // afisarea paragraf care cuprinde cuvantul cautat
                $regex1 = '/((?:\S+\s){0,15}\S*)(' . $cautare . ')(\S*(?:\s\S+){0,15})/mi';
                preg_match_all($regex1, trim($continut_indrum), $matches1, PREG_SET_ORDER, 0);


                foreach ($matches1 as $a => $b) {
                    $cuvant_cautat_html = '<b>' . $cautare . '</b>';
                    $p_indrum = str_ireplace($cautare, $cuvant_cautat_html, strip_tags($b[0]));
        
                        echo '<div class="paragraf_cuvant_cautat">(..) ' .  $p_indrum . '</div>';
                }
                
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
            echo '<p><span class="badge bg-success ">Indice canonic</span> ('. count($rows) . (count($rows)==1 ? ' rezultat' : ' rezultate') .')</p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_indcan = $row['id'];
                $cuvant_cheie = $row['cuvant_cheie'];
                $id_indice = explode (' ', replaceSpecialChars($cuvant_cheie) );
                $prima_litera = ucfirst(substr(replaceSpecialChars($cuvant_cheie),0,1));
                $url_articol = creare_url_din_titlu ($cuvant_cheie);

                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/indice-canonic-conexiuni.php/canoane-' . strtolower($id_indice[0]) . '?indice=' . $id_indcan.'">' .$cuvant_cheie .'</a></li>';
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
            echo '<p><span class="badge bg-warning ">Repertoriu canonic</span> ('. count($rows) . (count($rows)==1 ? ' rezultat' : ' rezultate') .')</p>';
            echo "<ul>";
            foreach ($rows as $row) {
                $id_cap = $row['id'];
                $continut = $row['continut'];
                $id_indice = explode (' ', replaceSpecialChars($continut) );
                $prima_litera = ucfirst(substr(replaceSpecialChars($continut),0,1));
                $url_cap = creare_url_din_titlu ($continut);

                echo '<li class="titlu_cautari"><a href="http://localhost/canoane/repertoriu.php/' . $url_cap . '-' . $id_cap . '">' .$continut .'</a></li>';
            }
            echo "</ul>";
        }



    }

     ?>



    </div>

</div>