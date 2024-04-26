
<?php 

$id = $_GET['id'];
include "../db.php";
include "../functii.php";
include "../titluri-pagini.php"; 

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

                        $sql_cap="SELECT * FROM `indrumator_canonic` WHERE `id`= ?";

                        $stmt = $conn->prepare($sql_cap);
                        $stmt->bind_param('i', $id);
                        $rezultate = $stmt->execute();
                        $rezultate = $stmt->get_result();

                        while ($data = mysqli_fetch_assoc($rezultate)){    
                            $id = $data['id'];
                            $cuvant_cheie = $data['cuvant_cheie'];
                            $continut = $data['continut'];
                            $litera = $data['litera'];
                        }

                    ?>
                        <h3 class="titlu"><?php echo $cuvant_cheie;?> [edit]
                        <a style="color:red; text-align:"right"  href="<?php echo BASE_URL;?>indrumator-canonic.php?litera=<?php echo $litera;?>">[View] </a></h3>
                            <!-- formular de editare a canonului -->

                            <form action="<?php echo BASE_URL;?>admin/update-indrumator.php?id=<?php echo $id;?>" method="POST">
                                
                                <p><span class="input-group-text">Cuvânt cheie:</span>
                                <input class="form-control" type="text" name="cuvant_cheie" value="<?php echo $cuvant_cheie;?>" style="width: 100%;"></p>
                                
                                <p><span class="input-group-text">Continut:</span>
                                <p><textarea class="form-control" type="text" name="continut" style="width:100%;min-height:300px"><?php echo htmlentities($continut);?></textarea></p>

                                <button class="btn btn-primary" type="submit" name="submit">Modifica</button>
            
                            </form>
                                 
                            

    
<?php include "../footer.php"; ?>