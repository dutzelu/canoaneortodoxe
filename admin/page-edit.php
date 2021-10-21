<?php
//  Afișare articol

if (isset($_GET['id'])) {

   
              
        // querry după id pentru canon în baza de date 

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
                $prescurtare = $data2['prescurtare'];
                
 
                echo '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span>' . ' <a style="color:red; text-align:"right"  href="http://localhost/canoane/page.php?id=' . $b . '">[View] </a></p>' ; 

                echo '<span class="bold">Categorie: </span><a href="http://localhost/canoane?nume=' . $data2['slug'] .'">'. $data2['titlu'] .'</a><br>';

                if ($nr_canoane>1) {
                    echo '<p><span class="bold">Navighează: </span>';
                }

                 // afisez toate numerele de canoane cu url din categoria respectivă

                $url_baza="admin/edit.php"; 
                lista_numere_url ($prescurtare, $b, $url_baza);
    
        ?>

                <!-- formular de editare a canonului -->

                <form action="http://localhost/canoane/admin/update.php?id=<?php echo $b;?>" method="POST">

                    <p><span class="input-group-text">Titlu:</span>
                    <input class="form-control" type="text" name="denumire" style="width:100%;" value="<?php  echo $data['DenumireExplicativa'];?>"></p>    

                    <p><span class="input-group-text">Conținut:</span>
                    <p><textarea class="form-control" type="text" name="continut" style="width:100%;min-height:300px"><?php echo $data['Continut'];?></textarea></p>
                    
                    <p><span class="rosu">Pedeapsa: </span>
                    <input class="form-control" type="text" name="pedeapsa" value="<?php  
                            if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-'){echo "";} 
                            else {echo $data['Pedeapsa'];} 
                            ?>" style="width: 100%;">
                    </p>
                    
                    <p><span class="rosu">Conexiuni: </span>
                    <input class="form-control" type="text" name="conexiuni" value="<?php                 
                            if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-'){echo "";} 
                            else {echo $data['Conexiuni'];}
                            ?>" style="width: 100%">
                    </p>

                    <p><span class="rosu">Comentarii: </span>
                    <input class="form-control" type="text" name="comentarii" value="<?php     
                            if ($data["Comentarii"]==NULL || $data["Comentarii"]=='-'){echo "";} 
                            else {echo $data['Comentarii'];}
                            ?>"style="width: 100%">
                    </p>
                    
                    <p><span class="rosu">Talcuire: </span>
                    <input class="form-control" type="text" name="talcuire" value="<?php   
                            if ($data["Talcuire"]==NULL || $data["Talcuire"]=='-'){echo "";} 
                            else {echo $data['Talcuire'];}
                            ?>"style="width: 100%">
                    </p>
                    
                    <p><span class="rosu">Simfonie: </span>
                    <input class="form-control" type="text" name="simfonie" value="<?php   
                            if ($data["Simfonie"]==NULL || $data["Simfonie"]=='-'){echo "";} 
                            else {echo $data['Simfonie'];}
                            ?>"style="width: 100%">
                    </p>

                    <button class="btn btn-primary" type="submit" name="submit">Modifica</button>

                </form>
            
              
 <?php  

        }
    }
} 



?>