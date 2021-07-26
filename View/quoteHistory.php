<?php
session_start();

if($_SESSION['userType'] == "admin"){
    header("Location: ../View/admin_CP.php");
}

require ('../Controller/userSecurityCheck.php');
require ('../View/header.php');
require ('../Model/dbConnect.php');
require ('../Model/database_functions.php');

$customerUsernameLoggedIn = $_SESSION['username'];

// PDF Calls



$pdfCustomerFirstName = pdfCustomerFirstName($customerUsernameLoggedIn);
$pdfCustomerLastName = pdfCustomerLastName($customerUsernameLoggedIn);
$pdfCustomerEmail = pdfCustomerEmail($customerUsernameLoggedIn);
$pdfCustomerPhone = pdfCustomerPhone($customerUsernameLoggedIn);

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
        <li><a class="hvr-fade" href="startQuote.php">Start a Quote</a></li>
        <li><a class="hvr-fade, activeTab" href="#">Quote History</a></li>
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
            <li><a  href="startQuote.php">Start a Quote</a></li>
            <li><a  class="activeTab" href="#">Quote History</a></li>
            <li><a  href="customerDetails.php">Customer Details</a></li>
        </ul>
    </div>


    <section>
        <div id="quoteHistoryMainContainer">
            <div class="quoteHistoryContainer">
                <h3>Quote awaiting processing</h3>
    
                <?php
    
                $customerID = $_SESSION['userID'];

                $showCustomerQuotes = showCustomerQuotesPending($customerID);
                
                foreach($showCustomerQuotes as $row):
                    echo '<span class="spacingCustomer">' . $row['quoteID'] . '<span class="widthSpacing"></span>' . $row['status'] . '<button id="clickView" class="buttonStyleFour" type="submit" name="viewQuote" onclick="viewClick('.$row['quoteID'].')" >View</button></span>';
                endforeach;

                ?>
            </div>
            <div class="quoteHistoryContainer">
                <h3>Approved Quotes</h3>
    
                <?php
    
                $customerID = $_SESSION['userID'];
    
                $showCustomerQuotes = showCustomerQuotesApproved($customerID);

                foreach($showCustomerQuotes as $row):
                    echo '<span class="spacingCustomer">' . $row['quoteID'] . '<span class="widthSpacing"></span>' . $row['status'] . '<button id="clickView" class="buttonStyleFour" type="submit" name="viewQuote" onclick="viewClick('.$row['quoteID'].')" >View</button></span>';
                endforeach;


                ?>
            </div>
            <div class="quoteHistoryContainer">
                <h3>Declined Quotes</h3>
    
                <?php
    
                $customerID = $_SESSION['userID'];
    
                $showCustomerQuotes = showCustomerQuotesDeclined($customerID);

                foreach($showCustomerQuotes as $row):
                    echo '<span class="spacingCustomer">' . $row['quoteID'] . '<span class="widthSpacing"></span>' . $row['status'] . '<button id="clickView" class="buttonStyleFour" type="submit" name="viewQuote" onclick="viewClick('.$row['quoteID'].')" >View</button></span>';
                endforeach;

                ?>
            </div>
            <div class="quoteHistoryContainer">
                <div id="viewQuote" class="showHideSlideRight">
                    <form class="form_style" id="viewQuote" name="viewQuote" action="../Controller/genPDF.php" method="post">
                        <div>
                            <label class="label_style">Quote ID:</label><input class="input_style" type="text" id="quoteID" name="quoteID" value="" readonly>
                        </div>
                        <div>
                            <input id="customerID" name="customerID" type="hidden">
                            <input id="customerUsername" name="customerUsername" type="hidden" value="<?php echo $customerUsernameLoggedIn ?>">
                            <input id="customerFirstName" name="customerFirstName" type="hidden" value="<?php echo $pdfCustomerFirstName ?>">
                            <input id="customerLastName" name="customerLastName" type="hidden" value="<?php echo $pdfCustomerLastName ?>">
                            <input id="customerEmail" name="customerEmail" type="hidden" value="<?php echo $pdfCustomerEmail?>">
                            <input id="customerPhone" name="customerPhone" type="hidden" value="<?php echo $pdfCustomerPhone ?>">
                        </div>
                        <div>
                            <label class="label_style">Job Category:</label><input class="input_style" type="text" id="jobCategory" name="jobCategory" value="" readonly>
                        </div>
                        <div>
                            <label class="label_style">Service Type:</label><input class="input_style" type="text" id="serviceType" name="serviceType" value="" readonly>
                        </div>
                        <div>
                            <label class="label_style">Service Time:</label><input class="input_style" type="text" id="serviceTime" name="serviceTime" value="" readonly>
                        </div>
                        <div>
                            <label class="label_style">Service Price:</label><input class="input_style" type="text" id="servicePrice" name="servicePrice" value=""  readonly>
                        </div>

                        <button type="submit" class="buttonStyleFour">View as PDF</button>
                        <button class="buttonStyleFour" type="button" onclick="closeViewQuote()">Close</button>

                    </form>
                </div>

            </div>


        </div>

        <fieldset id="legendPosition">
            <legend>Legend</legend>
            <div>P = Pending quotes, A = Approved quotes, D = Declined quotes</div>
        </fieldset>


        
    </section>

    <footer>

        <?php

        include 'footer.php';

        ?>

    </footer>

</div>

</body>
</html>