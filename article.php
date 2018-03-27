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
      }
      .rightCol {
        background : lightgreen
      }
      .leftCol {
        display : flex;
        flex-direction : column;
        align-content : center;
        justify-content : center;
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
    <header>
      <a href="main.html">HOME</a>
      <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      </ul>
    </header>
    <h1>ARTICLE</h1>
    <main>
      <div class="leftCol">
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/d4/Mickey_Mouse.png/220px-Mickey_Mouse.png" alt="Mickey">
        <a href="#">ADD TO CART</a>

      </div>
      <div class="rightCol">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

      </div>
    </main>

  </body>
</html>
