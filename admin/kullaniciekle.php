<?php 
include 'header.php';
include 'baglan.php';


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
        <h3 class="text-themecolor m-b-0 m-t-0">Kullanıcı Düzenle</h3>
        <?php 
                if ($_GET['durum']=='ok') {?> 
                
                <b style="color:green;">Kullanıcı Eklendi...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                <b style="color:red;">Kullanıcı Eklenemedi...</b>

                <?php } ?>
        <form action="islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

        </div>

      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <form action="islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Ad:</label>

                            <input class="form-control" type="text" required="required" name="kadi"placeholder="Kullanıcı adını giriniz..." id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Şifre:</label>

                            <input class="form-control" type="password" required="required" name="parola"placeholder="Parolayı giriniz..."  id="example-text-input">
                        </div>

                       
                    
             
                        <br>
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type="submit" name="kullaniciekle" value="Ekle" class="btn btn-primary">
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
