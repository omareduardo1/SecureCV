<?php
error_reporting(0);
session_start();
$connection = new PDO("mysql:host=localhost;dbname=securecv_local", "root", "");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_SESSION["user_id"])) {
    $stmt = $connection->prepare("UPDATE utenti SET has_cookie = 1 WHERE id = ?");
    $stmt->execute([$_SESSION["user_id"]]);
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
    $connection->exec("INSERT INTO cookie_log (ip_address) VALUES ('$ip')");
}
?>