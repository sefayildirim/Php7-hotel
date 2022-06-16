<?php  include 'header.php'; ?>
<?php  include 'baglan.php';

$resimsor=$db->prepare("select * from resim order by resim_id ASC ");
$resimsor->execute();
$toplam_icerik=$resimsor->rowCount();
$say=0;

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

$sorgu=$db->prepare("select * from resim order by resim_id desc LIMIT " . $limit . ", " . $sayfada."");
$sorgu->execute();

?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>
<head>
 <script language="javascript"> function confirmDel() { var agree=confirm("Bu Fotoğrafı silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
 <script type="text/javascript" src="js/jquery-ui.js"></script>
</head>
<div class="main-content">
  <br>
  <!-- header area start -->
  <div class="header-area">
    <div class="row align-items">

      <div class="col-lg-12 mt-5">
        <div class="card">
         
        <div class="card-body">
          <a href="resimekle.php"><button class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Yeni ekle</button></a>
          <br>
          <br>

          <?php

          if ($_GET['durum']=='ok') {?> 

            <b style="color:green;">İşlem başarılı...</b>

          <?php } elseif ($_GET['durum']=='no')  {?>

            <b style="color:red;">İşlem Başarısız...</b>

          <?php } ?>
          <div class="single-table">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-uppercase bg-primary">
                  <tr class="text-white">
                    <th scope="col">No</th>
                    <th scope="col">Resim</th>
                    <th scope="col">Sıra</th>
                    <th scope="col">Düzenle</th>
                    <th scope="col">Sil</th>
                  


                  </tr>
                </thead>
                <tbody>
                 <?php 



                 while($resimcek=$sorgu->fetch(PDO::FETCH_ASSOC)) { $say++;
                  ?>

                  <tr id="item-<?php echo $resimcek['resim_id'] ?>">
                    <th scope="row"><?php echo $resimcek['resim_id']; ?></th>
                    <td><img width="120" height="100" src="../<?php echo $resimcek['resim_yol']; ?>"></td>
                    <td><?php echo $resimcek['resim_sira']; ?></td>
                    <td><a href="resim-duzenle.php?resim_id=<?php echo $resimcek['resim_id']; ?>"><button style="width:80px;" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Düzenle</button></a></td>
                    <td><a href="islem.php?resimsil=ok&resim_id=<?php echo $resimcek['resim_id']; ?>" onclick="return confirmDel();"><button style="width:80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i>  Sil</button></a></td>                                       
                  </td>


                </tr>
              <?php } ?>    


            </tbody>
          </table>
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
  </div>
</div>


</div>

</div>
<div class="container">


  </div>

</div>

<style type="text/css">
.sortable { cursor: move; }

</style>



<?php  include 'footer.php'; ?>

