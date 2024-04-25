<footer>

    <div class="row p-2 justify-content-md-center">

        <div class="logoFooter">
            <img src="http://localhost/canoane/imagini/Logo Canoane Ortodoxe-footer.png" />                    
        </div>

        <div class="linkuriFooter">

            <ul>
                <li class=""><a class="" href="http://localhost/canoane/indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
                <li class=""><a class=""  href="http://localhost/canoane/indice-canonic.php?litera=A">Indice Canonic</a></li>
                <li class=""><a class=""  href="http://localhost/canoane/repertoriu-canonic">Repertoriu Canonic</a></li>
                <li class=""><a class=""  href="http://localhost/canoane/contact.php">Contact</a></li>
            </ul>
            
    </div>
                <p class="creat">creat de <a href="https://tulipart.ro">TulipArt.ro</a>® |
                
                <?php
            if(isset($_SESSION['username'])){ 
                echo  '<a href="http://localhost/canoane/login/logout.php">Logout </a></p>';
            } else {echo '<a href="http://localhost/canoane/login/login.php">Login </a></p>';}
                
                ?>

</footer>



</body>
</html>

 