<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Article Creation</title>
    <link rel="stylesheet" href="/css/main.css">
  </head>
  <body>
    <?php
  	     include '../src/Templates/header.php';
  	     
  	     if ($articleCreationSucessfull) {
  	         echo '<h1>' . $articleCreationSucessfull . '</h1>';
  	     } else {
     ?>
    <h1>Article Creation</h1> 
  	<main>
        <form method="POST">
        	<?php if ($error) echo '<h2 class="error">' . $error .'</h2>' ;?>
            <?php if ($titleError) echo '<p class="error">' . $titleError .'</p>' ;?>
            <input type="text" name="title" value="<?php echo ($_POST['title'] ?? '');?>" placeholder="Article Name ? ..." />
    		<?php if ($urlError) echo '<p class="error">' . $urlError .'</p>' ;?>
            <input type="file" name="url" value="<?php echo ($_POST['url'] ?? '');?>" placeholder="image URL ? ..." />
            <?php if ($descriptionError) echo '<p class="error">' . $descriptionError .'</p>' ;?>
            <label for="description">Article Description</label>
            <textarea name="description" id="description" rows="4" cols="50"><?php echo ($_POST['description'] ?? '');?></textarea>
            <input type="submit" name="articleCreation" value="CREATE" />
        </form>
    </main>
    <?php
    } 
    ?>     
  </body>
</html>
