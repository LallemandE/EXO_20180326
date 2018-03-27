<?php
class LogoutController extends AbstractController{
    public function processRequest(){
        $this->startSession();
        $_SESSION = [];
        session_destroy();
        $this->redirect('./index.php');
    }
}
$controller = new LogoutController();
$controller->processRequest();
?>