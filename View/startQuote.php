<?php
session_start();

if($_SESSION['userType'] == "admin"){
    header("Location: ../View/admin_CP.php");
}

require ('../Controller/userSecurityCheck.php');
require ('../Model/dbConnect.php');
require ('../Model/database_functions.php');
require ('../View/header.php');

$customerUsernameLoggedIn = $_SESSION['username'];

?>

<body>

<nav>

    <div id="loginContainer">
        <div>
            <label class="loggedInStyle">Logged in as:</label>
        </div>

        <div>
            <div class="loggedInStyle"><?php echo "$customerUsernameLoggedIn" ?></div><button class="buttonStyle" onclick="runLogout()">Logout</button>
        </div>
        
    </div>

    <ul>
        <li><a class="hvr-fade" href="customer_CP.php">Customer Home</a></li>
        <li><a class="hvr-fade, activeTab" href="#">Start a Quote</a></li>
        <li><a class="hvr-fade" href="quoteHistory.php">Quote History</a></li>
        <li><a class="hvr-fade" href="customerDetails.php">Customer Details</a></li>
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
            <div class="loggedInStyle"><?php echo "$customerUsernameLoggedIn" ?></div><button class="buttonStyle" onclick="runLogout()">Logout</button>
        </div>
    </div>

    <div>

        <ul id="navContainerMobile" class="openCloseMob">
            <li><a  href="customer_CP.php">Customer Home</a></li>
            <li><a  class="activeTab" href="#">Start a Quote</a></li>
            <li><a  href="quoteHistory.php">Quote History</a></li>
            <li><a  href="customerDetails.php">Customer Details</a></li>
        </ul>
    </div>
    
    <section>

        <div class="form_container">
            <form class="form_style" name="manageServiceForm" method="post" action="../Controller/addQuoteProcess.php">
                <div>
                    <label class="label_style">Job Category:</label><select class="input_style" id="jobCategory" name="jobCategory">
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
                    <label class="label_style">Service Type:</label>
                    <select id="serviceType" class="input_style" name="serviceType">
                        <option>Please select a Service Type</option>
                    </select>
                </div>
                <div>
                    <label class="label_style">Service Time:</label><input class="input_style" type="text" id="serviceTime" name="serviceTime" placeholder="service Time" readonly>
                </div>
                <div>
                    <label class="label_style">Service Price:</label><input class="input_style" type="text" id="servicePrice" name="servicePrice" placeholder="service Price" readonly>
                </div>

                <button class="buttonStyleThree" type="submit" name="add__services">Request Quote</button>
                <button class="buttonStyleThree" type="reset" name="reset_changes_services">Reset Quote Form</button>
            </form>
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