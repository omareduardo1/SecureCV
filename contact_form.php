<?php
error_reporting(0);
function encryptData($data, $key) {
    $key = hash('sha256', $key, true);
    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

$secret_key = 'nuvoloso';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $cognome = $_POST['cognome'] ?? '';
    $email = $_POST['email'] ?? '';
    $messaggio = $_POST['messaggio'] ?? '';
    
    // Validazione input
    if (!preg_match('/^[a-zA-Z\s]/', $nome)) {
        die("❌ Nome non valido.");
    }

    if (!preg_match('/^[a-zA-Z\s]/', $cognome)) {
        die("❌ Cognome non valido.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Email non valida.");
    }

    $nome_cifrato = encryptData($nome, $secret_key);
    $cognome_cifrato = encryptData($cognome, $secret_key);
    $email_cifrato = encryptData($email, $secret_key);
    $messaggio_cifrato = encryptData($messaggio, $secret_key);

    $connection = new mysqli('localhost', 'root', '', 'securecv_local');
    if ($connection->connect_error) {
        die("❌ Connessione fallita: " . $connection->connect_error);
    }

    $stmt = $connection->prepare("INSERT INTO messaggi (nome, cognome, email, messaggio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome_cifrato, $cognome_cifrato, $email_cifrato, $messaggio_cifrato);
    $stmt->execute();

    $stmt->close();
    $connection->close();

    echo "✅ Messaggio inviato correttamente.";
}
?>