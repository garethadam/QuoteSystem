<?php
session_start();

if($_SESSION['userType'] == "admin"){
    header("Location: ../View/admin_CP.php");
}

require ('../Controller/userSecurityCheck.php');
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
        <li><a class="hvr-fade, activeTab" href="#">Customer Home</a></li>
        <li><a class="hvr-fade" href="startQuote.php">Start a Quote</a></li>
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
            <li><a  class="activeTab" href="#">Customer Home</a></li>
            <li><a  href="startQuote.php">Start a Quote</a></li>
            <li><a  href="quoteHistory.php">Quote History</a></li>
            <li><a  href="customerDetails.php">Customer Details</a></li>
        </ul>
    </div>

    
    <section>
        <div class="content_example3">display contact us info</div>
        <div class="content_example3"></div>
    </section>

    <footer>

        <?php

        include 'footer.php';

        ?>

    </footer>

</div>
</body>
</html>