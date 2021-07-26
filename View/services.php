<?php

require ('../View/header.php');

?>
<body>

<nav>

    <div id="loginContainerDesktop" class="openCloseUserMob">
        <form id="loginStyle" name="homeLoginForm" method="post" action="../Controller/processUser.php" onSubmit="return loginValidation();" novalidate>
            <div>
                <label class="loginLabelStyle" >Username:</label><input class="loginInputStyle" type="text" id="home_username" name="home_username" placeholder="Username" pattern="^[A-Za-z0-9]+$">
            </div>

            <div>
                <label class="loginLabelStyle" >Password:</label><input class="loginInputStyle" type="password" id="home_password" name="home_password" placeholder="Password" pattern="^[A-Za-z0-9]+$">
            </div>
            <div>
                <button class="buttonStyle" type="submit" name="home_login_submit">Login</button>
            </div>
        </form>
    </div>

    <div id="error_div"></div>

    <ul>
        <li><a class="hvr-fade" href="../index.php">Home</a></li>
        <li><a class="hvr-fade, activeTab" href="#">Services</a></li>
        <li><a class="hvr-fade" href="../View/contactUS.php">Contact Us</a></li>
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
        <form id="loginStyle" name="homeLoginForm" method="post" action="../Controller/processUser.php" onSubmit="return loginValidation();" novalidate>
            <div>
                <label class="loginLabelStyle" >Username:</label><input class="loginInputStyle" type="text" id="home_username" name="home_username" placeholder="Username" pattern="^[A-Za-z0-9]+$">
            </div>

            <div>
                <label class="loginLabelStyle" >Password:</label><input class="loginInputStyle" type="password" id="home_password" name="home_password" placeholder="Password" pattern="^[A-Za-z0-9]+$">                <button class="buttonStyle" type="submit" name="home_login_submit">Login</button>
            </div>
        </form>
    </div>

    <div>
        <ul id="navContainerMobile" class="openCloseMob">
            <li><a  href="../index.php">Home</a></li>
            <li><a  class="activeTab" href="#">Services</a></li>
            <li><a  href="../View/contactUS.php">Contact Us</a></li>
        </ul>
    </div>

    <section>
        <div class="content_example3">Service Listing</div>
        <div class="content_example3">Service Listing</div>
    </section>

    <footer>

        <?php

        include 'footer.php';

        ?>

    </footer>

</div>


</body>
</html>