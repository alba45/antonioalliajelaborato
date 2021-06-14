<?php

require_once('../database.php');
session_start();

if (isset($_SESSION['id']) === true) {

    $session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');

    $query = "
            SELECT username
            FROM admin_account
            WHERE username = :username";

    $check = $pdo->prepare($query);
    $check->bindParam(':username', $session_username, PDO::PARAM_STR);
    $check->execute();

    $usernamecheck = $check->fetchAll(PDO::FETCH_ASSOC);

    if (count($usernamecheck) > 0) {
    } else {
        header("Location: ../../index.html");
    }
} else {
    header("Location: ../../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>AliMel.it | create new admin</title>

    <!-- Favicon  -->
    <link rel="icon" href="../../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../../css/core-style.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="indexlogged.html"><img src="../../img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="homeadmin.php"><img src="../../img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <div>
                <h3>Welcome,
                    <?php
                    printf($session_username);
                    ?>
                </h3>
            </div>
            <div class="amado-btn-group mt-30 mb-100">
                <a href="logout.php" class="btn amado-btn mb-15">Logout</a>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="homeadmin.php">home</a></li>
                    <li><a href="assignwork.php">assign work</a></li>
                    <li><a href="jobdonebyworkers.php">orders done by</br></br>workers</a></li>
                    <li><a href="ordersdone.php">orders done</a></li>
                    <li><a href="orderstodo.php">orders to do</a></li>
                </ul>
            </nav>
        </header>
        <!-- Header Area End -->
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Registration: new admin</h2>
                                <h5>Insert the credential to the correct field</h5>
                            </div>

                            <form action="registeradmin.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="username" class="form-control" name="username" id="username" placeholder="username" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password(min 8)" required>
                                    </div></br>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone" name="phone" min="0" placeholder="Phone Numer" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <a><?php
                                            $msg = $_GET['msg'];
                                            echo "$msg";
                                            ?></a>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="cart-btn mt-100">
                                            <button type="submit" class="btn amado-btn mb-15" name="register">Register</button></br></br>
                                            <a>Do you want to create a worker account? Click down below.</a></br></br>
                                            <a href="registerworkerindex.php" class="btn amado-btn mb-15">New worker</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="newsletter-text mb-100">
                    <h2><span>AliMel the company created by you</span></h2>
                    <p>We need to thank everyone that work in our company.
                        Your work is what made this company big and we will make it even bigger.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="indexlogged.html"><img src="../../img/core-img/logo.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This
                            template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="homeadmin.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="assignwork.php">assign work</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="jobdonebyworkers.php">orders done by workers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ordersdone.php">orders done</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="../../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../../js/plugins.js"></script>
    <!-- Active js -->
    <script src="../../js/active.js"></script>

</body>

</html>