<?php
require_once 'models/ContactModel.php';
require_once 'controllers/ContactController.php';
$model = new ContactModel();
$controller = new ContactController($model);
$contact_list  =  $controller->getAllList();
include 'views/contact_list.php';
?>