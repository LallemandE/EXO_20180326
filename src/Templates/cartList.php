
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Main Screen</title>
    <link rel="stylesheet" href="/css/main.css">
   </head>
  <body>
  	<?php
    include 'header.php';
  	?>
  	<?php if ($emptyMessage != '') {
  		echo '<h1>'. $emptyMessage . '</h1>';
  	} else {
  	?>
        <h1>Content of your cart</h1>
        <main>
        	<?php
        	
        	foreach ($resultArray as $result) {
        	?>
    	      <article>
            	<img src="<?php echo '/img/' . $result['image_link'];?>" alt="<?php echo './img/' . $result['title'];?>">
    			<h2><?php echo ($result['title'])?></h2>
    			<p><?php echo ($result['description'])?></p>
    			<p>Quantity = <?php echo ($_SESSION['cart'][$result['id']]); ?></p>
    	      </article>
    		<?php 
        	}
        	?>
        </main>
    <?php 
  	}
  	?>
  </body>
</html>
