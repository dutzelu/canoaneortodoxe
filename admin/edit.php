<?php include "../header.php";

 

    if (isset($_GET['id'])) {
        $b = $_GET['id'];
    } else {$b="";}

 
 ?>
 

            <h1 class="titlu">ADMINISTRARE</h1>
            
            <?php
 
              //  Afișare categorii

                if (isset($_GET['nume'])) {

                        $sql_ap="SELECT * FROM `canoane` WHERE `nume` LIKE '%$prescurtare%' ORDER BY `id`";
                        $rezultate=mysqli_query($conn, $sql_ap);
                       
                        while ($data = mysqli_fetch_assoc($rezultate)){    
                           
                            $id_canon = $data['id'];
                            $url_articol = creare_url_din_titlu ($data['DenumireExplicativa']);

                            echo 
                            '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                            .'<a href="http://localhost/canoane/admin/edit.php/'. $url_articol . '?id=' . $id_canon . '">' .$data['DenumireExplicativa'] .'</a></span> </p>'
                            
                            .'<p style="continut">'.$data['Continut'].'</p>';

                            if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Pedeapsa: </span>' .$data['Pedeapsa']."<br>";} 
                        
                            if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Conexiuni: </span>' .$data['Conexiuni']."<br>";}
                
                            if ($data["Comentarii"]==NULL || $data["Comentarii"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Comentarii: </span>' .$data['Comentarii']."<br>";}

                            if ($data["Talcuire"]==NULL || $data["Talcuire"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Talcuire: </span>' .$data['Talcuire']."<br>";}

                            if ($data["Simfonie"]==NULL || $data["Simfonie"]=='-'){echo "";} 
                                else {echo '<span class="rosu">Simfonie: </span>' .$data['Simfonie']."<br>";}
                              
                            echo '<hr class="linie"';
                                 
                        }
                }  
                
                include 'page-edit.php';
              

                
            ?>
            
            
            
            
            

<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
</script>

<?php include "../footer.php"; ?>