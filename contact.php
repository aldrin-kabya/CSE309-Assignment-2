<?php
$fname=$_POST['fName'];
$lname=$_POST['lName'];
$subject=$_POST['subject'];
$email=$_POST['email'];
$city=$_POST['city'];
$cnumber=$_POST['cNumber'];
echo $fname;
echo $lname;
echo $subject;
echo $email;
echo $city;
echo $cnumber;

/* Attempt MySQL server connection. Assuming you are running MySQL e server with default setting (user 'root' with no password) */ 
$link = mysqli_connect("localhost", "root", "", "contact_form_db");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt insert query execution
$sql = "INSERT INTO userinfo (firstName, lastName, subject_, email, city, contactNumber) VALUES ('$fname', '$lname', '$subject', '$email', '$city', $cnumber)";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>