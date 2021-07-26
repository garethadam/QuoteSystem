<?php

$uri  = "mysql:dbname=quotesystem;host:127.0.0.1";
$user = "root";
$pass = "";

$conn = new PDO($uri, $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

global $viewQuote;

try
{
    $conn = new PDO("mysql:host=localhost;dbname=QuoteSystem", $user, $pass);
}
catch(PDOException $e)
{
    $error_message = $e->getMessage();
    echo $e;
    exit();
}
