

<?php
 
if(isset($_POST['email'])) {
 
 
    $email_to = "damu@cdsoft.in";
 
      $subject2 = "your message submitted successfully"; //this is for client
 
     
 
     
 
    function died($error) {
        echo "<h1>Whoops!</h1><h2>There appears to be something wrong with your completed form.</h2>";
 
        echo "<strong><p>The following items are not specified correctly.</p></strong><br />";
 
        echo $error."<br /><br />";
 
        echo "<p>Return to the form and try again.</p><br />";
		echo "<p><a href='index.php'>return to the homepage</a></p>";
        die();
		
 
    }
  
 
    $fullname = $_POST['fullname']; // required
 
    $email_from = $_POST['email']; // required
 
    $phone = $_POST['phone']; // not required
 
    $message = $_POST['message']; // required
 
     
 $message2 = "Dear ".  $fullname .  "," . "\n\n" ."Thank you for contacting us! We will get back to you shortly" . "\n\n" . "Regards," . "\n" . "More Fine";   
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	 $email_subject = "Enquiry from $fullname for accounting";
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<li><p>The completed e-mail address appears to be incorrect<p></li>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$fullname)) {
 
    $error_message .= '<li><p>First name appears to be wrong</p></li>';
 
  }
 
  if(!preg_match($string_exp,$fullname)) {
 
    $error_message .= '<li><p>Last name appears to be wrong</p></li>';
 
  }
 


  if(strlen($message) < 2) {
 
    $error_message .= '<li><p>Message appears to be incorrect</p></li>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details are given below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 

 
    $email_message .= "Full Name: ".clean_string($fullname)."\n";
 
    $email_message .= "Email Adress: ".clean_string($email_from)."\n";
 
    $email_message .= "Phone: ".clean_string($phone)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 "CC: emam@cdsoft.in" . "\r\n" .
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 $headers2 = "From: ". $email_to; //this will receiev to client
@mail($email_to, $email_subject, $email_message, $headers);  
@mail($email_from, $subject2, $message2, $headers2); //send email to user as well
	   //redirect
   header("Location:thanku.html");
?>
 
 
<h1>Thank you for your message!</h1> <h2>We will contact you as soon as possible.</h2>

 
<?php
 
}
 
?>