<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

populateQuote();

if($populateQuote = populateQuote()) {

    echo json_encode($populateQuote);

}

?>