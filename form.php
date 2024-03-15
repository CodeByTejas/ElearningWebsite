<?php
if(isset($_POST['submit'])) {
    // specify the recipient email address
    $to = "gguptatejas86@gmail.com";

    // get the form data using $_POST
    $name = $_POST['text'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['description'];

    // create the email message
    $subject = "New Message from $name";
    $body = "Name: $name\nNumber: $number\nEmail: $email\nMessage: $message";

    // set the headers for the email
    $headers = "From: $email";

    // send the email using the mail() function
    if(mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent successfully.";
    } else {
        echo "There was a problem sending your message. Please try again later.";
    }
}
?>
