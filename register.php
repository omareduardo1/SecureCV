<?php
error_reporting(0);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=securecv_local", "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $passwordHash = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

        // Verifica se l'utente esiste
        $check = $connection->prepare("SELECT * FROM utenti WHERE username = ? OR email = ?");
        $check->execute([$username, $email]);

        if ($check->rowCount() > 0) {
            header("Location: register.html?error=exists");
            exit;
        }

        // Inserimento nuovo utente
        $stmt = $connection->prepare("INSERT INTO utenti (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $passwordHash]);

        // Login automatico
        $_SESSION['user_id'] = $connection->lastInsertId();
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = 0; // Per utenti normali

        // ✅ Redirect all’area riservata
        header("Location: area_riservata.php");
        exit;

    } catch (PDOException $e) {
        // Errore silenzioso (loggabile)
        error_log("Errore registrazione: " . $e->getMessage());
        header("Location: register.html?error=db");
        exit;
    }
}
?>