<?php
    if (!isset($_SESSION)){
        session_start();
    }

    if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
        echo '<script>window.location.replace("index.php");</script>';
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $createEventNameErr = "";
    $createEventDescriptionErr = "";
    $createEventImageErr = "";
    $createEventDateErr = "";
    $createEventStartTimeErr = "";
    $createEventPlaceErr = "";
    $createEventPriceErr = "";
    $createEventResponsibleErr = "";
    $createEventPhoneErr = "";

    $db = new MySQLi('', '', '', '');
    $db->set_charset("utf8");

    if ($db->connect_error){
        die("Connection to database failed: ".$db->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["eventName"] = test_input($_POST["eventName"]);
        $_SESSION["eventDescription"] = test_input($_POST["eventDescription"]);
        $_SESSION["eventDate"] = test_input($_POST["eventDate"]);
        $_SESSION["eventStartTime"] = test_input($_POST["eventStartTime"]);
        $_SESSION["eventEndTime"] = test_input($_POST["eventEndTime"]);
        $_SESSION["eventPlace"] = test_input($_POST["eventPlace"]);
        $_SESSION["eventPrice"] = test_input($_POST["eventPrice"]);
        $_SESSION["eventResponsible"] = test_input($_POST["eventResponsible"]);
        $_SESSION["eventPhone"] = test_input($_POST["eventPhone"]);

        if (!empty($_SESSION["eventName"]) && !empty($_SESSION["eventDescription"]) && !empty($_SESSION["eventDate"]) && !empty($_SESSION["eventStartTime"]) && !empty($_SESSION["eventPlace"]) && !empty($_SESSION["eventResponsible"]) && !empty($_SESSION["eventPhone"])){
            $name = $_SESSION["eventName"];
            $description = $_SESSION["eventDescription"];

            $startDate = strtotime(date('Y-m-d', strtotime($_SESSION["eventDate"]) ) );
            $currentDate = strtotime(date('Y-m-d'));
            $starttime = $_SESSION["eventStartTime"];
            $place = $_SESSION["eventPlace"];
            $price = $_SESSION["eventPrice"];
            $responsible = $_SESSION["eventResponsible"];
            $phone = $_SESSION["eventPhone"];
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $createEventNameErr = "Kun bogstaver og mellemrum tilladt";
            }
            else if (strlen($description) < 20){
                $createEventDescriptionErr = "For kort beskrivelse";
            }
            else if ($startDate < $currentDate){
                $createEventDateErr = "Datoen skal være efter i dag";
            }
            else if (strlen($place) < 2){
                $createEventPlaceErr = "For kort navn på stedet";
            }
            else if (!isset($_SESSION["eventPrice"])){
                $_SESSION["eventPrice"] = 0;
            }
            else if (strlen($responsible) < 2){
                $createEventResponsibleErr = "For kort navn";
            }
            else if (strlen($phone) > 8 || strlen($phone) < 8){
                $createEventPhoneErr = "Indtast korrekt format af tlf. nummer";
            }
            else if(isset($_POST["eventSubmit"])){
                if(!empty($_FILES['eventImage']))
                {
                    if($_FILES['eventImage']['error'] == 0)
                    {
                        $img = pathinfo($_FILES['eventImage']['tmp_name'], PATHINFO_EXTENSION);
                        $new_img_name = uniqid("IMG-", true).'.'.$img;
                        $img_upload_path = 'img/'.$new_img_name;
                        move_uploaded_file($_FILES['eventImage']['tmp_name'], $img_upload_path);
                    }
                    else
                    {
                        $createEventImageErr = "Fejl i upload af billedet:" . $_FILES['eventImage']['error'];
                        $new_img_name = "No_image_available.png";
                    }
                }
                else
                {
                    $new_img_name = "No_image_available.png";
                }
                $category = $_POST["eventCategory"];
                $endtime = $_POST["eventEndTime"];
                $createdBy = $_SESSION["email"];
                $insertDate = $_SESSION["eventDate"];

                if($db->query("INSERT INTO events (EName, ECategory, EDescription, EImage, EDate, EStartTime, EEndTime, EPlace, EPrice, EContactName, EContactPhone, ECreatedBy) VALUE ('".$name."', '".$category."', '".$description."', '".$new_img_name."', '".$insertDate."', '".$starttime."', '".$endtime."', '".$place."', '".$price."', '".$responsible."', '".$phone."', '".$createdBy."')"))
                {
                    echo ("<script>window.location.replace('index.php')</script>");
                }
                else
                {
                    $fill = "Oprettelse fejlede: ".$db->error;
                }
            }
        }
        else{
            $fill = "Udfyld alle felterne";
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
        <section>
            <p class="mt-5">&nbsp;</p>
            <h1 class="mt-5 mb-5">Opret arrangement</h1>
            <p style="color:red"><?php echo $fill; ?></p>

            <article>
                <form method="post" enctype="multipart/form-data">
                    <p class="row">
                        <label for="eventName" class="col-3">Navn på arrangement: </label>
                        <input type="text" name="eventName" class="col">
                        <p class="mb-5"><?php echo $createEventNameErr; ?></p>
                   </p>
                    <p class="row">
                        <label for="eventCategory" class="col-3">Kategori</label>
                        <select name="eventCategory" class="col">
                            <option value="Musik">Musik</option>
                            <option value="Kunst">Kunst</option>
                            <option value="Foredrag">Foredrag</option>
                            <option value="Sport">Sport/idræt</option>
                            <option value="Natur">Natur</option>
                            <option value="Andet">Andet</option>
                        </select>
                        <p class="mb-5"></p>
                    </p>
                    <p class="row">
                        <label for="eventDescription" class="col-3">Beskrivelse af arrangementet:</label>
                        <textarea placeholder="Indtast beskrivelse..." name="eventDescription" rows="5" style="resize: none;" class="col"></textarea>
                        <p class="mb-5"><?php echo $createEventDescriptionErr; ?></p>
                    </p>
                    <p class="row">
                        <label for="eventImage" class="col-3">Upload et billede til arrangementet:</label>
                        <input type="file" name="eventImage" class="col">
                        <p class="mb-5"></p>
                    </p>
                    <p class="row">
                        <label for="eventDate" class="col-3">Dato: </label>
                        <input type="date" name="eventDate" min="2023-01-01" class="col">
                        <p class="mb-5"><?php echo $createEventDateErr; ?></p>
                    </p>
                    <p class="row">
                        <label for="eventStartTime" class="col-3">Start tidspunkt: </label>
                        <input type="time" name="eventStartTime" class="col">
                        <p class="mb-5"></p>
                    </p>
                    <p class="row">
                        <label for="eventEndTime" class="col-3">Slut tidspunkt (ikke påkrævet): </label>
                        <input type="time" name="eventEndTime" class="col">
                        <p class="mb-5"></p>
                    </p>
                    <p class="row">
                        <label for="eventPlace" class="col-3">Sted: </label>
                        <input type="text" name="eventPlace" class="col">
                        <p class="mb-5"><?php echo $createEventPlaceErr; ?></p>
                    </p>
                    <p class="row">
                        <label for="eventPrice" class="col-3">Pris: </label>
                        <input type="number" name="eventPrice" class="col-2">&nbsp; kr.
                        <p class="mb-5"></p>
                    </p>
                    <p class="row">
                        <label for="eventResponsible" class="col-3">Ansvarlig/kontaktperson: </label>
                        <input type="text" name="eventResponsible" class="col">
                        <p class="mb-5"><?php echo $createEventResponsibleErr; ?></p>
                    </p>
                    <p class="row">
                        <label for="eventPhone" class="col-3">Telefonnummer kontaktperson:</label>
                        <input type="text" name="eventPhone" class="col">
                        <p class="mb-5"><?php echo $createEventPhoneErr; ?></p>
                    </p>

                    <input type="submit" value="Opret" name="eventSubmit">
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