<?php
require 'accessToken.php';
require '../db_connect.php';

date_default_timezone_set('Africa/Nairobi');

$partyA = $_POST['number'];
$tenantName = $_POST['tenantName'];
$amount = $_POST['amount'];

$processrequestURL = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackURL = "https://85b6-154-159-252-200.ngrok-free.app/house_rental/daraja-api/callback.php";

$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$businessShortCode = '174379';
$timestamp = date('YmdHis');

$password = base64_encode($businessShortCode . $passkey . $timestamp);
$accountReference = 'PLENSER_SPARES';
$transactionDesc = 'STKPush Test';
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];

$curl_post_data = array(
    'BusinessShortCode' => $businessShortCode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'PartyA' => $partyA,
    'PartyB' => $businessShortCode,
    'PhoneNumber' => $partyA,
    'CallBackURL' => $callbackURL,
    'AccountReference' => $accountReference,
    'TransactionDesc' => $transactionDesc
);
$data_string = json_encode($curl_post_data);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestURL);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$data = json_decode(curl_exec($curl));
curl_close($curl);

$checkoutRequestID = $data->CheckoutRequestID;
$responseCode = $data->ResponseCode;

echo json_encode(['checkoutRequestID' => $checkoutRequestID, 'responseCode' => $responseCode]);
?>
