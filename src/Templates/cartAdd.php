<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add to cart</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
  	<?php
  	     include '../src/Templates/header.php';
  	?>
  	<?php if ($addedMessage != "") {?>
  		<h1>ITEM ADDED TO CART</h1>
  	<?php 
  	} else {?>
        <h1>ADD TO CART</h1>
        <?php if ($errorMessage) echo '<h2 class="error">' . $errorMessage .'</h2>' ;?>
        <main>
        	<h2><?php echo $result['title'];?></h2>
            <img src="<?php echo '/img/' . $result['image_link'];?>" alt="<?php echo $result['title'];?>">
        	<form method="POST">
        		<input type="hidden" name="articleID" value="<?php echo $result['id'];?>" />
        		<input type="number" name="quantity" value="1" />
        		<input type="submit" value"ADD TO CART">
        	</form>        
        </main>
	<?php 
  	}
  	?>
  </body>
</html>
