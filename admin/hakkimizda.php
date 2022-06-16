<?php
include 'header.php';
include 'baglan.php';
$hakkimizdasor=$db->prepare("SELECT * from hakkimizda WHERE hakkimizda_id=1");
$hakkimizdasor->execute(array(

));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

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
                <h3 class="text-themecolor m-b-0 m-t-0">Hakkımızda</h3>

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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü resim<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <img width="300" height="250" src="../<?php echo $hakkimizdacek['hakkimizda_yol']; ?>">
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="hakkimizda_hakkimizdayol"  class="form-control col-md-7 col-xs-12">
              </div>
          </div>
          <div class="form-group">
            <label for="example-text-input" class="col-form-label">Başlık</label>

            <input class="form-control" type="text" required="required" name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik']; ?>" id="example-text-input">
        </div>
         <div class="form-group">
            <label for="example-text-input" class="col-form-label">Başlık 2</label>

            <input class="form-control" type="text" required="required" name="hakkimizda_baslik2" value="<?php echo $hakkimizdacek['hakkimizda_baslik2']; ?>" id="example-text-input">
        </div>
         <div class="form-group">
            <label for="example-text-input" class="col-form-label">İçerik başlığı</label>

            <input class="form-control" type="text" required="required" name="hakkimizda_baslik3" value="<?php echo $hakkimizdacek['hakkimizda_baslik3']; ?>" id="example-text-input">
        </div>
         <div class="form-group">
            <label for="example-text-input" class="col-form-label">İçerik</label>

            <textarea  class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
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
          
          
      


     
      
    <br>
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
      <button type="submit" name="hakkimizdaduzenle" class="btn btn-primary">Güncelle</button>
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
