<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Article</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>
      main {
        display : flex;
        flex-direction : row;
        align-content : top;
        justify-content : space-around;
      }
      .rightCol {
        background : lightgreen;
        width : 60%;
      }
      .leftCol {
        display : flex;
        flex-direction : column;
        align-content : center;
        justify-content : center;
        width : 30%;
      }

      .leftCol a {
        display : block;
        text-align : center;
      }

      .rightCol {
        padding : 5px 10px;
      }

    </style>
  </head>
  <body>
  	<?php
//  	     include '../src/Templates/header.php';
  	     include 'header.php';
  	?>
    <h1>ARTICLE</h1>
    <main>
      <div class="leftCol">
        <img src="<?php echo '/img/' . $result['image_link'];?>" alt="<?php echo $result['title'];?>">
        <a href="#">ADD TO CART</a>
        <?php 
        if (!empty ($_SESSION['pseudo'])){
            echo '<a href="/index.php/articleDelete?id='. $result['id']. '">DELETE ARTICLE</a>';
        }
        ?>

      </div>
      <div class="rightCol">
      	<h1><?php echo $result['title'];?></h1>
        <p><?php echo ($result['description'])?></p>
      </div>
    </main>

  </body>
</html>
