<?php 
    if(!isset ($_SESSION))
    {
        session_start();
    }
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

    <header class="eventheader mt-5">
        <img src="img/ForedragOmEnsomhed.jpg" class="img-fluid mt-5">
    </header>

    <main class="container mb-5">
        <h1 class="mt-5 mb-5">Arrangement oprettet</h1>

        <section>
            <article>
                <p>Arrangementet Detox din hjerne er nu oprettet til d. 29-04-2023</p>

                <a href="index.php">Tilbage til forsiden</a>
            </article>
            
        </section>
    </main>

    <footer class="container-fluid py-5 bg-success">
        <?php include 'includes/footer.php' ?>    
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>