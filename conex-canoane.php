<?php 

$regex_nr = '/\d+/m';
$regex = '/\s?\(.*\)/m';
$id_capitol="";
$id_canon_conex="";
$nr_canon="";
$canoane_cu_link = "";
$id_uri_canoane_conex = "";

// Preiau din text toate paragrafele cu Conexiuni:()

$conexiuni_cu_link = [];
$conexiuni_simple = [];

preg_match_all($regex, $text, $rezultate_conexiuni, PREG_SET_ORDER, 0);

// iau fiecare paragraf unic cu Conexiuni: ()

    foreach ($rezultate_conexiuni as $a => $b) {

        $conexiune = $rezultate_conexiuni[$a]['0'];
        $conexiune_simpla = str_replace('Conexiuni:', '', $conexiune); // scot "Conexiuni:"
        $conexiune_simpla = str_replace('(', '', $conexiune_simpla); // scot (
        $conexiune_simpla = str_replace(')', '', $conexiune_simpla); // scot )
        $conexiune_simpla = ltrim($conexiune_simpla);
  
 
         // identific (împart) fiecare set de canoane pe capitole
        $canoane_sinod = explode(';',$conexiune_simpla); 

        // var_dump ($canoane_sinod);


      
        // iau fiecare capitol (canoane pe sinod) în parte 
  
      foreach ($canoane_sinod as $c => $d) {

        $capitol = $canoane_sinod[$c];
 
        preg_match_all($regex_nr, $capitol, $rezultate_capitol, PREG_SET_ORDER, 0); 
        $capitol = preg_replace($regex_nr, "", $capitol);
        $capitol = preg_replace("#,#", "", $capitol);
        $capitol = trim($capitol);
 
        $capitol_p = "%$capitol%";
        $sql_capitol = "SELECT * FROM `titluri_capitole` WHERE `prescurtare` LIKE ?";
        $stmt = $conn->prepare($sql_capitol);
        $stmt->bind_param('s', $capitol_p);
        $rez_capitol = $stmt->execute();
        $rez_capitol = $stmt->get_result();


        while ($data3 = mysqli_fetch_assoc($rez_capitol)){   
         $id_capitol = $data3['id'];
        }

        // iau id-ul capitolului și aflu id_început
    
        $sql_id_inceput= "SELECT `prescurtare`,`id_inceput` FROM `titluri_capitole` WHERE `id`=?";
        $stmt = $conn->prepare($sql_id_inceput);
        $stmt->bind_param('i', $id_capitol);
        $rez_id_inceput = $stmt->execute();
        $rez_id_inceput = $stmt->get_result();

        while ($data = mysqli_fetch_assoc($rez_id_inceput)){   
            $id_inceput= $data['id_inceput']; 
            $prescurtare = $data['prescurtare']; 
        }

          // var_dump ($id_inceput);  

        $regex_nr = '/\d+/m';

        if (preg_match_all($regex_nr, $d, $rezultate_numere, PREG_SET_ORDER, 0)) {

          // var_dump($rezultate_numere);

                 // aflu id-ul canonului
         
            foreach ($rezultate_numere as $c => $d) {
                  $nr_canon = $rezultate_numere[$c]['0'];
                  $id_canon_conex= $nr_canon + $id_inceput - 1;

                 // iau din baza de date slug-ul id-ului        
              
                $sql_id="SELECT * FROM `canoane` WHERE `id`=?";
                $stmt = $conn->prepare($sql_id);
                $stmt->bind_param('i', $id_canon_conex);
                $rezultate2 = $stmt->execute();
                $rezultate2 = $stmt->get_result();
                
                  while ($data2 = mysqli_fetch_assoc($rezultate2)){    
                    $titlu_canon = $data2['DenumireExplicativa'];
                  }  

                  // pun linkul la canon

                  $url_canon = creare_url_din_titlu_cu_id ($titlu_canon, $id_canon_conex);
                  $canon_cu_link = '<a href="'. $url_canon .'">' . $nr_canon . ' ' .$capitol . "</a>" . " | " ;

                  // concatenez toate linkurile într-un string
                  $canoane_cu_link .= $canon_cu_link ; 

                  $id_uri_canoane_conex .= $id_canon_conex . "-";
             }
        }
      
      }    
      
      $canoane_cu_link = substr_replace($canoane_cu_link ,"",-2); // scot ultimele 2 caractere (spațiu și |)
    
      
      array_push ($conexiuni_cu_link,$canoane_cu_link);
      $conexiune_simpla = adauga_slash ($conexiune_simpla);
      
      array_push ($conexiuni_simple, $conexiune_simpla);
  
    }

    $id_uri_canoane_conex = substr_replace($id_uri_canoane_conex,"",-1);
    $text = str_replace("(","", $text); // scot (
    $text = str_replace(")","", $text); // scot )

    $links = preg_replace($conexiuni_simple, $conexiuni_cu_link, $text);
    error_reporting(E_ALL);




?>
 
 