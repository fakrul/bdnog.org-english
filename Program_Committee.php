<?php
    require("config.php");

    if(!empty($_POST))
    {
        // Ensure that the user fills out fields
        if(empty($_POST['firstname']))
        { die("Please enter firstname."); }
        if(empty($_POST['lastname']))
        { die("Please enter lastname."); }
        if(empty($_POST['biography']))
        { die("Please enter a biography."); }
        if(empty($_POST['address']))
        { die("Please enter a address."); }
        if(empty($_POST['phone']))
        { die("Please enter a phone."); }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        { die("Invalid E-Mail Address"); }

        // Check if the email is already taken
        //$query = "SELECT 1 FROM users WHERE email = :email";
        //$query_params = array(':email' => $_POST['email']);

        //try {$stmt = $db->prepare($query);
          //  $result = $stmt->execute($query_params);
        //}
        
        //catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());}
        //$row = $stmt->fetch();
        //if($row){ die("This email address is already registered"); }

        // Add row to database
        $query = "
            INSERT INTO eoi_pc (
                slno,
                firstname,
                lastname,
                organization,
                position,
                biography,
                address,
                email,
                phone,
                contribution

            ) VALUES (
                '',
                :firstname,
                :lastname,
                :organization,
                :position,
                :biography,
                :address,
                :email,
                :phone,
                :contribution
            )
        ";

        $query_params = array(
            ':firstname' => $_POST['firstname'],
            ':lastname' => $_POST['lastname'],
            ':organization' => $_POST['organization'],
            ':position' => $_POST['position'],
            ':biography' => $_POST['biography'],
            ':address' => $_POST['address'],
            ':email' => $_POST['email'],
            ':phone' => $_POST['phone'],
            ':contribution' => $_POST['contribution']
        );

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
        header("Location: Form_Success.php");
        die("Redirecting to Program_Committee.php");
    }
?>

    <!DOCTYPE html>
    <!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
    <!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->
    <!-- start: HEAD -->

    <head>
        <title>bdNOG | Bangladesh Network Operators Group</title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="description" content="Developed By Bangladesh Network Operators Group">
        <meta name="author" content="Fakrul Alam">
        <meta name="author" content="fakrul@fakrul.com">
        <meta name="keywords" content="Bangladesh Network Operators Group, bdNOG, Network, Telecommunication, Internet Service Provider">
        <meta HTTP-EQUIV="CHARSET" CONTENT="ISO-8859-1">
        <meta HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="English">
        <meta HTTP-EQUIV="VW96.OBJECT TYPE" CONTENT="SearchEngine">
        <meta NAME="RATING" CONTENT="General">
        <meta NAME="ROBOTS" CONTENT="index,follow">
        <meta name="google-site-verification" content="u_dop4ZU2FDPxe0yb3aR3Ob9_7TtuGi_7Zs_bw-zlao" />

        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/style.css">
        <link rel="stylesheet" href="assets/plugins/animate.css/animate.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/main-responsive.css">
        <link rel="stylesheet" href="assets/css/theme_blue.css" type="text/css" id="skin_color">
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->

        <link rel="stylesheet" href="assets/plugins/flex-slider/flexslider.css">
        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />

        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: HTML5SHIV FOR IE8 -->
        <!--[if lt IE 9]>
		<script src="assets/plugins/html5shiv.js"></script>
		<![endif]-->
        <!-- end: HTML5SHIV FOR IE8 -->
    </head>
    <!-- end: HEAD -->

    <body>
        <!-- start: HEADER MENU -->
        <?php include('header.php'); ?>
            <!-- end: HEADER MENU -->

            <!-- start: MAIN CONTAINER -->
            <div class="main-container">

                <section class="page-top">
                    <div class="container">
                        <div class="col-md-4 col-sm-4">
                            <h1>Program Committee</h1>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <ul class="pull-right breadcrumb">
                                <li>
                                    <a href="index.php">
                            Home
                            </a>
                                </li>
                                <li>
                                    bdNOG Board
                                </li>
                                <li class="active">
                                    Program Committee
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- start: MAIN TEXT -->
                <section class="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div>
                                    <p style="text-align:justify">bdNOG program committee is responsible for organizing overall content of bdNOG conference program. One of the core function of program committee is to search for local talent and help them to prepare presentation to present in bdNOG conference. Members of the program committee are selected to work for upcoming conference only. bdNOG EC will solicit to volunteer the Program Committee before every conference. Majority of the PC members are selected from bdNOG community and some are selected from other NOG community across the region.
                                    </p>

                                    <p style="text-align:justify"><b>bdNOG is currently inviting expression of interest to volunteer for bdNOG program committee.</b>
                                    </p>
                                    <br>

                                    <div class="col-lg-12 col-sm-12 address">
                                        <h4>EOI for Program Committee</h4>
                                        <div class="contact-form">
                                            <form id="loginform" class="form-horizontal" role="form" action="Program_Committee.php" method="post">

                                                <div class="form-group">
                                                    <label for="firstname">First Name *</label>
                                                    <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control" data-validation="length" data-validation-length="min2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastname">Last Name *</label>
                                                    <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control" data-validation="length" data-validation-length="min2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="organization">Working Organization</label>
                                                    <input type="text" placeholder="Working Organization" id="organization" name="organization" class="form-control" data-validation="length" data-validation-length="min2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="position">Position</label>
                                                    <input type="text" placeholder="Position" id="position" name="position" class="form-control" data-validation="length" data-validation-length="min2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="biography">Short Biography *</label>
                                                    <textarea placeholder="" id="biography" name="biography" rows="5" class="form-control" data-validation="length" data-validation-length="min10">
                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address *</label>
                                                    <input type="text" placeholder="Address" id="address" name="address" class="form-control" data-validation="length" data-validation-length="min2">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email *</label>
                                                    <input type="text" placeholder="Email" id="email" name="email" class="form-control" data-validation="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone *</label>
                                                    <input type="text" placeholder="Phone" id="phone" name="phone" class="form-control" data-validation="length" data-validation-length="min5">
                                                </div>
                                                <div class="form-group">
                                                    <label for="contribution">What contribution you can make to PC *</label>
                                                    <textarea placeholder="" rows="5" id="contribution" name="contribution" class="form-control" data-validation="length" data-validation-length="min2">
                                                    </textarea>
                                                </div>
                                                <div class="col-sm-12 controls">
                                                    <input type="submit" class="btn btn-info" value="submit" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- start: SPONSORS SLIDER -->
                                <?php include('sponsors_slider.php'); ?>
                                    <!-- end: SPONSORS SLIDER -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end: MAIN TEXT -->
            </div>
            <!-- end: MAIN CONTAINER -->

            <!-- start: FOOTER -->
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <p>
                                &copy; Copyright 2015 by Bangladesh Network Operators Group.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
            <!-- end: FOOTER -->
            <!-- start: MAIN JAVASCRIPTS -->
            <!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script src="assets/plugins/html5shiv.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
            <!--[if gte IE 9]><!-->
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <!--<![endif]-->
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
            <script src="assets/plugins/jquery.transit/jquery.transit.js"></script>
            <script src="assets/plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
            <script src="assets/plugins/jquery.appear/jquery.appear.js"></script>
            <script src="assets/plugins/blockUI/jquery.blockUI.js"></script>
            <script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
            <script src="assets/js/main.js"></script>
            <!-- end: MAIN JAVASCRIPTS -->
            <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
            <script src="assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
            <script src="assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
            <script src="assets/plugins/flex-slider/jquery.flexslider.js"></script>
            <script src="assets/plugins/stellar.js/jquery.stellar.min.js"></script>
            <script src="assets/plugins/colorbox/jquery.colorbox-min.js"></script>

            <script src="assets/js/index.js"></script>
            <!-- bxSlider Javascript file -->
            <script src="js/jquery.bxslider.min.js"></script>
            <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
            <!-- start: validate form -->
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
            <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
            <script>
                $.validate();
            </script>
            <!-- end: validate form -->

            <script>
                jQuery(document).ready(function () {
                    Main.init();
                    Index.init();
                    $.stellar();
                });
            </script>

            <!--box slider-->
            <script>
                $('.bxslider').bxSlider({
                    slideWidth: 200,
                    auto: true,
                    autoControls: true,
                    controls: true
                });
            </script>


    </body>

    </html>