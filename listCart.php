<?php
require __DIR__ . "/inc/boostrap.php";
require PROJECT_ROOT_PATH . "/Controller/API/CartController.php";
$objFeedController = new CartController();
$strMethodName = 'listAction';
$objFeedController->{$strMethodName}();
?>