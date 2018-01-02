<?php
if (isset($_POST['send'])) {
    $to = $_POST['email'];
    $subject = 'Thank You For Contacting The Red Shed';
    $message = 'Your feedback is very important to us.  ';
    $message .= 'Thank you for taking the time to let us know what we are doing well and what we can do better' . "\r\n";
    $message .= '-The Red Shed' ."\r\n\r\n";
    $message .= 'Name: ' . $_POST['name'] . "\r\n\r\n";
    $message .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
    $message .= 'Comments: ' . $_POST['message'];
    $headers = "From: webmaster@theredshedtally.com\r\n";
    $headers .= "Bcc: theredshedtally@gmail.com\r\n";
    $headers .= 'Content-type: text/plain; charset=utf-8';
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {
        $headers .= "\r\nReply-To: $email";
    }
    $success = mail($to, $subject, $message, $headers, '-ftheredshedtally@gmail.com');
}
?>
<!DOCTYPE HTML>
    <html>
        <body>
            <?php if (isset($success) && $success) { ?>
            <h1>Thank You</h1>
            Your message has been sent.
            <?php } else { ?>
            <h1>Oops!</h1>
            Sorry, there was a problem sending your message.
            <?php } ?>
        </body>
    </html>
