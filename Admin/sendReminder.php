<?php
$to = "benedict6ra@hotmail.com";
$subject = "Reminder!";
$message = "Please pay up your fee for your sign up package.";
$from = "benedict6ra@hotmail.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>