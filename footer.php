 



<script src="http://localhost/canoane/js/acordeon.js"></script>





<div class="row p-4">
    <ul>
        <li class=""><a class="nav-link" href="http://localhost/canoane/indrumator-canonic.php?litera=A">Îndrumător Canonic</a></li>
        <li class=""><a class="nav-link"  href="http://localhost/canoane/indice-canonic.php?litera=A">Indice Canonic</a></li>
        <li class=""><a class="nav-link"  href="http://localhost/canoane/repertoriu-canonic">Repertoriu Canonic</a></li>
    </ul>
    
</div>

<div class="row p-4">

            <p class="creat">creat de <a href="https://tulipart.ro">TulipArt.ro</a>® |
            
            <?php
        if(isset($_SESSION['username'])){ 
            echo  '<a href="http://localhost/canoane/login/logout.php">Logout </a></p>';
        } else {echo '<a href="http://localhost/canoane/login/login.php">Login </a></p>';}
            
            ?>
</div>

</body>
</html>

 