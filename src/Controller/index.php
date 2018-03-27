<?php
require_once '../Core/AbstractController.php';
class HomeController extends AbstractControler
{
    public function processRequest(){
        include "../Templates/index.php";
        $this->StartSession();
        $pseudo = $_SESSION['pseudo'] ?? null;
    }
}
$controller = new HomeController();
$controller->processRequest();
include "../Templates/index.php";
?>
