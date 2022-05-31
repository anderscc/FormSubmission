<?php 
    
    try {
        $conn = new mysqli('localhost', 'root', '');
    }
    catch (Exception $e) {
        die ("Error: ".$e);
    }
    
    if (!$conn) {
        die ("error <br />".mysqli_connect_error());
    }
    
    echo "DB Connected<br />";
    
    $sql = "CREATE DATABASE RegistrationForm";
    
    if (mysqli_query($conn, $sql)) {
        echo "Database Created<br />";
    }
    else {
        echo "error creating database<br />";
    }
    
    mysqli_close($conn);

    $conn = new mysqli('localhost', 'root', '', 'RegistrationForm');

    
    $createTable = "CREATE TABLE RegistrationForm(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR (255) NOT NULL,
    email VARCHAR(255) NOT NULL, 
    gender VARCHAR(6) NOT NULL,
    mobile INT(10) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR (255) NOT NULL,
    qualification VARCHAR (255) NOT NULL,
    password VARCHAR (255) NOT NULL
    )";


    if (mysqli_query($conn, $createTable)) {
        echo "Table Created<br />";
    }
    else {
        echo "error creating Table<br />";
    }

mysqli_close($conn);


?>