<?php  include 'header.php'; 
  include 'baglan.php';

$slidersor=$db->prepare("select * from slider order by slider_id desc ");
$slidersor->execute();
$toplam_icerik=$slidersor->rowCount();

$sayfada = 10;
$toplam_sayfa = ceil($toplam_icerik / $sayfada);

// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if($sayfa < 1) $sayfa = 1; 

// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 

// kaçıncı içerikten başlanacağını ifade edecek limit değeri.
$limit = ($sayfa - 1) * $sayfada;

$sorgu=$db->prepare("select * from slider order by slider_id desc LIMIT " . $limit . ", " . $sayfada."");
$sorgu->execute();

?>
<head>
 <script language="javascript"> function confirmDel() { var agree=confirm("Bu sliderı silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
 
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="switch.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.10/dist/sweetalert2.all.min.js"></script>
</head>


<div class="main-content">
  <!-- header area start -->
  <div class="header-area">
    <div class="row align-items-center">

      <div class="col-lg-12 mt-5">

        <br>
        <div class="card">

          <div class="card-body">
            <a href="sliderekle.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Yeni ekle</button></a>
            <br>
            <br>


            <div class="single-table">
              <div class="table-responsive">
                <table class="table">
                  <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                      <th scope="col">Slider No</th>
                      <th scope="col">Resim</th>
                      <th scope="col">Başlık</th>
                      <th scope="col">Başlık 2</th>
                      <th scope="col">Sıra</th>
                      <th scope="col">Durum</th>
                      <th scope="col">Düzenle</th>
                      <th scope="col">Sil</th>


                    </tr>
                  </thead>
                  <tbody>
                   <?php 



                   while($slidercek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <tr>
                      <th scope="row"><?php echo $slidercek['slider_id']; ?></th>
                      <td><img width="120" height="100" src="../<?php echo $slidercek['slider_yol']; ?>"></td>
                      <td><?php echo $slidercek['slider_baslik']; ?></td>
                      <td><?php echo $slidercek['slider_baslik2']; ?></td>
                      <td><?php echo $slidercek['slider_sira']; ?></td>
                      <td>

                       <div class="switch">
                        <label class="switch">
                          <input type="checkbox" id="<?php echo $slidercek["slider_id"];?>" class="aktifpasif" <?php echo $slidercek["slider_durum"] == 1 ? 'checked' : null;?>/><span class="lever switch-col-purple"></span>
                        </label>
                      </div>
                    </td>


                    <td><a href="sliderduzenle.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button style="width:80px;" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>

                    <td><a href="islem.php?slidersil=ok&slider_id=<?php echo $slidercek['slider_id']; ?>" onclick="return confirmDel();"><button style="width:80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></a></td>
                  </tr>
                <?php } ?>    


              </tbody>
            </table>

          </div>

        </div>
        <br>

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

    </nav>
    <br>
    <br>


  </div>

</div>

</div>
<!-- TABLO BİTİŞ -->





</div>

</div>

</div>

 <script type="text/javascript" src="custom.js"></script>

<?php  include 'footer.php'; ?>