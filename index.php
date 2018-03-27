<?php
session_start();
$pseudo = $_SESSION['pseudo'] ?? null;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Main Screen</title>
    <style media="screen">
      * {
      }

      header {
        display : flex;
        justify-content: space-between;
        align-items: center;
      }

      header a {
        display :block;
        width : 80px;
        height : 30px;
        line-height : 30px;
        text-decoration : none;
        background-color: lightblue;
        text-align : center;
        border-radius: 5px;
      }



      header ul {
        display :block;
      }
      header ul li {
        display : inline-block;
      }

      header ul li a {
        display : inline-block;
        width : 80px;
        height : 30px;
        line-height : 30px;
        color : red;
        text-decoration : none;
        margin : 10px 10px;
        border-radius : 10px;
        background : lightgrey;
        text-align : center;

      }

      h1 {
        text-align: center;
      }

      main {
        display: flex;
        flex-wrap: wrap;
        justify-content : space-around;
        background : grey;
        width : 900px;
        margin : 10px auto;
      }

      article {
        display : block;
        width : 30%;
        background : lightgreen;
        border-radius : 10px;
        margin : 5px 10px;
        padding : 5px 5px 40px;
      }
      article img {
        float : left;
        width : 40%;
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
        left : 80%;
      }

    </style>
  </head>
  <body>
  	<?php
  	     include 'header.php';
  	?>
    <h1>WELCOME TO THIS WONDERFULL WEBSITE !</h1>
    <main>
      <article>
        <a href="articleDetail.php?id=1">More</a>
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Mickey_Mouse.png/220px-Mickey_Mouse.png" alt="Mickey">
        <p>description du premier article</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </article>
      <article>
        <a href="articleDetail.php?id=2">More</a>
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Mickey_Mouse.png/220px-Mickey_Mouse.png" alt="Mickey">
        <p>description du deuxième article</p>
      </article>
      <article>
        <a href="articleDetail.php?id=3">More</a>
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Mickey_Mouse.png/220px-Mickey_Mouse.png" alt="Mickey">
        <p>description du troisième article</p>
      </article>
      <article>
        <a href="articleDetail.php?id=4">More</a>
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Mickey_Mouse.png/220px-Mickey_Mouse.png" alt="Mickey">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </article>

    </main>
  </body>
</html>
