<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subj = $_POST['subj'];
$message = $_POST['message'];
$formcontent="Name: $name \nContact No.: $phone \Subject.: $subj \Messgage: $message";
$recipient = "89abdul@gmail.com";
$subject = "Enquiry - Website";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<img src='https://img.icons8.com/dusk/100/000000/thumb-up.png'/>" . "<h2>Congratulations</h2>" . "<h2>Your Request has been send Successfully</h2>";
?>


