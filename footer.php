<?php $ayarsor=$db->prepare("select * from ayar");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC); ?>

<footer class="footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6 col-lg-4">
        <h3 class="heading-section"><?php echo $ayarcek['ayar_baslik']; ?></h3>
        <p class="mb-5"><?php echo $ayarcek['ayar_icerik']; ?></p>
        <p><a href="#" class="btn btn-primary px-4">Rezervasyon</a></p>
      </div>
      <div class="col-md-6 col-lg-4">
        <h3 class="heading-section">Menü</h3>

        <div class="block-23">

          <ul>
            <li><a href="index.php">Anasayfa</a></li>
            <li><a href="hakkimizda.php">Hakkımızda</a></li>
            <li><a href="odalar.php">Odalar</a></li>
            <li><a href="galeri.php">Galeri</a></li>
            <li><a href="servis.php">Servis</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-6 col-lg-4" itemscope itemtype = "http://schema.org/Hotel" >
        <div class="block-23">
          <h3 class="heading-section"><?php echo $ayarcek['ayar_baslik2']; ?></h3>
          <ul>
             <span itemprop = "starRating" itemscope itemtype = "http://schema.org/Rating" > 
            <li itemprop = "address" ><span class="icon icon-map-marker"></span><span itemprop = "streetAddress" class="text"><?php echo $ayarcek['ayar_adres']; ?></span></li>
            <li><span class="icon icon-phone" itemprop="telephone"></span><span class="text"><?php echo $ayarcek['ayar_telefon']; ?></span></li>
            <li><span class="icon icon-envelope"></span><span class="text"><?php echo $ayarcek['ayar_mail']; ?></span></li>
            <li><span class="icon icon-clock-o"></span><span class="text"><?php echo $ayarcek['ayar_mesai']; ?></span></li>
          </ul>
        </div>
      </div>


    </div>
    <div class="row pt-5">
      <div class="col-md-12 text-left">
       
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
    baguetteBox.run('.tz-gallery');
  </script> 
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>

<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>


</body>
</html>