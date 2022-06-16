
<?php include 'header.php';

$servislersor=$db->prepare("select * from servisler");
$servislersor->execute(array(0));
$servislercek=$servislersor->fetch(PDO::FETCH_ASSOC);



$servissor=$db->prepare("select * from servis order by servis_id desc ");
$servissor->execute();
$toplam_icerik=$servissor->rowCount();

$sayfada = 9;
$toplam_sayfa = ceil($toplam_icerik / $sayfada);

// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if($sayfa < 1) $sayfa = 1; 

// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
$limit = ($sayfa - 1) * $sayfada;

$sorgu=$db->prepare("select * from servis order by servis_id desc LIMIT " . $limit . ", " . $sayfada."");
$sorgu->execute();


 ?>
  
  

  <div class="block-30 block-30-sm item" style="background-image: url('<?php echo $servislercek['servisler_yol']; ?>');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm"><?php echo $servislercek['servisler_baslik']; ?></span>
              <h2 class="heading"><?php echo $servislercek['servisler_baslik2']; ?></h2>
        </div>
      </div>
    </div>
  </div>


  <div class="container">

    <?php while ($serviscek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
      
     ?>
     <br>
     <br>
     <br>
     <br>

  	<div class="row site">
  		<div class="col-lg-3 mb-3" itemscope itemtype="http://schema.org/Hotel">
  			<img itemprop="photo" src="<?php echo $serviscek['servis_yol'];  ?>" alt="Image placeholder" class="img-fluid img-shadow">
  		</div>
  		<div class="col-lg-5 pl-md-5">
  			
  			<div class="media block-6">
          <div class="icon"><span class="ion-ios-checkmark"></span></div>
          <div class="media-body">
            <h3 class="heading"><?php echo $serviscek['servis_baslik'];  ?></h3>
            <p><?php echo $serviscek['servis_icerik'];  ?>.</p>

          </div>

	      </div>     
 


  		</div>
  	</div>
  <?php } ?>
     <br>
     <br>
     <br>

    </div>


    
   
  
<?php include 'footer.php'; ?>

 