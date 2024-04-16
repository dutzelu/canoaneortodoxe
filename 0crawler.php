<?php
include "db.php";
$re = '/(\d+).*$/m';
$str = '
Se pedepseşte cu afurisire:
A. Episcopul care: primeşte în eparhia sa clerici sau mireni afurisiţi, veniţi din alte eparhii. 12 ap.
- Primeşte clerici care, împotriva voinţei Episcopului lor, şi-au părăsit eparhia. 16 ap.
- Nu poartă grijă să dea clericilor săraci cele de trebuinţă. 59 ap.
- Hirotoneşte, ca urmaş al său, pe o rudenie a sa. 76 ap.
- Se amestecă în treburile altei eparhii, fără învoirea Episcopului competent. 18 Ancira.
B. Clericul care: divorţează din motive de evlavie. 5 ap.
- Nu se împărtăşeşte la St. Liturghie, fără a spune motivul pentru care nu se împărtăşeşte. 8 ap.
- A ajuns la demnitatea de cleric prin bani. 29 ap.
- Refuza să păstorească pe credincioşii pentru care a fost hirotonit, sau care e vinovat din cauză că poporul nu vrea să primească pe Episcopul canonic. 36 ap.
- Joacă jocuri de noroc sau se dă beţiei. 43 ap.; 50 Trul.
- Se roagă împreună cu ereticii. 45 ap.
- Umblă la cârciumi. 54 ap.
- Defaimă pe un cleric superior. 56 ap.
- Batjocoreşte pe un infirm, şchiop, surd sau orb. 57, 58 ap.
- Clericul superior care nu poartă grijă de cler sau credincioşi. 58 ap.
- Duce din biserica vase sfinţite, spre a le folosi acasă. 73 ap.; 10 Const. I-II.
- Călugărul care fuge de la mănăstire şi persoana care primeşte pe fugar. 4 Const. I-II.
C. Mireanul care:
- Se roagă împreună cu cei excomunicaţi. 10 ap.; 2 Antioh.
- Dispreţuieşte pe episcop sau devine schismatic. 31 ap.; 5 Antioh; 13 Const. I-II.
- Ucide pe cineva. 65 ap.
- Posteşte (post negru) Duminica sau Sâmbăta (afară de Sâmbăta mare). 66 ap.; 55 Trul.
- Defaimă conducerea de stat sau pe dregători. 84 ap.
- Mireanul şi monahul care nu se supune Episcopului său. 8 sin. IV ec.
- Îşi ia singur Sf. Cuminecătură, de faţă fiind Episcopul, presbiterul sau diaconul. 58 Trul.
- Predică în public (în biserică) fără învoirea Episcopului. 64 Trul.
- Face cârciumă sau alt fel de comerţ în curtea bisericii. 76 Trul.
- Comunică cu clericul care liturghiseşte sau botează în paraclise particulare, fără învoirea Episcopului. 12 Const. I-II.

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