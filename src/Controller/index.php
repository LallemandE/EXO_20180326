<?php
require_once '../Core/AbstractController.php';

class HomeController extends AbstractController
{
    public function processRequest(){
        $this->StartSession();
        $pseudo = $_SESSION['pseudo'] ?? null;
    }
}
$controller = new HomeController();
$controller->processRequest();
include "../src/Templates/index.php";
?>
