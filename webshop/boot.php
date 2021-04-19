<?php

session_start();

require 'classes/Cart.php';
require 'classes/Http.php';

Http::boot();

//reset the cart if it is empty
if (! isset($_SESSION['cart'])) {
    Cart::reset();
}

function db()
{
    $host = 'localhost';
    $database = 'webshop php';
    $username = 'root';
    $password = '';

    try {
        $connection = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    catch(PDOException $e) {
        dd($e->getMessage());
    }
}

function asset($path)
{
    return Http::webroot().$path;
}


// load all the base functions
function dd($text)
{
    if(is_array($text) || is_object($text)) {
        var_dump($text);
        die();
    }
    else {
        die($text);
    }
}
?>