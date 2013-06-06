<?php error_reporting(-1);
require 'gump.class.php';
$gump = new GUMP();
$form_errors = array();

// Generate CSRF token, remembering the previous if there
if (isset($_SESSION['epicmaid_csrf_token'])) {
    $valid_token = $_SESSION['epicmaid_csrf_token'];
}
$_SESSION['epicmaid_csrf_token'] = md5(uniqid(rand(), true));
if (!$_POST) return;    // No form submitted, go back


// The form was submitted - validate, sanitize and send

// Check our CSRF token first
if (!GUMP::is_valid($_POST, array('csrf_token' => 'contains,' . $valid_token))) {
    // Invalid CSRF Token
    $to      = 'EpicMaid Tech Support <techsupport@epicmaid.com>';
    $subject = '(Alert) Failed CSRF from ' . $_SERVER['REMOTE_ADDR'];
    $message = "\r\nSuspicious Activity: \t Failed CSRF" . "\r\n" .
               "Date of Activity: \t\t ". date(DATE_COOKIE) . "\r\n" .
               "IP Address: \t\t\t " . $_SERVER['REMOTE_ADDR'] . "\r\n" .
               "Host: \t\t\t\t " . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "\r\n" .
               "Request Array: \t\t " . print_r($_REQUEST, true) . "\r\n";
    $headers = 'From: EpicMaid <no-reply@epicmaid.com>' . "\r\n";
    mail($to, $subject, $message, $headers);
    return;
}


// The CSRF token is valid, check the rest of the form out
$valid_form = false;
$_POST = $gump->sanitize($_POST);
$gump->validation_rules(array(
    'name'          => 'required|valid_name',
    'email_address' => 'required|valid_email'
));

$gump->filter_rules(array(
    'name'          => 'trim|sanitize_string',
    'email_address' => 'trim|sanitize_email',
    'street_address'=> 'trim|sanitize_string',
    'phone_num'     => 'trim|sanitize_string',
    'comments'      => 'trim|sanitize_string'
));

// Set the notice to be displayed to the user
if ($gump->run($_POST)) {
    $to      = 'Danielle Mendes <daniele@epicmaid.com>';
    $subject = 'EpicMaid Request from ' . $_POST['name'];
    $message = "\r\nCustomer's Name: \t " . $_POST['name'] . "\r\n" .
               "Email Address: \t\t ". $_POST['email_address'] . "\r\n" .
               "Phone Number: \t\t " . $_POST['phone_num'] . "\r\n" .
               "Address: \t\t " . $_POST['street_address'] . "\r\n\r\n" .
               "Comments:\r\n" . $_POST['comments'] . "\r\n";
    $headers = 'From: ' . $_POST['name'] . ' <' . $_POST['email_address'] . '>' . "\r\n";
    mail($to, $subject, $message, $headers);
    $valid_form = true;
} else {
    $gump_errors = $gump->errors();
    foreach ($gump_errors as $gump_error) {
        $form_errors[] = $gump_error['field'];
    }
}
