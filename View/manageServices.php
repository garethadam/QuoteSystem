<?php
session_start();

if($_SESSION['userType'] == "customer"){
    header("Location: ../View/customer_CP.php");
}

require ('../Controller/userSecurityCheck.php');
require ('../View/header.php');
require ('../Model/dbConnect.php');
require ('../Model/database_functions.php');

$adminUsernameLoggedIn = $_SESSION['username'];

?>

<link rel="stylesheet" href="../jquery-ui-1.12.1.tabs/jquery-ui.css">
<link rel="stylesheet" href="../jquery-ui-1.12.1.tabs/jquery-ui.min.css">
<script src="../jquery-ui-1.12.1.tabs/jquery-ui.js"></script>
<script src="../jquery-ui-1.12.1.tabs/jquery-ui.min.js"></script>

<body>

<nav>

    <div id="loginContainer">
        <div>
            <label class="loggedInStyle">Logged in as:</label>
        </div>

        <div>
            <div class="loggedInStyle"><?php echo "$adminUsernameLoggedIn" ?></div><button class="buttonStyle" onclick="runLogout()">Logout</button>
        </div>

    </div>

    <ul>
        <li><a class="hvr-fade" href="admin_CP.php">Admin Home</a></li>
        <li><a class="hvr-fade" href="accountManagement.php">Account Management</a></li>
        <li><a class="hvr-fade" href="manageQuotes.php">Manage Quotes</a></li>
        <li><a class="hvr-fade, activeTab" href="#">Manage Services</a></li>
    </ul>

    <ul class="rslides">
        <li><img src="../img/carpentry.jpg" alt=""></li>
        <li><img src="../img/electrician.jpeg" alt=""></li>
        <li><img src="../img/plumbing.jpg" alt=""></li>
    </ul>

</nav>

<div id="container">

    <header>
        <h1>QuoteSystem - TAFE Project</h1>
        <div id="mobIconContainer">
            <div id="userLogonDD"><img src="../img/user.png" alt="user" onclick="openCloseUserMob()"></div>
            <div id="navDD"><img src="../img/nav.png" alt="nav" onclick="openCloseNavMob()"></div>
        </div>
    </header>

    <div id="loginContainerMobile" class="openCloseMob">
        <div>
            <label class="loggedInStyle">Logged in as:</label>
        </div>

        <div>
            <div class="loggedInStyle"><?php echo "$adminUsernameLoggedIn" ?></div><button class="buttonStyle" onclick="runLogout()">Logout</button>
        </div>
    </div>

    <div>
        <ul id="navContainerMobile" class="openCloseMob">
            <li><a  href="admin_CP.php">Admin Home</a></li>
            <li><a  href="accountManagement.php">Account Management</a></li>
            <li><a  href="manageQuotes.php">Manage Quotes</a></li>
            <li><a  class="activeTab" href="#">Manage Services</a></li>
        </ul>
    </div>

    <section>

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Add Service</a></li>
                <li><a href="#tabs-2">Search Service</a></li>
            </ul>
            <div id="tabs-1">
                <form class="form_style" name="manageServiceForm" method="post" action="../Controller/addServiceProcess.php">
                    <div>
                        <label class="label_style">Job Category:</label><select class="input_style" name="jobCategoryAdd">
                            <option>Please select a Category</option>
                            <?php

                            $jobCatDropDown = getJobCategoryDropDown();

                            foreach($jobCatDropDown as $row):
                                echo "<option value=" . $row['categoryID'] . ">" . $row['jobCategory'] . "</option>";
                            endforeach;

                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="label_style">Service Type:</label><input class="input_style" type="text" name="serviceTypeAdd" placeholder="Service Type">
                    </div>
                    <div>
                        <label class="label_style">Service Time:</label><input class="input_style" type="text" name="serviceTimeAdd" placeholder="Service Time">
                    </div>
                    <div>
                        <label class="label_style">Service Price:</label><input class="input_style" type="text" name="servicePriceAdd" placeholder="Service Price">
                    </div>

                    <button class="buttonStyleThree" type="submit" name="add_services">Add Service to System</button>
                    <button class="buttonStyleThree" type="reset" name="reset_changes_services">Reset Form</button>
                </form>
            </div>
            <div id="tabs-2">
                <form class="form_style" id="searchServiceForm" name="searchServiceForm" method="post" action="#">
                    <div>
                        <label class="label_style">Search:</label><select class="input_style" name="searchServiceInput">
                            <option>Select a Service to search</option>
                            <?php

                            $showServices = showServices();

                            foreach($showServices as $row):
                                echo "<option value=" . $row['serviceID'] . ">" . $row['serviceID'] . "</option>";
                            endforeach;

                            ?>

                        </select>
                        <button class="buttonStyleTwo" type="button" name="searchServiceSubmit" onclick="searchServiceAjax()">Search</button>
                    </div>
                </form>
                <form class="form_style" id="manageServiceForm" name="manageServiceForm" method="post" action="../Controller/updateServiceProcess.php">
                    <div>
                        <label class="label_style">Service ID:</label><input class="input_style" type="text" id="serviceID" name="serviceID" placeholder="Service ID">
                    </div>
                    <div>
                        <label class="label_style">Job Category:</label><input class="input_style" type="text" id="jobCategory" name="jobCategory" placeholder="Job Category">
                    </div>
                    <div>
                        <label class="label_style">Service Type:</label><input class="input_style" type="text" id="serviceType" name="serviceType" placeholder="Service Type">
                    </div>
                    <div>
                        <label class="label_style">Service Time:</label><input class="input_style" type="text" id="serviceTime" name="serviceTime" placeholder="Service Time">
                    </div>
                    <div>
                        <label class="label_style">Service Price:</label><input class="input_style" type="text" id="servicePrice" name="servicePrice" placeholder="Service Price">
                    </div>
                        <button class="buttonStyleThree" type="submit" name="save_changes_services">Save Changes</button>
                        <button class="buttonStyleThree" type="reset" name="reset_changes_services">Reset Form</button>
                </form>
            </div>
        </div>
        </div>
    </section>

    <footer>

        <?php

        include 'footer.php';

        ?>

    </footer>

</div>
</body>
</html>