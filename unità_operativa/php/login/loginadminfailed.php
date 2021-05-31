<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>UOAliMel.it | Login admin failed</title>

    <!-- Favicon  -->
    <link rel="icon" href="../../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../../css/core-style.css">
    <link rel="stylesheet" href="../../ccs/style.css">

</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        <!-- Header Area Start -->
        <!-- Logo -->
        <div>
            <img src="../../img/core-img/logo.png" alt=""></a>
        </div>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                            <div class="cart-title">
                                <h1>Login admin</h1>
                            </div>
                            <form action="loginadmin.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <a><?php
                                            $msg = $_GET['msg'];
                                            echo "$msg";
                                            ?></a>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn amado-btn mb-15" name="login">login</button></br></br>
                                    <a>Login as a worker</a></br>
                                    <a href="../../index.html" class="btn amado-btn mb-15">worker</a>
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

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.html"><img src="../../img/core-img/logo.png" alt=""></a>
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