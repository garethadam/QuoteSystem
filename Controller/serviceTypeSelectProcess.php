<?php

session_start();

require ('../Model/dbConnect.php');
require('../Model/database_functions.php');

getServiceTypeDropDown();

if($serviceTypeDropDown = getServiceTypeDropDown()) {

    echo json_encode($serviceTypeDropDown);

}

?>