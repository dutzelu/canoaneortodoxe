<?php 

$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
 

// var_dump($url);
?>

<div class="menu-principal">

        <div class="logo">

           <a href="http://localhost/canoane/index.php"><img src="http://localhost/canoane/imagini/logo-canoane-ortodoxe.png" alt="Canoanele Bisericii Ortodoxe" ></a>
        </div>

        <div class="lista-meniu">



            <form method="post" autocomplete="off" action="http://localhost/canoane/cautare-generala.php" class="mb-2">
                <div class="row">

                    <div class="col-auto">

                        <div class="input-group">
                            <div class="autocomplete">
                                <input type="text" name="search" class="form-control" placeholder="Caută cuvinte cheie" id="autocomplete"><br>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Caută</button>
                            </div>
                        </div>

                    </div>

                </div>
            </form>

            <?php autocomplete();?>

            <!-- script autocomplete --> 

            <script type="text/javascript" src="http://localhost/canoane/js/autocomplete.js"></script>
            <script type="text/javascript">
                var cuvinteCheie = [<?php echo $lista_cuvinte; ?>];
                autocomplete(document.getElementById("autocomplete"), cuvinteCheie);
                
                // Add an event listener to the form
                document.querySelector('form').addEventListener('keydown', function(e) {
                    // Check if the key pressed is the ENTER key
                    if (e.keyCode === 13) {
                        // Trigger a click event on the submit button
                        document.querySelector('button[type="submit"]').click();
                    }
                });

            </script>
                
            
   
            <p><a href="http://localhost/canoane/">Prima pagină</a> | <a href="http://localhost/canoane/despre-proiect.php">Despre proiect</a> | <a  href="http://localhost/canoane/contact.php">Contact</a> </p>

            <p class="badge bg-secondary">Instrumente de cercetare</p>       
            <ul>
                <a class="dropdown-item <?php echo stripos($url, 'login.php') !== false ? "aici" : "";?>"  href="http://localhost/canoane/login/login.php"><li>Login</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'logout.php') !== false ? "aici" : "";?>"  href="http://localhost/canoane/login/logout.php"><li>Logout</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'cautare.php') !== false ? "aici" : ""; ?>" href="http://localhost/canoane/cautare.php"><li>Căutare în canoane</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'indrumator-canonic.php') !== false ? "aici" : "";?>" href="http://localhost/canoane/indrumator-canonic.php?litera=A"><li>Îndrumător Canonic</li></a>
                <a class="dropdown-item <?php  echo stripos($url, 'indice-canonic.php') !== false ? "aici" : "";?>"  href="http://localhost/canoane/indice-canonic.php?litera=A"><li>Indice Canonic</li></a>
                <a class="dropdown-item <?php  echo stripos($url, 'repertoriu') !== false ? "aici" : ""; ?>"  href="http://localhost/canoane/repertoriu-canonic"><li>Repertoriu Canonic</li></a>
                
                </ul>


            <p class="badge bg-primary">Canoanele Sfinților Apostoli</p>       
            
                    <ul>
                        <a class="dropdown-item <?php echo stripos($url, 'apostolice') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=apostolice"><li>Canoanele Apostolice</li></a>
                    </ul>

            <p class="badge bg-primary">Canoanele Sinoadelor Ecumenice</p>       
                <ul>
                    <a class="dropdown-item <?php echo stripos($url, 'sinodul-1-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-1-ecumenic"><li>Sinodul I Ecumenic de la Niceea (325)</li></a>
                    <a class="dropdown-item <?php echo stripos($url, 'sinodul-2-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-2-ecumenic"><li>Sinodul II Ecumenic de la Constantinopol (381) </li></a>
                    <a class="dropdown-item <?php echo stripos($url, 'sinodul-3-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-3-ecumenic"><li>Sinodul al III-lea Ecumenic de la Efes (431) </li></a>
                    <a class="dropdown-item <?php echo stripos($url, 'sinodul-4-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-4-ecumenic"><li>Sinodul al IV-lea Ecumenic de la Calcedon (451) </li></a>
                    <a class="dropdown-item <?php echo stripos($url, 'sinodul-5-6-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-5-6-ecumenic"><li>Sinodul V-VI Ecumenic de la Constantinopol (691-692), numit și Trulan </li></a>
                    <a class="dropdown-item <?php echo stripos($url, 'sinodul-7-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-7-ecumenic"><li>Sinodul al VII-lea Ecumenic de la Niceea (787) </li></a>
                </ul>

            <p class="badge bg-primary">Canoanele Sinoadelor Locale</p>       
            <ul>
                <a class="dropdown-item <?php echo stripos($url, 'cartaginaciprian') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=cartaginaciprian"><li> Sinodul de la Cartagina (256)</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'ancira') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=ancira"><li> Sinodul de la Ancira</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'neocezareea') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=neocezareea"><li> Sinodul de la Neocezareea</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'gangra') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=gangra"><li> Sinodul de la Gangra</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'antiohia') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=antiohia"><li> Sinodul de la Antiohia</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'laodiceea') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=laodiceea"><li> Sinodul de la Laodiceea</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sardica') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sardica"><li> Sinodul de la Sardica</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'constantinopol-394') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=constantinopol-394"><li> Sinodului de la Constantinopol (394)</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'cartagina-419') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=cartagina-419"><li> Sinodul de la Cartagina (419)</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'constantinopol-861') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=constantinopol-861"><li>Sinodului de la Constantinopol (861)</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sofia') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sofia"><li>Sinodului de la Constantinopol (879)</li></a>
            </ul>

            <p class="badge bg-primary">Canoanele Sfinților Părinți</p>       
            <ul>
                <a class="dropdown-item <?php echo stripos($url, 'fericitul-dionisie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=fericitul-dionisie"><li> Fericitul Dionisie</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-grigorie-neocezareea') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-grigorie-neocezareea"><li> Sf. Grigorie, Arhiepiscopul Neocezareei</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'fericitul-petru') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=fericitul-petru"><li>Fericitul Petru </li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-atanasie-cel-mare') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-atanasie-cel-mare"><li>Sf. Atanasie cel Mare</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-vasile-cel-mare') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-vasile-cel-mare"><li>Sf. Vasile cel Mare</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'timotei-alexandria') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=timotei-alexandria"><li>Timotei al Alexandriei</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-grigorie-teologul') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-grigorie-teologul"><li>Sf. Grigorie Teologul</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-amfilohie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-amfilohie"><li>Sfântul Amfilohie</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-grigorie-nyssa') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-grigorie-nyssa"><li>Sf. Grigorie de Nyssa</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'teofil-alexandria') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=teofil-alexandria"><li>Teofil al Alexandriei</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'sf-chiril-alexandria') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-chiril-alexandria"><li>Sf. Chiril al Alexandriei</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'enciclica-ghenadie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=enciclica-ghenadie"><li>Enciclica (458-459) lui Ghenadie, Patriarhul Constantinopolului (471)</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'enciclica-tarasie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=enciclica-tarasie"><li>ENCICLICA  lui Tarasie, Patriarhul Constantinopolului (806)</li></a>
             
            </ul>   

            <p class="badge bg-primary">Canoanele Întregitoare</p>  

            <ul>
                <a class="dropdown-item <?php echo stripos($url, 'sf-ioan-ajunatorul') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-ioan-ajunatorul"><li>Sf. Ioan Ajunătorul</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'nichifor-marturisitorul') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=nichifor-marturisitorul"><li>Nichifor Marturisitorul</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'nicolae-constantinopol') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=nicolae-constantinopol"><li>Nicolae al Constantinopolului</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'prescriptii-canonice') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=prescriptii-canonice"><li>Prescripții canonice</li></a>
                <a class="dropdown-item <?php echo stripos($url, 'scrisori') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=scrisori"><li>Scrisori</li></a>
            </ul>


                <p class="creat">creat de <a href="https://tulipart.ro">TulipArt.ro</a>® |
                
                <?php
                    if(isset($_SESSION['username'])){ 
                     echo  '<a href="http://localhost/canoane/login/logout.php">Logout </a></p>';
                    } else {echo '<a href="http://localhost/canoane/login/login.php">Login </a></p>';}

                ?>
                
                

        </div>
</div>