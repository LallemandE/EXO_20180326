<?php
require_once '../Core/AbstractController.php';

class HomeController extends AbstractController
{
    public function processRequest(){
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
        
        include __DIR__. "/../Templates/index.php";
    }
}
$controller = new HomeController();
$controller->processRequest();
?>
