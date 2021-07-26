
function openDelayAdmin(){

    setTimeout(function (){
        window.location.href = "../View/admin_CP.php";}, 2000);
}

function openDelayCustomer(){

    setTimeout(function (){
        window.location.href = "../View/customer_CP.php";}, 2000);
}

function logoutDelay(){
    setTimeout(function (){
        window.location.href = "../index.php";}, 2000);
}

function registerDelay(){
    setTimeout(function (){
        window.location.href = "../index.php";}, 2000);
}

function updateDelay(){
    setTimeout(function (){
        window.location.href = "../View/admin_CP.php";}, 2000);
}

function serviceLoad(){
    setTimeout(function (){
        window.location.href = "../View/manageServices.php";}, 2000);
}

function addQuoteDelay(){

    setTimeout(function (){
        window.location.href = "../View/customer_CP.php";}, 2000);
}

function incorrectUserDelay(){

    setTimeout(function (){
        window.location.href = "../index.php";}, 2000);
}


function runLogout(){
    window.location.href = "../Controller/logoutProcess.php";
}


function loginValidation(){
    
    error = 0;
    error_div.innerHTML = '';
    
    if(!home_username.checkValidity()) {
        error_div.style.display = 'inline-block';
        error_div.innerHTML += 'Please enter a valid username<br/>';
        $('#error_div').delay(4000).fadeOut('slow');
        error++;
    }
    if(home_username.value == ''){
        error_div.style.display = 'inline-block';
        error_div.innerHTML += 'Please enter a username<br/>';
        $('#error_div').delay(4000).fadeOut('slow');
        error++;
    }
    if(!home_password.checkValidity()) {
        error_div.style.display = 'inline-block';
        error_div.innerHTML += 'Please enter a valid password<br/>';
        $('#error_div').delay(4000).fadeOut('slow');
        error++;
    }
    if(home_password.value == ''){
        error_div.style.display = 'inline-block';
        error_div.innerHTML += 'Please enter a password<br/>';
        $('#error_div').delay(4000).fadeOut('slow');
        error++;
    }
    
    if(error == 0) {
        return true;
    } else {
        return false;
    }
}

function registerValidation(){

    error = 0;
    error_div_regi.innerHTML = '';

    if(!customer_Username.checkValidity()) {
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a valid username<br/>';
        error++;
    }
    if(customer_Username.value == ''){
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a username<br/>';
        error++;
    }
    if(!customer_Password.checkValidity()) {
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a valid password<br/>';
        error++;
    }
    if(customer_Password.value == ''){
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a password<br/>';
        error++;
    }
    if(!customer_First_Name.checkValidity()) {
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a valid format (Letters only)<br/>';
        error++;
    }
    if(customer_First_Name.value == ''){
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a first name<br/>';
        error++;
    }
    if(!customer_Last_Name.checkValidity()) {
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a valid format (Letters only)<br/>';
        error++;
    }
    if(customer_Last_Name.value == ''){
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a last name<br/>';
        error++;
    }
    if(!customer_Email.checkValidity()) {
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a valid email (Example: email@email.com)<br/>';
        error++;
    }
    if(customer_Email.value == ''){
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter an email<br/>';
        error++;
    }
    if(!customer_Phone.checkValidity()) {
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a valid phone number (Example: 400000000)<br/>';
        error++;
    }
    if(customer_Phone.value == ''){
        error_div_regi.style.display = 'inline-block';
        error_div_regi.innerHTML += 'Please enter a phone number<br/>';
        error++;
    } 

    if(error == 0) {
        return true;
    } else {
        return false;
    }
}

// --- Ajax functions --- //

function searchCustomerAjax(){
    $.ajax({
        url: '../Controller/searchCustomerProcess.php',
        method: 'POST',
        data: $('#searchCustomerForm').serialize(),
        dataType: 'json',
        success: function searchCustomer(searchData){

        for (var key in searchData) {
            var outdata = '';
            for (var subkey in searchData[key]) {
                document.getElementById(subkey).value = searchData[key][subkey];
                outdata += subkey + ' ' + searchData[key][subkey] + ' ';
            }
        }
            $("#searchCustomer").toggleClass('slideRightAnimation');
    }
    });
}

function searchServiceAjax(){
    $.ajax({
        url: '../Controller/searchServiceProcess.php',
        method: 'POST',
        data: $('#searchServiceForm').serialize(),
        dataType: 'json',
        success: function searchService(searchData){

            for (var key in searchData){
                var outdata = '';
                for (var subkey in searchData[key]){
                    document.getElementById(subkey).value = searchData[key][subkey];
                    outdata += subkey + ' ' + searchData[key][subkey] + ' ';
                }
            }
        }
    });
}

function searchQuoteAjax() {
    $.ajax({
        url: '../Controller/searchQuoteProcess.php',
        method: 'POST',
        data: $('#searchQuoteForm').serialize(),
        dataType: 'json',
        success: function searchQuote(searchData) {

            for (var key in searchData) {
                var outdata = '';
                for (var subkey in searchData[key]) {
                    document.getElementById(subkey).value = searchData[key][subkey];
                    outdata += subkey + ' ' + searchData[key][subkey] + ' ';
                }
            }
            $("#searchQuote").toggleClass('slideRightAnimation');
        }
    });
}

$(document).ready(function () {
    $('#jobCategory').change(function () {

        $('#serviceType').empty();

        var jobCatDropDown = document.getElementById('jobCategory').value;

        $.ajax({
            url: '../Controller/serviceTypeSelectProcess.php',
            dataType: 'json',
            success: function serviceTypeDropDown(sTDropDown) {
                for (var a = 0; a < sTDropDown.length; a++) {
                    if (sTDropDown[a].categoryID == jobCatDropDown) {
                        $('#serviceType').append('<option value="' + sTDropDown[a].serviceType + '">' + sTDropDown[a].serviceType + '</option>');
                    }
                }
            }
        });
    });
});

$(document).ready(function (){
    $('#serviceType').change(function(){

        var startQuotePopulate = document.getElementById('serviceType').value;

            $.ajax({
                url: '../Controller/populateQuoteProcess.php',
                dataType: 'json',
                success: function populateQuote(popQuote) {

                    for (var a = 0; a < popQuote.length; a++) {
                        if (popQuote[a].serviceType == startQuotePopulate) {
                            $('#serviceTime').html('<input value="' + popQuote[a].serviceTime + '">').val('' + popQuote[a].serviceTime + '');
                            $('#servicePrice').html('<input value="' + popQuote[a].servicePrice + '">').val('' + popQuote[a].servicePrice + '');
                        }
                    }
                }
            });
    });
});

function viewClick($quoteID){
    $.ajax({
        url: '../Controller/viewQuoteProcess.php?quoteID='+$quoteID,
        dataType: 'json',
        method: 'GET',
        success: function viewQuote(viewData) {

            for (var key in viewData) {
                var outdata = '';
                for (var subkey in viewData[key]) {
                    document.getElementById(subkey).value = viewData[key][subkey];
                    outdata += subkey + ' ' + viewData[key][subkey] + ' ';
                }
            }
            $("#viewQuote").toggleClass('slideRightAnimation');
        }
    });
}

function changeStatusA($quoteID){

    $.ajax({
        url: '../Controller/changeStatusAProcess.php?quoteID='+$quoteID,
        dataType: 'json',
        method: 'GET',
        success: function changeStatusA() {
        }
    });

        $("#quoteApproved").fadeIn().delay(1500).fadeOut();

        setTimeout(function(){
            window.location.reload();
        }, 3000);
}

function changeStatusD($quoteID){

    $.ajax({
        url: '../Controller/changeStatusDProcess.php?quoteID='+$quoteID,
        dataType: 'json',
        method: 'GET',
        success: function changeStatusD() {
        }
    });
        $("#quoteDeclined").fadeIn().delay(1500).fadeOut();

        setTimeout(function(){
            window.location.reload();
        }, 3000);
}

//    Mobile Menus (User and Nav)    //

function openCloseUserMob(){
    
        if( document.getElementById('loginContainerMobile').style.display === 'block' )
            document.getElementById('loginContainerMobile').style.display = "none";
        else
            document.getElementById('loginContainerMobile').style.display = "block";

    $('#loginContainerMobile').toggleClass('openCloseUserMob');
    
}

function openCloseNavMob(){

    if( document.getElementById('navContainerMobile').style.display === 'block' )
        document.getElementById('navContainerMobile').style.display = "none";
    else
        document.getElementById('navContainerMobile').style.display = "block";

    $('#navContainerMobile').toggleClass('openCloseUserMob');

}


// Open Close //

function regiForm(){

    $("#regiForm").toggleClass('slideRightAnimation');

}

function regiFormClose(){
    document.getElementById('error_div_regi').style.display = 'none';
    $("#regiForm").toggleClass('slideRightAnimation');
}

//--     CSS animation functions     --//

function closeViewQuote(){

    $("#viewQuote").toggleClass('slideRightAnimation');
}

//--     Slider     --//

$(document).ready(function () {
    $(".rslides").responsiveSlides();
});

//--     Tabs     --//

$(document).ready(function () {
        $("#tabs").tabs();
});

