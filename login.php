<?php
session_start();

$uname=$_POST['uName'];
$password=$_POST['password'];
echo $uname;
echo $password;

/* Attempt MySQL server connection. Assuming you are running MySQL e server with default setting (user 'root' with no password) */ 
$link = mysqli_connect("localhost", "root", "", "contact_form_db");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM login_credentials WHERE username='$uname' AND password_='$password'";
$result = mysqli_query($link, $sql);

// Check if the query returned any rows
if(mysqli_num_rows($result) == 1) {
    // Login successful
    $_SESSION['username'] = $uname;
    header("location: contact-details.php");
    exit();
} else {
    // Login failed
    echo "Invalid username or password.";
}

// Close connection
mysqli_close($link);

?>