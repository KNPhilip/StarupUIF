<?php 
    if (!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET['id']))
    {
        $id = "'".$_GET['id']."'";
    }

    $db = new MySQLi('', '', '', '');
    $db->set_charset("utf8");

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
        <img src="<?php echo "img/".$row["EImage"]; ?>" class="img-fluid mt-5">
    </header>

    <main class="container mb-5">
        <section class="mt-5 card">
            <h1 class="pt-5 pb-5 card-header"><?php echo $row["EName"]; ?></h1>
            <article class="card-body">
                <div class="row">
                    <p class="col-2">Kategori</p>
                    <p class="col"><?php echo $row["ECategory"]; ?></p>
                </div>
                <div class="row">
                    <p class="col-2">Beskrivelse</p>
                    <p class="col"><?php echo $row["EDescription"]; ?></p>
                </div>
                <div class="row">
                    <p class="col-2">Dato</p>
                    <p class="col"><?php echo date("d-m-Y", strtotime($row["EDate"]));?></p>
                </div>
                <div class="row">
                    <p class="col-2">Start</p>
                    <p class="col"><?php echo $row["EStartTime"]; ?></p>
                </div>

               <div class='row'>
                    <p class='col-2'>Slut</p>
                    <p class='col'><?php echo $row["EEndTime"]; ?></p>
                </div>

                <div class="row">
                    <p class="col-2">Sted</p>
                    <p class="col"><?php echo $row["EPlace"]; ?></p>
                </div>
                <div class="row">
                    <p class="col-2">Pris</p>
                    <p class="col"><?php echo $row["EPrice"]; ?>,- kr.</p>
                </div>
                <div class='row'>
                    <p class='col-2'>Kontaktperson</p>
                    <p class='col'><?php echo $row["EContactName"]; ?></p>
                </div>
                <div class='row'>
                    <p class='col-2'>Kontakt telefonnr.</p>
                    <p class='col'><?php echo $row["EContactPhone"]; ?></p>
                </div>
                
            </article>
            <article class="card-footer">
                <div class="row">
                    <p class="col-2">Event oprettet af</p>
                    <p class="col-8"><?php echo $row["ECreatedBy"]; ?></p>
                    <?php if (isset($_SESSION["email"]) && isset($_SESSION["password"])){ ?>
                        <form class="col-2" method="post" action="slettetArrangement.php?id=<?php echo $_GET['id']; ?>">
                            <input type='submit' name='deletepost' class='btn btn-danger' value='Slet arrangement'>
                        </form>
                    <?php } ?>
                </div>
            </article>
        </section>
        <section class="mt-5">
            <article>
                <form method="post" action="tilmeldtArrangement.php?id=<?php echo $_GET['id']; ?>">
                    <p><label for="tilmeldAntal">Tilmeld antal:</label>
                    <input type="number" name="tilmeldAntal">
                    <input type="submit" name="tilmeldArrangement" value="Tilmeld" class="btn btn-success"></p>
                </form>
            </article>
        </section>
    </main>

    <footer class="container-fluid py-5 bg-success">
        <?php include 'includes/footer.php' ?>   
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>