<?php


// Functie care inlocuieste diacriticile si alte caractere cu echivalentul ASCII

function replaceSpecialChars($string){

  // caractere care trebuie inlocuite cu cele din $add (in aceeasi ordine)
  $rem = array('ă', 'Ă', 'ş', 'Ş', 'ţ', 'Ţ', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ð', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', '§', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', '€', 'Ð', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', '§', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'Ÿ',
// aceleasi caractere, dar ca entitati HTML
'&agrave;', '&aacute;', '&acirc;', '&atilde;', '&auml;', '&aring;', '&aelig;', '&ccedil;', '&egrave;', '&eacute;', '&ecirc;', '&euml;', '&eth;', '&igrave;', '&iacute;', '&icirc;', '&iuml;', '&ntilde;', '&ograve;', '&oacute;', '&ocirc;', '&otilde;', '&ouml;', '&oslash;', '&sect;', '&ugrave;', '&uacute;', '&ucirc;', '&uuml;', '&yacute;', '&yuml;', '&Agrave;', '&Aacute;', '&Acirc;', '&Atilde;', '&Auml;', '&Aring;', '&AElig;', '&Ccedil;', '&Egrave;', '&Eacute;', '&Ecirc;', '&Euml;', '&euro;', '&ETH;', '&Igrave;', '&Iacute;', '&Icirc;', '&Iuml;', '&Ntilde;', '&Ograve;', '&Oacute;', '&Ocirc;', '&Otilde;', '&Ouml;', '&Oslash;', '&sect;', '&Ugrave;', '&Uacute;', '&Ucirc;', '&Uuml;', '&Yacute;', '&Yuml;');

  // caractere care vor fi adaugate
  $add = array('a', 'A', 's', 'S', 't', 'T', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'ed', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 's', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'EUR', 'ED', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'S', 'U', 'U', 'U', 'U', 'Y', 'Y',
// pentru inlocuit entitatile HTML
'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'ed', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 's', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'EUR', 'ED', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'S', 'U', 'U', 'U', 'U', 'Y', 'Y');

    return str_replace($rem, $add, $string);
}

// Funcție de creare url din titlul articolului

function creare_url_din_titlu ($titlu_articol) {
  $titlu_articol = replaceSpecialChars ($titlu_articol);
  
  $caractere_select = ['.',',','?',';',':'];
  $caractere_elim = ['','','','',''];
  $titlu_articol = str_replace($caractere_select, $caractere_elim, $titlu_articol); 

  // reduc numarul de cuvinte,tai toate cuvintele dupa 100 de caractere

  if (strlen($titlu_articol) > 100  ) 
  {
    $titlu_articol = wordwrap($titlu_articol, 100);
    $titlu_articol = substr($titlu_articol, 0, strpos($titlu_articol, "\n"));
  }


  $titlu_articol = explode (" ",$titlu_articol);
   
  $titlu_articol = implode ("-",$titlu_articol);
  $titlu_articol = str_replace(' ', '', $titlu_articol);
   
  $titlu_articol = strtolower($titlu_articol);

  return $titlu_articol;
}

function creare_url_din_titlu_cu_id ($titlu_articol, $id_canon) {
 
  $titlu_articol = replaceSpecialChars ($titlu_articol);
  
  $caractere_select = ['.',',','?'];
  $caractere_elim = ['','',''];
  $titlu_articol = str_replace($caractere_select, $caractere_elim, $titlu_articol);

  $titlu_articol = explode (" ",$titlu_articol);
   
  $titlu_articol = implode ("-",$titlu_articol);
  $titlu_articol = str_replace(' ', '', $titlu_articol);
   
  $titlu_articol = strtolower($titlu_articol);
  $titlu_articol = 'http://localhost/canoane/page.php/' . $titlu_articol . "?id=" . $id_canon;
  return $titlu_articol;

}

function lista_numere_url ($x, $y, $z) {

      global $conn;
      $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE '%$x%' ORDER BY `id`";
      $rezultate=mysqli_query($conn, $sql_ap);
      $nav_all='';

      while ($data = mysqli_fetch_assoc($rezultate)){    
      
          $id_canon = $data['id'];
          $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);
          $nr_can = rtrim($data['Nume'],$x);

        if ($id_canon!=$y){
          $nav ='<a href="http://localhost/canoane/' . $z . "/" . $url_articol . '?id=' . $id_canon . '">'.$nr_can.'</a>'.', ';
        } else {$nav =$nr_can . ', ';}

        $nav_all.=$nav; 
        
      } 

      $nav_all=substr($nav_all, 0, -2);
      print_r($nav_all);
    }

    function adauga_slash ($a) {
      $a='/'.$a.'/';
      return $a;
}


// funcția AFIȘEAZĂ UN CANON

function afiseaza_canon ($b) {    

    // querry după id pentru canon în baza de date 
    global $conn;
    $sql_id="SELECT * FROM `canoane` WHERE `id`=$b";
    $rezultate2=mysqli_query($conn, $sql_id);

    // interogarea 1 pentru canon

    while ($data = mysqli_fetch_assoc($rezultate2)){    

        // querry după categorie canon, slug și numerele celorlalte canoane
        $sql_cap="
            SELECT titlu, slug, prescurtare, id_inceput, id_sfarsit 
            FROM canoane
            LEFT JOIN titluri_capitole
            ON canoane.id_titlu_capitol = titluri_capitole.id
            WHERE canoane.id=$b";
        
        $sql_cap_rez=mysqli_query($conn, $sql_cap);
        

        // interogarea 2 pentru categorie canon, slug și numere celorlalte canoane

        while ($data2 = mysqli_fetch_assoc($sql_cap_rez)){    

            $nr_canoane = $data2['id_sfarsit'] - $data2['id_inceput'];
            $prescurtare=$data2['prescurtare'];
            $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);
          
            echo '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span>' . ' <a style="color:red; text-align:right" href="http://localhost/canoane/admin/edit.php/?id=' . $b . '">[edit] </a></p>'; 

            echo '<h2 class="titlu_canon"><a href="http://localhost/canoane/page.php/'. $url_articol . '?id=' . $b . '">' .$data['DenumireExplicativa'] .' »</a></span></h2>';

            echo '<span class="bold">Categorie: </span><a href="http://localhost/canoane?nume=' . $data2['slug'] .'">'. $data2['titlu'] .'</a> <br>';

            // afisez continutul canonului, pedeapsa, conexiuni, comentarii si simfonie
        
            echo '<div class="continut">'.$data['Continut'].'</div>';


        }
    }
}

function id_uri_canone_din_conexiuni ($conexiuni) {

    global $conn;

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


          $sql_capitol = "SELECT * FROM `titluri_capitole` WHERE `prescurtare` LIKE '%$capitol%'";
          $rez_capitol = mysqli_query($conn, $sql_capitol);


          while ($data3 = mysqli_fetch_assoc($rez_capitol)){   
            $id_capitol = $data3['id'];
          }

    // iau id-ul capitolului și aflu id_început
    
          $sql_id_inceput= "SELECT `prescurtare`,`id_inceput` FROM `titluri_capitole` WHERE `id`=$id_capitol";
          $rez_id_inceput = mysqli_query($conn, $sql_id_inceput);

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
                  $id_uri_canoane_conex .= $id_canon_conex . "-";
              }
          }

    }    

    $id_uri_canoane_conex = substr_replace($id_uri_canoane_conex,"",-1);
    return $id_uri_canoane_conex;
}



?>