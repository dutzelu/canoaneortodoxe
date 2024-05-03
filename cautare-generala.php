<?php 

include "db.php";
include "functii.php";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $cautare = $_POST['search'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    
    autocomplete();
    
    if ( !in_array( ucfirst($cautare), $array_cuvinte ) ) {
        
        $query="INSERT INTO cautari (cautat, ip) VALUES (?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $cautare, $ip);
        $rez = $stmt->execute();
        $rez = $stmt->get_result();
    }
    

} else {$cautare='Caută cuvinte cheie';}



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

 
<h1 class="titlu">Căutare generală (în canoane, indice, repertoriu, îndrumător)</h1>



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
                <a href="' .  BASE_URL . 'unic.php/'. $url_articol . '?cautare='. $cautare . '">' .$row['DenumireExplicativa'] . ' »</a></li>';
            
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
    
                echo '<li class="titlu_cautari"><a href="' .  BASE_URL . 'indrumator-canonic.php?litera=' . $prima_litera . '#'. strtolower($id_indice[0]) . '">' .$cuvant_cheie .'</a></li>';


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
                $url_articol = $row['adresa_url'];

                echo '<li class="titlu_cautari"><a href="' .  BASE_URL . 'indice-canonic-conexiuni.php/' .  $url_articol . '">' .$cuvant_cheie .'</a></li>';
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
                $url_cap = $row['adresa_url'];

                echo '<li class="titlu_cautari"><a href="' .  BASE_URL . 'repertoriu.php/' . $url_cap . '">' .$continut .'</a></li>';
            }
            echo "</ul>";
        }



    }

     ?>


</div>

</div>
</div>
<?php include "footer.php"; ?>