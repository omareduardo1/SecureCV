<?php
error_reporting(0);
session_start();

// Protezione accesso (verifica login e admin)
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

function decryptData($data, $key) {
    $key = hash('sha256', $key, true);
    $data = base64_decode($data);
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $ivLength);
    $encrypted = substr($data, $ivLength);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

$secret_key = 'nuvoloso';

$connection = new mysqli('localhost', 'root', '', 'securecv_local');
if ($connection->connect_error) {
    die("❌ Connessione fallita: " . $connection->connect_error);
}

$result = $connection->query("SELECT * FROM messaggi ORDER BY inviato_il DESC");

echo "<!DOCTYPE html><html lang='it'><head><meta charset='UTF-8'><title>Admin - Messaggi</title><link rel='stylesheet' href='style.css'></head><body>";
echo "<header class='hero'><h1 class='hero-title'>Messaggi ricevuti</h1></header>";
echo "<section class='contact-section'><div class='contact-box'>";
echo "<table border='1' cellpadding='10' style='width: 100%; text-align: left;'>";
echo "<tr><th>Nome</th><th>Cognome</th><th>Email</th><th>Messaggio</th><th>Data</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars(decryptData($row['nome'], $secret_key)) . "</td>";
    echo "<td>" . htmlspecialchars(decryptData($row['cognome'], $secret_key)) . "</td>";
    echo "<td>" . htmlspecialchars(decryptData($row['email'], $secret_key)) . "</td>";
    echo "<td>" . nl2br(htmlspecialchars(decryptData($row['messaggio'], $secret_key))) . "</td>";
    echo "<td>" . $row['inviato_il'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "<p style='text-align:center; margin-top:20px;'><a href='area_riservata.php' class='btn'>← Torna all’area riservata</a></p>";
echo "</div></section></body></html>";

$connection->close();
?>