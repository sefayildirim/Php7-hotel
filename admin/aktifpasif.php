<?php  

  require("baglan.php");

  if($_POST){
   $id    =  (int) $_POST["id"];
   $durum =  (int) $_POST["durum"];
  
     
	   $query = $db->prepare("update slider set slider_durum = ? where slider_id = ?");
	   $query->execute([$durum,$id]);
     
	   if($durum){
		   
		   echo $id." nolu kayıt aktif edildi..";
		   
	   }else {
		   
		   echo $id." nolu kayıt pasif edildi..";
	   }
  
  }

?>