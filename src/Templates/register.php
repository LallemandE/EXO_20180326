<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="/css/main.css">

    <style>
      main h2 {
        color : black;
      }
      
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
        width : 200px;
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
      
      .error {
        color : white;
        font-weight : bold;
      }
    </style>
  </head>
  <body>
  	<?php
  	     include '../src/Templates/header.php';
  	?>
    <h1>REGISTER</h1>
    <?php if ($controller->errorMessage != "") echo '<h2>'. $controller->errorMessage . '</h2>'; ?>
    <main>
      <form method="post">
      	<?php
      	if ($controller->pseudoErrorMessage != '') {
      	    echo '<p class="error">' . $controller->pseudoErrorMessage . '</p>';
      	     }
  		?>
        <input type="text" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ""; ?>" placeholder="Pseudo ? ..." />
        <input type="text" name="fullname" value="" placeholder="Fullname ? ..." />
        <?php if ($controller->pwdErrorMessage != "") echo '<p class="error">'. $controller->pwdErrorMessage . '</p>'; ?>
        <input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?? ""; ?>" placeholder="Password ? ..." />
        <input type="password" name="pwd2" value="<?php echo $_POST['pwd2'] ?? ""; ?>" placeholder="Enter your password again  ..." />
        <input type="submit" name="register" value="REGISTER">
      </form>
    </main>

  </body>
</html>
