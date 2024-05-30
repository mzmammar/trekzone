<?php

session_start();
define("APPURL", "http://localhost/trekzone");
define("COUNTRIESIMAGES", "http://localhost/trekzone/admin-panel/countries-admins/images_countries");
define("CITIESIMAGES", "http://localhost/trekzone/admin-panel/cities-admins/images_cities");

// Function to check if the current page matches the given link
function isCurrentPage($link)
{
    return (basename($_SERVER['PHP_SELF']) == $link);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Trek Zone</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo APPURL; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/owl.css">
    <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?php echo APPURL; ?>" class="logo">
                            <img src="<?php echo APPURL; ?>/assets/images/logo3.png" style="width:185px;height:45px;"
                                alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="<?php echo APPURL; ?>" <?php if (isCurrentPage("index.php")) echo 'class="active"'; ?>>Home</a></li>
                            <li><a href="<?php echo APPURL; ?>/deals.php" <?php if (isCurrentPage("deals.php")) echo 'class="active"'; ?>>Deals</a></li>
                            <?php if (isset($_SESSION['username'])) : ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <?php echo $_SESSION['username']; ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>/users/user.php?id=<?php echo $_SESSION['user_id']; ?>">Your
                                                Bookings</a></li>
                                        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>/change_password.php">change
                                                password</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>/auth/logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li><a href="<?php echo APPURL; ?>/auth/login.php" <?php if (isCurrentPage("login.php")) echo 'class="active"'; ?>>Login</a></li>
                                <li><a href="<?php echo APPURL; ?>/auth/register.php" <?php if (isCurrentPage("register.php")) echo 'class="active"'; ?>>Register</a></li>
                            <?php endif; ?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
