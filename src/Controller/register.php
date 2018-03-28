<?php

require_once '../Core/AbstractController.php';

class RegisterController extends AbstractController {
    public $errorMessage = '';
    public $pwdErrorMessage = '';
    public $pseudoErrorMessage = '';
    public $fullnameErrorMessage = '';
    
    public function processRequest (){
        
        $this->startSession();
        
        if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
            $this->redirect('index.php');
        }
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $pseudo = $_POST['pseudo'] ?? null;
            $fullname = $_POST['fullname'] ?? null;
            $pwd = $_POST['pwd'] ?? null;
            $pwd2 = $_POST['pwd2'] ?? null;
            
            if (strlen($pseudo) < 3){
                $this->errorMessage = "Unable to register : Error in entered data !";
                $this->pseudoErrorMessage = "Pseudo is too short (min 3 chars) !";
            }
            
            
            if ($pwd != $pwd2) {
                $this->pwdErrorMessage = "Password and its copy are not equal !";
                $this->errorMessage = "Unable to register : Error in entered data !";
            }
            
            if ($this->errorMessage ==""){
                $db = $this->getConnection();
                
                $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);
                
                $sqlQuery = 'INSERT INTO user (pseudo, fullname, pwd) VALUES (:pseudo, :fullname, :pwd)';
                
                $statement = $db->prepare($sqlQuery);
                $statement->bindValue('pseudo', $pseudo);
                $statement->bindValue('fullname', $fullname);
                $statement->bindValue('pwd', $hashedPassword);
                if (! $statement->execute()){
                    $this->errorMessage = "Unable to create new user !";
                    include '../src/Templates/error.php';
                    die();
                } else {
                    $_SESSION['pseudo'] = $pseudo;
                    $this->redirect('index.php');
                }
            }
        }
    }
}


$controller = new RegisterController();
$controller->processRequest();

include "../src/Templates/register.php";

?>