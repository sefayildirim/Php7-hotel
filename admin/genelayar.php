<?php
include 'header.php';
include 'baglan.php';
$genelayarsor=$db->prepare("SELECT * from genelayar WHERE genelayar_id=1");
$genelayarsor->execute(array(

));
$genelayarcek=$genelayarsor->fetch(PDO::FETCH_ASSOC);

?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE); ?>
<head>
  <script src="//cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Genel ayarlar</h3>

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

            <form action="islem.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü logo<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="90" height="90" src="../<?php echo $genelayarcek['genelayar_yol']; ?>">
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">logo seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="genelayar_genelayaryol"  class="form-control col-md-7 col-xs-12">
              </div>
          </div>

              <div class="form-group">
                <label for="example-text-input" class="col-form-label">Başlık</label>

                <input class="form-control" type="text" required="required" name="genelayar_baslik" value="<?php echo $genelayarcek['genelayar_baslik']; ?>" id="example-text-input">
              </div>
              <div class="form-group">
                <label for="example-text-input" class="col-form-label">Açıklama</label>

                <input class="form-control" type="text" required="required" name="genelayar_aciklama" value="<?php echo $genelayarcek['genelayar_aciklama']; ?>" id="example-text-input">
              </div>
                <div class="form-group">
                <label for="example-text-input" class="col-form-label">Anahtar kelimeler</label>

                <input class="form-control" type="text" required="required" name="genelayar_kelimeler" value="<?php echo $genelayarcek['genelayar_kelimeler']; ?>" id="example-text-input">
              </div>
             
            <br>
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="submit" name="genelayarkaydet" class="btn btn-primary">Güncelle</button>
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
