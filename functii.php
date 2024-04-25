<?php

// Functie care inlocuieste diacriticile si alte caractere cu echivalentul ASCII

function replaceSpecialChars ($string){

  $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
  'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
  'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
  'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
  'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ă'=>'a', 'Ă'=>'A', 'ș'=>'s', 'Ș'=>'S', 'ț'=>'t', 'Ț'=>'T', 'Ţ'=>'T', 'Ş'=>'S', 'ţ'=>'t', 'ş'=>'s' );
   
  return strtr( $string, $unwanted_array );

}

// Functie care transforma conexiunile simple în conexiuni cu link (pentru îndrumator deocamdata)

function transformers ($conexiune_simpla) {

      global $conn, $conexiuni_cu_link,  $id_uri_canoane_conex;
      $conexiuni_cu_link = [];
      $conexiuni_simple = [];

      $regex_nr = '/\d+/m';

      // identific (împart) fiecare set de canoane pe capitole
      $canoane_sinod = explode(';',$conexiune_simpla); 

      // echo "<pre>";
      // var_dump ($canoane_sinod);
      // echo "</pre>";

      $id_capitol="";
      $id_canon_conex="";
      $nr_canon="";
      $canoane_cu_link = "";
      $id_uri_canoane_conex = "";

      // iau fiecare capitol (canoane pe sinod) în parte 

    foreach ($canoane_sinod as $c => $d) {

            $capitol = $canoane_sinod[$c];

            preg_match_all($regex_nr, $capitol, $rezultate_capitol, PREG_SET_ORDER, 0); 
            $capitol = preg_replace($regex_nr, "", $capitol);
            $capitol = preg_replace("#,#", "", $capitol);
            $capitol = trim($capitol);
            $capitol = rtrim($capitol,'.'); // scot punctele de la sfârșit
            $capitol = ltrim($capitol,''); // scot spațiile de la început
            $capitol = rtrim($capitol,'');// scot spațiile de la sfârșit

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

            if (preg_match_all($regex_nr, $d, $rezultate_numere, PREG_SET_ORDER, 0)) {

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
                    $url_canon = $data2['adresa_url'];
                  }  

                  // pun linkul la canon

                  $canon_cu_link = '<a href="'. $url_canon .'">' . $nr_canon . ' ' .$capitol . "</a>" . " | " ;

                  // concatenez toate linkurile într-un string
                  $canoane_cu_link .= $canon_cu_link ; 

                  $id_uri_canoane_conex .= $id_canon_conex . "-";
            }
            }

    }    


    array_push ($conexiuni_cu_link,$canoane_cu_link);
    $conexiune_simpla = adauga_slash ($conexiune_simpla);

    array_push ($conexiuni_simple, $conexiune_simpla);

    $id_uri_canoane_conex = substr_replace($id_uri_canoane_conex,"",-1);
    preg_replace($conexiuni_simple, $conexiuni_cu_link, $conexiune_simpla);
    error_reporting(E_ALL);

    $conexiuni_cu_link = substr_replace($conexiuni_cu_link ['0'],"",-2);

}



// Funcție de creare url din titlul articolului

function creare_url_din_titlu ($titlu_articol) {
  $titlu_articol = replaceSpecialChars ($titlu_articol);
  
  $caractere_select = ['.',',','?',';',':'];
  $caractere_elim = ['','','','',''];
  $titlu_articol = str_replace($caractere_select, $caractere_elim, $titlu_articol); 

  // reduc numarul de cuvinte, tai toate cuvintele dupa 100 de caractere

  if (strlen($titlu_articol) > 100  ) 
  {
    $titlu_articol = wordwrap($titlu_articol, 100);
    $titlu_articol = substr($titlu_articol, 0, strpos($titlu_articol, "\n"));
  }


  $titlu_articol = explode (" ",$titlu_articol);
   
  $titlu_articol = implode ("-",$titlu_articol);
  $titlu_articol = str_replace(' ', '', $titlu_articol);
   
  $titlu_articol = strtolower($titlu_articol);

  return trim($titlu_articol);
}



// Navigație în capitolele canoanelor cu link pe numerele canoanelor pe baza unui id de canon

function lista_numere_url ($x, $y, $z) {

      global $conn;
      $x_p = "%$x%";
      $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE ? ORDER BY `id`";

      $stmt = $conn->prepare($sql_ap);
      $stmt->bind_param('s', $x_p);
      $rezultate = $stmt->execute();
      $rezultate = $stmt->get_result();

      $nav_all='';

      echo '<div class="navigheaza">';

      while ($data = mysqli_fetch_assoc($rezultate)){    
      
          $id_canon = $data['id'];
          $url_articol = $data['adresa_url'];
          $nr_can = rtrim($data['Nume'],$x);
          $nr_can = str_replace (' ', '', $nr_can);
          $id_titlu_capitol = $data['id_titlu_capitol'];

        
        if ($id_canon!=$y){
          $nav ='<a href="https://canoaneortodoxe.ro/' . $z . "/" . $url_articol . '">'.$nr_can.'</a>'.', ';
        } else {$nav =$nr_can . ', ';}

        $nav_all.=$nav; 
        
      } 

      echo '<span>Navighează: </span>';

      $nav_all=substr($nav_all, 0, -2);
      print_r($nav_all);
      echo '</div>';
    }

// Navigație în capitolele canoanelor cu link pe numerele canoanelor pe baza slug-ului unei categorii

function numere_url_din_categ ($slug) {

      $nav_all='';
      global $conn, $nav_all, $nr_canoane;
      $sql = 'SELECT canoane.id as id_canon, canoane.Nume, canoane.DenumireExplicativa, canoane.adresa_url, titluri_capitole.prescurtare, titluri_capitole.id_inceput, titluri_capitole.id_sfarsit
      FROM canoane
      LEFT JOIN titluri_capitole
      ON canoane.id_titlu_capitol = titluri_capitole.id 
      WHERE titluri_capitole.slug LIKE ?
      ORDER BY id_canon';

      $stmt = $conn->prepare($sql);
      $stmt->bind_param ('s', $slug);
      $stmt->execute();
      $result = $stmt->get_result();
          
      echo '<div class="navigheaza">';

      
      while ($data = mysqli_fetch_assoc($result)) {   
        
        $url_articol = $data['adresa_url'];
        $nr_can = rtrim($data['Nume'],$data['prescurtare']);
        $nr_can = str_replace (' ', '', $nr_can);
        $id_canon = $data['id_canon'];
        $nr_canoane = $data['id_sfarsit'] - $data['id_inceput'];
        
        $nav ='<a href="https://canoaneortodoxe.ro/unic.php/' . $url_articol . '">'.$nr_can.'</a>'.', ';
        
        $nav_all.=$nav; 
        
      }
      
      if ($nr_canoane>1) {
        echo '<span>Navighează: </span>';
      }
      
        $nav_all=substr($nav_all, 0, -2);
        print_r($nav_all);
        echo '</div>';

}


function adauga_slash ($a) {
      $a='/'.$a.'/';
      return $a;
}


// funcția AFIȘEAZĂ UN CANON

function afiseaza_canon ($id_canon) {    

    // querry după id pentru canon în baza de date 
    global $conn;
    $sql_id="SELECT * FROM `canoane` WHERE `id`=?";

    $stmt = $conn->prepare($sql_id);
    $stmt->bind_param('i', $id_canon);
    $rezultate2 = $stmt->execute();
    $rezultate2 = $stmt->get_result();


    // interogarea 1 pentru canon

    while ($data = mysqli_fetch_assoc($rezultate2)){    

        // querry după categorie canon, slug și numerele celorlalte canoane
        $sql_cap="
            SELECT titlu, slug, prescurtare, id_inceput, id_sfarsit 
            FROM canoane
            LEFT JOIN titluri_capitole
            ON canoane.id_titlu_capitol = titluri_capitole.id
            WHERE canoane.id=?";

        $stmt = $conn->prepare($sql_cap);
        $stmt->bind_param('i', $id_canon);
        $sql_cap_rez = $stmt->execute();
        $sql_cap_rez = $stmt->get_result();
        

        // interogarea 2 pentru categorie canon, slug și numere celorlalte canoane

        while ($data2 = mysqli_fetch_assoc($sql_cap_rez)){    

            $nr_canoane = $data2['id_sfarsit'] - $data2['id_inceput'];
            $prescurtare=$data2['prescurtare'];
            $url_articol = $data['adresa_url'];
          
            echo '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span> ';

            if(isset($_SESSION['username'])){
              echo '<a style="color:red; text-align:right" href="https://canoaneortodoxe.ro/admin/edit.php/?id=' . $id_canon . '">[edit] </a></p>'; 
            } else {
              echo "</p>";
            }
            
            echo '<h2 class="titlu_canon"><a href="https://canoaneortodoxe.ro/unic.php/'. $url_articol . '">' .$data['DenumireExplicativa'] .' »</a>
            </h2>';

            echo '<span class="bold">Categorie: </span><a href="https://canoaneortodoxe.ro/categorie.php?nume=' . $data2['slug'] .'">'. $data2['titlu'] .'</a> <br>';

            // afisez continutul canonului, pedeapsa, conexiuni, comentarii si simfonie
        
            echo '<div class="continut">'.$data['Continut'].'</div>';


        }
    }
}

function id_uri_canoane_din_conexiuni ($conexiuni) {

    global $conn, $id_uri_canoane_conex;

    // identific (împart) fiecare set de canoane pe capitole
    $canoane_sinod = explode(';',$conexiuni); 

    $regex_nr = '/\d+/m';
    $id_capitol="";
    $id_canon_conex="";
    $nr_canon="";
    $canoane_cu_link = "";
    $id_uri_canoane_conex = "";

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
            var_dump($id_capitol);
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

          $regex_nr = '/\d+/m';

        if (preg_match_all($regex_nr, $d, $rezultate_numere, PREG_SET_ORDER, 0)) {

                  // aflu id-ul canonului
          
            foreach ($rezultate_numere as $c => $d) {
                  $nr_canon = $rezultate_numere[$c]['0'];
                  $id_canon_conex= $nr_canon + $id_inceput - 1;
                  $id_uri_canoane_conex .= $id_canon_conex . "-";
              }
          }

    }    

    $id_uri_canoane_conex = substr_replace($id_uri_canoane_conex,"",-1);
    return $id_uri_canoane_conex;
}

// Funcție care redă paragraful în care este găsit cuvântul / cuvintele căutate

function ellipse($cuvant_cautat, $text_sursa, $nr_cuvinte){
    $show = $nr_cuvinte-1;
    $text_sursa = str_replace('­', '', $text_sursa);
    $text_sursa = str_replace('<p>', '', $text_sursa);
    $text_sursa = str_replace('</p>', '', $text_sursa);
    $cuvant_cautat=preg_quote(trim($cuvant_cautat),'/');  // prepare needle for regex
    if(preg_match('/(.*?\S+)??\s*((?:\S+\s*?){0,'.$show.'})?\s*(\S*'.$cuvant_cautat.'\S*)\s*((?:\s*\S+){0,'.$show.'})\s*(\S+)?/i',$text_sursa,$m)){
        unset($m[0]);  // omit unwanted fullstring match
        $m=array_filter($m,'strlen');  // remove empty elements to avoid back-to-back glue in return value
        if(isset($m[1])) $m[1]='...';  // apply ellipsis to 1st leading word
        if(isset($m[5])) $m[5]='...';  // apply ellipsis to last trailing word
        return implode(' ',$m);  // use single space as glue
    }
    
}


// funcție de realizare a liste de cuvinte cheie pentru autocomplete-ul search-ului

function autocomplete () {

  global $conn, $lista_cuvinte;
  $lista_cuvinte = NULL;
  $sql = 'Select cuvant_cheie From indice_canonic UNION Select cuvant_cheie From indrumator_canonic;';
  $rezultate = mysqli_query($conn, $sql);
  
  while ($data = mysqli_fetch_assoc($rezultate)) {
    $lista_cuvinte .= '"' . trim(mb_strtolower($data['cuvant_cheie'])) . '",';
  }
}


?>