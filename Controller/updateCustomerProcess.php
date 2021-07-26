<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');
include ('../View/header.php');

$customerID = $_POST['customerID'];
$username = $_POST['customerUsername'];
$password = $_POST['customerPass'];
$firstName = $_POST['customerFirstName'];
$lastName = $_POST['customerLastName'];
$email = $_POST['customerEmail'];
$phone = $_POST['customerPhone'];

$result =  updateCustomer($customerID, $username, $password, $firstName, $lastName, $email, $phone);

if($result){
    
    echo '<div class="loading_style">The update has been made successfully.</div>';

    echo '<script type="text/javascript">updateDelay()</script>';
    
}

?>