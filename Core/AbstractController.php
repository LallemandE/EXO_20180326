<?php
class AbstractController
{
    public function getConnection()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=ecom', 'root');
        } catch (PDOException $e) {
            include '../Template/error.php';
            die();
        }
    }
    
    public function startSession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    
    public function redirect($url)
    {
        header('location:'.$url);
        die();
    }
}