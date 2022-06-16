<?php  include 'header.php'; ?>
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
                <h3 class="text-themecolor m-b-0 m-t-0">resim ekle</h3>
      <?php 
      if ($_GET['durum']=='ok') {?> 

        <b style="color:green;">Güncelleme başarılı...</b>

      <?php } elseif ($_GET['durum']=='no')  {?>

        <b style="color:red;">Güncelleme yapılamadı...</b>

        <?php } ?> </h2>

         </div>

        </div>
           <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

        <form action="islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="file" id="first-name" required="required" name="resim_resimyol"  class="form-control col-md-7 col-xs-12">
            </div>
          </div>



       
              <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sıra<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="required" name="resim_sira"  class="form-control col-md-7 col-xs-12">
            </div>
          </div>
      



        <div align="left" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" name="resimkaydet" class="btn btn-primary">Kaydet</button>
        </div>

      </form>

      </div>
        </div>

    </div>
</div>
 

  <?php  include 'footer.php'; ?>
