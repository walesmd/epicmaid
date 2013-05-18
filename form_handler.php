<?php if (!$_POST) return;
error_reporting(-1);

$validation = array(
    'name' => FILTER_SANITIZE_STRING,
    'email_address' => FILTER_VALIDATE_EMAIL,
    'street_address' => FILTER_SANITIZE_STRING,
    'phone_num' => FILTER_SANITIZE_STRING,
    'comments' => array(
        'filter' => FILTER_SANITIZE_STRING,
        'flags' => !FILTER_FLAG_STRIP_LOW
    )
);

// Lose empty fields (mainly textareas)
array_filter($_POST, function(&$val) {
    $val = trim($val);
});

$form_data = array_intersect_key($_POST, $validation);
$clean_data = filter_var_array($form_data, $validation);

function hackNotice($activity = 'Unknown') {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $host = gethostbyaddr($ip);
    $timestamp = date(DATE_COOKIE);

    $tech    = 'techsupport@epicmaid.com';
    $from    = 'no-reply@epicmaid.com';
    $subject = 'Suspicious Activity: EpicMaid.com';
    $header  = 'From: ' . $from;
    $message = "\n" .
        'Suspicious Activity: ' . $activity . "\n" .
        'Date of Activity: ' . $date . "\n" .
        'IP Address: ' .  $ip_address . "\n" .
        'Host: ' . $host . "\n\n" .
        'Request Array: ' . var_dump($_REQUEST) .
        "\n";

    mail($to, $subject, $message, $header);
}
