
<?php 



include "../db.php";
if(isset($_SESSION['username'])){
    include "../functii.php";
    include "../titluri-pagini.php"; 
$id = $_GET['id'];


?>

<!DOCTYPE html>
<html lang="ro">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlu_pg;?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/canoane/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ywpqronwp4p5zyx3ymuriis579s5rjamd0k04eqknrk9pd4c/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    

    
</head>

<body>
    
<div class="container-fluid">

    <div class="row wrapper">

        <div class="col-lg-4 sidebar-admin">
                    <?php include "../menu-principal.php";?>
        </div>

        <div class="col-lg-8 zona-principala p-5">
       
 
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

<?php include "../footer.php"; 

}?>