 



<script src="https://canoaneortodoxe.ro/js/acordeon.js"></script>


<footer>

    <div class="row p-4">

        <div class="logoFooter">
            <img src="https://canoaneortodoxe.ro/imagini/Logo Canoane Ortodoxe-footer.png" />                    
        </div>

        <div class="linkuriFooter">

            <ul>
                <li class=""><a class="" href="https://canoaneortodoxe.ro/indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
                <li class=""><a class=""  href="https://canoaneortodoxe.ro/indice-canonic.php?litera=A">Indice Canonic</a></li>
                <li class=""><a class=""  href="https://canoaneortodoxe.ro/repertoriu-canonic">Repertoriu Canonic</a></li>
                <li class=""><a class=""  href="https://canoaneortodoxe.ro/cautare.php">Căutare în canoane</a></li>
            </ul>
            

    </div>
    
    <div class="row p-2">
    
                <p class="creat">creat de <a href="https://tulipart.ro">TulipArt.ro</a>® |
                
                <?php
            if(isset($_SESSION['username'])){ 
                echo  '<a href="https://canoaneortodoxe.ro/login/logout.php">Logout </a></p>';
            } else {echo '<a href="https://canoaneortodoxe.ro/login/login.php">Login </a></p>';}
                
                ?>
    </div>

</footer>



</body>
</html>

 