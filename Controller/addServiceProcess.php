<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');
include ('../View/header.php');

$categoryID = $_POST['jobCategoryAdd'];
$serviceType = $_POST['serviceTypeAdd'];
$serviceTime = $_POST['serviceTimeAdd'];
$servicePrice = $_POST['servicePriceAdd'];

$result =  addService($categoryID, $serviceType, $serviceTime, $servicePrice);

if($result){

    echo '<div class="loading_style">Service has been successfully Added.</div>';

    echo '<script type="text/javascript">serviceLoad()</script>';

}

?>
