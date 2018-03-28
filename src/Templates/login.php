<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="/css/main.css">
    <style>

        main {
            background : grey;
            text-align : center;
            padding : 20px 0px;
        }
        input {
            display : block;
            padding : 5px 10px;
        }
        input[type="text"], input[type="password"]  {
            width : 150px;
            height : 50px;
            background : lightgreen;
            border-radius : 10px;
            margin : 20px auto;
            border : 2px solid grey;
    
        }
        input[type="submit"] {
            width : 100px;
            margin : 20px auto;
            border-radius : 5px;
            border : 2px solid grey;
            text-align : center;
        }
    </style>
  </head>
  <body>
  	<?php
  	     include '../src/Templates/header.php';
  	?>
    <h1>LOGIN</h1>
    <?php if ($controller->errorMessage != "") echo '<h2>'. $controller->errorMessage . '</h2>'; ?>
    <main>
      <form method="post">
        <input type="text" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ""; ?>" placeholder="User name ? ..." />
        <input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?? ""; ?>" placeholder="Password ? ..." />
        <input type="submit" name="login" value="LOGIN">
      </form>
    </main>

  </body>
</html>
