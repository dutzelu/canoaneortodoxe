<?php include "conexiune.php";

    if (isset($_GET['nume'])) {
        $a = $_GET['nume'];
    } else {$a="";}

    if (isset($_GET['id'])) {
        $b = $_GET['id'];
    } else {$b="";}

include "titluri-pagini.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canoane Ortodoxe</title>
    <style>
            .dropdown-item {padding: .25rem 0!important;white-space:normal;}
    </style>
</head>
<body>
    



<div id="wrapper">

<header>
    <h1><a href="/canoane/index.php">CanoaneOrtodoxe.ro</a> | Canoanele Bisericii Ortodoxe</h1>
</header>


    <div class="container">
         <div class="row">

            <div class="col-3">
            
                 <?php include "menu-principal.php";?>

             </div>

            <div class="col">
                <h1 class="titlu"><?php echo $titlu_pg; ?></h1>

            <?php

                            
                if (isset($_GET['nume'])) 
                    {

                          $sql_ap="SELECT * FROM `co_nou` WHERE `nume` LIKE '%$prescurtare%' ORDER BY `id`";
                          $rezultate=mysqli_query($conn, $sql_ap);
                       
                        // $sql_ap = "SELECT * FROM `co_nou` WHERE `nume` LIKE ? ORDER BY 'id'";
                        // $stmt = $conn->prepare($sql_ap); 
                        // $stmt->bind_param("s", $prescurtare);
                        // $stmt->execute();
                        // $result = $stmt->get_result();
                        // while ($data = $result->fetch_array()) {
                        
                        while ($data = mysqli_fetch_assoc($rezultate))
                            {    
                           
                            $id_canon = $data['id'];
                         
                            echo 
                            '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                            .'<a href="?id=' . $id_canon . '">' .$data['DenumireExplicativa'] .'</a></span></p>'
                            
                            .'<p style="continut">'.$data['Continut'].'</p>';

                            if ($data["Pedeapsa"]==NULL || $data["Pedeapsa"]=='-')
                                    {echo "";} 
                                else {echo '<span class="rosu">Pedeapsa: </span>' .$data['Pedeapsa']."<br>";
                                } 
                        
                                if ($data["Conexiuni"]==NULL || $data["Conexiuni"]=='-')
                                {echo "";} 
                                else {echo '<span class="rosu">Conexiuni: </span>' .$data['Conexiuni']."<br>"; 
                                }
                

                            if ($data["Comentarii"]==NULL || $data["Comentarii"]=='-')
                                {echo "";} 
                                else {echo '<span class="rosu">Comentarii: </span>' .$data['Comentarii']."<br>"; 
                                }

                                if ($data["Talcuire"]==NULL || $data["Talcuire"]=='-')
                                {echo "";} 
                                else {echo '<span class="rosu">Talcuire: </span>' .$data['Talcuire']."<br>";  
                                }

                                
                                if ($data["Simfonie"]==NULL || $data["Simfonie"]=='-')
                                {echo "";} 
                                else {echo '<span class="rosu">Simfonie: </span>' .$data['Simfonie']."<br>";
                                }
                              
                                echo '<hr class="linie"';
                                 
                        }
                    }

                
                    if (isset($_GET['id'])) 
                        {
  
                                $sql_id="SELECT * FROM `co_nou` WHERE `id`=$b";
                                $rezultate2=mysqli_query($conn, $sql_id);

                                while ($data = mysqli_fetch_assoc($rezultate2))
                                    {  
                                       
                                        echo 
                                        '<p><span class="badge badge-secondary">'.$data['Nume'] .' </span><span class="denumire">' 
                                        .$data['DenumireExplicativa'] .'</span></p>'
                                        . '<p style="continut">'.$data['Continut'].'</p>';

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

                                    }
                                  
                        }  

            ?>
            
            
            
            
            
            </div>
        </div>
    </div>
</div>

</body>
</html>