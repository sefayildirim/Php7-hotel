<?php  include 'header.php'; ?>
<?php  include 'baglan.php';

$kullanicisor=$db->prepare("select * from kullanicilar");
$kullanicisor->execute();
$say=$kullanicisor->rowCount();


?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>
<head>
 <script language="javascript"> function confirmDel() { var agree=confirm("Bu kişiyi silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!"); if (agree) { return true ; } else { return false ;} } </script>
</head>
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <br>
        <div class="row">
            <!-- column -->


            <!-- column -->
            <div class="col-12">
                <div class="card">
                  <?php 
                  if ($_GET['durum']=='ok') {?> 

                    <b style="color:green;">Güncelleme başarılı...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                    <b style="color:red;">Güncelleme yapılamadı...</b>

                <?php } ?>
                <br>
                <div align="pull-left" class="col-md-12">
                    <a href="kullaniciekle.php"><button  class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Yeni Kullanıcı</button></a>
                </div>
                <div class="card-body">
                    <h4 class="card-title" style="color: black;">Kullanıcı listesi</h4>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="color: blue;">Kullanıcı no</th>
                                    <th style="color: blue;">Kullanıcı adı</th>
                                    <th style="color: blue;">Düzenle</th>
                                    <th style="color: red;">Sil</th>
                                </tr>
                            </thead>
                            <tbody>



                              <?php 
                              while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {
                                  ?>
                                  <tr>
                                    <td><?php echo $kullanicicek['id']; ?></td>

                                    <td><?php echo $kullanicicek['kadi']; ?></td>
                                       <td><a href="kullaniciduzenle.php?id=<?php echo $kullanicicek['id']; ?>"><button style="width:80px;" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>  Düzenle</button></a></td>
                                            <td><a href="islem.php?kullanicisil=ok&id=<?php echo $kullanicicek['id']; ?>" onclick="return confirmDel();"><button style="width:80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i>  Sil</button></a></td>
                                </tr>
                                <?php } ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <?php include 'footer.php'; ?>