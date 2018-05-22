<?php

// start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('model/EstoreDB.php');
include_once('utils/Validation.php');

/**
 * Description of LoginController
 *
 * 
 */
class LoginController {

    function __construct() {
        
    }

    function login() {

        $path = '';

        // has user submitted login form
        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];


// validate login data

            $errors = $this->validate($_POST);
            if (count($errors) == 0) {

                $db = new EstoreDB();
                $userID = $db->authenticateUser($username, $password);

                if ($userID > 0) {

                    $_SESSION['userID'] = $userID;
                    $_SESSION['username'] = $username;
// redirect to management page header
                    header('location:./management');
                } else {
                    $errors['username'] = 'Incorrect Username or Password';
                    include_once('view/loginForm.php');
                }
            } else { // display login form
                include_once('view/loginForm.php');
            }
        } else {
            include_once('view/loginForm.php');
        }
    }

// end login

    function logout() {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        header('location:../');
    }

    function validate($post) {
        $errors = [];
        $fields = [
                ['name' => 'username', 'valid_type' => 'alpha_num', 'required' => true],
                ['name' => 'password', 'valid_type' => 'alpha_num', 'required' => true],
        ];
        $validation = new Validation();
        $errors = $validation->validate_form_data($fields, $post);

        return $errors;
    }

}
