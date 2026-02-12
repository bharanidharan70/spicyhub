<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Dine-in</title>
  <link rel="icon" href="images/logo.png" type="image/png">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Spicy Hub Restaurant</h1>
    <div class="hamburger" onclick="toggleMenu()">☰</div>
    <nav id="nav-links">
      <a href="index.html">Home</a>
      <a href="menu.html">Menu</a>
      <a href="services.html">Services</a>
      <a href="contact.html">Contact</a>
    </nav>
  </header>
</body>

</html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST['submit'])) {

  $name  = $_POST['name'];
  $email = $_POST['email'];
  $date  = $_POST['date'];

  $mail = new PHPMailer(true);

  try {
    // 🔹 SMTP SETTINGS
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;


    $mail->Username   = 'bharanid134@gmail.com';      // GMAIL
    $mail->Password   = 'fkry qwgn ncph fqnk';      // APP PASSWORD

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;



    // 🔹 EMAIL DETAILS
    $mail->setFrom('bharanid134@gmail.com', 'Spicy Hub Restaurant');
    $mail->addAddress('bharanid134@gmail.com'); //  receive mail

    $mail->isHTML(true);
    $mail->Subject = 'New Dine-In Booking - Spicy Hub';

    $mail->Body = "
  <div style='font-family: Arial, sans-serif; line-height:1.6; color:#333;'>
    
    <h2 style='color:#8b0000;'>🍽️ New Dine-In Booking Received</h2>

    <p>Hello Team,</p>

    <p>
      A new <strong>dine-in table booking</strong> has been successfully placed
      through the <strong>Spicy Hub Restaurant</strong> website.  
      Please find the booking details below 👇
    </p>

    <hr>

    <p>👤 <strong>Customer Name:</strong> $name</p>
    <p>📧 <strong>Email Address:</strong> $email</p>
    <p>📅 <strong>Booking Date:</strong> $date</p>

    <hr>

    <p>
      Kindly contact the customer if any confirmation or follow-up is required.
      We hope this booking leads to a wonderful dining experience 😄
    </p>

    <p>
      Regards,<br>
      <strong>Spicy Hub Restaurant</strong><br>
      🌶️ Authentic South & North Indian Cuisine
    </p>

  </div>
 ";

    $mail->send();
    echo "<h2>✅ Booking Successful! We will contact you soon.</h2>";
  } catch (Exception $e) {
    echo "<h2>❌ Booking failed.</h2>";
    echo "Mailer Error: {$mail->ErrorInfo}";
  }
}

?>