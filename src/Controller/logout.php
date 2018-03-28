<?php

require_once '../Core/AbstractController.php';


class LogoutController extends AbstractController {
    public function processRequest(){
        $this->startSession();
        $_SESSION = [];
        session_destroy();
        $this->redirect('/');
    }
}
$controller = new LogoutController();
$controller->processRequest();
?>