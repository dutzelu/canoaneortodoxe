<?php include "../header.php";
        $id = $_GET['id'];
 ?>
 
            <?php
 
              //  Afișare categorii

                        $sql_cap="SELECT * FROM `capitole_repertoriu_canonic` WHERE `id`= $id";
                        $rezultate=mysqli_query($conn, $sql_cap);
                       
                        while ($data = mysqli_fetch_assoc($rezultate)){    
                            $nr_cap = $data['nume'];
                            $continut_cap = $data['continut'];
                            $conexiuni_cap = $data['conexiuni'];
                            $nr_titlu = $data['nr_titlu'];
                            $anexe = $data ['anexe'];
                        }

                    ?>
                        <h1 class="titlu">Titlu nr. <?php  echo  $nr_titlu;?> </h1>
                            <!-- formular de editare a canonului -->

                            <form action="http://localhost/canoane/admin/update-repertoriu.php?id=<?php echo $id;?>" method="POST">
                                
                                
                                <p><span>Cap. <?php  echo  $nr_cap;?>:</span></p>    

                                <p><span class="input-group-text">Continut:</span>
                                <p><textarea class="form-control" type="text" name="continut" style="width:100%;min-height:100px"><?php echo  $continut_cap;?></textarea></p>
            
                                <p><span class="input-group-text">Conexiuni:</span>
                                <p><textarea class="form-control mceNoEditor" type="text" name="conexiuni" style="width:100%;min-height:300px"><?php echo  $conexiuni_cap;?></textarea></p>

                                <p><span class="input-group-text">Anexe:</span>
                                <input class="form-control" type="text" name="anexe" style="width:100%;" value="<?php  echo  $anexe;?>"></p>    
                   
                                <button class="btn btn-primary" type="submit" name="submit">Modifica</button>
            
                            </form>
                                 
<script>
    tinymce.init({
        
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      editor_deselector : "mceNoEditor"
      toolbar_mode: 'floating',
      
    });
</script>

<?php include "../footer.php"; ?>