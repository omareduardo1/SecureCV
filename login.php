<?php
error_reporting(0);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $connection = new PDO("mysql:host=localhost;dbname=securecv_local", "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $stmt = $connection->prepare("SELECT * FROM utenti WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['is_admin'] = $row['is_admin'];  // Salva ruolo admin
            header("Location: area_riservata.php");
            exit;
        } else {
            echo "❌ Username o password errati.";
        }

    } catch (PDOException $e) {
        echo "❌ Errore: " . $e->getMessage();
    }
} else {
    // Mostra form se visiti login.php via GET
    ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <header class="hero">
        <div class="header-nav">
            <a href="index.html" class="nav-button"> ← Home </a>
        </div>
        <div class="register-container">
            <h2>Accedi alla tua area riservata</h2>
            <form method="POST" action="login.php">
                <div class="inline-field">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                </div>
                <div class="inline-field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Login</button>
        </form>
    </div>
    </header>
</body>
</html>
    <?php
}
?>


