<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

$searchService = $_POST['searchServiceInput'];

searchService($searchService);

if($result = searchService($searchService)){

    echo json_encode($result);

}

?>  