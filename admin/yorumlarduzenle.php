<?php 
include 'header.php';
include 'baglan.php';
$yorumlarsor=$db->prepare("SELECT * from yorumlar where yorumlar_id=:yorumlar_id");
$yorumlarsor->execute(array(
  'yorumlar_id' => $_GET['yorumlar_id']
));
$yorumlarcek=$yorumlarsor->fetch(PDO::FETCH_ASSOC);

?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>

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
        <h3 class="text-themecolor m-b-0 m-t-0">Yorum Düzenle</h3>
        <?php 
        if ($_GET['durum']=='ok') {?> 

          <b style="color:green;">Güncelleme başarılı...</b>

        <?php } elseif ($_GET['durum']=='no')  {?>

          <b style="color:red;">Güncelleme yapılamadı...</b>

        <?php } ?>
        <form action="islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <form action="islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


                <input type="hidden" name="yorumlar_id" value="<?php echo $yorumlarcek['yorumlar_id']; ?>">


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="form-control" type="text" required="required" name="yorumlar_ad" value="<?php echo $yorumlarcek['yorumlar_ad']; ?>" id="example-text-input">
                  </div>
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="col-form-label">İçerik</label>

                  <textarea  class="ckeditor" id="editor1" name="yorumlar_mesaj"><?php echo $yorumlarcek['yorumlar_mesaj']; ?></textarea>
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

              <div align="left" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="yorumlarduzenle" class="btn btn-primary">Kaydet</button>
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
