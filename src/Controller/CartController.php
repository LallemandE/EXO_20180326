<?php

namespace Controller;

use Core\abstractController;

class CartController extends AbstractController {

    public function add(){
        $this->startSession();
        
        // only logged user can access to this page
        //if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] != "")){
        //    $this->redirect('/login');
        // }
        
        $articleID = 0;
        $quantity = 0;
        $cart = [];
        
        $errorCode = 0;
        $errorMessage = '';
        $addedMessage = "";
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $articleID = $_GET['id'] ?? 0;
            
            if ($articleID == 0) {
                $errorCode = 404;
                $errorMessage = "Article ID missing !";
                include __DIR__. "/../Templates/error.php";
                die();
            }
            
            $db = $this->getConnection();
            $sql = "SELECT * FROM article WHERE id = :id";
            $statement = $db->prepare($sql);
            $statement->bindValue('id', $articleID);
            
            if (! $statement->execute()) {
                $errorCode = 404;
                $errorMessage = 'Unable to read article database !';
                include __DIR__. "/../Templates/error.php";
                die();
            } else {
                $result = $statement->fetch();
                include __DIR__. "/../Templates/cartAdd.php";
            }
            
        }
        
        
        // GET REQUEST_METHOD is possible to receive Article ID that the 
        // user wants to add.
        
        // POST REQUEST_METHOD => now, we receive the quantity from form
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $articleID = $_POST['articleID'] ?? 0;
            $quantity = $_POST['quantity'] ?? 0;
            
            if ($articleID == 0) {
                $errorCode = 404;
                $errorMessage = "Article ID missing !";
                include __DIR__. "/../Templates/error.php";
                die();
            }
            
            
            $db = $this->getConnection();
            $sql = "SELECT * FROM article WHERE id = :id";
            $statement = $db->prepare($sql);
            $statement->bindValue('id', $articleID);
            
            if (! $statement->execute()) {
                $errorCode = 404;
                $errorMessage = 'Unable to read article database !';
                include __DIR__. "/../Templates/error.php";
                die();
            } else {
                $result = $statement->fetch();
            }
            
            $cart = [];
            $maxQuantityToRemove = 0;
            
            // How many of this article do I already have in the cart (if exists) ?
            if (isset ($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $maxQuantityToRemove = $cart[$articleID] ?? 0;
            }
            
            echo '<br>quantity  = ' . $quantity . '<br>';
            echo '<br>quantity max to remove = ' . $maxQuantityToRemove . '<br>';
            
            if (($maxQuantityToRemove + $quantity) < 0) {
                $errorMessage = 'You can remove maximum ' . $maxQuantityToRemove . ' from cart !';
                echo '<br>errorMessage  = ' . $errorMessage . '<br>';
            }
            
            if ($errorMessage == "") {
                if (isset ($_SESSION['cart'][$articleID])) {
                    $_SESSION['cart'][$articleID] += $quantity;
                } else {
                    $_SESSION['cart'][$articleID] = $quantity;
                }
                $addedMessage = "Item added to cart !";
            }
            
            var_dump ($_SESSION);
            
            include __DIR__. "/../Templates/cartAdd.php";
        }
   } // add Method
   
   public function list(){
       $this->startSession();
       $emptyMessage = "";
//     var_dump ($_SESSION);
       if (empty($_SESSION['cart'])){
           $emptyMessage = "Your cart is empty !";
           include __DIR__. "/../Templates/cartList.php";
           die();
       }
       
       $db = $this->getConnection();
       
       $nbArticle = count($_SESSION['cart']);
       
//       echo '<br>$nbArticle = ' . $nbArticle . '<br>';
       
       
       $sql =  $sql = 'SELECT * FROM article WHERE id IN (';

       for ($i = 0 ; $i < $nbArticle; $i++) {
           $sql .= ':id' . $i;
           if ($i < $nbArticle -1) $sql .= ' , ';
       }
       $sql .= ')';
       
//       echo "<br>sql = " . $sql . '<br>';

       
       $statement = $db->prepare($sql);
       
       $i = 0;
       foreach ($_SESSION['cart'] as $key => $value){
           $statement->bindValue('id'. $i, $key);
//           echo '<br>bindValue id' . $i . ' value = ' . $key . '<br>';
           $i++;
       }
       
       if (! $statement->execute()) {
           $errorCode = 404;
           $errorMessage = 'Unable to read article database !';
           include __DIR__. "/../Templates/error.php";
           die();
       }
       
       $resultArray = $statement->fetchAll();
       
       
       
       
       
       
       
       
       include __DIR__. "/../Templates/cartList.php";
   }
}
