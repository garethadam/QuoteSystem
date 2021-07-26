<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

$searchUsername = $_POST['searchCustomerOption'];

searchCustomer($searchUsername);

if($result = searchCustomer($searchUsername)){

    echo json_encode($result);

}

