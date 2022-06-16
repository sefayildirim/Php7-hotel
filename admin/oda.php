<?php  include 'header.php'; ?>
<?php  include 'baglan.php';

$odasor=$db->prepare("select * from oda order by oda_id desc ");
$odasor->execute();
$toplam_icerik=$odasor->rowCount();

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

$sorgu=$db->prepare("select * from oda order by oda_id desc LIMIT " . $limit . ", " . $sayfada."");
$sorgu->execute();

?>
<head>
 <script language="javascript"> function confirmDel() { var agree=confirm("Bu odayı silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
</head>


<div class="main-content">
  <!-- header area start -->
  <div class="header-area">
    <div class="row align-items-center">

      <div class="col-lg-12 mt-5">


        <div class="card">
          <br>
          <br>
          <div align="pull-left" class="col-md-12">
            <a href="odaekle.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Yeni ekle</button></a>
          </div>
          <div class="card-body">


            <div class="single-table">

              <div class="table-responsive">

                <table class="table">
                  <thead class="text-uppercase bg-primary">

                    <tr class="text-white">

                      <th scope="col">No</th>
                      <th scope="col">Resim</th>
                      <th scope="col">Başlık</th>
                      <th scope="col">Para</th>
                      <th scope="col">Düzenle</th>
                      <th scope="col">SİL</th>


                    </tr>
                  </thead>
                  <tbody>
                   <?php 



                   while($odacek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <tr>
                      <th scope="row"><?php echo $odacek['oda_id']; ?></th>
                      <td><img width="120" height="100" src="../<?php echo $odacek['oda_yol']; ?>"></td>
                      <td><?php echo $odacek['oda_baslik']; ?></td>
                      <td><?php echo $odacek['oda_para']; ?></td>



                      <td><a href="odaduzenle.php?oda_id=<?php echo $odacek['oda_id']; ?>"><button style="width:80px;" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>

                      <td><a href="islem.php?odasil=ok&oda_id=<?php echo $odacek['oda_id']; ?>" onclick="return confirmDel();"><button style="width:80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></a></td>
                    </tr>
                  <?php } ?>    


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- TABLO BİTİŞ -->





  </div>
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

    </nav>
</div>

</div>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php  include 'footer.php'; ?>