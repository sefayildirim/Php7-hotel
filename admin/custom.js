  
  $(document).ready(function() {
	  
	   $(".aktifpasif").click(function() {
		   
		     var id = $(this).attr("id");
			 
			 var durum = $(this).is(":checked") ? '1' : '0';  
			 
			  
			  $.ajax({
				  
				  url: "aktifpasif.php",
				  data: {id:id,durum:durum},
				  type: "post",
				  success: function(e) {
					  
					  swal(durum == 1 ? 'aktif' : 'pasif',e,"success");
					  
				  }
				  
			  })
			 
			 
	   });
	  
  });