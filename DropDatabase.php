<?php
try {
    $conn = new mysqli('localhost', 'root', '', 'registrationform');
}
catch (Exception $err) {
    die ("Error ".$err);
}

if (!$conn) {
    die ("Error: No connection check XAMPP. <br />".mysqli_connect_error());
}

echo "Database Connected successfully. <br />";

$sql = "DROP DATABASE RegistrationForm";

if (mysqli_query($conn, $sql)) {
    echo "Database dropped successfully.  <br />";
}
else {
    echo "Error dropping database. <br />";
}
mysqli_close($conn);
echo "Connection closed successfully .<br />";
?>