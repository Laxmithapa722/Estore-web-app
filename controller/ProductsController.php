<?php

 // start session
 

include_once('model/EstoreDB.php');
include_once('utils/Validation.php');

/**
 * Description of ProductsController
 */
class ProductsController {

    function __construct() {
        
    }

    /**
     * addBooking function manages data model
     * and view for adding a new booking
     * record
     */
    function addBooking() {


        $path = '../';
        // initialise form variables
        $firstname = $lastname = $email = $bookingDate = $bookingTime = $numPeople = '';

        // if form is submitted
        if (isset($_POST['addBooking'])) {

            // remove key value for submit button
            unset($_POST['addBooking']);
            // values array is parameter for Model method
            $values = [];
            // assign values to form variables and add values to values array
            foreach ($_POST as $key => $value) {
                $values[] = ${$key} = trim($value);
            }

            // validate data in post
            $errors = $this->validate($_POST);


            if (count($errors) == 0) {

                // no validation errors proceed to insert new booking
                $db = new BookingsDB();
                $success = $db->addBooking($values);
                $db->close();

                if ($success) {
                    header('location:?action=getProducts');
                }
            } else {
                include_once('view/addBookingForm.php');
            }
        } else {  // load add form
            include_once('view/addBookingForm.php');
        }
    }

    /**
     * deleteBooking
     * Manages data model and view for 
     * deleting a bookings record
     */
    function deleteBooking() {
        $path = '../';
        $id = $_GET['id'];
        $db = new BookingsDB();
        $success = $db->deleteBooking($id);
        $db->close();

        if ($success) {

            header('location:?action=getProducts');
        }
    }

   /**
     * editooking function manages data model
     * and view for editig an existing booking
     * record
     */

    function editBooking() {
        $path = '../';
        $firstname = $lastname = $email = $bookingDate = $bookingTime = $numPeople = '';

        $id = $_GET['id'];

        if (isset($_POST['editBooking'])) {

            // remove id and submit button key/value pairs from post
            unset($_POST['editBooking']);
            unset($_POST['id']);
            $values = [];
            foreach ($_POST as $key => $value) {
                $value = trim($value);
                ${$key} = $value;
                $values[] = $value;
            }
            $errors = $this->validate($_POST);

            if (count($errors) == 0) {

                $db = new BookingsDB();
                $success = $db->editBooking($values, $id);
                $db->close();

                if ($success) {

                    header('location:?action=getProducts');
                }
            } else {
                include_once('view/editBookingForm.php');
            }
        } else {

            // declare record 
            $record = [];
            $db = new BookingsDB();
            $record = $db->getBooking($id);
            $db->close();

            foreach ($record as $key => $value) {
                ${$key} = $value;
            }

            // display populated Booking form
            include_once('view/editBookingForm.php');
        }
    }
    /**
     * searchBookings function manages data model
     * and view for searching booking records
     * record
     */
    function searchBookings() {
        $path = '../';

        if (isset($_POST['searchBookings'])) {

            $keyword = $_POST['keyword'];

            $db = new BookingsDB();
            $records = $db->searchBookings($keyword);
            $db->close();
            $numRecords = count($records);

            // $records and $numRecords is referenced in viewProducts
            include_once('view/viewProducts.php');
        } else {
            include_once('view/searchForm.php');
        }
    }

    /**
     * getProducts function manages data model
     * and view for retrieving all the booking
     * records
     */
    function getProducts() {
        $path = '../';
        $db = new EstoreDB();
        $records = $db->getProducts();
        $db->close();
        $numRecords = count($records);
        include_once('view/viewProducts.php');
    }
    /**
     * validate function 
     * validates Bookings form data in $_POST array
     * @return $errors array
     */
    private function validate($post) {
        $errors = [];
        $fields = [
            ['name' => 'ProductID', 'valid_type' => 'alpha_spaces', 'required' => true],
            ['name' => 'Description', 'valid_type' => 'alpha_spaces', 'required' => true],
            ['name' => 'Category', 'valid_type' => 'alpha_spaces', 'required' => true],
            ['name' => 'Quantity', 'valid_type' => 'digits', 'required' => true],
            ['name' => 'CostPrice', 'valid_type' => 'digits', 'required' => true],
            ['name' => 'SellingPrice', 'valid_type' => 'digits', 'required' => true]
        ];

        $validation = new Validation();
        $errors = $validation->validate_form_data($fields, $post);

        return $errors;
    }

    /**
     * validateInvitee function validates
     * Invitee form data in $_POST array
     */
    private function validatePhoto($post) {
        $errors = [];
        $fields = [
            ['name' => 'PhotoDescription', 'valid_type' => 'alpha_spaces', 'required' => true],
        ];
        $validation = new Validation();
        $errors = $validation->validate_form_data($fields, $_POST);

        return $errors;
    }

    /**
     * loads management home view
     */
    function management() {
        $path = '../';
        include_once('view/management.php');
    }

     /**
     * viewInvitess function manages data model
     * and view for retrieving all the Photos
     * for bookingID
     * records
     */
    function viewPhotos() {

        $path = '../';
        $ProductID = $_GET['id'];
        $db = new EstoreDB();
        $records = $db->getPhotos($ProductID);
        $db->close();
        include_once('view/viewPhotos.php');
    }
     /**
     * addPhotos function manages data model
     * and view for adding a new Photo
     * record
     */
    function addPhoto() {
        $path = '../';
        $ProductID = $_GET['id'];
        if (isset($_POST['addPhoto'])) {

            unset($_POST['addPhoto']);

            $values = [];
            foreach ($_POST as $key => $value) {
                $value = trim($value);
                ${$key} = $value;
            }


            $errors = $this->validatePhoto($_POST);
            $error_messages = [
                "Upload successful",
                "File exceeds maximum upload size specified by default",
                "File exceeds size specified by MAX_FILE_SIZE",
                "File only partially uploaded",
                "Form submitted with no file specified",
                "",
                "No temporary folder",
                "Cannot write file to disk",
                "File type is not permitted"
            ];

            $permitted = ["image/gif", "image/jpg", "image/jpeg", "image/png"];
            // how to retrieve the filename of the image
            $filename = $_FILES["image"]["name"];
            // remove spaces from $filename
            $filename = str_replace(" ", "", $filename);
            // how to retrieve the temporary filename path
            $temp_file = $_FILES["image"]["tmp_name"];
            // how to retrieve the file type (MIME)
            $type = $_FILES["image"]["type"];
            // how to retrieve error value if there is an error
            $errorLevel = $_FILES["image"]["error"];

            // define the upload directory destination
            $destination = $web_path.'/photos/';
            $target_file = $destination . $filename;

            if ($errorLevel > 0) {
                // Set the error message to the errors array
                $errors['image'] = $error_messages[$errorLevel];
                include_once('view/addPhotoForm.php');
            } else {

                if (in_array($type, $permitted)) {

                    // add the values to an array
                    $values = [$PhotoDescription, $filename, $ProductID];

                    if (count($errors) == 0) {
                        move_uploaded_file($temp_file, $target_file);
                        $db = new EstoreDB();
                        $success = $db->addPhoto($values);
                        $db->close();
                        // redirect user to manage bookings page
                        header('location:?action=getProducts');
                    } else {
                        include_once('view/addPhotoForm.php');
                    }
                } else {
                    $errors['image'] = "$filename type is not permitted";
                    include_once('view/addPhotoForm.php');
                }
            }  // end if file error
        } else { // No then display the addRecord form
            include_once('view/addPhotoForm.php');
        }
    }

// end addPhoto
} // end class
