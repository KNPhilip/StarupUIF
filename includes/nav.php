<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">
            <img src="img/LOGO-Starupuif.png" width="40" height="40" class="d-inline-block">
        </a>
        
        <button class="navbar-toggler" type="button" 
        data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto">
            <?php if (!isset($_SESSION["email"]) &&!isset($_SESSION["password"])) { ?>
                <li class='nav-item'>
                    <a href='login.php' class='nav-link'>Login</a>
                </li>
            <?php
            }
            else
            { ?>
                <li class='nav-item'>
                    <a href='logout.php' class='nav-link'>Log ud</a>
                </li>
                <li>
                    <a href='opretArrangement.php' class='nav-link'>Opret arrangement</a>
                </li>
                <li class="position-absolute end-0">
                    <p class='nav-link'>Velkommen <?php echo $_SESSION["email"]; ?></p>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>