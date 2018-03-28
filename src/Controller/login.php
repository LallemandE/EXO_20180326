<?php
// require_once '../Core/AbstractController.php';

require_once '../vendor/autoload.php';

use Core\AbstractController;

class LoginController extends AbstractController{
     
    
    public function processRequest(){
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
}

$controller = new LoginController();
$controller->processRequest();
?>
