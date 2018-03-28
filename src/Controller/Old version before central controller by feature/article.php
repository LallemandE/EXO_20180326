<?php
// require_once '../Core/AbstractController.php';

require_once '../vendor/autoload.php';

use Core\AbstractController;

class ArticleController extends AbstractController
{
    public function processRequest(){
        $this->StartSession();
        $resultArray = [];
        
        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            
            $id = $_GET['id'] ?? null;
            
            if ($id) {                
                $db = $this->getConnection();
                
                $sql = "SELECT * FROM article WHERE id = :id";
                $statement = $db->prepare($sql);
                $statement->bindValue('id', $id);
                
                if (! $statement->execute()) {
                    
                    $errorMessage = 'Unable to read article database !';
                    include __DIR__. "/../Templates/error.php";
                    die();
                    
                } 
                    
                $result = $statement->fetch();
                
                include __DIR__. "/../Templates/article.php";
                die();
            }
        }
        $this->redirect('/');
    }
    
}
$controller = new ArticleController();
$controller->processRequest();
