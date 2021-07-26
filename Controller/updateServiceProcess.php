<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');
include ('../View/header.php');

$serviceID = $_POST['serviceID'];
$serviceType = $_POST['serviceType'];
$serviceTime = $_POST['serviceTime'];
$servicePrice = $_POST['servicePrice'];

$result =  updateService($serviceID, $serviceType, $serviceTime, $servicePrice);

if($result){
    
    echo '<div class="loading_style">The update has been made successfully.</div>';

    echo '<script type="text/javascript">updateDelay()</script>';
    
}

?>