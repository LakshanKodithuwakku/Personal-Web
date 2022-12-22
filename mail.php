<?php
//get data from form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "lakshankodithuwakku604@gmail.com";

$subjec = 'Mail From kodithuwakku.me';
$txt = "Name = ". $name . "\r\nEmail = " . $email . "\r\nMessage =" . $message;

$headers = "From: noreply@kodithuwakku.me" . "\r\n"; 

$secretKey = "6LfLss4aAAAAADEig-HL5bErMGtqfhdzacLWmQyO";
$responseKey = $_POST['g-recaptcha-response'];
$UserIP = $_SERVER['REOMTE_ADDR'];
$url = "https://www.google.com/recaptcha/api/siteverify?
secret=secretKey&response=responseKey&remoteip=$UserIP";

$response = file_get_contents($url);
$response = json_decode($response);

//."CC: someemail.com";
if($email != NULL && $response->success){
    mail($to,$subjec,$txt,$headers);
}
?>