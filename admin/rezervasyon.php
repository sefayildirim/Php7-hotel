<?php  include 'header.php'; ?>
<?php  include 'baglan.php';

$rezervasyonsor=$db->prepare("select * from rezervasyon order by rezervasyon_id desc ");
$rezervasyonsor->execute();
$toplam_icerik=$rezervasyonsor->rowCount();

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
 
$sorgu=$db->prepare("select * from rezervasyon order by rezervasyon_id desc LIMIT " . $limit . ", " . $sayfada."");
$sorgu->execute();

?>
<head>
     <script language="javascript"> function confirmDel() { var agree=confirm("Bu mesajı silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
</head>


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Rezervasyon talepleri</h3>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

               <table class="table ">
                                    <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th scope="col">Rezervasyon No</th>
                                            <th scope="col">Giriş Tarihi</th>
                                            <th scope="col">Çıkış Tarihi</th>
                                            <th scope="col">Yetişkin</th>
                                            <th scope="col">Çocuk</th>
                                            <th scope="col">Telefon</th>
                                            <th scope="col">Sil</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 



                                     while($rezervasyoncek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
                                      ?>

                                      <tr>
                                        <th scope="row"><?php echo $rezervasyoncek['rezervasyon_id']; ?></th>
                                        <td style="color: black;"><?php echo $rezervasyoncek['rezervasyon_giris']; ?></td>
                                        <td style="color: black;"><?php echo $rezervasyoncek['rezervasyon_cikis']; ?></td>
                                        <td style="color: black;"><?php echo $rezervasyoncek['rezervasyon_yetiskin']; ?></td>
                                        <td style="color: black;"><?php echo $rezervasyoncek['rezervasyon_cocuk']; ?></td>
                                        <td style="color: black;"><?php echo $rezervasyoncek['rezervasyon_telefon']; ?></td>




                                        <td class="text"><a href="islem.php?rezervasyonsil=ok&rezervasyon_id=<?php echo $rezervasyoncek['rezervasyon_id']; ?>" onclick="return confirmDel();"><button style="width:80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i> Sil</button></a></td>
                                    </tr>
                                     <?php } ?>    
                              
                                  
                                </tbody>
                            </table>
            </div>
        </div>

    </div>
</div>
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