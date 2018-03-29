<?php
if (session_status() !== PHP_SESSION_ACTIVE ){
    session_start();
}
?>
<header>
    <a href="/"><img id="logo" alt="Logo" src="/img/logo.png"/></a>
    <ul>
        <?php if(empty($_SESSION['pseudo'])) {?>
          	<li><a href="/index.php/login">Login</a></li>
    	    <li><a href="/index.php/register">Register</a></li>
        <?php } else { ?>
        	<li>Welcome <?php echo $_SESSION['pseudo']; ?> !</li>
        	<li><a href="/index.php/cartList">View Cart</a></li>
        	<li><a href="/index.php/articleCreate">Create Article</a></li>
          	<li><a href="/index.php/logout">Logout</a></li>
        <?php } ?>
    </ul>
</header>