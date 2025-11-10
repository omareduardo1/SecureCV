<?php
error_reporting(0);
// Connessione MySQL
$host = 'localhost';
$dbname = 'securecv_local';
$user = 'root';
$pass = '';

try {
    $connection = new PDO("mysql:host=$host", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crea il Database se non esiste
    $connection->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✅ Database creato.<br>";

    // Seleziona il Database
    $connection->exec("USE $dbname");

    // Crea la tabella Utenti
    $connection->exec("CREATE TABLE IF NOT EXISTS utenti (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        is_admin BOOLEAN DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "✅ Tabella utenti creata.<br>";

    // Tabella messaggi (con cifratura AES)
    $connection->exec("CREATE TABLE IF NOT EXISTS messaggi (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        cognome VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        messaggio TEXT NOT NULL,
        inviato_il TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "✅ Tabella messaggi creata.<br>";

    // Tabella download_log per tracciamento
    $connection->exec("CREATE TABLE IF NOT EXISTS download_log (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        file_name VARCHAR(100),
        ip_address VARCHAR(45),
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES utenti(id) ON DELETE SET NULL
    )");
    echo "✅ Tabella download_log creata.<br>";

    // Tabella cookie_log per tracciare utenti 
    $connection->exec("CREATE TABLE IF NOT EXISTS cookie_log (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ip_address VARCHAR(45),
        accepted BOOLEAN DEFAULT 1,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "✅ Tabella cookie_log creata.<br>";

} catch (PDOException $e) {
    echo "❌ Errore nella connessione o nella creazione del Database: ". $e->getMessage();
}
?>