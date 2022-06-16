<?php 
include 'header.php';
include 'baglan.php';

$slidersor=$db->prepare("SELECT * from slider where slider_id=:slider_id");
$slidersor->execute(array(
  'slider_id' => $_GET['slider_id']
));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>
<head>
  <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Slider Düzenle</h3>
                 <?php 
                if ($_GET['durum']=='ok') {?> 

                  <b style="color:green;">İşlem başarılı...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                  <?php } ?>

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

                        
                <form action="islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                  <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">



                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü resim<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="200" height="100" src="../<?php echo $slidercek['slider_yol']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="file" id="first-name"  name="slider_slideryol"  class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="slider_baslik" value="<?php echo $slidercek['slider_baslik']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık 2<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="slider_baslik2" value="<?php echo $slidercek['slider_baslik2']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider sıra<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="first-name" required="required" name="slider_sira" value="<?php echo $slidercek['slider_sira']; ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <select id="heard" class="form-control" name="slider_durum" required>

                      <?php 
                      if ($slidercek['slider_durum']==1) {?>

                      <option value="1">Aktif</option>
                      <option value="0">Pasif</option>

                      <?php } else {?>

                      <option value="0">Pasif</option>
                      <option value="1">Aktif</option>

                      <?php } ?>

                      </select>
                    </div>
                  </div>
                 
                <div align="left" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="sliderduzenle" class="btn btn-primary">Kaydet</button>
                </div>

              </form>

            </div>
        </div>

    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->


<?php include 'footer.php'; ?>
