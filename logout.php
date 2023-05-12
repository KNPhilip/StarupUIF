<?php 
    if(!isset ($_SESSION))
    {
        session_start();
    }
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <meta name="description" content="Starup UIF arrangements kalender. Opret nye arrangementer - tilmeld dig arrangementer. Et godt sted at starte et aktivt og interessant fritidsliv.">
    <title>Starup UIF arrangementer</title>
</head>

<body>
    <?php include 'includes/nav.php' ?>  

    <main class="container mt-5 mb-5">
        <p class="mt-5">&nbsp;</p> <!-- Ekstra afstandsstykke, så navbar ikke dækker over indhold. -->
        <p class="display-4 mt-5">Du er nu logget ud.</p>
        <a href="index.php">Tilbage til forsiden.</a>
    </main>

    <footer class="container-fluid py-5 bg-success fixed-bottom">
        <?php include 'includes/footer.php' ?>     
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>