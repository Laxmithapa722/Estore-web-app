<?php

include_once('../migration/config.php');
/*
 *  Management index page responds to user actions
 *  routes to the corresponding method
 *  in ProductsController. 
 *  No Action = load default management page
 * logout calls logout() of LoginController
 */

// reference to Controllers class
include_once('controller/ProductsController.php');
include_once('controller/LoginController.php');

// create instances
$products_controller = new ProductsController();
$login_controller = new LoginController();


if (isset($_SESSION['userID']) && isset($_SESSION['username'])) {
// do we have an action
    if (isset($_GET['action'])) {
// get the action
        $action = $_GET['action'];
// is action logout
        if ($action == 'logout') {
            $login_controller->logout();
        } else {
// bookings action
// route to the method
            $products_controller->{$action}();
        }
    } else { // no action load management home page
        $products_controller->management();
    }
} else { // user has no session info therefore not authenticated logout them out
    $login_controller->logout();
}


