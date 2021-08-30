

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
    
    $first_name = $_POST['first_name']; // required
 
    $last_name = $_POST['last_name']; // required
 
    $email_from = $_POST['email']; // required
 
    $phone = $_POST['phone']; // not required

    $plot_breadth = $_POST['plot_breadth']; // required
 
    $plot_length = $_POST['plot_length']; // required
 
    $floor = $_POST['floor']; // required
 
    $plot_location = $_POST['plot_location']; // not required
 
     

   $message2 = "Dear ".  $first_name . " " . $last_name . "," . "\n\n" ."Thank you for contacting us! We will get back to you shortly" . "\n\n" . "Regards," . "\n" . "Assurehomes";
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 $email_subject = "Assure Homes - Enquiry from $first_name  $last_name";
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<li><p>The completed e-mail address appears to be incorrect<p></li>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= '<li><p>First name appears to be wrong</p></li>';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= '<li><p>Last name appears to be wrong</p></li>';
 
  }
 


  // if(strlen($message) < 2) {
 
  //   $error_message .= '<li><p>Message appears to be incorrect</p></li>';
 
  // }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details are given below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
  
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email Adress: ".clean_string($email_from)."\n";
 
    $email_message .= "Phone: ".clean_string($phone)."\n";

    $email_message .= "Plot Breadth: ".clean_string($plot_breadth)."\n";
 
    $email_message .= "Plot Length: ".clean_string($plot_length)."\n";
 
    $email_message .= "No. of Floors: ".clean_string($floor)."\n";
 
    $email_message .= "Plot Location: ".clean_string($plot_location)."\n";
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
  "CC: emam@cdsoft.in" . "\r\n" .
'X-Mailer: PHP/' . phpversion();
 $headers2 = "From: ". $email_to; //this will receiev to client
@mail($email_to, $email_subject, $email_message, $headers);  
@mail($email_from, $subject2, $message2, $headers2); //send email to user as well

    //redirect
     header("Location:thanku.html");
    //  if ($email_to->send()) {
    //         Redirect_to("about.html");
    //     } else {
    //         Redirect_to("index.html");
    //     }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex flex-column justify-content-center align-items-center" style="width:100%; height:100vh;">
      <div class="d-flex flex-column justify-content-center align-items-center">
<i class="fa fa-check-circle fa-5x text-center" style="color:#26a50b;" aria-hidden="true" ></i>
<h1 class="text-center">Thank you for your message!</h1> <h6 class="text-center">We will contact you as soon as possible.</h6> 
    </div>
      </div>

<?php
echo nl2br($errors);
//redirect
 //header("Location:index.html");

?>


</body>
</html>
 
<?php
 
}
 
?>