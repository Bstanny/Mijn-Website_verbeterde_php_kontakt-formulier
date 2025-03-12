<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "bartholomeeusen18@gmail.com";
    $subject = "Contact Formulier";

    // Input valideren
    $name = htmlspecialchars(trim($_POST['naam']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['bericht']));

    if (!$name || !$email || !$message) {
        echo "Fout: Vul alle velden correct in.";
        exit;
    }

    // E-mailheaders
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    $fullMessage = "Naam: " . $name . "\n\n";
    $fullMessage .= "E-mail: " . $email . "\n\n";
    $fullMessage .= "Bericht:\n" . $message;

    // E-mail verzenden
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Bedankt! Je e-mail is succesvol verzonden.";
    } else {
        echo "Fout: Er is een probleem opgetreden bij het verzenden van de e-mail.";
    }
}
?>
