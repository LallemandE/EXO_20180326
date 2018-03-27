
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
  	     include '../src/Templates/header.php';
  	?>
    <h1>WELCOME TO MY AWESOME WEBSITE !</h1>
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
