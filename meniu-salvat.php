<?php  
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
?>

<div class="row">

    <div class="col-12">
       <div class="mt-4  d-none d-md-none d-lg-block d-sm-block d-sm-none d-md-block logo">
           <a href="http://localhost/canoane/index.php"><img src="http://localhost/canoane/imagini/logo-canoane-ortodoxe.png" alt="Canoanele Bisericii Ortodoxe" ></a>
        </div>
    </div>



    <div class="col-12">

    <nav class="navbar navbar-dark" >

            <a class="navbar-brand p-2  d-xxl-none d-xxl-block d-xl-none d-lg-none d-xl-block" href="admin.php"><img src="http://localhost/canoane/imagini/logo-canoane-ortodoxe-mobil.png"></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-outline-primary"></span>
            </button>


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
                    
                <div class=" navbar-collapse" id="navbarSupportedContent">
    
                <p><a href="http://localhost/canoane/">Prima pagină</a> | <a href="http://localhost/canoane/despre-proiect.php">Despre proiect</a> | <a  href="http://localhost/canoane/contact.php">Contact</a> </p>

                <!-- <p class="badge bg-secondary">Instrumente de cercetare</p>      -->
                
                <ul class="navbar-nav admin p-4">

                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'cautare.php') !== false ? "aici" : ""; ?>" href="http://localhost/canoane/cautare.php">Căutare în canoane</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'indrumator-canonic.php') !== false ? "aici" : "";?>" href="http://localhost/canoane/indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php  echo stripos($url, 'indice-canonic.php') !== false ? "aici" : "";?>"  href="http://localhost/canoane/indice-canonic.php?litera=A">Indice Canonic</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php  echo stripos($url, 'repertoriu') !== false ? "aici" : ""; ?>"  href="http://localhost/canoane/repertoriu-canonic">Repertoriu Canonic</a></li>


                <!-- <div class="badge bg-primary">Canoanele Sfinților Apostoli</div>        -->
                
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'apostolice') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=apostolice">Canoanele Apostolice</a></li>

                <!-- <p class="badge bg-primary">Canoanele Sinoadelor Ecumenice</p>        -->

                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sinodul-1-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-1-ecumenic">Sinodul I Ecumenic de la Niceea (325)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sinodul-2-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-2-ecumenic">Sinodul II Ecumenic de la Constantinopol (381)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sinodul-3-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-3-ecumenic">Sinodul al III-lea Ecumenic de la Efes (431)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sinodul-4-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-4-ecumenic">Sinodul al IV-lea Ecumenic de la Calcedon (451)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sinodul-5-6-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-5-6-ecumenic">Sinodul V-VI Ecumenic de la Constantinopol (691-692), numit și Trulan</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sinodul-7-ecumenic') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sinodul-7-ecumenic">Sinodul al VII-lea Ecumenic de la Niceea (787)</a></li>

                <!-- <p class="badge bg-primary">Canoanele Sinoadelor Locale</p>    -->

                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'cartaginaciprian') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=cartaginaciprian"> Sinodul de la Cartagina (256)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'ancira') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=ancira"> Sinodul de la Ancira</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'neocezareea') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=neocezareea"> Sinodul de la Neocezareea</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'gangra') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=gangra"> Sinodul de la Gangra</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'antiohia') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=antiohia">Sinodul de la Antiohia</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'laodiceea') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=laodiceea">Sinodul de la Laodiceea</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sardica') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sardica">Sinodul de la Sardica</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'constantinopol-394') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=constantinopol-394">Sinodului de la Constantinopol (394)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'cartagina-419') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=cartagina-419">Sinodul de la Cartagina (419)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'constantinopol-861') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=constantinopol-861">Sinodului de la Constantinopol (861)</a></li>
                     <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sofia') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sofia">Sinodului de la Constantinopol (879)</a></li>

                <!-- <p class="badge bg-primary">Canoanele Sfinților Părinți</p>        -->

                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'fericitul-dionisie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=fericitul-dionisie">Fericitul Dionisie</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-grigorie-neocezareea') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-grigorie-neocezareea">Sf. Grigorie, Arhiepiscopul Neocezareei</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'fericitul-petru') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=fericitul-petru">Fericitul Petru </a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-atanasie-cel-mare') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-atanasie-cel-mare">Sf. Atanasie cel Mare</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-vasile-cel-mare') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-vasile-cel-mare">Sf. Vasile cel Mare</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'timotei-alexandria') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=timotei-alexandria">Timotei al Alexandriei</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-grigorie-teologul') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-grigorie-teologul">Sf. Grigorie Teologul</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-amfilohie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-amfilohie">Sfântul Amfilohie</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-grigorie-nyssa') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-grigorie-nyssa">Sf. Grigorie de Nyssa</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'teofil-alexandria') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=teofil-alexandria">Teofil al Alexandriei</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-chiril-alexandria') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-chiril-alexandria">Sf. Chiril al Alexandriei</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'enciclica-ghenadie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=enciclica-ghenadie">Enciclica (458-459) lui Ghenadie, Patriarhul Constantinopolului (471)</a></li>
                 <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'enciclica-tarasie') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=enciclica-tarasie">ENCICLICA  lui Tarasie, Patriarhul Constantinopolului (806)</a></li>
                

                <!-- <p class="badge bg-primary">Canoanele Întregitoare</p>   -->

                    <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'sf-ioan-ajunatorul') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=sf-ioan-ajunatorul">Sf. Ioan Ajunătorul</a></li>
                    <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'nichifor-marturisitorul') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=nichifor-marturisitorul">Nichifor Marturisitorul</a></li>
                    <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'nicolae-constantinopol') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=nicolae-constantinopol">Nicolae al Constantinopolului</a></li>
                    <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'prescriptii-canonice') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=prescriptii-canonice">Prescripții canonice</a></li>
                    <li class="nav-item "><a class="dropdown-item <?php echo stripos($url, 'scrisori') !== false ? "aici" : "";?>"  href="http://localhost/canoane/categorie.php?nume=scrisori">Scrisori</a></li>

                </ul>


    
        

        </div>
     </nav>
     <p class="creat">creat de <a href="https://tulipart.ro">TulipArt.ro</a>® |
                    
                    <?php
                        if(isset($_SESSION['username'])){ 
                        echo  '<a href="http://localhost/canoane/login/logout.php">Logout </a></p>';
                        } else {echo '<a href="http://localhost/canoane/login/login.php">Login </a></p>';}

                    ?>
                    
    </div>
</div>