<?php

    define("Title", "Our Contacts Page");
    include 'includes/header.php';

?>

    <div id="contact">

        <hr>

        <h1>Contacts Us!</h1>

        <?php

            // Check for header injections

            function  has_header_injection($str) {
                return preg_match("/[\r\n]/", $str);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $msg = $_POST['message'];

                //Check if $name or $email have header injections
                if (has_header_injection($name) || has_header_injection($email)) {
                    die();

                }

                if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["message"])  ) {
                    echo '<h4 class="error">All fields are required</h4>
                    <a href="contact.php" class="button block">Go back and try again</a>';
                    exit;
                }


                // Add the recipient email to a variable
                $to = "your@email.com";

                // Create a subject
                $subject = "$name sent you a message through your Contact form";

                // Construct the message
                $message = "Name: $name\r\n";
                $message = "Email: $email\r\n";
                $message = "Message:\r\n$msg";

                // Check to see if subscribe was checked
                if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {
                    // Add a new line
                    $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
                }

                $message = wordwrap($message, 72);

                //Set the mail headers into a variable
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: type/plain; charset=iso-8859-1\r\n";
                $headers .= "From: $name <$email>\r\n";
                $headers .= "X-Priority: 1\r\n";
                $headers .= "X-MSMail-Priority: High\r\n\r\n";

                // Send the email
                mail ($to, $subject, $message, $headers);

        ?>

        <!-- Show success message if email was sent -->

        <h5>Thank you for contacting us!</h5>
        <p>Please wait up to 24 hours to get a response. We will try to get back to you ASAP.</p>           
        <p><a href="/final" class="button-block">&laquo; Go to Home Page </a></p>

        <?php
            }

            else {
        ?>

        <form method="post" action="" id="contact-form">
            <label form="name">Your name...</label>
            <input type="text" id="name" name="name">

            <label form="email">Your email...</label>
            <input type="email" id="email" name="email">

            <label form="message">What would you like to say to us?</label>
            <textarea id="message" name="message"> </textarea>

            <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
            <label for="name">Subscribe to us</label>

            <input type="submit" class="button next" name="contact-submit" value="Send Message">
        </form>
        
            <?php } ?>

    </div>


<?php


    include 'includes/footer.php';

?>