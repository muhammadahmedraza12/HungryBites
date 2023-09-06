<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];


//database connection

$conn = new mysqli('localhost','root','','bookingdatabase');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

}else{
    $stmt = $conn->prepare("insert into bookingtables(name,email,number,message)
    values(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$number,$message);
    $stmt->execute();
    header("Location: thankyou.html");
    $stmt->close();
    $conn->close();

}

?>