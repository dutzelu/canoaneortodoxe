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
    <title><?php echo $titlu_pg;?></title>
    <?php include "../header.php";?>

    

    
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

                        $sql_cap="SELECT * FROM `capitole_repertoriu_canonic` WHERE `id`= ?";
                        $stmt = $conn->prepare($sql_cap);
                        $stmt->bind_param('i', $id);
                        $rezultate = $stmt->execute();
                        $rezultate = $stmt->get_result();

                       
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

                            <form action="<?php echo BASE_URL;?>admin/update-repertoriu.php?id=<?php echo $id;?>" method="POST">
                                
                                
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