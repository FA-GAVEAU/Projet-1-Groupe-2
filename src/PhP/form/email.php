<?php

// Require config file for email (do not forget to create it based on config.php.dist)
require_once 'config.php';

// Starting session to push some notifications
session_start();

// Init error index to empty
$_SESSION["error"] = "";

// Simple function which check all inputs
function checkInputs(string $name, string $email, string $subject, string $message) {

    // Check errors on POST'ED data
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if (preg_match($email_exp, $email) === 0) {
        $_SESSION["error"] = 'Your email does not appear to be valid.';
    }
    elseif (strlen($name) < 2 || ctype_alpha(str_replace(' ', '', $name)) === false) {
        $_SESSION["error"] = 'Your name does not appear to be valid. Please enter a simple text.';
    }
    elseif (strlen($subject) < 8 || ctype_alpha(str_replace(' ', '', $subject)) === false) {
        $_SESSION["error"] = 'Your subject does not appear to be valid. Please enter a simple text.';
    }
    elseif (strlen($message) < 32) {
        $_SESSION["error"] = 'Enter a real message to contact us.';
    }
}

function clean_string($string) {
    $bad = array("content-type", "bcc:", "to:", "cc:");
    return str_replace($bad, "", $string);
}

// Check all POST'ED data
if (!isset($_POST['name']) || !isset($_POST['email'])
    || !isset($_POST['subject']) || !isset($_POST['message'])) {
    $_SESSION["error"] = "Sorry, there appears to be a problem with your form submission.";
} else {
    // Format all POST'ED data
    $name = trim(stripslashes(htmlEntities($_POST['name'], ENT_QUOTES)));
    $email = trim(stripslashes(htmlEntities($_POST['email'], ENT_QUOTES)));
    $subject = trim(stripslashes(htmlEntities($_POST['subject'], ENT_QUOTES)));
    $message = trim(stripslashes(htmlEntities($_POST['message'], ENT_QUOTES)));

    checkInputs($name, $email, $subject, $message);
}

if (strlen($_SESSION["error"]) <= 0) {

    // Writing user's mail with all POST'ED information
    $email_message = "$name sent a message to you by your contact form :\n";
    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Subject: " . clean_string($subject) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // Preparing email's header
    $headers = "From: " . $email . "\n".
        "Reply-To: " . $email . "\n" .
        "Content-type: text/plain; charset=UTF-8" . "\n" .
        "X-Mailer: PHP/" . phpversion();

    // Send user's mail and saving a notification after it
    if (mail(EMAILTO, $subject, $email_message, $headers))
        $_SESSION["success"] = "Your email has been sent !";
    else
        $_SESSION["error"] = "Something wrong, your email was not sent.";
}

// Back on homepage
header("location: index.php");