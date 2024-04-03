<?php
include "db.php";
$re = '/((?m)^CANONUL \d\s.*\))|(\w.*)|((?m)^\(.*\))/m';
$str = '
CANONUL 1 Nicolae Const. (CĂLUGĂRII POT INTRA ÎN ALTAR)

Întrebare: Cuvine-se monahului a intra în sfântul altar, căci aceasta se opreşte de canonul 33 al sfântului sinod Trulan, care nu îngăduie celui ce nu este pecetluit întru citeţ sau monahului a cânta sau citi pe amvon; ase­menea şi canonul 15 de Ia Laodiceea şi al 14-lea al sinodului al doilea de la Niceea? Răspuns: Este oprit ca monahul fără de hirotesie să îndeplinească de pe amvon ca citeţul slujbele citeţului; dar socotesc că pentru cinstea cuve­nită schimei monahale nu trebuie să se oprească monahul care nu s-a fă­cut vinovat de nici o infracţiune de a intra în altar pentru ca să aprindă lumânări şi candele.

(33, 69 Trul.; 14 sin. VII ec; 15, 19, 21, 44 Laod.)

CANONUL 2 Nicolae Const. (ÎNGENUNCHEREA NU ESTE OPRITĂ ÎN ZILE HOTĂRÂTE)

Întrebare: Se cuvine a nu pleca genunchii sâmbăta, precum nici dumi­nica, nici în Cincizecime? Răspuns: De canon nu s-a oprit; mulţi însă nu pleacă genunchii din cauză că sâmbăta nici nu ajunează.

(66 ap.; 20 sin. I ec; 55, 66, 90 Trul.; 18 Gangr.; 29 Laod.; 15 Petru Alex.; 91 Vasile cel Mare; 1 Teofil Alex.)

CANONUL 3 Nicolae Const. (POSTUL SÂNTEIMĂRI1)

Întrebare: Trebuie să ţinem postul lunii lui august? Răspuns: Mai înainte postul a fost în acest timp, dar apoi s-a strămutat pentru ca să nu cadă laolaltă cu posturile altor popoare, care se ţin de acest timp. De altfel, mulţi oameni ţin şi acum postul acesta.

()

'
;

preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

      //var_dump($matches);
    
    for ($i=0; $i <11 ; $i++) { 
        
        $id=$i+1016;
        $Nume=($i+1).' Nicolae (1086-1011)';
        $Denumire= $matches[3*$i]['0'];  
            $descos='CANONUL '. ($i+1). ' Nicolae Const.';
            $Denumire=str_replace($descos,"",$Denumire); // scot denumirea Canonul...
            $paranteze=["(",")"];
            $Denumire=str_replace($paranteze,"",$Denumire); // scot parantezele
            $Denumire=ltrim($Denumire); // scot spatiile libere de la inceput
        $Continut = $matches[3*$i+1]['0'];
            $Continut=ltrim($Continut); 
        $Conexiuni= $matches[3*$i+2]['0'];
            $Conexiuni=ltrim($Conexiuni);

 

       
        $sql="INSERT INTO co_nou (id, Nume, DenumireExplicativa, Continut, Conexiuni)
        VALUES ($id,'$Nume','$Denumire','$Continut','$Conexiuni');";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully"."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // $sql="INSERT INTO co_nou (id, Nume, DenumireExplicativa, Continut, Conexiuni)
        // VALUES ($id,'$Nume','$Denumire','$Continut','$Conexiuni');"."<br><br>";

        // echo $sql;



    }
     


?>