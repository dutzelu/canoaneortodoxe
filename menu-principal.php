<?php  
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
?>

<header>

<nav class="navbar navbar-expand-lg navbar-light">

<div class="row">
  <div class="col-auto logo">
        <div class="row">
            <div class="col-10 col-lg-12 p-4">
                <a class="navbar-brand" href="<?php echo BASE_URL;?>index.php"><img src="<?php echo BASE_URL;?>imagini/logo-canoane-ortodoxe.png" alt="Canoanele Bisericii Ortodoxe" ></a>
            </div>
            <div class="col-2 d-flex align-self-center justify-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            </div>            
          
        </div>

        <div class="row cauta">
        <form method="post" autocomplete="off" action="<?php echo BASE_URL;?>cautare-generala.php" class="mb-2">
                    <div class="row">

                        <div class="">

                            <div class="input-group">
                                <div class="completeaza">
                                    <input type="text" name="search" class="form-control" placeholder="Caută cuvinte cheie" id="autocomplete" required><br>
                                </div>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                    </svg>
                            </button>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>

                <?php autocomplete();?>

                <!-- script autocomplete --> 

                <script type="text/javascript" src="<?php echo BASE_URL;?>js/autocomplete.js"></script>
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

                    function cuvantCautat () {
                    var x = document.getElementById("search").value;
                    document.getElementById("cautareGenerala").action = "<?php echo BASE_URL;?>cautare-generala.php?cauta=" + x;
                    document.getElementById("cautareGenerala").submit();
                    }

                </script>
        </div>
  </div>

    <div class="col-auto meniuPrincipal">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">

                <p><span class="badge bg-secondary">Instrumente de cercetare</span></p>  

                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL;?>">Prima pagină</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'indrumator-canonic.php') !== false ? "active" : "";?>" href="<?php echo BASE_URL;?>indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
                <li class="nav-item "><a class="nav-link <?php  echo stripos($url, 'indice-canonic.php') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>indice-canonic.php?litera=A">Indice Canonic</a></li>
                <li class="nav-item "><a class="nav-link <?php  echo stripos($url, 'repertoriu') !== false ? "active" : ""; ?>"  href="<?php echo BASE_URL;?>repertoriu-canonic">Repertoriu Canonic</a></li>
                <li class="nav-item"><a class="nav-link <?php echo stripos($url, 'despre-proiect.php') !== false ? "active" : ""; ?>" href="<?php echo BASE_URL;?>despre-proiect.php">Despre proiect</a></li>
                <li class="nav-item"><a class="nav-link <?php echo stripos($url, 'contact.php') !== false ? "active" : ""; ?>" href="<?php echo BASE_URL;?>contact.php">Contact</a></li>

                <p><span class="badge bg-primary">Canoanele Sfinților Apostoli</span></p>
                
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'apostolice') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=apostolice">Canoanele Apostolice</a></li>

                <p><span class="badge bg-primary">Canoanele Sinoadelor Ecumenice</span></p>       

                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sinodul-1-ecumenic') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-1-ecumenic">Sinodul I Ecumenic de la Niceea (325)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sinodul-2-ecumenic') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-2-ecumenic">Sinodul II Ecumenic de la Constantinopol (381)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sinodul-3-ecumenic') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-3-ecumenic">Sinodul al III-lea Ecumenic de la Efes (431)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sinodul-4-ecumenic') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-4-ecumenic">Sinodul al IV-lea Ecumenic de la Calcedon (451)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sinodul-5-6-ecumenic') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-5-6-ecumenic">Sinodul V-VI Ecumenic de la Constantinopol (691-692), numit și Trulan</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sinodul-7-ecumenic') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-7-ecumenic">Sinodul al VII-lea Ecumenic de la Niceea (787)</a></li>

                <p><span class="badge bg-primary">Canoanele Sinoadelor Locale</span></p>  

                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'cartaginaciprian') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=cartaginaciprian"> Sinodul de la Cartagina (256)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'ancira') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=ancira"> Sinodul de la Ancira</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'neocezareea') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=neocezareea"> Sinodul de la Neocezareea</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'gangra') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=gangra"> Sinodul de la Gangra</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'antiohia') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=antiohia">Sinodul de la Antiohia</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'laodiceea') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=laodiceea">Sinodul de la Laodiceea</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sardica') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sardica">Sinodul de la Sardica</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'constantinopol-394') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=constantinopol-394">Sinodului de la Constantinopol (394)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'cartagina-419') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=cartagina-419">Sinodul de la Cartagina (419)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'constantinopol-861') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=constantinopol-861">Sinodului de la Constantinopol (861)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sofia') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sofia">Sinodului de la Constantinopol (879)</a></li>

                <p><span class="badge bg-primary">Canoanele Sfinților Părinți</span></p>      

                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'fericitul-dionisie') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=fericitul-dionisie">Fericitul Dionisie</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-grigorie-neocezareea') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-grigorie-neocezareea">Sf. Grigorie, Arhiepiscopul Neocezareei</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'fericitul-petru') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=fericitul-petru">Fericitul Petru </a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-atanasie-cel-mare') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-atanasie-cel-mare">Sf. Atanasie cel Mare</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-vasile-cel-mare') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-vasile-cel-mare">Sf. Vasile cel Mare</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'timotei-alexandria') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=timotei-alexandria">Timotei al Alexandriei</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-grigorie-teologul') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-grigorie-teologul">Sf. Grigorie Teologul</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-amfilohie') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-amfilohie">Sfântul Amfilohie</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-grigorie-nyssa') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-grigorie-nyssa">Sf. Grigorie de Nyssa</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'teofil-alexandria') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=teofil-alexandria">Teofil al Alexandriei</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-chiril-alexandria') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-chiril-alexandria">Sf. Chiril al Alexandriei</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'enciclica-ghenadie') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=enciclica-ghenadie">Enciclica (458-459) lui Ghenadie, Patriarhul Constantinopolului (471)</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'enciclica-tarasie') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=enciclica-tarasie">ENCICLICA  lui Tarasie, Patriarhul Constantinopolului (806)</a></li>

                <p><span class="badge bg-primary">Canoanele Întregitoare</span></p>

                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'sf-ioan-ajunatorul') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=sf-ioan-ajunatorul">Sf. Ioan Ajunătorul</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'nichifor-marturisitorul') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=nichifor-marturisitorul">Nichifor Marturisitorul</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'nicolae-constantinopol') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=nicolae-constantinopol">Nicolae al Constantinopolului</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'prescriptii-canonice') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=prescriptii-canonice">Prescripții canonice</a></li>
                <li class="nav-item "><a class="nav-link <?php echo stripos($url, 'scrisori') !== false ? "active" : "";?>"  href="<?php echo BASE_URL;?>categorie.php?nume=scrisori">Scrisori</a></li>

            </ul>
        </div>
    </div>
    </div>
</nav>

                </header>