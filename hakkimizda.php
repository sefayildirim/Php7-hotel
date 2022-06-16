
<?php include 'header.php';

$hakkimizdasor=$db->prepare("select * from hakkimizda");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

 ?>


  
  <div class="block-30 block-30-sm item" style="background-image: url('<?php echo $hakkimizdacek['hakkimizda_yol']; ?>');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></span>
          <h2 class="heading"><?php echo $hakkimizdacek['hakkimizda_baslik2']; ?></h2>
        </div>
      </div>
    </div>
  </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-12">
        
        </div>
        <div class="row">
          <div class="col-md-12 mb-12">
            <h2><?php echo $hakkimizdacek['hakkimizda_baslik3']; ?></h2>
          </div>
          <div class="col-md-12">
           <?php echo $hakkimizdacek['hakkimizda_icerik']; ?>
          </div>
       

        </div>
      </div>
    </div>


    




<?php include 'footer.php'; ?>