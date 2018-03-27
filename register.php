<?php
session_start();

if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
    header('Location: ./index.php');
}

$errorMessage = '';
$pwdErrorMessage = '';
$pseudoErrorMessage = '';
$fullnameErrorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $pseudo = $_POST['pseudo'] ?? null;
    $fullname = $_POST['fullname'] ?? null;
    $pwd = $_POST['pwd'] ?? null;
    $pwd2 = $_POST['pwd2'] ?? null;
    
    if (strlen($pseudo) < 5){
        $errorMessage = "Unable to register : Error in entered data !";
        $pseudoErrorMessage = "Pseudo is too short (min 5 chars) !";
    }
    
    
    if ($pwd != $pwd2) {
        $pwdErrorMessage = "Password and its copy are not equal !";
        $errorMessage = "Unable to register : Error in entered data !";
    }
    
    if ($errorMessage ==""){
        $config = include "./config/app.conf.php" ;
        
        $dbconfig = $config['db'];
        
        $dsn = sprintf('%s:host=%s;dbname=%s',
            $dbconfig['driver'],
            $dbconfig['host'],
            $dbconfig['dbname']);
        try {
            $db = new PDO($dsn, $dbconfig['dbuser'], $dbconfig['dbpass']);
        } catch (Exception $e){
            
            die ('Unable to open DB / '. $e->getCode() . ' ' . $e->getMessage());
        }
        $sqlQuery = 'INSERT INTO user (pseudo, fullname, pwd) VALUES (:pseudo, :fullname, :pwd)';
        
        $statement = $db->prepare($sqlQuery);
        $statement->bindValue('pseudo', $pseudo);
        $statement->bindValue('fullname', $fullname);
        $statement->bindValue('pwd', $pwd);
        if (! $statement->execute()){
            $errorMessage = "Unable to create new user !";
            include 'error.php';
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
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
  	     include 'header.php';
  	?>
    <h1>REGISTER</h1>
    <?php if ($errorMessage != "") echo '<h2>'. $errorMessage . '</h2>'; ?>
    <main>
      <form method="post">
      	<?php
      	     if ($pseudoErrorMessage != '') {
      	         echo '<p class="error">' . $pseudoErrorMessage . '</p>';
      	     }
  		?>
        <input type="text" name="pseudo" value="<?php echo $_POST['pseudo'] ?? ""; ?>" placeholder="Pseudo ? ..." />
        <input type="text" name="fullname" value="" placeholder="Fullname ? ..." />
        <?php if ($pwdErrorMessage != "") echo '<p class="error">'. $pwdErrorMessage . '</p>'; ?>
        <input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?? ""; ?>" placeholder="Password ? ..." />
        <input type="password" name="pwd2" value="<?php echo $_POST['pwd2'] ?? ""; ?>" placeholder="Enter your password again  ..." />
        <input type="submit" name="register" value="REGISTER">
      </form>
    </main>

  </body>
</html>
