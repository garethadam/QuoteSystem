<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');
include ('../View/header.php');



$customerID = $_SESSION['userID'];
$jobCategory = $_POST['jobCategory'];
$serviceType = $_POST['serviceType'];
$serviceTime = $_POST['serviceTime'];
$servicePrice = $_POST['servicePrice'];


$createQuote = createQuote($customerID);

$addQuoteResult =  addQuote($jobCategory, $serviceType, $serviceTime, $servicePrice);

if($addQuoteResult){

    echo '<div class="loading_style">Your quote has been submitted.</br>Your quote will be processed within 2 business days.</div>';

    echo '<script type="text/javascript">addQuoteDelay()</script>';

}


