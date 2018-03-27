<?php

class RegisterController extends AbstractController {
    
    public function processRequest(){
        $this->startSession();
        
        if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
            $this->redirect($url)'./index.php');
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
            
            if (strlen($pseudo) < 3){
                $errorMessage = "Unable to register : Error in entered data !";
                $pseudoErrorMessage = "Pseudo is too short (min 3 chars) !";
            }
            
            if ($pwd != $pwd2) {
                $pwdErrorMessage = "Password and its copy are not equal !";
                $errorMessage = "Unable to register : Error in entered data !";
            }
            
            if ($errorMessage ==""){
                $db = $this->getConnection();
                
                $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);
                
                $sqlQuery = 'INSERT INTO user (pseudo, fullname, pwd) VALUES (:pseudo, :fullname, :pwd)';
                
                $statement = $db->prepare($sqlQuery);
                $statement->bindValue('pseudo', $pseudo);
                $statement->bindValue('fullname', $fullname);
                $statement->bindValue('pwd', $hashedPassword);
                if (! $statement->execute()){
                    $errorMessage = "Unable to create new user !";
                    include 'error.php';
                    die();
                } else {
                    $_SESSION['pseudo'] = $pseudo;
                    $this->redirect('./index.php');
                }
            }
        }
    }
}

$controller = new RegisterController();
$controller->processRequest();
include "../Templates/register.php";
?>
