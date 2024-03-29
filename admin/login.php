<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <section id="wrapper">
            <div class="login-register" style="background-image:url(../img/2.jpg);">        
                <div class="login-box card">
                    <div class="card-body">
                        <?php
                        session_start(); 
                        include("baglan.php");  


                        ?>
                        <div class="limiter">
                            <div class="container-login100">
                                <div class="wrap-login100 p-t-85 p-b-20">
                                    <?php 
                                    if($_POST)
                                    {
                                        $name =$_POST["txtKadi"];
                                        $pass =md5($_POST["txtParola"]);
                                        $query  = $db->query("SELECT * FROM kullanicilar WHERE kadi='$name' && parola='$pass'",PDO::FETCH_ASSOC);

                                        if ( $say = $query -> rowCount() ){
                                            if( $say > 0 ){

                                                $_SESSION['oturum']=true;
                                                $_SESSION['name']=$name;
                                                $_SESSION['pass']=$pass;

                                                header("Location:index.php");

                                            }else{
                                                ?> <script>swal("Hata!", "Oturum Açılmadı Hata!", "warning");</script><?php
                                            }
                                        }else{
                                            ?> <script>swal("Hata!", "Kullanıcı Adı Veya Parola Yanlış!", "error");</script><?php

                                        }
                                    }



                                    ?>
                                    <form id="form1" method="post" class="form-horizontal form-material">
                                        <h3 class="box-title m-b-20">Oturum aç</h3>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" ID="txtKadi" name="txtKadi" value='<?php echo @$txtKadi ?>' placeholder="Kullanıcı adı"> </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input class="form-control"  ID="txtParola" name="txtParola" type="password"  name="kullanici_password" placeholder="Parola"> </div>
                                                </div>

                                                <div class="form-group text-center m-t-20">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" ID="btnGiris">
                                                            Giriş Yap
                                                        </button>
                                                    </div>
                                                </div>


                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!-- ============================================================== -->
                            <!-- End Wrapper -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- All Jquery -->
                            <!-- ============================================================== -->
                            <script src="../assets/plugins/jquery/jquery.min.js"></script>
                            <!-- Bootstrap tether Core JavaScript -->
                            <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
                            <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
                            <!-- slimscrollbar scrollbar JavaScript -->
                            <script src="js/jquery.slimscroll.js"></script>
                            <!--Wave Effects -->
                            <script src="js/waves.js"></script>
                            <!--Menu sidebar -->
                            <script src="js/sidebarmenu.js"></script>
                            <!--stickey kit -->
                            <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
                            <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
                            <!--Custom JavaScript -->
                            <script src="js/custom.min.js"></script>
                            <!-- ============================================================== -->
                            <!-- Style switcher -->
                            <!-- ============================================================== -->
                            <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
                        </body>

                        </html>