<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test Log</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="<?php echo base_url("assets/css/clean-blog.min.css"); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url("assets/vendor/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js"); ?>"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?php echo base_url("assets/js/jqBootstrapValidation.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/contact_me.js"); ?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?php echo base_url("assets/js/clean-blog.min.js"); ?>"></script>
    <script src="<?php echo base_url("custom/js/login.js"); ?>"></script>
    
    



    <!-- Jquery validation -->
    <!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>-->
    <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
    
    <!-- -->

    



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body.modal-open-noscroll {
          margin-right: 0!important;
          overflow: hidden;
        }
        body.modal-open-noscroll .navbar-fixed-top, .modal-open .navbar-fixed-bottom {
          margin-right: 0!important;
        }
    </style>

    <!--<style>
        body {
            background: #eee none repeat scroll 0 0;
        }
        .form-validation {
            margin: 30px auto 0;
            width: 350px;
        }
    </style>-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sample Post</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li class="navLoginBtn">
                        <!--<a href="<?php //echo base_url() ?>index.php/login">Login</a>-->
                        <a href="#" data-toggle="modal" data-target="#myModal" class="navLoginBtn">Login</a>
                    </li>
                    <!--<li>
                        <a href="" id="btnLogout">Logout</a>
                    </li>-->
                    <!--<li>
                        <div class="dropdown show">
                          <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lester
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#" style="text-align: center; padding: 0px;">Logout</a></li>
                            
                          </ul>
                        </div>
                    </li>-->
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('../assets/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Auth test</h1>
                        <hr class="small">
                        <span class="subheading">Authentication test</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
    <div id="sessionUsername">
    </div>
    

    <!--Login small modal-->

    <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="position: absolute; padding-right: 0 !important;">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
           <div class="modal-header btn-primary">
            <h5 class="modal-title">Login</h5>
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>-->
          </div>
          <div class="modal-body">
           <!--<div id="messages"></div>-->
           <div class="alert alert-success" id="loginsuccess" style="font-size: 12px; display: none;">
          </div>
            <form id="loginForm" action="Users/login" method="post">
              <div class="form-group">
                <label for="email" style="font-size: 12px;">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <div id="loginemailrequired" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
              </div>
              <div class="form-group">
                <label for="loginPass" style="font-size: 12px;">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="form-check">
                <label class="form-check-label" style="font-size:12px;">
                  <input type="checkbox" class="form-check-input">
                  Remember me
                </label>
              </div>
              <a href="" class=".btn-link" style="font-size: 12px;">forgot password</a><br>
              <!--<a href="" id="btnCreateAccount" data-toggle="modal" data-target="#mySignModal" data-dismiss="modal" class="btn-link openSignin" style="font-size: 11px;">Create account</a>-->
              <!--<a onclick="$('.modal-to-close').one('hidden.bs.modal', function() { $('.modal-to-open').modal('show'); }).modal('hide');">Open Modal</a>-->
              <a href="" id="btnCreateAccount" data-toggle="modal" data-target="#mySignModal" data-dismiss="modal" class="btn-link" style="font-size: 11px;">Create account</a>
              <!--<a href="" id="btnCreateAccountTest2" data-dismiss="modal" class="btn-link" style="font-size: 11px;">Create account test 2</a>-->
            
          </div>
          <div class="modal-footer">
            <button type="submit" id="btnLogin" class="btn-sm btn-success">Login</button>
            </form>
            <button type="button" class="btn-sm btn-secondary" data-dismiss="modal">Close</button>
          </div>
          
        </div>
      </div>
    </div>

    <!--place here the small signin modal html -->

    <!-- Signin Small Modal-->
    <div class="modal fade bd-example-modal-sm" id="mySignModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <!--<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">-->
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
           <div class="modal-header btn-primary">
            <h5 class="modal-title">Sign-in</h5>
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>-->
          </div>
          <div class="modal-body">
          <div class="alert alert-success" id="registrationsuccess" style="font-size: 12px; display: none;">
          </div>

          
          <!--<div class="form-validation">-->
            <form id="signinForm" action="Users/register" method="post">
              <input type="hidden" name="txtId" value="0">
              <div class="form-group">
                <label for="txtUsername" style="font-size: 12px;">Username</label>
                <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Enter username">
                <div id="usernamerequired" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
                
                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
              </div>
              <div class="form-group">
                <label for="txtEmail" style="font-size: 12px;">Email</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" aria-describedby="emailHelp" placeholder="Enter email">
                <div id="emailrequired" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
                <div id="validemail" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>

                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
              </div>
              <div class="form-group">
                <label for="txtPassword" style="font-size: 12px;">Password</label>
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password">
                <div id="passwordrequired" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
                <div id="passwordlength" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
                
              </div>
              <div class="form-group">
                <label for="txtConfirmPass" style="font-size: 12px;">Confirm Password</label>
                <input type="password" class="form-control" name="txtConfirmPass" id="txtConfirmPass" placeholder="Password">
                <div id="passwordnotmatch" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
                <div id="retypepassword" style="font-size: 12px; color: red; display: none; margin-left: 8px; margin-top: 5px;"></div>
              </div>
              
              
          
              
            
            <!--</div>--><!--end of form-validation div-->
          </div>
          <div class="modal-footer">
            <!--<input type="submit" id="btnRegister" value="sign-up" class="btn-sm btn-success">-->
            
            <button type="submit" id="btnRegister" class="btn-sm btn-success">Submit</button>
            </form>
            <button type="button" class="btn-sm btn-secondary" data-dismiss="modal">Close</button>

          </div>
          
        </div>
      </div>
    </div>


    <script>

    
        
        
    </script>






