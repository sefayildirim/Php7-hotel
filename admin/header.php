<?php
$url = 'http://localhost/sefa/otel/';
ob_start();
session_start();
include 'baglan.php';

if($_SESSION['oturum']!=1){
  header("Location:login.php");
}


$kullanicisor=$db->prepare("select * from kullanicilar where kadi='".$_SESSION['name']."'");
$kullanicisor->execute(array(0));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);






$genelayarsor=$db->prepare("select * from genelayar");
$genelayarsor->execute(array(0));
$genelayarcek=$genelayarsor->fetch(PDO::FETCH_ASSOC); 
?>

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
    <title>Otel Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/red.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img width="65px;" height="70px;" src="../<?php echo $genelayarcek['genelayar_yol']; ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img width="65px;" height="70px;" src="../<?php echo $genelayarcek['genelayar_yol']; ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- Messages -->
                
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                     
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/user1.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../img/user1.png" style="width: 80px;height: 80px;" alt="user"></div>
                                            <div class="u-text">
                                                <br>
                                                <h2><?php echo $_SESSION['name']; ?></h2>
                                              </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                 
                                   
                               
                                    <li role="separator" class="divider"></li>
                                    <li><a href="kullaniciduzenle.php?id=<?php echo $kullanicicek['id']; ?>"><i class="mdi mdi-account-circle"></i> Profil Ayarları</a> </li>
                                    <li><a href="genelayar.php"><i class="ti-settings"></i> Genel Ayarlar</a></li>

                                    
                                    <li><a href="ayar.php"><i class="mdi mdi-dots-horizontal"></i> Footer Ayarları</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Çıkış</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                     
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                       
                        <li>
                            <a class="has-arrow" href="index.php" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Anasayfa </span></a>
                       
                        </li>
                           <li>
                            <a class="has-arrow" href="slider.php" aria-expanded="false"><i class="mdi mdi-video-switch"></i><span class="hide-menu">Slider </span></a>
                       
                        </li>
                           <li>
                            <a class="has-arrow" href="hakkimizda.php" aria-expanded="false"><i class="fa fa-user-circle"></i><span class="hide-menu">Hakkımızda </span></a>
                       
                        </li>
                         <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Odalar</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="odalar.php">Oda sayfası</a></li>
                                <li><a href="oda.php">Odaları listele</a></li>
                                <li><a href="odaekle.php">Oda ekle</a></li>
                            
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="resim.php" aria-expanded="false"><i class="mdi mdi-folder-multiple-image"></i><span class="hide-menu">Galeri </span></a>
                       
                        </li>
                          <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-car-connected"></i><span class="hide-menu">Servisler</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="servisler.php">Servis sayfası</a></li>
                                <li><a href="servis.php">Servisleri listele</a></li>
                                <li><a href="servisekle.php">Yeni servis ekle</a></li>
                            
                            </ul>
                        </li>
                          <li>
                            <a class="has-arrow" href="yorumlar.php" aria-expanded="false"><i class="mdi mdi-comment-processing"></i><span class="hide-menu">Yorumlar </span></a>
                       
                        </li>
                           <li>
                            <a class="has-arrow" href="rezervasyon.php" aria-expanded="false"><i class="mdi mdi-deskphone"></i><span class="hide-menu">Rezervasyon talepleri</span></a>
                       
                        </li>
                       
                   
                              <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Kullanıcılar</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="kullanicilar.php">Kullanıcıları listele</a></li>
                                <li><a href="kullaniciekle.php">Yeni kullanıcı ekle</a></li>
                            
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Ayarlar</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="genelayar.php">Genel ayarlar</a></li>
                                <li><a href="ayar.php">Footer ayarları</a></li>
                            
                            </ul>
                        </li>
                      

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>