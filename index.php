<?php

include_once ('migration/config.php');

/*
 *  index page responds to user actions
 *  Home or Login
 *  Login - call login() function of LoginController
 *  No Action = load home page call home() of HomeController
 */

include_once('controller/LoginController.php');
include_once('controller/HomeController.php');
if (isset($_GET['action'])) {
// get the action
    $action = $_GET['action'];
    if ($action == 'login') {
        $controller = new LoginController();
        $controller->login();
    }
} else { // no action
// no action load home page
    $controller = new HomeController();
    $controller->home();
}