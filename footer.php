<footer>

    <a id="sus"></a>

    <div class="row p-5 justify-content-md-center">

  

        <div class="logoFooter col mb-3">
                <p><img src="<?php echo BASE_URL;?>imagini/logo-CO-footer.png" /></p>
                
                <p class="creat">Realizat de <a href="https://ortodoxiatinerilor.ro">Ortodoxia Tinerilor</a>
                <br>
                Webdesign: <a href="https://tulipart.ro">TulipArt.ro</a>® |
                
                <?php
            if(isset($_SESSION['username'])){ 
                echo  '<a href="' .  BASE_URL . 'login/logout.php">Logout </a></p>';
            } else {echo '<a href="' .  BASE_URL . 'login/login.php">Login </a></p>';}
                
                ?> <a href="<?php echo BASE_URL;?>despre-noi.php">Despre noi</a> | <a href="<?php echo BASE_URL;?>contact.php">Contact</a>


        </div>

        <div class="col">
          
            <ul>
              <p><span class="badge bg-secondary">Canoanele Sinoadele Ecumenice</span></p>       
              
              
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=apostolice">Canoanele Apostolice</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-1-ecumenic">Sinodul I Niceea (325)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-2-ecumenic">Sinodul II Constantinopol (381)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-3-ecumenic">Sinodul III Efes (431)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-4-ecumenic">Sinodul IV Calcedon (451)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-5-6-ecumenic">Sinodul V-VI Constantinopol (691-692)(Trulan)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sinodul-7-ecumenic">Sinodul VII Niceea (787)</a></li>
              </ul>
          </div>     

          <div class="col">
            <ul>
                  <p><span class="badge bg-secondary">Canoanele Sinoadelor Locale</span></p>  

                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=cartaginaciprian"> Cartagina (256)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=ancira">Ancira</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=neocezareea"> Neocezareea</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=gangra">Gangra</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=antiohia">Antiohia</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=laodiceea">Laodiceea</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sardica">Sardica</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=constantinopol-394">Constantinopol (394)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=cartagina-419">Cartagina (419)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=constantinopol-861">Constantinopol (861)</a></li>
                  <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sofia">Constantinopol (879)</a></li>
            </ul>
        </div>

        <div class="col">
            <ul>
                <p><span class="badge bg-secondary">Canoanele Sfinților Părinți</span></p>      

                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=fericitul-dionisie">Dionisie</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-grigorie-neocezareea">Grigorie al Neocezareei</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=fericitul-petru">Fericitul Petru </a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-atanasie-cel-mare">Sf. Atanasie cel Mare</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-vasile-cel-mare">Sf. Vasile cel Mare</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=timotei-alexandria">Timotei al Alexandriei</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-grigorie-teologul">Sf. Grigorie Teologul</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-amfilohie">Sfântul Amfilohie</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-grigorie-nyssa">Sf. Grigorie de Nyssa</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=teofil-alexandria">Teofil al Alexandriei</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-chiril-alexandria">Sf. Chiril al Alexandriei</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=enciclica-ghenadie">Enciclica Ghenadie(471)</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=enciclica-tarasie">ENCICLICA Tarasie (806)</a></li>

            </ul>
        </div>

         <div class="col">
              <ul>
                <p><span class="badge bg-secondary">Canoanele Întregitoare</span></p>

                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=sf-ioan-ajunatorul">Sf. Ioan Ajunătorul</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=nichifor-marturisitorul">Nichifor Marturisitorul</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=nicolae-constantinopol">Nicolae al Constantinopolului</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=prescriptii-canonice">Prescripții canonice</a></li>
                <li class=" "><a  href="<?php echo BASE_URL;?>categorie.php?nume=scrisori">Scrisori</a></li>

                <p class="mt-4"><span class="badge bg-secondary">Instrumente de cercetare</span></p>
                <li class=""><a class="" href="<?php echo BASE_URL;?>indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
                <li class=""><a class=""  href="<?php echo BASE_URL;?>indice-canonic.php?litera=A">Indice Canonic</a></li>
                <li class=""><a class=""  href="<?php echo BASE_URL;?>repertoriu-canonic">Repertoriu Canonic</a></li>
                
  

              </ul>
        </div>
            
    </div>
        

</footer>

<script>
 var btn = $('#sus');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
</script>

<!-- Statcounter -->
  <script type="text/javascript">
  var sc_project=12993214; 
  var sc_invisible=1; 
  var sc_security="4788aff1"; 
  </script>
  <script type="text/javascript"
  src="https://www.statcounter.com/counter/counter.js"
  async></script>
  <noscript><div class="statcounter"><a title="Web Analytics
  Made Easy - Statcounter" href="https://statcounter.com/"
  target="_blank"><img class="statcounter"
  src="https://c.statcounter.com/12993214/0/4788aff1/1/"
  alt="Web Analytics Made Easy - Statcounter"
  referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
<!-- End of Statcounter Code -->

</body>
</html>

 