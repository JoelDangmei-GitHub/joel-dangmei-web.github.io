<?php
    if (isset($_POST["submit"])) {
        $name = $_GET["name"];
        $email = $_GET["email"];
        $subject = $_GET["subject"];
        $message = $_GET["message"];
        $mail_to = "contact.joelcookiedesk@gmail.com";
        $header = "From ".$email;
        $content = "You have recieved a mail from ".$name.".\n\n".$message;
        mail($mail_to, $subject, $content, $header);
        header("Location: contactform.php?mailsended");
    }
?>