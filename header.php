<?php
include 'admin/baglan.php';
$url = 'http://localhost/sefa/otel/';

$genelayarsor=$db->prepare("select * from genelayar");
$genelayarsor->execute(array(0));
$genelayarcek=$genelayarsor->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="tr">
<head itemscope itemtype = "http://schema.org/Hotel">
  <title itemprop="name"><?php echo $genelayarcek['genelayar_baslik']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description " itemprop="description" content="<?php echo $genelayarcek['genelayar_aciklama']; ?>">
  <meta name="author"itemprop="author" content="<?php echo $genelayarcek['genelayar_kelimeler']; ?>">
  <meta itemprop = "ratingValue" content = "5" >   

  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="gallery-grid.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container" itemscope itemtype = "http://schema.org/Hotel">
      <a class="navbar-brand" href="index.php"><img itemprop = "logo" width="90px;" height="90px;" src="<?php echo $genelayarcek['genelayar_yol']; ?>"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menü
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Anasayfa</a></li>
          <li class="nav-item"><a href="hakkimizda.php" class="nav-link">Hakkımızda</a></li>
          <li class="nav-item"><a href="odalar.php" class="nav-link">Odalar</a></li>
          <li class="nav-item"><a href="galeri.php" class="nav-link">Galeri</a></li>
          <li class="nav-item"><a href="servis.php" class="nav-link">Servis</a></li>
          <li class="nav-item"><a href="iletisim.php" class="nav-link">İletişim</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->