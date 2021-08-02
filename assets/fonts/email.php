

<?php
 
if(isset($_POST['email'])) {
 
 
    $email_to = "anilkumawatk94@gmail.com";
 
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
 
    // $message = $_POST['message']; 
 
     
  $message2 = "Dear ".  $first_name . " " . $last_name . "," . "\n\n" ."Thank you for contacting us! We will get back to you shortly";  
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	 $email_subject = "Enquiry from $first_name  $last_name for homes";
 
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
 
    // $email_message .= "Message: ".clean_string($message)."\n";
 
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 $headers2 = "From: ". $email_to; //this will receiev to client
@mail($email_to, $email_subject, $email_message, $headers);  
@mail($email_from, $subject2, $message2, $headers2); //send email to user as well

  //redirect
 // header('Location: index.html');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
     
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
        integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
	<title>Contact form handler</title>
</head>
<body>
      
    
<div class="contaiver" style="margin-top:10rem;">
  <div class="row">
    <div class="col-6 mx-auto">
      <div class="row">
        <div class="col-12 mt-5 d-flex flex-column align-items-center justify-content-center">
            <i class="fas fa-check-circle fa-8x" style="color:#00A300;"></i>
        <h1 class="text-center">Thank you for your message!</h1> <h6  class="text-center text-primary">We will get back to you as soon as possible</h6>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>
 
<?php
 
}
 
?>