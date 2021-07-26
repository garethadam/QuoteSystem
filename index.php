<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quote System</title>
    <link href="./css/style.css" type="text/css" rel="stylesheet">
    <script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/responsiveslides.min.js" type="text/javascript"></script>
    <noscript>
        <div id="noScriptStyle">Javascript is not enabled, Please enable or change browser.</div>
    </noscript>
</head>
<body>

<nav>
    
    <div id="loginContainerDesktop" class="openCloseUserMob">
        <form id="loginStyle" name="homeLoginForm" method="post" action="Controller/processUser.php" onSubmit="return loginValidation();" novalidate>
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
        <li><a class="hvr-fade, activeTab" href="#">Home</a></li>
        <li><a class="hvr-fade" href="View/services.php">Services</a></li>
        <li><a class="hvr-fade" href="View/contactUS.php">Contact Us</a></li>
    </ul>

    <ul class="rslides">
        <li><img src="img/carpentry.jpg" alt=""></li>
        <li><img src="img/electrician.jpeg" alt=""></li>
        <li><img src="img/plumbing.jpg" alt=""></li>
    </ul>

</nav>

<div id="container">

    <header>
        <h1>QuoteSystem - TAFE Project</h1>
        <div id="mobIconContainer">
            <div id="userLogonDD"><img src="img/user.png" alt="user" onclick="openCloseUserMob()"></div>
            <div id="navDD"><img src="img/nav.png" alt="nav" onclick="openCloseNavMob()"></div>
        </div>
    </header>

    <div id="loginContainerMobile" class="openCloseMob">
        <form id="loginStyle" name="homeLoginForm" method="post" action="Controller/processUser.php" onSubmit="return loginValidation();" novalidate>
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
            <li><a  class="activeTab" href="#">Home</a></li>
            <li><a  href="View/services.php">Services</a></li>
            <li><a  href="View/contactUS.php">Contact Us</a></li>
        </ul>
    </div>

    <section>
        <div class="content_example2">Business Overview</div>
        <div class="content_example2">Click here for register form<button class="buttonStyleTwo" type="button" name="open_registration" onclick="regiForm()">Click to Register</button></div>
    </section>

    <div id="regiForm" class="form_container, showHideSlideRight">
        <form  class="form_style" name="registerForm" method="post" action="./Controller/registerCustomerProcess.php" onsubmit="return registerValidation()">
            <div>
                <label class="label_style">Username:</label><input class="input_style" type="text" id="customer_Username" name="customer_Username" placeholder="Username" pattern="^[A-Za-z0-9]+$">
            </div>
            <div>
                <label class="label_style">Password:</label><input class="input_style" type="text" id="customer_Password" name="customer_Password" placeholder="Password" pattern="^[A-Za-z0-9]+$">
            </div>
            <div>
                <label class="label_style">First Name:</label><input class="input_style" type="text" id="customer_First_Name" name="customer_First_Name" placeholder="First Name" pattern="^[A-Za-z0-9]+$">
            </div>
            <div>
                <label class="label_style">Last Name:</label><input class="input_style" type="text" id="customer_Last_Name" name="customer_Last_Name" placeholder="Last Name" pattern="^[A-Za-z0-9]+$">
            </div>
            <div>
                <label class="label_style">Email:</label><input class="input_style" type="email" id="customer_Email" name="customer_Email" placeholder="Email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
            </div>
            <div>
                <label class="label_style">Phone:</label><input class="input_style" type="text" id="customer_Phone" name="customer_Phone" placeholder="Phone" pattern="^[0-9].{1,10}+$">
            </div>

            <button class="buttonStyleThree" type="submit" name="register">Register!</button>
            <button class="buttonStyleThree" type="reset" name="reset_changes">Reset Form</button>
            <button class="buttonStyleThree" onclick="regiFormClose()" type="button" name="closeRegi">Close</button>

        </form>
        <div id="error_div_regi"></div>
    </div>

    <footer>

        <?php

        include 'View/footer.php';

        ?>

    </footer>

</div>
</body>
</html>