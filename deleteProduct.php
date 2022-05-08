<?php
require __DIR__ . "/inc/boostrap.php";
require PROJECT_ROOT_PATH . "/Controller/API/ProductController.php";
$objFeedController = new ProductController();
$strMethodName = 'deleteAction';
$objFeedController->{$strMethodName}();
?>