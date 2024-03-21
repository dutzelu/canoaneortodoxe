<?php 

$titlu_pg = "Indice Canonic";
include "header.php";

if (isset ($_GET['litera'])) {
    $litera_link = $_GET['litera'];
} else {$litera_link = '';}

$extra_linkuri = "";

?>

<h2 class="titlu">INDICE CANONIC</h2>

            
        <?php

        $sql_indici= "SELECT DISTINCT `litera` FROM `indice_canonic` ORDER BY `litera` ASC";
        $stmt = $conn->prepare($sql_indici);
        $rez_indici = $stmt->execute();
        $rez_indici = $stmt->get_result();
            
        // afisez literele alfabetului cu linkuri

        echo '<p class="alfabet ml-1">';
        while ($data = mysqli_fetch_assoc($rez_indici)){    
            
            
            $litera = $data['litera'];
            if ($litera !== $litera_link){
                $alfabet =  '<a class="p-2" href="indice-canonic.php?litera=' . $litera . '">' . $litera . '</a>  ';
                echo $alfabet;
            } else {
                $alfabet =  '<span class="p-2">' . $litera . '  </span>';
                echo $alfabet;
            }
                
 
        }
        echo "</p>";    

        // afisez cuvintele cheie si canoanele

        $sql_litera= "SELECT * FROM `indice_canonic` WHERE `litera` = '$litera_link'"; 
        $rez_litera = mysqli_query($conn, $sql_litera);
 
        echo '<ul class="list-group">';
        while ($data2 = mysqli_fetch_assoc($rez_litera)){   
       
            $id_indice_canonic = $data2['id'];
            $cuvant_cheie = $data2['cuvant_cheie'];
            $conexiuni = $data2['conexiuni'];
            $extra = $data2['extra'];

            $text="(" . $data2['conexiuni'] . ")";
            
            $id_indice = explode (' ', replaceSpecialChars($cuvant_cheie) );
            

            echo '<li class="list-group-item" id="' .  lcfirst($id_indice[0]) . '"><strong>' . $cuvant_cheie . ':</strong> '; 

            // inserez linkuri canoanelor
            include "conex-canoane.php";
            // pun id-uri si linkuri la extra-urile cuvintelor cheie
            $extra_singular = explode (',' , $extra);
 

            foreach ($extra_singular as $c) {
                $c = ltrim ($c);              
                $prima_litera = ucfirst(substr(replaceSpecialChars($c),0,1));
                $primul_cuvant_c = explode (' ', trim($c));     
 
                $extra_cu_link = '<a href="http://localhost/canoane/indice-canonic.php?litera=' . $prima_litera . '#' . 
                replaceSpecialChars ($primul_cuvant_c[0]) . ' ' . '">' . $c . "</a>, ";

                $extra_linkuri .= $extra_cu_link;
            }

            // scot virgula
            $extra_linkuri = substr_replace($extra_linkuri ,"",-2);

            if (!empty($extra) && !empty($conexiuni)){
                echo '<p class="mt-2 mb-2">Vezi și: ' . $extra_linkuri . '</p>';} 
            elseif (empty($extra) && !empty($conexiuni)){
                echo '';}
            else {echo 'vezi: ' . $extra_linkuri;}
            
            // buton de conexiuni
            if (!empty($conexiuni)) { 

                echo '<form action="indice-canonic-grup.php/canoane-' . creare_url_din_titlu(strtolower($cuvant_cheie)) . '" method="POST">';
                echo '<input type="hidden" name="id_indice_canonic" value="' . $id_indice_canonic . '">';
                echo '<input type="hidden" name="id_uri_canoane_conex" value="' . $id_uri_canoane_conex . '">';
                echo '<input style="margin-top:14px" class="btn btn-outline-primary btn-sm" type="submit" value="Vezi canoanele">';
                echo '</form>';
            } 

            // golesc stringurile 
        
            $extra_linkuri = '';
            $prima_litera = '';
            echo "</li>";
            
        }    
        
        echo "</ul>";
                
include "footer.php";

?>
