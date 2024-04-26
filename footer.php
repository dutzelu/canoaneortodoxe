<footer>

    <a id="sus"></a>

    <div class="row p-2 justify-content-md-center">

        <div class="logoFooter">
            <img src="<?php echo BASE_URL;?>imagini/Logo Canoane Ortodoxe-footer.png" />                    
        </div>

        <div class="linkuriFooter">

            <ul>
                <li class=""><a class="" href="<?php echo BASE_URL;?>indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
                <li class=""><a class=""  href="<?php echo BASE_URL;?>indice-canonic.php?litera=A">Indice Canonic</a></li>
                <li class=""><a class=""  href="<?php echo BASE_URL;?>repertoriu-canonic">Repertoriu Canonic</a></li>
                <li class=""><a class=""  href="<?php echo BASE_URL;?>contact.php">Contact</a></li>
            </ul>
            
    </div>
                <p class="creat">Realizat de <a href="https://ortodoxiatinerilor.ro">Ortodoxia Tinerilor</a> | Webdesign: <a href="https://tulipart.ro">TulipArt.ro</a>® |
                
                <?php
            if(isset($_SESSION['username'])){ 
                echo  '<a href="' .  BASE_URL . 'login/logout.php">Logout </a></p>';
            } else {echo '<a href="' .  BASE_URL . 'login/login.php">Login </a></p>';}
                
                ?>

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

 