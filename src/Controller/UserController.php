<?php
namespace Controller;

use Core\AbstractController;

/**
 *
 * @author Etudiant
 *        
 */
class UserController extends AbstractController
{
    public function loginAction(){
        $this->startSession();
        if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
            $this->redirect('index.php');
        }
        
        
        $errorMessage = '';
        $pseudo = null;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $pseudo = $_POST['pseudo'] ?? null;
            $pwd = $_POST['pwd'] ?? null;
            
            if ($pseudo && $pwd){
                $db = $this->getConnection();
                
                $sqlQuery = 'SELECT pwd FROM user WHERE pseudo = :pseudo';
                $statement = $db->prepare($sqlQuery);
                $statement->bindValue('pseudo', $pseudo);
                
                if ($statement->execute()){
                    $result = $statement->fetch();
                    if (!empty($result)){
                        if (password_verify ($pwd, $result['pwd'])){
                            $_SESSION['pseudo'] = $pseudo;
                            $this->redirect('/');
                        }
                    }
                    $errorMessage = "Unable to login !";
                }
            }
        }
        
        include "../src/Templates/login.php";
    }
    
    public function logoutAction(){
        $this->startSession();
        $_SESSION = [];
        session_destroy();
        $this->redirect('/');
    }
    
    public function registerAction(){
        $this->startSession();
        
        $errorMessage = '';
        $pseudoErrorMessage = '';
        $pwdErrorMessage = '';
        
        if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
            $this->redirect('index.php');
        }
        
        
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
            
            if ($this->errorMessage ==""){
                $db = $this->getConnection();
                
                $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT);
                
                $sqlQuery = 'INSERT INTO user (pseudo, fullname, pwd) VALUES (:pseudo, :fullname, :pwd)';
                
                $statement = $db->prepare($sqlQuery);
                $statement->bindValue('pseudo', $pseudo);
                $statement->bindValue('fullname', $fullname);
                $statement->bindValue('pwd', $hashedPassword);
                if (! $statement->execute()){
                    $errorMessage = "Unable to create new user !";
                    include '../src/Templates/error.php';
                    die();
                } else {
                    $_SESSION['pseudo'] = $pseudo;
                    $this->redirect('/');
                }
            }
        }
        include "../src/Templates/register.php";
    }
    
}

