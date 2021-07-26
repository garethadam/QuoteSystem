<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

$searchQuote = $_POST['quoteSearchInput'];

searchQuote($searchQuote);

if($result = searchQuote($searchQuote)){

    echo json_encode($result);

}

