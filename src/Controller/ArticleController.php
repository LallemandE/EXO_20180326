<?php
namespace Controller;

use Core\AbstractController;

/**
 *
 * @author Etudiant
 *        
 */
class ArticleController extends AbstractController
{
    public function listAction(){
        $this->StartSession();
        $resultArray = [];
        
        //      $pseudo = $_SESSION['pseudo'] ?? null;
        
        $db = $this->getConnection();
        
        $sql = "SELECT * FROM article";
        $statement = $db->prepare($sql);
        
        if (! $statement->execute()) {
            $errorMessage = 'Unable to read article database !';
        } else {
            $resultArray = $statement->fetchAll();
        }
        
        include __DIR__. "/../Templates/home.php";
    }
    
    public function deleteAction(){
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
    
    public function detailAction(){
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
    
    public function createAction(){
        
        $this->startSession();
        
        $error = NULL;
        $titleError = NULL;
        $descriptionError = NULL;
        $urlError = '';
        $articleCreationSucessfull = NULL;
        
        if (empty($_SESSION['pseudo'])) {
            $errorCode = 404;
            $errorMessage = "Page not found !";
            include "../Templates/error.php";
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
        include __DIR__. "/../Templates/articleCreate.php";
    }
}

