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
    }else{
        header("Location: ../../index.html");
    }

}else{
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
    <title>AliMel.it | assign work</title>

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
                    $session_username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
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
                    <li class="active"><a href="assignwork.php">assign work</a></li>
                    <li><a href="jobdonebyworkers.php">job done by</br></br>workers</a></li>
                    <li><a href="ordersdone.php">orders done</a></li>
                    <li><a href="orderstodo.php">orders to do</a></li>
                </ul>
            </nav>
        </header>

        <!-- Header Area End -->
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <?php
                
                $personnel = array();
                $i = 0;

                $mysqli = new mysqli('localhost', 'root', '', 'ou_alimel');

                if ($mysqli->connect_error) {
                    die('Errore di connessione(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
                }


                try {
                    $tabviaggi = $mysqli->query("SELECT * FROM w_available");
                } catch (exception $e) {
                    echo $e->getMessage() + "<br/>";
                    echo "Materia not found GO BACK <--";
                } finally {
                    echo "<div><h2>WORKERS AVAILABLE</h2></div>
                    <table class='customers'>
                    <tr>
                    <th>username</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>state</th>
                    </tr>";

                    while ($riga = $tabviaggi->fetch_array(MYSQLI_ASSOC)) {


                            echo "<tr>
                            <td>" . $riga['username'] . "</td>
                            <td>" . $riga['name'] . "</td>
                            <td>" . $riga['surname'] . "</td>
                            <td class='available'>available</td>
                            <td class='assignwork'><a href='assignwork_.php?username=${riga['username']}'>assign work</a></td>
                            </tr>";
                        
                    }
                }
                echo "</table></br>";

                // -------------------------------------------------END WORKERS AVAILABLE------------------------------------------------------------//

                try {
                    $tabviaggi = $mysqli->query("SELECT * FROM w_not_working");
                } catch (exception $e) {
                    echo $e->getMessage() + "<br/>";
                    echo "Materia not found GO BACK <--";
                } finally {
                    echo "<div><h2>WORKERS NOT WORKING</h2></div>
                    <table class='customers'>
                    <tr>
                    <th>username</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>state</th>
                    </tr>";
                    while ($riga = $tabviaggi->fetch_array(MYSQLI_ASSOC)) {


                            echo"<tr>
                            <td>" . $riga['username'] . "</td>
                            <td>" . $riga['name'] . "</td>
                            <td>" . $riga['surname'] . "</td>
                            <td class='notworking'>not working</td>
                            </tr>";
                        }
                    
                }
                echo "</table></br>";

                // -------------------------------------------------END WORKERS NOT WORKING ------------------------------------------------------------//




                try {
                    $tabviaggi = $mysqli->query("SELECT personnel_account.username, personnel_account.name, personnel_account.surname,  personnel_account.working FROM personnel_account ORDER BY personnel_account.username ASC");
                } catch (exception $e) {
                    echo $e->getMessage() + "<br/>";
                    echo "Materia not found GO BACK <--";
                } finally {
                    echo "<div><h2>ALL WORKERS</h2></div>
                    <table class='customers'>
                    <tr>
                    <th>username</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>state</th>
                    </tr>";
                    while ($riga2 = $tabviaggi->fetch_array(MYSQLI_ASSOC)) {


                            echo"<tr>
                            <td>" . $riga2['username'] . "</td>
                            <td>" . $riga2['name'] . "</td>                       
                            <td>" . $riga2['surname'] . "</td>";
                            if ($riga2['working'] == 0) {
                                $statolavoratore = '';
                                echo "<td class='notworking'>not working</td>";
                            } elseif ($riga2['working'] == 1) {
                                $statolavoratore = '';
                                echo "<td class='available'>available</td>
                                <td class='assignwork'><a href='assignwork_.php?username=${riga2['username']}'>assign work</a></td>";
                            } else {
                                echo "<td class='working'>working...</td>";
                            }
                            echo "</tr>";
                        
                    }
                }
                echo "</table>";

                // -------------------------------------------------END ALL WORKERS------------------------------------------------------------//

                ?>
                </br></br></br>

            </div>
        </div>
        <!-- Product Catagories Area End -->
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
                                        <li class="nav-item active">
                                            <a class="nav-link" href="homeadmin.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="assignwork.php">assign work</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="jobdonebyworkers.php">job done by workers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ordersdone.php">orders done</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="orderstodo.php">orders to do</a>
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