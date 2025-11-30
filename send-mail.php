<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $to = "astrid11juni@gmail.com"; // din mail
    $name = strip_tags($_POST['name']);
    $company = strip_tags($_POST['company']);
    $email = strip_tags($_POST['email']);

    $subject = "Nyhedsbrev tilmelding fra Greyloop";
    $message = "Navn: $name\nVirksomhed: $company\nEmail: $email";
    $headers = "From: noreply@greyloop.dk\r\nReply-To: noreply@greyloop.dk";

    if(mail($to, $subject, $message, $headers)){
        // Sender kvittering til brugeren
        $user_subject = "Tak for din tilmelding!";
        $user_message = "Hej $name,\n\nTak for din tilmelding til Greyloop nyhedsbrev!\n\nVenlig hilsen\nGreyloop";
        mail($email, $user_subject, $user_message, $headers);

        echo "OK";
    } else {
        http_response_code(500);
        echo "Fejl ved afsendelse";
    }
}
?>
