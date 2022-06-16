
<?php include 'header.php';

$odalarsor=$db->prepare("select * from odalar");
$odalarsor->execute(array(0));
$odalarcek=$odalarsor->fetch(PDO::FETCH_ASSOC);



$odasor=$db->prepare("select * from oda order by oda_id desc ");
$odasor->execute();
$toplam_icerik=$odasor->rowCount();

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

$sorgu=$db->prepare("select * from oda order by oda_id desc LIMIT " . $limit . ", " . $sayfada."");
$sorgu->execute();

?>



<div class="block-30 block-30-sm item" style="background-image: url('<?php echo $odalarcek['odalar_yol']; ?>');" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-10">
        <span class="subheading-sm"><?php echo $odalarcek['odalar_baslik']; ?></span>
        <h2 class="heading"><?php echo $odalarcek['odalar_baslik2']; ?></h2>
      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">



    <div class="row mb-5 pt-5 justify-content-center">
      <div class="col-md-7 text-center section-heading">
        <h2 class="heading"><?php echo $odalarcek['odalar_baslik3']; ?></h2>
        <p><?php echo $odalarcek['odalar_icerik']; ?></p>
      </div>
    </div>

    <div class="row">

<?php 

         while($odacek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
          ?>
      <div class="col-lg-4 mb-5" itemscope itemtype = "http://schema.org/Hotel">
        <div class="block-34">
          <div class="image">
            <img itemprop="photo" src="<?php echo $odacek['oda_yol'];  ?>" alt="Image placeholder">
          </div>
          <div class="text">
            <h2 class="heading"><?php echo $odacek['oda_baslik'];  ?></h2>
            <div class="price" itemprop = "priceRange"><?php echo $odacek['oda_para'];  ?></div>
            <ul class="specs">
            
            </ul>
          </div>
        </div>
     
      </div>
       <?php 

}
  ?>
     

     <div class="container">
         <nav aria-label="Page navigation example">
  <ul class="pagination">
    
    <?php 
        for($s = 1; $s <= $toplam_sayfa; $s++)
        {
           if($sayfa == $s) { // eğer bulunduğumuz sayfa ise link yapma.
              //echo $s . ' '; 
              echo '<li class="page-item active"><a class="page-link" href="javascript:;">' . $s . '</a></li> ';
           } else {
              echo '<li class="page-item"><a class="page-link" href="?sayfa=' . $s . '">' . $s . '</a></li> ';
           }
        }  
    ?> 
   
  </ul>

</div>

        </div>
      </div>

     


    </div>




<?php include 'footer.php'; ?>
