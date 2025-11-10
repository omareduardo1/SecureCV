<?php 
error_reporting(0);
session_start();

$is_admin = isset($_SESSION['user_id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Area Riservata - Secure CV</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if ($is_admin): ?>
    <div style="text-align: center; margin-top: 20px;">
        <a href="messaggi.php" class="btn">Area Admin</a>
    </div>
<?php endif; ?>

        <header class="initial-hero">
            <h1 class="page-title"> Area Riservata </h1>
        </header>
        <section class="downloads-container">
            <!-- Documento 1 -->
            <div class="download-box">
                <img src="Images/CV.png" alt="CV">
                <div class="download-info">
                    <h3> Curriculum Vitae </h3>
                    <p> Curriculum aggiornato al 2025 in pdf con firma digitale </p>
                </div>
                <a href="http://securecv.local/download.php?file=CV.png" class="download-link" title="Scarica il file"> ⬇️ </a>
            </div>

            <!-- Documento 2 -->
            <div class="download-box">
                <img src="Images/innMontagna.png" alt="Anteprima Ceritficato">
                <div class="download-info">
                    <h3> Certificato corso di formazione </h3>
                    <p> Innovazione Digitale, Nuove Tecnologie e Intelligenza Artificiale in montagna </p>
                </div>
                <a href="http://securec.local/download.php?file=innMontagna.png" class="download-link" title="Scarica il file"> ⬇️ </a>
            </div>

            <!-- Documento 3 -->
            <div class="download-box">
                <img src="Images/Droni.png" alt="Anteprima Ceritficato">
                <div class="download-info">
                    <h3> Certificato Pilotaggio Droni </h3>
                    <p> Attestato ufficiale rilasciato da ENAC </p>
                </div>
                <a href="http://securecv.local/download.php?file=Droni.png" class="download-link" title="Scarica il file"> ⬇️ </a>
            </div>

            <!-- Documento 4 -->
            <div class="download-box">
                <img src="Images/CV_Europass.png" alt="CV">
                <div class="download-info">
                    <h3> Curriculum Vitae - Europass </h3>
                    <p> Curriculum Europass aggiornato al 2025 in pdf con firma digitale </p>
                </div>
                <a href="http://securecv.local/download.php?file=CV_Europass.png" class="download-link" title="Scarica il file"> ⬇️ </a>
            </div>

            <!-- Documento 5 -->
            <div class="download-box">
                <img src="Images/FutureofFashion-Certificate.png" alt="Anteprima Ceritficato">
                <div class="download-info">
                    <h3> Certificato corso di formazione </h3>
                    <p> Future of Fashion rilasciato dalla UPV (Valencia, Spagna) </p>
                </div>
                <a href="http://securecv.local/download.php?file=FutureofFashion-Certificate.png" class="download-link" title="Scarica il file"> ⬇️ </a>
            </div>

            <!-- Documento 6 -->
            <div class="download-box">
                <img src="Images/DigitalTraining.png" alt="Anteprima Ceritficato">
                <div class="download-info">
                    <h3> Certificato Digital Training </h3>
                    <p> Attestato ufficiale rilasciato da Google </p>
                </div>
                <a href="http://securecv.local/download.php?file=DigitalTraining.png" class="download-link" title="Scarica il file"> ⬇️ </a>
            </div>
         </section>

         <!-- Footer -->
         <footer class="site-footer">
            <div class="footer-links">
                <a href="index.html">Home</a> | 
                <a href="Formazione.html">Formazione</a> | 
                <a href="Competenze.html">Competenze</a> | 
                <a href="Contatti.html">Contatti</a>
            </div>
            <p class="footer-copy" style="color: black; margin-bottom: 40px;">&copy; 2025 Omar Eduardo Borges Montero. Tutti i diritti riservati.</p>
        </footer>
    </body>
</html>