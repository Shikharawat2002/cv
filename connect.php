<?php
$server = "localhost";
$username ="root";
$password = "";
$dbname = "test"; 

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//database connection
$conn = new mysqli($server,$username,$password,$dbname);
if($conn-> connect_error){
    die ('connection Failed: '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO portfolio.cv (`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?);");
    $stmt->bind_param("ssss", $name,$email,$subject,$message);
    $stmt->execute();
    echo "Registration Successfuly....";
    $stmt->close();
    $conn->close();
}
?>