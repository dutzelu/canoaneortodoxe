 <?php

include "db.php";
include "functii.php";


$lista_canoane=[];
$lista_indici=[];
$lista_repertoriu=[];
$lista_indrumator=[];

// adaugare in lista_url a canoanelor

        $sql= "SELECT * FROM canoane"; 

        $stmt = $conn->prepare($sql);
        $rez = $stmt->execute();
        $rez = $stmt->get_result();

        while ($data = mysqli_fetch_assoc($rez)) {

            $adresa = 'https://canoaneortodoxe.ro/unic.php/'.$data['adresa_url'];
            array_push ($lista_canoane, $adresa);
        }

// adaugare in lista_url a indicilor canonici

        $sql= "SELECT * FROM indice_canonic"; 

        $stmt = $conn->prepare($sql);
        $rez_indici = $stmt->execute();
        $rez_indici = $stmt->get_result();

        while ($data2 = mysqli_fetch_assoc($rez_indici)) {

            if ($data2['conexiuni'] !== '') {
                $adresa = 'https://canoaneortodoxe.ro/indice-canonic-conexiuni.php/'.$data2['adresa_url'];
                array_push ($lista_indici, $adresa);
            }
        }

// adaugare in lista_url a repertoriului canonic

        $sql= "SELECT * FROM capitole_repertoriu_canonic"; 

        $stmt = $conn->prepare($sql);
        $rez_repertoriu = $stmt->execute();
        $rez_repertoriu = $stmt->get_result();

        while ($data3 = mysqli_fetch_assoc($rez_repertoriu)) {

                $adresa = 'https://canoaneortodoxe.ro/repertoriu.php/'.$data3['adresa_url'];
                array_push ($lista_repertoriu, $adresa);
        }



// adaugare in lista_url a indrumătorului canonic

        $sql_litera= "SELECT * FROM `indrumator_canonic`"; 

        $stmt = $conn->prepare($sql_litera);
        $rez_litera = $stmt->execute();
        $rez_litera = $stmt->get_result();


        while ($data2 = mysqli_fetch_assoc($rez_litera)){   

            $id_cuvant = $data2['id'];
            $cuvant_cheie = $data2['cuvant_cheie'];
            $continut = $data2['continut'];

            // Transform conexiunile în linkuri

            $re = '/\d+.*$/m';
            
            preg_match_all($re, $continut, $matches, PREG_SET_ORDER, 0);


            // iau conexiunile simple din array-ul dat de regex

                $adunare_conex_cu_link = [];
                $adunare_idconex = [];
                $adunare_conex_fara_link = [];

                foreach ($matches as $x => $y) {
                
                    transformers ($y['0']);
                    

                    $doarURL= 'https://canoaneortodoxe.ro/indrumator-canonic-conexiuni.php?tema=' .  creare_url_din_titlu(strtolower($cuvant_cheie)) . '&conex=' . $id_uri_canoane_conex;

                        array_push($lista_indrumator, $doarURL);
            }
        }


   $toate_url= array_merge($lista_canoane, $lista_indici, $lista_indrumator, $lista_repertoriu);
    
   array_push($toate_url, 'http://localhost/canoane/despre-proiect.php');
    
   array_push($toate_url, 'http://localhost/canoane/contact.php');

   $urls=$toate_url;
    

//     // Create a new DOMDocument

// $xml = new DOMDocument('1.0', 'UTF-8');
// $xml->formatOutput = true;

// // Create the root <urlset> element

// $urlset = $xml->createElement('urlset');
// $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
// $xml->appendChild($urlset);

 

// foreach ($urls as $url) {
//     // Create <url> element
//     $urlElement = $xml->createElement('url');

//     // Create <loc> element and set URL
//     $loc = $xml->createElement('loc', htmlspecialchars($url));
//     $urlElement->appendChild($loc);

//     // Append <url> to <urlset>
//     $urlset->appendChild($urlElement);
// }

// // Save XML to file
// $xml->save('sitemap.xml');