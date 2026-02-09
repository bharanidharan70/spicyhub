<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];

    $to = "bharanid134@gmail.com"; 
    $subject = "New Dine-In Booking – Spicy Hub";

    $body = "
    New Dine-In Booking Received\n
    Name: $name\n
    Email: $email\n
    Date: $date
    ";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<h2>Booking Successful! We will contact you soon.</h2>";
    } else {
        echo "<h2>Booking failed. Please try again.</h2>";
    }
}
?>
