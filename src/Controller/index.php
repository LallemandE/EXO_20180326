<?php

// Une fois que l'on a installé l'autoloader et que l'on a déplacé le dossier Core dans src, il n'y a plus besoin de faire le require.
// require_once '../Core/AbstractController.php';

require_once '../vendor/autoload.php';

use Core\AbstractController;


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
