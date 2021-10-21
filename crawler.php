<?php
include "conexiune.php";
$re = '/^(V[^.]*)(.*)$/m';
$str = '
Vagabond. 23 IV.
Vânătoare.  51 VI.
Vârstă canonică | pentru episcop şi presbiter (preot) (30 ani). 11 Neocez.; 14 VI
Vârstă canonică | pentru diaconi (25 ani). 16 Cartag.; 14 VI
Vârstă canonică | pentru ipodiaconi (20 ani). 15 VI .
Vârstă canonică | pentru călugări şi călugăriţe (majoratul). 18 Vas. 
Vârstă canonică | pentru călugări în mod obişnuit (25 ani). 126 Cartag. 
Vârstă canonică | pentru călugări în mod excepţional (17 ani sau şi mai puţin). 18 Vas.; 40 VI 
Vedenii. 83 Cartag. - Vezi şi: altar.
Venituri. 4, 41, 59 ap.; 25 IV; 7, 8 Gang.; 8, 10, 11 Teofil. - Vezi şi: avere.
Vizitaţii canonice. 52 Cartag.
Votul monahal. 16 VI; 18, 20 Vas. - Vezi şi: monah.
Vrăjitor. Vrăjitorie. 61 ap.; 24 Anc.; 36 Laod.; 3 Gang.; 7, 65, 72, 83 Vas.; 2, 27 Ioan. - Vezi şi: superstiţie, obiceiuri păgâneşti.


';

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

// Print the entire match result
// var_dump($matches);
    
    foreach ($matches as $a => $b) { 
 
        $id = $a+1;
        $litera = "V";
        $cuvant_cheie = $matches[$a][1];
        $conexiuni = trim($matches[$a][2]);
        $conexiuni = trim(ltrim($conexiuni, '.'));
        // $conexiune = trim($matches[$a][3]);
       
      

        $regex_vezi = '/Vezi.*/m';
        preg_match_all($regex_vezi, $conexiuni, $rezultate_vezi, PREG_SET_ORDER, 0);

        if ($rezultate_vezi!=NULL) {

            foreach ($rezultate_vezi as $c => $d) {

                $extra = $rezultate_vezi[$c][0];
                $conexiuni = str_replace ($extra,"", $conexiuni);
                $extra = str_replace ("Vezi şi:", "", $extra);
                $extra = str_replace ("Vezi si:", "", $extra);
                $extra = str_replace ("etc.", "", $extra);
                $extra = ltrim(str_replace ("Vezi:", "", $extra));        
                $extra = rtrim($extra, '. ');    
            
            } 
        
            }   else {$extra="";}
        
        // var_dump($id);
        // var_dump($cuvant_cheie);
        // var_dump($conexiuni);
        // var_dump ($extra);
        // echo "<hr><br>";


        $sql="INSERT INTO indice_canonic (litera, cuvant_cheie, conexiuni, extra)
        VALUES ('$litera','$cuvant_cheie', '$conexiuni', '$extra')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // ------------------------------------------------------------------

        // $sql="INSERT INTO capitole_reportoriu_canonic (id, nume, continut, conexiuni, nr_titlu)
        // VALUES ('$nume','$continut', '$conexiune', '1')" . "<br><br>";

        // echo $sql;



    }
     


?>