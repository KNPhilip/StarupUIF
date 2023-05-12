<?php 
    if (!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET['id']))
    {
        $id = "'".$_GET['id']."'";
    }

    $db = new MySQLi('', '', '', '');

    if ($db->connect_error){
        die("Connection to database failed: ".$db->connect_error);
    }
    else{
        $result = $db->query("SELECT * FROM events WHERE EID = $id");
        $row = $result->fetch_assoc();
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
        <img src="img/<?php echo $row["EImage"]; ?>" class="img-fluid mt-5">
    </header>

    <main class="container mb-5">
        <h1 class="mt-5 mb-5">Tak for din tilmelding</h1>

        <section>
            <article>
                <p>Du har tilmeldt <?php echo $_POST["tilmeldAntal"]." personer til ".$row["EName"]."d. "?><?php echo date("d-m-Y", strtotime($row["EDate"])); ?></p>

                <p>Pris for dine billetter: <?php echo ($_POST["tilmeldAntal"] * $row["EPrice"] ); ?>,- kr.</p>

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