<?php
session_start() ;
require_once('include/db.inc.php') ; 
require_once('functions.php'); 


/*
 * Authrizing user
 */
authrizeUser() ;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
    <script>
    /* function to load active class dynamically in header menus */

    $('#menu > ul.nav li a').click(function(e) {
        var $this = $(this);
        $this.parent().siblings().removeClass('active').end().addClass('active');
        e.preventDefault();
    });

    </script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    WELCOME ADMIN
                </a>
            </div><!---logo end here-->

            <div class="sidebar-wrapper" >
                <ul class="nav">
                    <li <?php echo add_active_class('dashboard')  ; ?> >
                        <a href="dashboard.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li <?php echo add_active_class('register')  ; ?> >
                        <a href="./register.php?type=register">
                            <i class="material-icons">person</i>
                            <p>Register User</p>
                        </a>
                    </li>
                    <li <?php echo add_active_class('student_list')  ; ?> >
                        <a href="./student_list.php">
                            <i class="material-icons">content_paste</i>
                            <p>Student List</p>
                        </a>
                    </li>
                    <li <?php echo add_active_class('certificate')  ; ?> >
                        <a href="./certificate.php">
                            <i class="material-icons">library_books</i>
                            <p>Certificate</p>
                        </a>
                    </li>
                    <li <?php echo add_active_class('attendance')  ; ?> >
                        <a href="./attendance.php">
                            <i class="material-icons">bubble_chart</i>
                            <p>Student Attendance</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div><!---sidebar end-->

        <!--- main panel start-->
        <div class="main-panel">
            <!---main panel nav-->
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> <h3>Your Dashboard</h3> </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            
                            <li>
                            <a href="logout.php">
                                    <i class="material-icons">lock</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav><!---mail panel nav end-->