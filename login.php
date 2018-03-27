<?php
session_start();
if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
    header('Location: ./index.php');
}


$errorMessage = '';
$pseudo = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $pseudo = $_POST['pseudo'] ?? null;
    $pwd = $_POST['pwd'] ?? null;
    
    if ($pseudo && $pwd){
        $config = include "./config/app.conf.php" ;
        
        $dbconfig = $config['db'];
        
        $dsn = sprintf('%s:host=%s;dbname=%s',
            $dbconfig['driver'],
            $dbconfig['host'],
            $dbconfig['dbname']);
        try {
            $db = new PDO($dsn, $dbconfig['dbuser'], $dbconfig['dbpass']);
        } catch (PDOException $e){
            die ('Unable to open DB / '. $e->getCode() . ' ' . $e->getMessage());
        }
        $sqlQuery = 'SELECT COUNT(id) AS nbUser FROM user WHERE pseudo = :pseudo AND pwd = :pwd';
        $statement = $db->prepare($sqlQuery);
        $statement->bindValue('pseudo', $pseudo);
        $statement->bindValue('pwd', $pwd);
        if ($statement->execute()){
            $result = $statement->fetch();
            if ($result['nbUser' == 1]){
                $_SESSION['pseudo'] = $pseudo;
                header('Location: ./index.php');
            } else {
                $errorMessage = "Unable to login !";
            }
            
        }
        
    }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
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
            margin : 20px auto;
            text-align : center;
        }
        
        h2 {
            margin : 10px auto;
            text-align : center;
            color : red;
            font-weight: bold;
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
    <header>
      <a href="main.html">HOME</a>
      <ul>
        <?php if (! isset($_SESSION['pseudo']) || ($_SESSION['pseudo'] == "") || ($_SESSION['pseudo'] == null)) {?>
        	<li><a href="login.php">Login</a></li>
        <?php } else { ?>
        	<li><a href="logout.php">Logout</a></li>
        <?php } ?>
        <?php if (! isset($_SESSION['pseudo']) || ($_SESSION['pseudo'] == "") || ($_SESSION['pseudo'] == null)) {?>
        <li><a href="register.php">Register</a></li>
        <?php } ?>
      </ul>
    </header>
    <?php 

    ?>
    <h1>LOGIN</h1>
    <?php if ($errorMessage != "") echo '<h2>'. $errorMessage . '</h2>'; ?>
    <main>
      <form method="post">
        <input type="text" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ""; ?>" placeholder="User name ? ..." />
        <input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?? ""; ?>" placeholder="Password ? ..." />
        <input type="submit" name="login" value="LOGIN">
      </form>
    </main>

  </body>
</html>
