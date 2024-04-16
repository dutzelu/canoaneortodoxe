
<?php 

include "../db.php";
if(isset($_SESSION['username'])){
    include "../functii.php";
    include "../titluri-pagini.php"; 

?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlu_pg;?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/canoane/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ywpqronwp4p5zyx3ymuriis579s5rjamd0k04eqknrk9pd4c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    

    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "../menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala">
 
<?php

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

<?php include "../footer.php"; 

}?>