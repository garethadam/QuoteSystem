<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

$viewQuote = $_GET['quoteID'];

viewQuote($viewQuote);

    if ($result = viewQuote($viewQuote)) {

        echo json_encode($result);

}

