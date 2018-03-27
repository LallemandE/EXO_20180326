<?php
if (session_status() !== PHP_SESSION_ACTIVE ){
    session_start();
}
?>
<header>
    <a href="index.php"><img id="logo" alt="Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Mickey_Mouse_head_and_ears.svg/2000px-Mickey_Mouse_head_and_ears.svg.png"/></a>
    <ul>
        <?php if(empty($_SESSION['pseudo'])) {?>
          	<li><a href="index.php/login">Login</a></li>
    	    <li><a href="index.php/register">Register</a></li>
        <?php } else { ?>
        	<li>Welcome <?php echo $_SESSION['pseudo']; ?> !</li>
          	<li><a href="index.php/logout">Logout</a></li>
        <?php } ?>
    </ul>
</header>