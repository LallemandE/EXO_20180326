<?php
if (session_status() !== PHP_SESSION_ACTIVE ){
    session_start();
}
?>
<header>
    <a href="main.html">HOME</a>
    <ul>
        <?php if(empty($_SESSION['pseudo'])) {?>
          	<li><a href="login.php">Login</a></li>
    	    <li><a href="register.php">Register</a></li>
        <?php } else { ?>
          	<li><a href="logout.php">Logout</a></li>
        <?php } ?>
    </ul>
</header>