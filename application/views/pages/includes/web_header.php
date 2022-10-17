<?php
$user_info = $this->session->userdata('user_data');
$emp_info = $this->session->userdata('emp_data');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <title>Dashboard </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/assets/css/material-dashboard.min.css?v=2.0.1">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/assets/assets-for-demo/demo.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- iframe removal -->
    <script type="text/javascript">
    if (document.readyState === 'complete') {
        if (window.location != window.parent.location) {
            const elements = document.getElementsByClassName("iframe-extern");
            while (elemnts.lenght > 0) elements[0].remove();
            // $(".iframe-extern").remove();
        }
    };
    </script>
    <style>
    textarea.cke_source {
        height: 100% !important;
    }
    </style>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="rose" data-background-color="green" data-image="./assets/img/sidebar-2.jpg">
            <!--
				data-color="purple | azure | green | orange | danger"
			-->

            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    <i class="material-icons" style="padding-bottom: 4px;">donut_small</i>
                </a>
                <a href="#" class="simple-text logo-normal">
                   Think-Champ
                </a>
            </div>

            <div class="sidebar-wrapper">
                <div class="user">
                    <!--<div class="photo">
							<img src="./assets/img/faces/avatar.jpg" />
						</div>-->
                    <div class="photo">
                        <i class="fa fa-user" style="font-size:27px; padding:2px 7px;"></i>
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
                            <span>
                                <strong><?= $emp_info->designation ?></strong>
                                <b class="caret"></b>
                                <!--<b class="caret"></b>-->
                            </span>
                            <span style="padding-top:10px; padding-left:54px; font-size:0.8rem;">
                            <?= $emp_info->designation." " ?><?= ucfirst($emp_info->emp_name) ?>
                            </span>
                            <!--<span style="padding-top:5px; font-size:1.1rem;">
								   Institute Name
								</span>-->
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="modal" data-target="#change_pass"
                                        onclick="$('.close-layer').click()">
                                        <span class="sidebar-mini"> CP </span>
                                        <span class="sidebar-normal"> Change Password </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("Profile") ?>">
                                        <span class="sidebar-mini"> VP </span>
                                        <span class="sidebar-normal"> View Profile </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="?page=edit-profile">
                                        <span class="sidebar-mini"> EP </span>
                                        <span class="sidebar-normal"> Edit Profile </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php if($user_info->access_level== 0 ){ ?>
                <ul class="nav">
                    <?php
                    $active="";
                   $current_page =  $_SERVER['REQUEST_URI'] ;
                   $current_page = explode("/",$current_page);
                   foreach($current_page as $c_p)
                   {
                    if($c_p=="Admin"){
                        $active = "active";
                    }
                   }
                     ?>
                    <li class="nav-item <?= $active ?> ">
                        <a class="nav-link" href="<?= base_url('Admin') ?>">
                            <i class="material-icons">dashboard</i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <?php
                    $active = "";
                   $current_page =  $_SERVER['REQUEST_URI'] ;
                   $current_page = explode("/",$current_page);
                   foreach($current_page as $c_p)
                   {
                    if($c_p=="Course-List"){
                        $active = "active";
                    }
                   }
                     ?>
                    <li class="nav-item <?= $active; ?> ">
                        <a class="nav-link" href="<?= base_url('Course-List') ?>">
                            <i class="material-icons">book-open</i>
                            <p> Course </p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Batch-List"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>" >
                        <a class="nav-link" href="Batch-List">
                            <i class="material-icons">laptop</i>
                            <p>Batch</p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Group-List"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>" >
                        <a class="nav-link" href="Group-List">
                            <i class="material-icons">group</i>
                            <p>Group</p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Assignment"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>" >
                        <a class="nav-link" href="Assignment">
                            <i class="material-icons">assignment</i>
                            <p>Assignment</p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Quiz"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>">
                        <a class="nav-link" href="Quiz">
                            <i class="material-icons">quiz</i>
                            <p> Quiz</p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Testimonial-List"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>">
                        <a class="nav-link" href="Testimonial-List">
                            <i class="material-icons">star</i>
                            <p> Testimonial</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" onclick="logout();">
                            <i class="material-icons">input</i>
                            <p> Log Out
                            </p>
                        </a>
                    </li>
                </ul>
                <?php } if($user_info->access_level== 1 || $user_info->access_level== 2){ ?>
                    <ul class="nav">
                    <?php
                    $active="";
                   $current_page =  $_SERVER['REQUEST_URI'] ;
                   $current_page = explode("/",$current_page);
                   foreach($current_page as $c_p)
                   {
                    if($c_p=="Teacher-Dashboard"){
                        $active = "active";
                    }
                   }
                     ?>
                    <li class="nav-item <?= $active ?> ">
                        <a class="nav-link" href="<?= base_url('Teacher-Dashboard') ?>">
                            <i class="material-icons">dashboard</i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Assignment"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>" >
                        <a class="nav-link" href="Assignment">
                            <i class="material-icons">assignment</i>
                            <p>Assignment</p>
                        </a>
                    </li>
                    <?php
                    $active="";
                    $current_page =  $_SERVER['REQUEST_URI'] ;
                    $current_page = explode("/",$current_page);
                    foreach($current_page as $c_p)
                    {
                     if($c_p=="Quiz"){
                         $active = "active";
                     }
                    }
                     ?>
                    <li class="nav-item <?= $active; ?>">
                        <a class="nav-link" href="Quiz">
                            <i class="material-icons">quiz</i>
                            <p> Quiz</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" onclick="logout();">
                            <i class="material-icons">input</i>
                            <p> Log Out
                            </p>
                        </a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="main-panel">


            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end">
                        <!--<form class="navbar-form">
							  <div class="input-group no-border">
								  <input type="text" value="" class="form-control" placeholder="Search...">
								  <button type="submit" class="btn btn-white btn-round btn-just-icon">
									<i class="material-icons">search</i>
									<div class="ripple-container"></div>
								  </button>
							  </div>
						  </form>-->

                        <ul class="navbar-nav">
                            <li class="nav-item" style="display: flex;">
                                <i class="material-icons"
                                    style="float: left; line-height: 30px; margin-right:10px;">date_range</i>
                                <span
                                    style="line-height: 30px; font-size: 14px; position: relative; display: block;"><strong>02
                                        Aug 2022</strong></span>
                            </li>
                            
                            <!--<li class="nav-item">
									<a class="nav-link" href="#" onclick="logout();">
										<i class="material-icons">input</i><strong>Logout</strong>
									</a>
								</li>-->
                            <!--<li class="nav-item dropdown">
									<a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="material-icons">notifications</i>
										<span class="notification">5</span>
										<p>
											<span class="d-lg-none d-md-block">Some Actions<b class="caret"></b></span>
										</p>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="#">Mike John responded to your email</a>
										<a class="dropdown-item" href="#">You have 5 new tasks</a>
										<a class="dropdown-item" href="#">You're now friend with Andrew</a>
										<a class="dropdown-item" href="#">Another Notification</a>
										<a class="dropdown-item" href="#">Another One</a>
									</div>
								</li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="https://creative-tim.com" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions<b class="caret"></b></span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <!--<a class="dropdown-item" href="#">Profile</a>
										<a class="dropdown-item" href="#">Edit Profile</a>
										<a class="dropdown-item" href="#">Settings</a>-->
                                    <a class="dropdown-item" data-toggle="modal" data-target="#change_pass">Change
                                        Password</a>
                                    <a class="dropdown-item" onclick="logout();" href="#">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="password" class="form-control" placeholder="Enter New Password" id="newpass">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="update_pass()"
                                id="save_btn_up">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
            function update_pass() {
                var pass = $("#newpass").val();
                if (pass.length < 6 || pass.length > 12) {
                    $.notify({
                        message: "Password length should be greater than 6 and less than 12 chars."
                    }, {
                        type: "warning",
                        timer: 4000,
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        }
                    });
                } else {
                    var datasend = {
                        pass: pass
                    };
                    $("#save_btn_up").attr("disabled", "disabled");
                    $("#save_btn_up").html("Please Wait");
                    $.post(
                        "scripts/update_pass.php",
                        datasend,
                        function(data) {
                            if (data == 1) {
                                $.notify({
                                    message: "Password changed successfully."
                                }, {
                                    type: "success",
                                    timer: 4000,
                                    placement: {
                                        from: 'bottom',
                                        align: 'center'
                                    }
                                });
                            } else {
                                $.notify({
                                    message: data
                                }, {
                                    type: "warning",
                                    timer: 4000,
                                    placement: {
                                        from: 'bottom',
                                        align: 'center'
                                    }
                                });
                            }
                            $("#save_btn_up").removeAttr("disabled");
                            $("#save_btn_up").html("Save");
                        }
                    );
                }
            }
            </script>
            <script>
            function openNav() {
                $("#mySidenav").addClass('show');
            }

            function closeNav() {
                $("#mySidenav").removeClass('show');
            }
            </script>