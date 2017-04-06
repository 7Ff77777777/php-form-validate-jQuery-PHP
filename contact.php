<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact PHP+jQuery+validator</title>
    <script src="jquery/jquery-3.2.0.min.js" type="text/javascript"></script>
    <script src="jquery/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        $('contactform').validate();
        });
    </script>
    <link href="style.css" rel="stylesheet" type="text/css">
    <style type="text/css"></style>
    <?php
    if (isset($_POST['submit'])) {
    if (trim($_POST['contactname']) == '') {
        $hasError = true;}
        else{
        $name = trim($_POST['contactname']);
        }
        if (trim($_POST['subject']) == '');
        $hasError = true;}
        else{
        $subject = trim($_POST['subject']);
        }
        if (empty($_POST['email'])) {
        if (preg_match("|^[-0-9a-z_ .]+@[-0-9a-z_^.]+.[a-z]{2,6}$|i",$_POST['email']))
        {
            echo $_POST['email']."-Correctly.";
        }
        else
            {
            echo $_POST['email']."-Not Correctly.";
        }
        }
        else{
        echo "You did not enter email.";
        }
        if (trim($_POST)['message']=='') {
        $hasError=true;
        }else{
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['message']));
        }else{
            $comments = trim($_POST['message']);
        }
        }
        if (!isset($hasError)) {
        $emailTo = 'artem_vlasov_1989@mail.ua';
        $body = "Name: 'name'\n\nEmail:'email'\n\nSubject:'subject'\n\nComments:\n 'comments'";
        $headers = 'From: My Site <'.$emailTo.'>' . "\r\n". 'Reply-To: '. 'email';
        mail($emailTo, 'subject', $body, $headers);
        $emailSent = true;

        $email_a = 'artem_vlasov_1989@mail.ua';
        $email_b = 'artem';

        if (filter_var($email_a,FILTER_VALIDATE_EMAIL)) {
            echo "E-mail ($email_a) указан верно.\n";
        }
        if (filter_var($email_b, FILTER_VALIDATE_EMAIL)) {
            echo  "E-mail ($email_b) указан верно.\n";
        }else{
            echo "E-mail ($email_b) указан неверно.\n";
        }
        }
    ?>
</head>
<body>
<div id="contact wrapper">
    <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" id='contactform'></form>
    <label for="name"><strong>Name:</strong></label>
    <input type="text" size="50" name="contactname" id="contactname" value="" class="required">
</div>
<div>
    <label for="email"><strong>Email:</strong></label>
    <input type="text" size="50" name="email" id="email" value="" class="required email">
</div>
<div>
    <label for="subject"><strong>Subject:</strong></label>
    <input type="text" size="50" name="subject" id="subject" value="" class="required">
</div>
<div>
    <label for="message"><strong>Message:</strong></label>
    <textarea rows="5" cols="50" name="message" id="message" class="required"></textarea>
</div>

<input type="submit" value="Send Message" name="submit">
</body>
</html>