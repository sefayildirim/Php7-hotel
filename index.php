<?php 

include 'header.php';

include 'admin/baglan.php';

$slidersor=$db->prepare("select * from slider where slider_durum=1 order by slider_sira asc");
$slidersor->execute();


if (isset($_POST['giris'], $_POST['cikis'], $_POST['yetiskin'], $_POST['cocuk'],$_POST['telefon'])) {

    $giris = trim(filter_input(INPUT_POST, 'giris', FILTER_SANITIZE_STRING));
    $cikis = trim(filter_input(INPUT_POST, 'cikis', FILTER_SANITIZE_STRING));
    $yetiskin = trim(filter_input(INPUT_POST, 'yetiskin', FILTER_SANITIZE_STRING));
    $cocuk = trim(filter_input(INPUT_POST, 'cocuk', FILTER_SANITIZE_STRING));
    $telefon = trim(filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING));

   

    try {

        $sorgu = $db->prepare("INSERT INTO rezervasyon(rezervasyon_giris, rezervasyon_cikis, rezervasyon_yetiskin, rezervasyon_cocuk, rezervasyon_telefon) 
          VALUES(?, ?, ?, ?, ?)");
        $sorgu->bindParam(1, $giris, PDO::PARAM_STR);
        $sorgu->bindParam(2, $cikis, PDO::PARAM_STR);
        $sorgu->bindParam(3, $yetiskin, PDO::PARAM_STR);
        $sorgu->bindParam(4, $cocuk, PDO::PARAM_STR);
        $sorgu->bindParam(5, $telefon, PDO::PARAM_STR);
        $sorgu->execute();

        echo "<p></p>";

    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $baglanti = null;
}


$odalarsor=$db->prepare("select * from odalar");
$odalarsor->execute(array(0));
$odalarcek=$odalarsor->fetch(PDO::FETCH_ASSOC);

$servislersor=$db->prepare("select * from servisler");
$servislersor->execute(array(0));
$servislercek=$servislersor->fetch(PDO::FETCH_ASSOC);

$servissor=$db->prepare("select * from servis order by servis_id desc LIMIT 0,3");
$servissor->execute();

$yorumlarsor=$db->prepare("select * from yorumlar ");
$yorumlarsor->execute();

$odasor=$db->prepare("select * from oda order by oda_id desc LIMIT 5");
$odasor->execute();

?>

<div class="block-31" style="position: relative;">
  <div class="owl-carousel loop-block-31 ">
    <?php 

    while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { 
      ?>
      <div class="block-30 item" style="background-image: url('<?php echo $slidercek['slider_yol']; ?>');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-10">
              <span class="subheading-sm"><?php echo $slidercek['slider_baslik']; ?></span>
              <h2 class="heading"><?php echo $slidercek['slider_baslik2']; ?></h2>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>


<div class="container">
  <div class="row mb-5">
    <div class="col-md-12">

      <div class="block-32">

        <form action="" method="post" class="register-form">
          <div class="row">
            <div class="col-md-3 col-lg-3">
              <label for="checkin">Giriş Tarihi</label>
              <div class="field-icon-wrap">
                
                <div class="icon"><span class="icon-calendar"></span></div>
                <div class="form-group">
                <input type="text" name="giris" required="required" class="form-control input-md" id="checkout_date" class="form-control">
              </div>
              </div>
            </div>

            <div class="col-md-3 col-lg-3">
              <label for="checkin">Çıkış Tarihi</label>
              <div class="field-icon-wrap">
                <div class="icon"><span class="icon-calendar"></span></div>
                <div class="form-group">
                <input type="text" name="cikis" required="required" class="form-control input-md"  id="checkout_date" class="form-control">
              </div>
              </div>
            </div>
            <div class="col-md-3 col-lg-3">
              <div class="row">
                <div class="col-md-6 ">
                  <label for="yetiskin">Yetişkin</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <div class="form-group">
                    <select  id="yetiskin" type="text" name="yetiskin"  required="required" class="form-control input-md">
                      <option value="">Seçin</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4+</option>
                    </select>
                  </div>
                  </div>
                </div>
                <div class="col-md-6 ">
                  <label for="cocuk">Çocuk</label>
                   <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <div class="form-group">
                    <select  id="cocuk" type="text" name="cocuk" required="required" class="form-control">
                      <option value="">Seçin</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4+</option>
                    </select>
                  </div>
                </div>
              </div>


            </div>
             </div>
              <div class="col-md-3 col-lg-3">
              <label for="checkin">Telefon</label>
              <div class="field-icon-wrap">
                    
              <div class="form-group">
                <input class="form-control" type="text" required="required" name="telefon" id="example-text-input">
              </div>  
              </div>
              </div>  

              <div class="col-md-12 col-lg-12" >
                <input  style="width: 100%;" type="submit" value="REZERVASYON TALEBİ OLUŞTUR" class="btn btn-primary btn-lg "></input>
           
            </div>
              </div>
               
            </div>
           
          </div>

          
             
        </form>
         
      </div>
    </div>
  </div>

  <div class="container">
  <div class="row site-section">
    <div class="col-md-12">
      <div class="row mb-5">
        <div class="col-md-7 section-heading">
          <span class="subheading-sm"><?php echo $servislercek['servisler_baslik']; ?></span>
          <h2 class="heading"><?php echo $servislercek['servisler_baslik2']; ?></h2>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <?php while ($serviscek=$servissor->fetch(PDO::FETCH_ASSOC)) {

         ?>
         <div class="col-md-4" itemscope itemtype="http://schema.org/Hotel">


          <img itemprop="photo" src="thumb.php?src=<?php echo $url;?><?php echo $serviscek['servis_yol']; ?>&w=830&h=595&zc=2" alt="Image placeholder" class="img-fluid img-shadow">


          <div class="media block-6">

            <div class="media-body">
              <h2 class="heading" style="color: blue;"><?php echo $serviscek['servis_baslik'];  ?></h2>
              <p class="font-italic"><?php echo $serviscek['servis_icerik'];  ?>.</p>

            </div>

          </div>     



        </div>
      <?php } ?>
      <br>

      <div class="container">
        <a href="servis.php"><button type="button" class="btn btn-primary btn-lg btn-block">TÜM SERVİSLERİ GÖR</button></a>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="site-section block-13 bg-light">
  <div class="container">
   <div class="row mb-5">
    <div class="col-md-7 section-heading">
      <span class="subheading-sm"><?php echo $odalarcek['odalar_baslik']; ?></span>
      <h2 class="heading"><?php echo $odalarcek['odalar_baslik2']; ?></h2>
      <?php echo $odalarcek['odalar_baslik3']; ?>
      <p><?php echo $odalarcek['odalar_icerik']; ?></p>
    </div>
  </div> 

  <div class="row">
    <div class="col-md-12">
      <div class="nonloop-block-13 owl-carousel">
        <?php 

        while($odacek=$odasor->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="item">
            <div class="block-34" itemscope itemtype="http://schema.org/Hotel">
              <div class="image">
               <img itemprop="photo" src="<?php echo $odacek['oda_yol'];  ?>" alt="Image placeholder">
             </div>
             <div class="text">
              <h2 class="heading"><?php echo $odacek['oda_baslik'];  ?></h2>
              <div class="price" itemprop="priceRange"><?php echo $odacek['oda_para'];  ?></div>
              <ul class="specs">

              </ul>
            </div>
          </div>
        </div>
      <?php }  ?>
        <a href="odalar.php"><div class="item">
            <div class="block-34" itemscope itemtype="http://schema.org/Hotel">
              <div class="image">
               <img itemprop="photo" src="thumb.php?src=<?php echo $url;?>img/tüm.jpg&w=830&h=595&zc=2" alt="Image placeholder">
             </div>
             <div class="text">
              <h2 class="heading">Tüm odaları görüntüle</h2>
              <p>Tüm odaları görüntüle</p>
                <ul class="specs">

              </ul>
            </div>
          </div>
        </div>
        </a> 



      

    </div>

  </div> <!-- .col-md-12 -->
</div>
</div>
</div>



<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-7 section-heading">
        <span class="subheading-sm">Yorumlar</span>
        <h2 class="heading">Misafir Yorumları</h2>
      </div>
    </div>
    <div class="row">

     <?php 

     while($yorumlarcek=$yorumlarsor->fetch(PDO::FETCH_ASSOC)) { 
      ?>
      <div class="col-md-6 col-lg-4">

        <div class="block-33">
          <div class="vcard d-flex mb-3">

            <div class="name-text align-self-center">
              <h2 class="heading"><?php echo $yorumlarcek['yorumlar_ad']; ?></h2>

            </div>
          </div>
          <div class="text">
            <blockquote>
              <p><?php echo $yorumlarcek['yorumlar_mesaj']; ?></p>
            </blockquote>
          </div>
        </div>
        <br>

      </div>
    <?php } ?>


  </div>
</div>
</div>
</div>


<script>
function myFunction() {
    alert("Hello! I am an alert box!");
}
</script>

<?php include 'footer.php'; ?>
