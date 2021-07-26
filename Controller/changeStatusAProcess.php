<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

$quoteID = $_GET['quoteID'];

changeStatusA($quoteID);


