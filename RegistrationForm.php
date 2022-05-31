<?php	

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $qualifcation = $_POST['qual'];
    $password = $_POST['pword'];


    // If validation fails, these functions will return an error message and quit the php script.
    validateFName($fname);
    validateLName($lname);
    validateEmail($email);
    validateMobile($mobile);
    validateGender($gender);
    validateCity($city);
    validateState($state);
    validateQual($qualifcation);
    validatePassword($password);

    try {
        $conn = new mysqli('localhost', 'root', '', 'RegistrationForm');
    }
    catch (Exception $e) {
        die ("error ".$e);
    }

    if (!$conn) {
        die ("error ".mysqli_connect_error());
    }

    //Prevents errors due to not being able to escape special characters - this escapes those characters
    $_POST['fname'] = $conn -> real_escape_string($_POST['fname']);
    $_POST['lname'] = $conn -> real_escape_string($_POST['lname']);
    $_POST['email'] = $conn -> real_escape_string($_POST['email']);

    // If we didn't exit due to a failed validation, we save the form info into a sql database.
    $sql = "INSERT INTO registrationform (firstname, lastname, email, mobile, gender, city, state, qualification, password) values ('"
    .$_POST['fname']."','"
    .$_POST['lname']."','"
    .$_POST['email']."',"
    .$_POST['mobile'].",'"
    .$_POST['gender']."','"
    .$_POST['city']."','"
    .$_POST['state']."','"
    .$_POST['qual']."','"
    .$_POST['pword']."')";


    if (mysqli_query($conn, $sql)) {
        echo "Row Inserted into DB";
    }
    else {
        echo "error inserting row to database";
    }

    mysqli_close($conn);
    
    function validateFName($field) {
        $pattern = "/^[a-zA-Z'.\-\s]{1,30}$/"; 
        if (!preg_match($pattern, $field)) {
            die("error fname");
        }
    }

    function validateLName($field) {
        $pattern = "/^[a-zA-Z'.\-\s]{1,30}$/"; 
       
        if (!preg_match($pattern, $field)) {
            die("error lname");
        }
    }

    function validateEmail($field) {
        $pattern = "/^[a-z0-9'\-_.]+@[a-z0-9]+(\.[a-z]+)*$/"; 
        if (!preg_match($pattern, $field)) {
            die("error email");
        }
    }

    function validateMobile($field) {
        if ($field == "" || strlen($field) > 10 || strlen($field) < 9 ) {
            die("error mobilenum ");
        }
    }

    function validateGender($field) {
        if ($field != "Male" && $field != "Female") {
            die("error gender");
        }
    }

    function validateCity($field) {
        if ($field == "") {
            die("error city");
        }
    }

    function validateState($field) {
        if ($field == "") {
            die("error state");
        }
    }

    function validateQual($field) {
        if ($field == "none") {
            die("error qualification");
        }
    }

    function validatePassword($field) {
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{3,10}$/"; 
        if (!preg_match($pattern, $field)) {
            die("error password");
        }
    }
?>