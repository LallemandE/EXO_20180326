<?php
class ArticleCreateController extends AbstractController {
    public function processRequest(){
        $this->startSession();
        if (empty($_SESSION['pseudo']) {
            $this->redirect('../index.php');
            die();
        }
        
        if ($_SERVER['REQUEST_METHOD'] =="POST"){
            $articleTitle = $_POST['title'] ?? null;
            $url = $_POST['url'] ?? null;
            $description = $_POST['description'] ?? null;
            
            $db = $this->getConnection();
            
            $sql = 'INSERT INTO article (title, description, image_link) VALUES (:title, :description, :url)';
            $statement = $db->prepare($sql);
            $statement->bindValue('title', $articleTitle);
            $statement->bindValue('description', $description);
            $statement->bindValue('url', $url);
            if (!$statement->execute()){
                
            }
                
            
        }
    }
}
?>