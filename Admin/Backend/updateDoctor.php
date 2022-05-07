<?php
require __DIR__ . "/inc/boostrap.php";
require PROJECT_ROOT_PATH . "/Controller/API/DoctorController.php";
$objFeedController = new UserController();
$strMethodName = 'updateAction';
$objFeedController->{$strMethodName}();
?>