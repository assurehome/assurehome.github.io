<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$message= $_POST['message'];
$to = "anilkumawatk94@gmail.com";
$subject = "Mail From Customber";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Phone = " . $phone . "\r\n Message =" . $message;
$headers = "From: anilkumawat791@gmail.com" . "\r\n" .
"CC: emam@cdsoft.in";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:index.html");
?>