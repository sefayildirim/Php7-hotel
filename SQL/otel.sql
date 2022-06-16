-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Kas 2018, 15:11:43
-- Sunucu sürümü: 10.1.35-MariaDB
-- PHP Sürümü: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_baslik` varchar(50) NOT NULL,
  `ayar_baslik2` varchar(50) NOT NULL,
  `ayar_icerik` varchar(500) NOT NULL,
  `ayar_adres` varchar(250) NOT NULL,
  `ayar_telefon` varchar(20) NOT NULL,
  `ayar_mail` varchar(50) NOT NULL,
  `ayar_mesai` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_baslik`, `ayar_baslik2`, `ayar_icerik`, `ayar_adres`, `ayar_telefon`, `ayar_mail`, `ayar_mesai`) VALUES
(1, 'HAKKIMIZDA', 'İLETİŞİM BİLGİLERİ', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt.</p>\r\n', '203 Fake St. Mountain View, San Francisco, California, USA', '+2 392 3929 210', 'info@yourdomain.com', '7/24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `genelayar`
--

CREATE TABLE `genelayar` (
  `genelayar_id` int(11) NOT NULL,
  `genelayar_baslik` varchar(250) NOT NULL,
  `genelayar_aciklama` varchar(250) NOT NULL,
  `genelayar_kelimeler` varchar(250) NOT NULL,
  `genelayar_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `genelayar`
--

INSERT INTO `genelayar` (`genelayar_id`, `genelayar_baslik`, `genelayar_aciklama`, `genelayar_kelimeler`, `genelayar_yol`) VALUES
(1, 'Otel', 'Lüks Deneyimin Keyfini Çıkarın', 'Otel,Antalya,5 yıldız', 'img/15428063981542806039logo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(50) NOT NULL,
  `hakkimizda_baslik2` varchar(50) NOT NULL,
  `hakkimizda_baslik3` varchar(75) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_baslik2`, `hakkimizda_baslik3`, `hakkimizda_icerik`, `hakkimizda_yol`) VALUES
(1, 'HAKKIMIZDA', 'Biz kimiz', 'Enjoy a Luxury Experience', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, necessitatibus officiis facere nisi et, ut adipisci a quis quisquam vitae doloremque tempora repellat quae accusantium atque eum voluptatibus aperiam cumque.</p>\r\n\r\n<p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis. Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae reprehenderit harum nesciunt.</p>\r\n\r\n<p>Pariatur non consectetur libero, veniam inventore officia neque ipsum vel vitae repudiandae doloribus odit nihil dicta sit, magnam eos, in asperiores consequuntur eaque atque nam error. Dignissimos porro veniam voluptate.</p>\r\n\r\n<p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis. Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae reprehenderit harum nesciunt.</p>\r\n\r\n<p>Pariatur non consectetur libero, veniam inventore officia neque ipsum vel vitae repudiandae doloribus odit nihil dicta sit, magnam eos, in asperiores consequuntur eaque atque nam error. Dignissimos porro veniam voluptate.</p>\r\n\r\n<p>Quia ratione, eum harum ab similique mollitia, nisi itaque vel voluptas ipsam dolore perferendis. Deleniti voluptatum error possimus ipsum, sed, obcaecati. Sit unde quia eum repudiandae molestiae reprehenderit harum nesciunt.</p>\r\n\r\n<p>Pariatur non consectetur libero, veniam inventore officia neque ipsum vel vitae repudiandae doloribus odit nihil dicta sit, magnam eos, in asperiores consequuntur eaque atque nam error. Dignissimos porro veniam voluptate.</p>\r\n', 'img/154219229614.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kadi` char(50) NOT NULL,
  `parola` varchar(256) NOT NULL,
  `kullanici_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kadi`, `parola`, `kullanici_yol`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'img/logo.png'),
(18, 'deneme', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda`
--

CREATE TABLE `oda` (
  `oda_id` int(11) NOT NULL,
  `oda_baslik` varchar(50) NOT NULL,
  `oda_para` varchar(50) NOT NULL,
  `oda_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `oda`
--

INSERT INTO `oda` (`oda_id`, `oda_baslik`, `oda_para`, `oda_yol`) VALUES
(1, 'Aile Odası', '$ 245 /gecelik', 'img/4.jpg'),
(2, 'Family Room', '$ 245 /gecelik', 'images/img_2.jpg'),
(3, 'Family Room', '$ 245 /gecelik', 'images/img_2.jpg'),
(4, 'Family Room', '$ 245 /gecelik', 'img/1542270158154219229216.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odalar`
--

CREATE TABLE `odalar` (
  `odalar_id` int(11) NOT NULL,
  `odalar_baslik` varchar(50) NOT NULL,
  `odalar_baslik2` varchar(50) NOT NULL,
  `odalar_baslik3` varchar(75) NOT NULL,
  `odalar_icerik` text NOT NULL,
  `odalar_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odalar`
--

INSERT INTO `odalar` (`odalar_id`, `odalar_baslik`, `odalar_baslik2`, `odalar_baslik3`, `odalar_icerik`, `odalar_yol`) VALUES
(1, 'Odalar', 'Rahat & Konforlu', 'Odalarımız', '<p>Evinizin rahatlığını otelimizde l&uuml;ks ve konfor ile bir arada sunan odalarımız; Min. 1 kişiden max. 4 kişiye kadar konaklama kapasitesine sahip olup, 28 m&sup2; ile 40 m&sup2; arasındaki oda genişlikleri ile sizlere geniş ve rahat bir yaşam alanı sunmaktadır.</p>\r\n', 'img/5.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `resim_id` int(11) NOT NULL,
  `resim_sira` int(11) NOT NULL,
  `resim_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`resim_id`, `resim_sira`, `resim_yol`) VALUES
(1, 0, 'img/1.jpg'),
(2, 0, 'img/2.jpg'),
(3, 0, 'img/3.jpg'),
(4, 0, 'img/4.jpg'),
(5, 0, 'img/5.jpg'),
(6, 0, 'img/6.jpg'),
(7, 0, 'img/7.jpg'),
(8, 0, 'img/8.jpg'),
(9, 0, 'img/9.jpg'),
(10, 0, 'img/10.jpg'),
(11, 0, 'img/11.jpg'),
(12, 0, 'img/12.jpg'),
(13, 0, 'img/13.jpg'),
(14, 0, 'img/14.jpg'),
(15, 0, 'img/15.jpg'),
(16, 0, 'img/16.jpg'),
(17, 0, 'img/17.jpg'),
(18, 0, 'img/18.jpg'),
(19, 0, 'img/19.jpg'),
(20, 0, 'img/20.jpg'),
(21, 0, 'img/21.jpg'),
(22, 0, 'img/22.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
  `rezervasyon_id` int(11) NOT NULL,
  `rezervasyon_giris` varchar(50) NOT NULL,
  `rezervasyon_cikis` varchar(50) NOT NULL,
  `rezervasyon_yetiskin` int(5) NOT NULL,
  `rezervasyon_cocuk` int(5) NOT NULL,
  `rezervasyon_telefon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rezervasyon`
--

INSERT INTO `rezervasyon` (`rezervasyon_id`, `rezervasyon_giris`, `rezervasyon_cikis`, `rezervasyon_yetiskin`, `rezervasyon_cocuk`, `rezervasyon_telefon`) VALUES
(10, '4 Kasım, 2018', '5 Kasım, 2018', 2, 2, '12312312'),
(13, '1 Kasım, 2018', '14 Kasım, 2018', 2, 2, '12312312');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servis`
--

CREATE TABLE `servis` (
  `servis_id` int(11) NOT NULL,
  `servis_baslik` varchar(50) NOT NULL,
  `servis_icerik` varchar(300) NOT NULL,
  `servis_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `servis`
--

INSERT INTO `servis` (`servis_id`, `servis_baslik`, `servis_icerik`, `servis_yol`) VALUES
(1, 'Hızlı ve Ücretsiz Wifi', 'Even the all-powerful Pointing has no control about the blind texts.', 'img/wifi.png'),
(2, 'Açık Büfe', 'Even the all-powerful Pointing has no control about the blind texts.', 'img/büfe.jpg'),
(3, 'Spa', 'Even the all-powerful Pointing has no control about the blind texts..', 'img/spa.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `servisler`
--

CREATE TABLE `servisler` (
  `servisler_id` int(11) NOT NULL,
  `servisler_baslik` varchar(50) NOT NULL,
  `servisler_baslik2` varchar(50) NOT NULL,
  `servisler_yol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `servisler`
--

INSERT INTO `servisler` (`servisler_id`, `servisler_baslik`, `servisler_baslik2`, `servisler_yol`) VALUES
(1, 'Servisler', 'Tesisler ve Hizmetler', 'img/154227612912.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_baslik` varchar(50) NOT NULL,
  `slider_baslik2` varchar(50) NOT NULL,
  `slider_yol` varchar(250) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_durum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_baslik`, `slider_baslik2`, `slider_yol`, `slider_sira`, `slider_durum`) VALUES
(1, 'Hoşgeldiniz', 'Bir Lüks Deneyimin Keyfini Çıkarın', 'img/1.jpg', 1, 1),
(2, 'Hoşgeldiniz', 'Basit & Zarif', 'img/2.jpg', 1, 1),
(3, 'Hoşgeldiniz', 'Yiyecek & İçecek', 'images/bg_1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorumlar_id` int(11) NOT NULL,
  `yorumlar_ad` varchar(50) NOT NULL,
  `yorumlar_mesaj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorumlar_id`, `yorumlar_ad`, `yorumlar_mesaj`) VALUES
(5, 'Elizabeth Charles', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt.</p>\r\n'),
(6, 'Elizabeth Charles', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt'),
(7, 'Elizabeth Charles', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `genelayar`
--
ALTER TABLE `genelayar`
  ADD PRIMARY KEY (`genelayar_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oda`
--
ALTER TABLE `oda`
  ADD PRIMARY KEY (`oda_id`);

--
-- Tablo için indeksler `odalar`
--
ALTER TABLE `odalar`
  ADD PRIMARY KEY (`odalar_id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`resim_id`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`rezervasyon_id`);

--
-- Tablo için indeksler `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`servis_id`);

--
-- Tablo için indeksler `servisler`
--
ALTER TABLE `servisler`
  ADD PRIMARY KEY (`servisler_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorumlar_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayar`
--
ALTER TABLE `ayar`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `genelayar`
--
ALTER TABLE `genelayar`
  MODIFY `genelayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `oda`
--
ALTER TABLE `oda`
  MODIFY `oda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `odalar`
--
ALTER TABLE `odalar`
  MODIFY `odalar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `rezervasyon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `servis`
--
ALTER TABLE `servis`
  MODIFY `servis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `servisler`
--
ALTER TABLE `servisler`
  MODIFY `servisler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorumlar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
