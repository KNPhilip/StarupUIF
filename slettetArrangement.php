<?php 
    if (!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
        echo '<script>window.location.replace("index.php");</script>';
    }
    else if(isset($_GET['id']))
    {
        $id = "'".$_GET['id']."'";
    }

    $db = new MySQLi('', '', '', '');
    $db->set_charset("utf8");

    if ($db->connect_error){
        die("Connection to database failed: ".$db->connect_error);
    }
    else{
        $result = $db->query("DELETE FROM events WHERE EID = $id");
        if ($db-error){
            die("Error: ".$db-error);
        }
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

    <main class="container mb-5">
        <p class="mt-5">&nbsp;</p>
        <h1 class="mt-5 mb-5">Arrangement slettet</h1>

        <section>
            <article>
                <p>Arrangementet er nu slettet</p>

                <a href="index.php">Tilbage til forsiden</a>
            </article>
            
        </section>
    </main>

    <footer class="container-fluid py-5 bg-success fixed-bottom">
        <?php include 'includes/footer.php' ?> 
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>