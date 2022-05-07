<?php
require __DIR__ . "/inc/boostrap.php";
require PROJECT_ROOT_PATH . "/Controller/API/AppointmentsController.php";
$objFeedController = new AppointmentController();
$strMethodName = 'deleteAction';
$objFeedController->{$strMethodName}();
?>