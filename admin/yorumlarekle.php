<?php 
include 'header.php';
include 'baglan.php';


?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>
<head>
  <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
</head>
<div class="main-content">
  <!-- header area start -->
  <div class="header-area">

    <div class="container">
      <br>
      <br>
      <br>

      <!-- Textual inputs start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Yeni Yorum Ekle</h4>
            <?php 
            if ($_GET['durum']=='ok') {?> 

              <b style="color:green;">Yorum Eklendi...</b>

            <?php } elseif ($_GET['durum']=='no')  {?>

              <b style="color:red;">Yorum Eklenemedi...</b>

            <?php } ?>
            <form action="islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required="required" name="yorumlar_ad"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label for="example-text-input" class="col-form-label">Mesaj</label>

                <textarea  class="ckeditor" id="editor1" name="yorumlar_mesaj"></textarea>
              </div>
            <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>



            <div align="left" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="yorumlarkaydet" class="btn btn-primary">Kaydet</button>
            </div>

          </form>

        </div>
      </div>
    </div>
    <!-- Textual inputs end -->
  </div>
</div>


</div>
  <br>
  <br>
  <br>

<?php  include 'footer.php'; ?>
