<?php  
ob_start();
session_start();
include 'baglan.php';



if (isset($_POST['ayarkaydet'])) {
	
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_mail=:mail,
		ayar_baslik=:baslik,
		ayar_baslik2=:baslik2,
		ayar_adres=:adres,
		ayar_icerik=:icerik,
		ayar_telefon=:telefon,
		ayar_mesai=:mesai
		WHERE ayar_id=1");
	$update=$ayarkaydet->execute(array(
		'mail' => $_POST['ayar_mail'],
		'baslik' => $_POST['ayar_baslik'],
		'baslik2' => $_POST['ayar_baslik2'],
		'adres' => $_POST['ayar_adres'],
		'icerik' => $_POST['ayar_icerik'],
		'telefon' => $_POST['ayar_telefon'],
		'mesai' => $_POST['ayar_mesai']
	));

	//echo "a";exit;

	if ($update) {

		Header("Location:ayar.php?durum=ok");

	} else {

		Header("Location:ayar.php?durum=no");
	}

}


if (isset($_POST['genelayarkaydet'])) {
	$klasor="../img";
	$dosya_sayi=count($_FILES['genelayar_genelayaryol']['name']); 
	for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
		if(!empty($_FILES['genelayar_genelayaryol']['name'])){ 
			move_uploaded_file($_FILES['genelayar_genelayaryol']['tmp_name'],$klasor."/".time().$_FILES['genelayar_genelayaryol']['name']); 



			$genelayarkaydet=$db->prepare("UPDATE genelayar SET
				genelayar_baslik=:baslik,
				genelayar_aciklama=:aciklama,
				genelayar_kelimeler=:kelimeler,
				genelayar_yol=:genelayaryol	
				WHERE genelayar_id=1");
			$update=$genelayarkaydet->execute(array(
				'baslik' => $_POST['genelayar_baslik'],
				'aciklama' => $_POST['genelayar_aciklama'],
				'kelimeler' => $_POST['genelayar_kelimeler'],
				'genelayaryol' => "img/".time().$_FILES['genelayar_genelayaryol']['name'].""
			));

		}else{

			$genelayarkaydet=$db->prepare("UPDATE genelayar SET
				genelayar_baslik=:baslik,
				genelayar_aciklama=:aciklama,
				genelayar_kelimeler=:kelimeler
				WHERE genelayar_id=1");
			$update=$genelayarkaydet->execute(array(
				'baslik' => $_POST['genelayar_baslik'],
				'aciklama' => $_POST['genelayar_aciklama'],
				'kelimeler' => $_POST['genelayar_kelimeler']
			));
		} 
	}


	if ($update) {

		Header("Location:genelayar.php?durum=ok");

	} else {

		Header("Location:genelayar.php?durum=no");
	}

}







if (isset($_POST['resimkaydet'])) {

	$klasor="../img";
	$dosya_sayi=count($_FILES['resim_resimyol']['name']); 
	for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
		if(!empty($_FILES['resim_resimyol']['name'])){ 
			move_uploaded_file($_FILES['resim_resimyol']['tmp_name'],$klasor."/".time().$_FILES['resim_resimyol']['name']); 
		} 
	}
	
	$kaydet=$db->prepare("INSERT INTO resim SET
		resim_sira=:sira,
		resim_yol=:resimyol");
	$insert=$kaydet->execute(array(
		'sira' => $_POST['resim_sira'],
		'resimyol' => "img/".time().$_FILES['resim_resimyol']['name'].""
	));

	if ($insert) {

		Header("Location:resim.php?durum=ok");

	} else {

		Header("Location:resim.php?durum=no");
	}

}
if(isset($_GET['resimsil'])){
	if ($_GET['resimsil']=="ok") {

		$sil=$db->prepare("DELETE from resim where resim_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['resim_id']
		));

		if ($kontrol) {

			Header("Location:resim.php?durum=ok");

		} else {

			Header("Location:resim.php?durum=no");
		}

	}
}


if(isset($_GET['rezervasyonsil'])){
	if ($_GET['rezervasyonsil']=="ok") {

		$sil=$db->prepare("DELETE from rezervasyon where rezervasyon_id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['rezervasyon_id']
		));

		if ($kontrol) {

			Header("Location:rezervasyon.php?durum=ok");

		} else {

			Header("Location:rezervasyon.php?durum=no");
		}

	}
}



if (isset($_POST['resimduzenle'])) {
		$klasor="../../images";
		$dosya_sayi=count($_FILES['resim_resimyol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['resim_resimyol']['name'])){ 
				move_uploaded_file($_FILES['resim_resimyol']['tmp_name'],$klasor."/".time().$_FILES['resim_resimyol']['name']); 

				$duzenle=$db->prepare("UPDATE resim SET
				resim_sira=:sira,
				resim_yol=:resimyol	
				WHERE resim_id={$_POST['resim_id']}");
			$update=$duzenle->execute(array(
				'sira' => $_POST['resim_sira'],
				'resimyol' => "/images/".time().$_FILES['resim_resimyol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE resim SET
				resim_sira=:baslik	
				WHERE resim_id={$_POST['resim_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['resim_sira']
		));
			} 
		}


	if ($update) {

		Header("Location:resim.php?resim_id=$resim_id&durum=ok");

	} else {

		Header("Location:resim.php?durum=no");
	}

}


if (isset($_POST['odaduzenle'])) {
		$klasor="../img";
		$dosya_sayi=count($_FILES['oda_odayol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['oda_odayol']['name'])){ 
				move_uploaded_file($_FILES['oda_odayol']['tmp_name'],$klasor."/".time().$_FILES['oda_odayol']['name']); 

				$duzenle=$db->prepare("UPDATE oda SET
				oda_baslik=:baslik,
				oda_para=:para,
				oda_yol=:odayol	
			WHERE oda_id={$_POST['oda_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['oda_baslik'],
				'para' => $_POST['oda_para'],
				'odayol' => "img/".time().$_FILES['oda_odayol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE oda SET
				oda_baslik=:baslik,
				oda_para=:para
				WHERE oda_id={$_POST['oda_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['oda_baslik'],
				'para' => $_POST['oda_para']
		));
			} 
		}


	if ($update) {

		Header("Location:oda.php?oda_id=$oda_id&durum=ok");

	} else {

		Header("Location:oda.php?durum=no");
	}

}

if (isset($_POST['servisduzenle'])) {
		$klasor="../img";
		$dosya_sayi=count($_FILES['servis_servisyol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['servis_servisyol']['name'])){ 
				move_uploaded_file($_FILES['servis_servisyol']['tmp_name'],$klasor."/".time().$_FILES['servis_servisyol']['name']); 

				$duzenle=$db->prepare("UPDATE servis SET
				servis_baslik=:baslik,
				servis_icerik=:icerik,
				servis_yol=:servisyol	
			WHERE servis_id={$_POST['servis_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['servis_baslik'],
				'icerik' => $_POST['servis_icerik'],
				'servisyol' => "img/".time().$_FILES['servis_servisyol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE servis SET
				servis_baslik=:baslik,
				servis_icerik=:icerik
				WHERE servis_id={$_POST['servis_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['servis_baslik'],
				'icerik' => $_POST['servis_icerik']
		));
			} 
		}


	if ($update) {

		Header("Location:servis.php?servis_id=$servis_id&durum=ok");

	} else {

		Header("Location:servis.php?durum=no");
	}

}



if (isset($_POST['odakaydet'])) {

	$klasor="../img";
	$dosya_sayi=count($_FILES['oda_odayol']['name']); 
	for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
		if(!empty($_FILES['oda_odayol']['name'])){ 
			move_uploaded_file($_FILES['oda_odayol']['tmp_name'],$klasor."/".time().$_FILES['oda_odayol']['name']); 
		} 
	}
	
	$kaydet=$db->prepare("INSERT INTO oda SET
		oda_baslik=:baslik,
		oda_para=:para,
		oda_yol=:odayol");
	$insert=$kaydet->execute(array(
		'baslik' => $_POST['oda_baslik'],
		'para' => $_POST['oda_para'],
		'odayol' => "img/".time().$_FILES['oda_odayol']['name'].""
	));

	if ($insert) {

		Header("Location:oda.php?durum=ok");

	} else {

		Header("Location:oda.php?durum=no");
	}

}




if (isset($_POST['serviskaydet'])) {

	$klasor="../img";
	$dosya_sayi=count($_FILES['servis_servisyol']['name']); 
	for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
		if(!empty($_FILES['servis_servisyol']['name'])){ 
			move_uploaded_file($_FILES['servis_servisyol']['tmp_name'],$klasor."/".time().$_FILES['servis_servisyol']['name']); 
		} 
	}
	
	$kaydet=$db->prepare("INSERT INTO servis SET
		servis_baslik=:baslik,
		servis_icerik=:icerik,
		servis_yol=:servisyol");
	$insert=$kaydet->execute(array(
		'baslik' => $_POST['servis_baslik'],
		'icerik' => $_POST['servis_icerik'],
		'servisyol' => "img/".time().$_FILES['servis_servisyol']['name'].""
	));

	if ($insert) {

		Header("Location:servis.php?durum=ok");

	} else {

		Header("Location:servis.php?durum=no");
	}

}

if(isset($_GET['odasil'])){
	if ($_GET['odasil']=="ok") {
	//echo "string"; exit();
		$sil=$db->prepare("DELETE from oda where oda_id=:oda_id");
		$kontrol=$sil->execute(array(
			'oda_id' => $_GET['oda_id']
		));

		if ($kontrol) {

			Header("Location:oda.php");

		} else {

			Header("Location:hata.php");
		}

	}
}

if(isset($_GET['servissil'])){
	if ($_GET['servissil']=="ok") {
	//echo "string"; exit();
		$sil=$db->prepare("DELETE from servis where servis_id=:servis_id");
		$kontrol=$sil->execute(array(
			'servis_id' => $_GET['servis_id']
		));

		if ($kontrol) {

			Header("Location:servis.php");

		} else {

			Header("Location:hata.php");
		}

	}
}









if (isset($_POST['hakkimizdaduzenle'])) {
		$klasor="../img";
		$dosya_sayi=count($_FILES['hakkimizda_hakkimizdayol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['hakkimizda_hakkimizdayol']['name'])){ 
				move_uploaded_file($_FILES['hakkimizda_hakkimizdayol']['tmp_name'],$klasor."/".time().$_FILES['hakkimizda_hakkimizdayol']['name']); 

				$duzenle=$db->prepare("UPDATE hakkimizda SET
				hakkimizda_icerik=:icerik,
				hakkimizda_baslik=:baslik,
				hakkimizda_baslik2=:baslik2,
				hakkimizda_baslik3=:baslik3,
				hakkimizda_yol=:hakkimizdayol	
				WHERE hakkimizda_id=1");
			$update=$duzenle->execute(array(
				'icerik' => $_POST['hakkimizda_icerik'],
				'baslik' => $_POST['hakkimizda_baslik'],
				'baslik2' => $_POST['hakkimizda_baslik2'],
				'baslik3' => $_POST['hakkimizda_baslik3'],
				'hakkimizdayol' => "img/".time().$_FILES['hakkimizda_hakkimizdayol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE hakkimizda SET
				hakkimizda_icerik=:icerik,
				hakkimizda_baslik=:baslik,
				hakkimizda_baslik2=:baslik2,
				hakkimizda_baslik3=:baslik3
				WHERE hakkimizda_id=1");
			$update=$duzenle->execute(array(
				'icerik' => $_POST['hakkimizda_icerik'],
				'baslik' => $_POST['hakkimizda_baslik'],
				'baslik2' => $_POST['hakkimizda_baslik2'],
				'baslik3' => $_POST['hakkimizda_baslik3']
		));
			} 
		}


	if ($update) {

		Header("Location:hakkimizda.php?hakkimizda_id=$hakkimizda_id&durum=ok");

	} else {

		Header("Location:hakkimizda.php?durum=no");
	}

}

if (isset($_POST['servislerduzenle'])) {
		$klasor="../img";
		$dosya_sayi=count($_FILES['servisler_servisleryol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['servisler_servisleryol']['name'])){ 
				move_uploaded_file($_FILES['servisler_servisleryol']['tmp_name'],$klasor."/".time().$_FILES['servisler_servisleryol']['name']); 

				$duzenle=$db->prepare("UPDATE servisler SET
				servisler_baslik=:baslik,
				servisler_baslik2=:baslik2,
				servisler_yol=:servisleryol	
				WHERE servisler_id=1");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['servisler_baslik'],
				'baslik2' => $_POST['servisler_baslik2'],
				'servisleryol' => "img/".time().$_FILES['servisler_servisleryol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE servisler SET
				servisler_baslik=:baslik,
				servisler_baslik2=:baslik2
				WHERE servisler_id=1");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['servisler_baslik'],
				'baslik2' => $_POST['servisler_baslik2']
		));
			} 
		}


	if ($update) {

		Header("Location:servisler.php?servisler_id=$servisler_id&durum=ok");

	} else {

		Header("Location:servisler.php?durum=no");
	}

}



if (isset($_POST['odalarduzenle'])) {
		$klasor="../img";
		$dosya_sayi=count($_FILES['odalar_odalaryol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['odalar_odalaryol']['name'])){ 
				move_uploaded_file($_FILES['odalar_odalaryol']['tmp_name'],$klasor."/".time().$_FILES['odalar_odalaryol']['name']); 

				$duzenle=$db->prepare("UPDATE odalar SET
				odalar_icerik=:icerik,
				odalar_baslik=:baslik,
				odalar_baslik2=:baslik2,
				odalar_baslik3=:baslik3,
				odalar_yol=:odalaryol	
				WHERE odalar_id=1");
			$update=$duzenle->execute(array(
				'icerik' => $_POST['odalar_icerik'],
				'baslik' => $_POST['odalar_baslik'],
				'baslik2' => $_POST['odalar_baslik2'],
				'baslik3' => $_POST['odalar_baslik3'],
				'odalaryol' => "img/".time().$_FILES['odalar_odalaryol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE odalar SET
				odalar_icerik=:icerik,
				odalar_baslik=:baslik,
				odalar_baslik2=:baslik2,
				odalar_baslik3=:baslik3
				WHERE odalar_id=1");
			$update=$duzenle->execute(array(
				'icerik' => $_POST['odalar_icerik'],
				'baslik' => $_POST['odalar_baslik'],
				'baslik2' => $_POST['odalar_baslik2'],
				'baslik3' => $_POST['odalar_baslik3']
		));
			} 
		}


	if ($update) {

		Header("Location:odalar.php?odalar_id=$odalar_id&durum=ok");

	} else {

		Header("Location:odalar.php?durum=no");
	}

}

if ($_POST['kullaniciguncelle']) {
//echo "a";exit;

	$parola=md5($_POST['parola']);
	
	$ayarkaydet=$db->prepare("UPDATE kullanicilar SET

		kadi=:adsoyad,
		parola=:password
		WHERE id={$_POST['id']}");
	$update=$ayarkaydet->execute(array(
		
		'adsoyad' => $_POST['kadi'],
		'password' => $parola
	));

	if ($update) {

		Header("Location:kullaniciduzenle.php?id=".$_POST['id']."&durum=ok");

	} else {

		Header("Location:kullaniciduzenle.php?durum=no");
	}

}

if (isset($_POST['yorumlarkaydet'])) {

	$kaydet=$db->prepare("INSERT INTO yorumlar SET
		yorumlar_ad=:ad,
		yorumlar_mesaj=:mesaj");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['yorumlar_ad'],
		'mesaj' => $_POST['yorumlar_mesaj'],
		
	));

	if ($insert) {

		Header("Location:yorumlar.php?durum=ok");

	} else {

		Header("Location:yorumlar.php?durum=no");
	}

}


if(isset($_GET['yorumlarsil'])){
	if ($_GET['yorumlarsil']=="ok") {
	//echo "string"; exit();
		$sil=$db->prepare("DELETE from yorumlar where yorumlar_id=:yorumlar_id");
		$kontrol=$sil->execute(array(
			'yorumlar_id' => $_GET['yorumlar_id']
		));

		if ($kontrol) {

			Header("Location:yorumlar.php");

		} else {

			Header("Location:hata.php");
		}

	}
}

if (isset($_POST['yorumlarduzenle'])) {
		

				$duzenle=$db->prepare("UPDATE yorumlar SET
				yorumlar_ad=:ad,
				yorumlar_mesaj=:mesaj	
			WHERE yorumlar_id={$_POST['yorumlar_id']}");
			$update=$duzenle->execute(array(
				'ad' => $_POST['yorumlar_ad'],
				'mesaj' => $_POST['yorumlar_mesaj']
		));


	if ($update) {

		Header("Location:yorumlar.php?yorumlar_id=$yorumlar_id&durum=ok");

	} else {

		Header("Location:yorumlar.php?durum=no");
	}



}


if(isset($_GET['kullanicisil'])){
	if ($_GET['kullanicisil']=="ok") {

		$sil=$db->prepare("DELETE from kullanicilar where id=:id");
		$kontrol=$sil->execute(array(
			'id' => $_GET['id']
		));

		if ($kontrol) {

			Header("Location:kullanicilar.php?durum=ok");

		} else {

			Header("Location:kullanicilar.php?durum=no");
		}

	}
}
if (isset($_POST['kullaniciekle'])) {

	$parola=md5($_POST['parola']);

	
	$kaydet=$db->prepare("INSERT INTO kullanicilar SET
		kadi=:adsoyad,
		parola=:password");
	$insert=$kaydet->execute(array(
		'adsoyad' => $_POST['kadi'],
		'password' =>  $parola
	));

	if ($insert) {

		Header("Location:kullaniciekle.php?durum=ok");

	} else {

		Header("Location:kullaniciekle.php?durum=no");
	}

}

if (isset($_POST['sliderkaydet'])) {

	$klasor="../img";
	$dosya_sayi=count($_FILES['slider_slideryol']['name']); 
	for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
		if(!empty($_FILES['slider_slideryol']['name'])){ 
			move_uploaded_file($_FILES['slider_slideryol']['tmp_name'],$klasor."/".time().$_FILES['slider_slideryol']['name']); 
		} 
	}
	
	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_baslik=:baslik,
		slider_baslik2=:baslik2,
		slider_sira=:sira,
		slider_durum=:durum,
		slider_yol=:slideryol");
	$insert=$kaydet->execute(array(
		'baslik' => $_POST['slider_baslik'],
		'baslik2' => $_POST['slider_baslik2'],
		'sira' => $_POST['slider_sira'],
		'durum' => $_POST['slider_durum'],
		'slideryol' => "img/".time().$_FILES['slider_slideryol']['name'].""
	));

	if ($insert) {

		Header("Location:slider.php?durum=ok");

	} else {

		Header("Location:slider.php?durum=no");
	}

}

if (isset($_POST['sliderduzenle'])) {
		$klasor="../img";
		$dosya_sayi=count($_FILES['slider_slideryol']['name']); 
		for($i=0;$i<$dosya_sayi;$i++){ 
		//echo $_FILES['resim_resimyol']['name'];exit;
			if(!empty($_FILES['slider_slideryol']['name'])){ 
				move_uploaded_file($_FILES['slider_slideryol']['tmp_name'],$klasor."/".time().$_FILES['slider_slideryol']['name']); 

				$duzenle=$db->prepare("UPDATE slider SET
				slider_baslik=:baslik,
				slider_baslik2=:baslik2,
				slider_sira=:sira,
				slider_durum=:durum,
				slider_yol=:slideryol	
			WHERE slider_id={$_POST['slider_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['slider_baslik'],
				'baslik2' => $_POST['slider_baslik2'],
				'sira' => $_POST['slider_sira'],
				'durum' => $_POST['slider_durum'],
				'slideryol' => "img/".time().$_FILES['slider_slideryol']['name'].""
		));
			}else{

				$duzenle=$db->prepare("UPDATE slider SET
				slider_baslik=:baslik,
				slider_baslik2=:baslik2,
				slider_sira=:sira,
				slider_durum=:durum
				WHERE slider_id={$_POST['slider_id']}");
			$update=$duzenle->execute(array(
				'baslik' => $_POST['slider_baslik'],
				'baslik2' => $_POST['slider_baslik2'],
				'sira' => $_POST['slider_sira'],
				'durum' => $_POST['slider_durum']
		));
			} 
		}


	if ($update) {

		Header("Location:slider.php?slider_id=$slider_id&durum=ok");

	} else {

		Header("Location:slider.php?durum=no");
	}

}

if(isset($_GET['slidersil'])){
	if ($_GET['slidersil']=="ok") {
	//echo "string"; exit();
		$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
		$kontrol=$sil->execute(array(
			'slider_id' => $_GET['slider_id']
		));

		if ($kontrol) {

			Header("Location:slider.php");

		} else {

			Header("Location:hata.php");
		}

	}
}


















?>