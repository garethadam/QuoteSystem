
<body>

<div class="form_container">
    <form id="regiForm" class="form_style" name="registerForm" method="post" action="./Controller/registerCustomerProcess.php" onsubmit="return registerValidation()">
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
        <button class="buttonStyleThree" onclick="close_Popup()" type="button" name="closePopup">Close</button>

    </form>
</div>
</body>
