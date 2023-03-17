<?php
  session_start();
  include_once 'includes/functions.inc.php';
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>TakeoutTek Logistics Ohio</title>

    <!--Font types from fonts.google.com-->
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playfair+Display&display=swap"
        rel="stylesheet">
    
</head>

<body>
    <header>
        <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
            role="banner" class="navigation w-nav">
            <div class="navigation-wrap">
                <a href="index.php" aria-current="page" class="logo-link nav-logo" aria-label="home"><img
                        src="img/team_logo.png" width="108" alt="" class="logo-image" />
                    <h3 class="logo-text">TakeoutTek Logistics Ohio</h3>
                </a>
                <div class="menu">
                    <nav role="navigation" class="navigation-items w-nav-menu">
                        <a href="about.php" class="navigation-item w-nav-link">About</a>
                        <a href="product.php" class="navigation-item w-nav-link">Product</a>
                        <a href="team.php" class="navigation-item w-nav-link">Team</a>
                        <a href="contact.php" class="navigation-item w-nav-link">Contact</a>
                        <?php
                            if (isset($_SESSION["useruid"])) {
                                echo"<a href='account.php' class='navigation-item w-nav-link'>Account</a>";
                            }
                            else{
                                echo"<a href='login.php' class='navigation-item w-nav-link'>Account</a>";
                            }
                        ?>
                    </nav>
                </div>
                
              <?php
                if (isset($_SESSION["useruid"])) {
                    echo"<a href='logout.php' class='button login-reg-but w-inblock'>LOGOUT</a>";
                }
                else{
                    echo"<a href='login.php' class='button login-reg-but w-inblock'>LOGIN / REGISTER</a>";
                }
              ?>
                
            </div>
        </div>
    </header>