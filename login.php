<?php 
    if (!isset($_SESSION)){
        session_start();
    }
    echo session_status();

    $db = new MySQLi('', '', '', '');

    if ($db->connect_error){
        die("Connection to database failed: ".$db->connect_error);
    }

    $Err = "";

    if($_SERVER[REQUEST_METHOD] == POST){
        if(!empty($_POST["email"]) && !empty($_POST["password"])){
            $email = $_POST["email"];
            $password = $_POST["password"];

            $result = $db->query("SELECT * FROM users WHERE UEmail = '".$email."' AND UPassword = '".$password."'");

            if ($db->error){
                echo $db->error;
            }
            else if ($result->num_rows == 1){
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["password"] = $_POST["password"];
                echo '<script>window.location.replace("index.php");</script>';
            }
            else if ($result->num_rows < 1){
                $Err = "Forkert brugernavn eller adgangskode";
                unset($_SESSION["email"]);
                unset($_SESSION["password"]);
            }
            else{
                $Err = "Fatal fejl, fat det.";
            }
        }
        else{
            $Err = "Udfyld alle felterne";
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
        <h1 class="mt-5">Login</h1>
        <section>
            <article>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <p class="row">
                        <label class="col-3"></label>
                        <label class="col-4" style="color:red"><?php echo $Err; ?></label>
                    </p>
                    <p class="row">
                        <label for="email" class="col-3">Email: </label>
                        <input type="text" name="email" class="col-4">
                    </p>
                    <p class="row">
                        <label for="password" class="col-3">Adgangskode:</label>
                        <input type="password" name="password" class="col-4">
                    </p>

                    <input type="submit" name="loginSubmit" value="Log ind" class="btn btn-success">
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