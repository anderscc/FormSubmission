$(document).ready(function () {
    $('#registerForm').submit(function (e) {
        e.preventDefault();


        //declare variables for form input areas
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var password = $('#pword').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var fnameResponse = $("#fnameResponse");
        var lnameResponse = $("#lnameResponse");
        var emailResponse = $("#emailResponse");
        var mobileResponse = $('#mobileResponse');
        var passwordResponse = $("#pwordResponse");
        var cityResponse = $("#cityResponse");
        var stateResponse = $("#stateResponse");
        var gender;
        var genderResponse = $("#genderResponse");
        var qual;
        var qualResponse = $("#qualResponse");

        //function to check for Gender and store value
        function checkGender() {

            var genderValue = document.querySelector('input[name="gender"]:checked');
            if (genderValue == null) {
                genderResponse.text("Gender must be selected!").show()
                return true;
            }
            gender = genderValue.id;

            if (gender == "male") {
                genderResponse.text("Correct").show();
                return false;
            }
            else if (gender == "female") {
                genderResponse.text("Correct").show();
                return false;
            }
            else {
                genderResponse.text("Error").show();
                return true;
            }
        }


        function checkfName() {
            const re = /^[a-zA-Z'.\-\s]{1,30}$/;
            checkValidation = RegExp(re).test(fname);
            if (fname == "" || checkValidation == "false") {
                fnameResponse.text("Error").show();
                return true;
            }
            else {
                fnameResponse.text('Correct').show();
                return false;
            }
        }


        //function to see if Last name is Valid
        function checklName() {
            const re = /^[a-zA-Z'.\-\s]{1,30}$/;
            checkValidation = RegExp(re).test(lname);
            if (lname == "" || checkValidation == "false") {
                lnameResponse.text('Error').show();
                return true;
            }
            else {
                lnameResponse.text('Correct').show();
                return false;
            }
        }


        //function to check Email
        function checkEmail() {
            const re = /^[a-z0-9'\-_.]+@[a-z0-9]+(\.[a-z]+)*$/;
            checkValidation = RegExp(re).test(email);
            if (email == "" || checkValidation == "false") {
                emailResponse.text('Error').show();
                return true;
            }
            else {
                emailResponse.text('Correct').show();
                return false;
            }
        }


        //function to see if Mobile is valid
        function checkMobile() {
            if (mobile == "" || mobile.length > 10 || mobile.length < 9) {
                mobileResponse.text('Error').show();
                return true;
            }
            else {
                mobileResponse.text('Correct').show();
                return false;
            }
        }



        //function to see if City is Valid
        function checkCity() {
            if (city == "") {
                cityResponse.text('Error').show(); // MOBILE is CURRENTLY NOT DISPLAYING ERROR. DOUBLE CHECK THIS
                return true;
            }
            else {
                cityResponse.text('Correct').show();
                return false;
            }
        }


        //function to see if State is Valid
        function checkState() {
            if (state == "") {
                stateResponse.text('Error').show();
                return true;
            }
            else {
                stateResponse.text('Correct').show();
                return false;
            }
        }


        //function to store Qualifcation and ensure it is selected
        function qualCheck() {
            qual = document.getElementById('qual').value;
            if (qual == "qualplacehold") {
                qualResponse.text('Error').show();
                return true;
            } else {
                qualResponse.text('Correct').show();
                return false;
            }
        }


        //function to see if Passowrd name is Valid
        function checkPassword() {
            const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{3,10}$/;
            checkValidation = RegExp(re).test(email);
            if (password == "" || checkValidation == "false") {
                passwordResponse.text('Error').show();
                return true;
            }
            else {
                passwordResponse.text('Correct').show();
                return false;
            }
        }

        let errors = 0;
        errors += checkfName(); // call to function to see if first name is valid
        errors += checkGender();//call to function
        errors += checklName(); //call to function
        errors += checkEmail(); //call to function
        errors += checkMobile(); //call to function
        errors += checkCity(); //call to function
        errors += checkState(); //call to function
        errors += checkPassword(); //call to function
        errors += qualCheck();

        if (errors > 0) {
            alert("Please double check inputs again for errors!");
        }

        document.getElementById('registerForm').submit();

    })


})

