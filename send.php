<?php 

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

if (!empty($firstname) || !empty($lastname) || !empty($age) || !empty($email) || !empty($password) || !empty($gender)) {

    $host="localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "registering";

    //create the connection

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname );

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (firstname, lastname, age, email, password, gender) values(?, ?, ?, ?, ?, ?)";

        //Make statement 
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssisss", $firstname, $lastname, $age, $email, $password, $gender);
        $stmt->execute();
        echo "Your information has been sucessfully added. Thank you for registering";
        } else {
            echo "Your email is not unique. Please use a different email";
            }
            $stmt->close();
            $conn->close();
            }
        } else {
            echo "You must enter data into all fields";
            die();
        }
?> 

<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css"> 
</head>   

<br> <br>
<button type="button" class="btn btn-primary"> <a href="C:/Users/skaiw/Desktop/SCHOOL/Programming/Form/form.html" target="_blank"> Return to form </a> </button>


</html>