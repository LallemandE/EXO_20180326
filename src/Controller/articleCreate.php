<?php
// require_once '../Core/AbstractController.php';

require_once '../vendor/autoload.php';

use Core\AbstractController;

class ArticleCreateController extends AbstractController {
    public function processRequest(){
        
        $this->startSession();
        
        $error = NULL;
        $titleError = NULL;
        $descriptionError = NULL;
        $urlError = '';
        $articleCreationSucessfull = NULL;
        
        if (empty($_SESSION['pseudo'])) {
            $errorCode = 404;
            $errorMessage = "Page not found !";
            include "../src/Templates/error.php";
            die();
        }
        
        
        
        if ($_SERVER['REQUEST_METHOD'] =="POST"){
            $articleTitle = $_POST['title'] ?? null;
            $url = $_POST['url'] ?? null;
            $description = $_POST['description'] ?? null;
            
            
            if (strlen($articleTitle) < 5){
                $titleError = 'Article title must contain at least 5 chars !';
            }
            
            if (strlen($description) < 5){
                $descriptionError = 'Article description must contain at least 5 chars !';
            }
            
            if (strlen($url) < 5){
                $urlError = 'Picture URL must contain at least 5 chars !';
            }
            
            if (! file_exists('./img/' . $url)) {
                $urlError .= 'File does note exists !';
            }
            
            if ($titleError || $descriptionError || $urlError) {
                $error = 'You have errors in entered data !';
            } else {
                
                
                            
                
                
                
                $db = $this->getConnection();
                
                $sql = 'INSERT INTO article (title, description, image_link) VALUES (:title, :description, :url)';
                $statement = $db->prepare($sql);
                $statement->bindValue('title', $articleTitle);
                $statement->bindValue('description', $description);
                $statement->bindValue('url', $url);
                if (!$statement->execute()){
                    $error = "Unable to create Article in DB !!!!" ;   
                } else {
                    $articleCreationSucessfull = "New article created !";
                }
            }
                
            
        }
        include "../src/Templates/articleCreate.php";
    }
}
$controller = new ArticleCreateController();
$controller->processRequest();
?>