<?php 
    if (!isset($_SESSION)){
        session_start();
    }

    $db = new MySQLi('', '', '', '');
    $db->set_charset("utf8");

    if ($db->connect_error){
        die("Connection to database failed: ".$db->connect_error);
    }
    if(isset($_GET['cat']) && !($_GET['cat'] == "alle"))
    {
        $cat = "'".ucfirst($_GET['cat'])."'";
        $result = $db->query("SELECT * FROM events WHERE ECategory = $cat ORDER BY EDate");
    }
    else{
        $result = $db->query("SELECT * FROM events ORDER BY EDate");
    }

    $defaultArrangements = 5;

    if ($db->error){
        echo $db->error;
    }
    else{
        while ($row = $result->fetch_assoc()){
            $arrangements[] = $row;
        }
    }
    
    if (count($arrangements) < $defaultArrangements){
        $results = count($arrangements);
    }
    else{
        $results = $defaultArrangements;
    }

    if ($_POST["showSubmit"] == "Vis flere arrangementer"){
        $results = count($arrangements);
    }
    else{
        if (isset($_POST))
            unset($_POST);
        if (count($arrangements) < $defaultArrangements){
            $results = count($arrangements);
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

    <header>
        <img src="img/header-img-lg.jpg" class="img-fluid">
    </header>

    <main class="container mb-5">
        <h1 class="mt-5 mb-5">Kommende arrangementer i Starup UIF</h1>
        <section>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown">Vælg kategori:</button>
                <div class="dropdown-menu" aria-labelledby="categoryChooser">
                    <a class="dropdown-item" href="index.php?cat=alle">Alle</a>
                    <a class="dropdown-item" href="index.php?category=cat=musik">Musik</a>
                    <a class="dropdown-item" href="index.php?cat=foredrag">Foredrag</a>
                    <a class="dropdown-item" href="index.php?cat=sport">Sport/idræt</a>
                    <a class="dropdown-item" href="index.php?cat=natur">Natur</a>
                    <a class="dropdown-item" href="index.php?cat=mad">Madlavning</a>
                    <a class="dropdown-item" href="index.php?cat=andet">Andet</a>
                </div>
            </div>

            <article class="showEvents mt-5">

                <?php 
                    for ($i = 0; $i < $results; $i++){ ?>
                        <div class='card mb-5'>
                            <div class='row'>
                                <div class='col'>
                                    <?php echo "<img src='img/".$arrangements[$i]["EImage"]."' class='card-img'>"; ?>
                                </div>
                                <div class='col'>
                                    <div class='card-body'>
                                        <h4 class='card-title'>
                                            <?php echo $arrangements[$i]["EName"]; ?>
                                        </h4>
                                        <p class='card-subtitle mt-3'>
                                            Kategori: <?php echo $arrangements[$i]["ECategory"]; ?>
                                        </p>
                                        <p class='card-text mt-3'>
                                        <?php echo $arrangements[$i]["EDescription"]; ?>
                                        </p>
                                        <p class='card-text mt-3'>
                                            Dato: <?php echo date("d-m-Y", strtotime($arrangements[$i]["EDate"]));?>
                                        </p>
                                        <a class='btn btn-success' href=<?php echo "visArrangement.php?id=".$arrangements[$i]['EID']; ?> >Læs mere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <?php
                    if ($results > ($defaultArrangements - 1)){
                    if (!$_POST["showSubmit"] == "Vis flere arrangementer"){ ;?>
                        <input type="submit" class='btn btn-success' name="showSubmit" value="Vis flere arrangementer">
                    <?php } else {;?>
                        <input type="submit" class='btn btn-success' name="showSubmit" value="Vis færre arrangementer">
                    <?php } 
                    }?>
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