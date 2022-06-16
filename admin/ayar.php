<?php
include 'header.php';
include 'baglan.php';
$ayarsor=$db->prepare("SELECT * from ayar WHERE ayar_id=1");
$ayarsor->execute(array(

));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

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
        <h3 class="text-themecolor m-b-0 m-t-0">Ayarlar</h3>

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
                <label for="example-text-input" class="col-form-label">Başlık</label>

                <input class="form-control" type="text" required="required" name="ayar_baslik" value="<?php echo $ayarcek['ayar_baslik']; ?>" id="example-text-input">
              </div>
              <div class="form-group">
                <label for="example-text-input" class="col-form-label">Başlık 2</label>

                <input class="form-control" type="text" required="required" name="ayar_baslik2" value="<?php echo $ayarcek['ayar_baslik2']; ?>" id="example-text-input">
              </div>




              <div class="form-group">
                <label for="example-text-input" class="col-form-label">İçerik</label>

                <textarea  class="ckeditor" id="editor1" name="ayar_icerik"><?php echo $ayarcek['ayar_icerik']; ?></textarea>
              </div>
              <script type="text/javascript">


               CKEDITOR.replace( 'editor1',
               {
                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                forcePasteAsPlainText: true
              } 
              );
            </script>
            <div class="form-group">
              <label for="example-text-input" class="col-form-label">Adres</label>

              <input class="form-control" type="text" required="required" name="ayar_adres" value="<?php echo $ayarcek['ayar_adres']; ?>" id="example-text-input">
            </div>
             <div class="form-group">
              <label for="example-text-input" class="col-form-label">Telefon</label>

              <input class="form-control" type="text" required="required" name="ayar_telefon" value="<?php echo $ayarcek['ayar_telefon']; ?>" id="example-text-input">
            </div>
             <div class="form-group">
              <label for="example-text-input" class="col-form-label">Mail</label>

              <input class="form-control" type="text" required="required" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail']; ?>" id="example-text-input">
            </div>
             <div class="form-group">
              <label for="example-text-input" class="col-form-label">Mesai</label>

              <input class="form-control" type="text" required="required" name="ayar_mesai" value="<?php echo $ayarcek['ayar_mesai']; ?>" id="example-text-input">
            </div>

            <br>
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="submit" name="ayarkaydet" class="btn btn-primary">Güncelle</button>
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
