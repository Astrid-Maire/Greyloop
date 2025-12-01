<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if ($email) {
        // Mail til dig selv
        $to = "din-mail@ditdomæne.dk"; // Skift til din egen mail
        $subject = "Ny tilmelding til nyhedsbrev";
        $message = "Navn: $name\nVirksomhed: $company\nEmail: $email";
        $headers = "From: astrid11juni@gmail.com";
        mail($to, $subject, $message, $headers);

        // Bekræftelsesmail til brugeren
        $confirmSubject = "Tak for din tilmelding!";
        $confirmMessage = "Hej $name,\n\nTak fordi du tilmeldte dig vores nyhedsbrev! Vi glæder os til at holde dig opdateret med nyheder om Greyloop.\n\nVenlig hilsen\nGreyloop Teamet";
        $confirmHeaders = "From: astrid11juni@gmail.com";
        mail($email, $confirmSubject, $confirmMessage, $confirmHeaders);

        echo "success";
    } else {
        http_response_code(400);
        echo "Ugyldig email";
    }
} else {
    http_response_code(405);
    echo "Metoden er ikke tilladt";
}
?>
