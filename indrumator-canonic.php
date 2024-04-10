<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>

<?php 

if (isset ($_GET['litera'])) {
    $litera_link = $_GET['litera'];
} else {$litera_link = '';}

$extra_linkuri = "";

    include "db.php";
    include "functii.php";

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <title>Îndrumător Canonic | <?php echo $litera_link;?></title>
    <?php include "header.php";?>
    
    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala">



<h2 class="titlu">ÎNDRUMĂTOR CANONIC</h2>

<p>Pentru rezultate complete în cercetarea canoanelor vă recomandăm să folosiți acest indice canonic împreună cu funcția de <a href="http://localhost/canoane/cautare.php">căutare</a> și cu <a href="http://localhost/canoane/repertoriu-canonic.php">repertoriul canonic</a>.</p>
            
        <?php

        $sql_indici= "SELECT DISTINCT `litera` FROM `indrumator_canonic` ORDER BY `litera` ASC";
        $stmt = $conn->prepare($sql_indici);
        $rez_indici = $stmt->execute();
        $rez_indici = $stmt->get_result();
            
        // afisez literele alfabetului cu linkuri

        echo '<p class="alfabet ml-1 mb-5">';
        while ($data = mysqli_fetch_assoc($rez_indici)){    
            
            
            $litera = $data['litera'];
            if ($litera !== $litera_link){
                $alfabet =  '<a class="p-2" href="indrumator-canonic.php?litera=' . $litera . '">' . $litera . '</a>  ';
                echo $alfabet;
            } else {
                $alfabet =  '<span class="p-2">' . $litera . '  </span>';
                echo $alfabet;
            }
                
 
        }
        echo "</p>";    

        // afisez cuvintele cheie si continutul

        $sql_litera= "SELECT * FROM `indrumator_canonic` WHERE `litera` = '$litera_link' ORDER BY cuvant_cheie"; 
        $rez_litera = mysqli_query($conn, $sql_litera);
 
        echo '<ul class="list-group">';
        while ($data2 = mysqli_fetch_assoc($rez_litera)){   
       
            $id_cuvant = $data2['id'];
            $cuvant_cheie = $data2['cuvant_cheie'];
            $continut = $data2['continut'];

            // Transform conexiunile în linkuri

            $re = '/\d+.*$/m';
            
            preg_match_all($re, $continut, $matches, PREG_SET_ORDER, 0);

            // Print the entire match result
            // echo "<pre>";
            // var_dump($matches);
            // echo "</pre>";


            // iau conexiunile simple din array-ul dat de regex

                $adunare_conex_cu_link = [];
                $adunare_idconex = [];
                $adunare_conex_fara_link = [];

                foreach ($matches as $x => $y) {
                
                transformers ($y['0']);
                
                array_push ($adunare_conex_fara_link, $y['0']);

                $conexiuni_cu_link .= 
                 '<form class="detalii" action="indrumator-canonic-conexiuni.php?tema=' . creare_url_din_titlu(strtolower($cuvant_cheie)) . '" method="POST">' .
                    '<input type="hidden" name="tema" value="' . $cuvant_cheie . '">' .
                    '<input type="hidden" name="conex" value="' . $id_uri_canoane_conex . '">' .
                    '<button class="btn_indrumator">detalii</button>' .
                '</form>';
        


                // afișez continutul tabului
                

                // var_dump($id_uri_canoane_conex);

                array_push ($adunare_conex_cu_link, $conexiuni_cu_link);
                array_push ($adunare_idconex,  $id_uri_canoane_conex);

                }
                $continut = str_replace ($adunare_conex_fara_link, $adunare_conex_cu_link, $continut);


            // final transformare

            $id_indice = explode (' ', replaceSpecialChars($cuvant_cheie) );
            
            echo '<li id="' . strtolower($id_indice[0]) . '" class="list-group-item"><strong>' . $cuvant_cheie . '</strong> '.
            ' <a href="http://localhost/canoane/admin/edit-indrumator.php/?id=' . $id_cuvant . '" style="color:red;">[edit]</a>' . "<br>";
 
            echo '<div class="indrumator">' . $continut . '</div>';
            




            // golesc stringurile 
        
            $extra_linkuri = '';
            $prima_litera = '';
            echo "</li>";
            
        }    
        
        echo "</ul>";
include "footer.php";

?>
<script>
$(document).ready(function() {
        $(".flip").click(function() {
            $(".panel").slideToggle("slow");
        });
    });

</script>