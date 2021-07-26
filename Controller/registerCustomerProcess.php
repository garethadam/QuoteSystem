<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');
include ('../View/header.php');

$username = $_POST['customer_Username'];
$password = $_POST['customer_Password'];
$firstname = $_POST['customer_First_Name'];
$lastname = $_POST['customer_Last_Name'];
$email = $_POST['customer_Email'];
$phone = $_POST['customer_Phone'];

$result =  registerCustomer($username, $password, $firstname, $lastname, $email, $phone);

if($result){

    echo '<div class="loading_style">Your account has been created successfully.</br> You are now able to login.</div>';

    echo '<script type="text/javascript">registerDelay()</script>';

}

?>
