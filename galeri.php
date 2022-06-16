
<?php include 'header.php';

 ?>
 <head>
  <script>
    baguetteBox.run('.tz-gallery');
  </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
</head>


  
  <div class="block-30 block-30-sm item" style="background-image: url('img/7.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <span class="subheading-sm">Galeri</span>
          <h2 class="heading">Foto Galeri</h2>
        </div>
      </div>
    </div>
  </div>
<br>
<br>
<br>
<br>

    <div class=" gallery-container">
    <div class="tz-gallery">
      <div class="row">
        <?php 

        $resimsor=$db->prepare("select * from resim order by resim_sira desc ");
        $resimsor->execute();

        while($resimcek=$resimsor->fetch(PDO::FETCH_ASSOC)) {
          ?>
        <div  class="col-sm-2 col-md-4" itemscope itemtype="http://schema.org/Hotel">
          <a class="lightbox" href="<?php echo $resimcek['resim_yol']; ?>">
            <img itemprop="photo" src="thumb.php?src=<?php echo $url;?><?php echo $resimcek['resim_yol']; ?>&w=830&h=595&zc=2" alt="Park">
          </a>
        </div>
      <?php } ?>

      </div>
    </div>
  </div>


    




<?php include 'footer.php'; ?>