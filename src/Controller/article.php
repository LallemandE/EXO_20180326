<?php
// require_once '../Core/AbstractController.php';

require_once '../vendor/autoload.php';

use Controller\ArticleController;

$controller = new ArticleController();
$controller->detailAction();
