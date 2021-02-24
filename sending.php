<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

//connection
$conn = new mysqli('localhost', 'root', '', 'registering');

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into register (firstname, lastname, age, email, password, gender) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $firstname, $lastname, $age, $email, $password, $gender);
    $stmt->execute();
    echo "You have been sucessfully registered";
    $stmt->close();
    $conn->close();
}
?>