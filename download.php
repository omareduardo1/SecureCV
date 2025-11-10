<?php
session_start();

error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filepath = "Images/" . $file;

    if (file_exists($filepath)) {
        // Tracciamento Download
        try {
            $connection = new PDO("mysql:host=localhost;dbname=securecv_local", "root", "");
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $connection->prepare("INSERT INTO download_log (user_id, file_name, ip_address) VALUES (?, ?, ?)");
            $stmt->execute([$_SESSION['user_id'], $file, $_SERVER['REMOTE_ADDR']]);
        } catch (PDOException $e) {
            error_log("Errore tracciamento download:" . $e->getMessage());
        }

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo '❌ File non trovato';
    }
} else {
    echo '❌ Nessun file specificato';
}
?>
