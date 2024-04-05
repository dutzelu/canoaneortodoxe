<?php
 


$cautare = "adulter";
 $regex = '/((?:\S+\s){0,10}\S*)(' . $cautare . ')(\S*(?:\s\S+){0,10})/m';
 
 $continut = 'Dacă împotriva unui credincios se face vreo învinuire de desfrânare sau de adulter sau de o altă oarecare faptă oprită şi s-ar dovedi, acela să nu se înainteze în cler (să nu devină cleric).”. ';
 
 preg_match_all($regex, $continut, $matches, PREG_SET_ORDER, 0);
 
 // Print the entire match result
//  echo "<pre>";
//  var_dump($matches);
//  echo "</pre>";

 foreach ($matches as $x => $y) {
    echo "<pre>";
    var_dump($y[0]);
    echo "</pre>";
 }