<?php
// db_connect.inc


if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $servername = 'localhost';
    $username = 'root';
    $password = "";
    $dbname = 'gamesrus';
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4007562";
    $password = "Peaching9$";
    $dbname = "s4007562";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!function_exists('preshow')) {
    function preshow($var) {
        echo '<pre>';
        if (empty($var)) {
            echo 'No data here';
        } else {
            print_r($var);
        }
        echo '</pre>';
    }
}
?>
