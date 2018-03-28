<?php
// require_once '../Core/AbstractController.php';

require_once '../vendor/autoload.php';

use Core\AbstractController;

class ArticleDeleteController extends AbstractController
{
    public function processRequest(){
        $this->StartSession();
        
        if (empty($_SESSION['pseudo'])) {
            $errorCode = 404;
            $errorMessage = 'Page not found !';
            include __DIR__. '/../Templates/error.php';
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] === "GET") {
            
            $id = $_GET['id'] ?? null;
            
            if ($id) {                
                $db = $this->getConnection();
                
                $sql = "DELETE FROM article WHERE id = :id";
                $statement = $db->prepare($sql);
                $statement->bindValue('id', $id);
                
                if (! $statement->execute()) {
                    $errorMessage = 'Unable to delete article !';
                    include __DIR__. "/../Templates/error.php";
                    die();
                } 
                    
                include __DIR__. "/../Templates/articleDelete.php";
                die();
            } else {
                $errorMessage = "Article identifier is missing !";
                include __DIR__. '/../Templates/error.php';
                die();
            }
            
        } else {
            $errorMessage = "Wrong request method !";
            include __DIR__. '/../Templates/error.php';
            die();
        }
//       $this->redirect('/');
    }
    
}
$controller = new ArticleDeleteController();
$controller->processRequest();

