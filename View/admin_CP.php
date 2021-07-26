<?php
session_start();

if($_SESSION['userType'] == "customer"){
    header("Location: ../View/customer_CP.php");
}

require ('../Controller/userSecurityCheck.php');
require ('../Model/dbConnect.php');
require ('../Model/database_functions.php');
require ('../View/header.php');

$adminUsernameLoggedIn = $_SESSION['username'];

$countQuotes = countQuotes();

?>

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
        <li><a class="hvr-fade, activeTab" href="#">Admin Home</a></li>
        <li><a class="hvr-fade" href="accountManagement.php">Account Management</a></li>
        <li><a class="hvr-fade" href="manageQuotes.php">Manage Quotes</a></li>
        <li><a class="hvr-fade" href="manageServices.php">Manage Services</a></li>
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
            <li><a  class="activeTab" href="#">Admin Home</a></li>
            <li><a  href="accountManagement.php">Account Management</a></li>
            <li><a  href="manageQuotes.php">Manage Quotes</a></li>
            <li><a  href="manageServices.php">Manage Services</a></li>
        </ul>
    </div>
    
    <section>
        <div class="content_example3">There are <span class="highlight"><?php echo "$countQuotes" ?></span> quotes that need to be processed, Go to Manage Quotes to begin.</div>
    </section>

    <footer>

        <?php

        include 'footer.php';

        ?>

    </footer>

</div>
</body>
</html>