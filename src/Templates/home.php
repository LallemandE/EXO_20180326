
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Main Screen</title>
    <link rel="stylesheet" href="/css/main.css">
    <style media="screen">


      main {
        display: flex;
        flex-wrap: wrap;
        justify-content : space-around;
        background : grey;
        width : 90%;
        margin : 10px auto;
        font-size : 2vw;
      }

      article {
        display : block;
        width : 30%;
        min-width : 200px;
        background : lightgreen;
        border-radius : 10px;
        margin : 5px 10px;
        padding : 5px 5px 40px;
      }
      article img {
        float : left;
        width : 40%;
        margin : 5px 5px;
      }

      article a{
        position : relative;
        display : block;
        background : lightgrey;
        height : 20px;
        width : 50px;
        border-radius : 5px;
        text-align : center;
        top : 100%;
        right : -70%;
        text-decoration : none;
        color : red;
      }

    </style>
  </head>
  <body>
  	<?php
    include 'header.php';
  	?>
    <h1>The wonderfull world of Disney !</h1>
    <main>
    	<?php
    	foreach ($resultArray as $result) {
    	?>
	      <article>
    	    <a href="index.php/article?id=<?php echo ($result['id'])?>">More</a>
        	<img src="<?php echo './img/' . $result['image_link'];?>" alt="<?php echo './img/' . $result['title'];?>">
			<h2><?php echo ($result['title'])?></h2>
			<p><?php echo ($result['description'])?></p>
	      </article>
		<?php 
    	}
    	?>
    </main>
  </body>
</html>
