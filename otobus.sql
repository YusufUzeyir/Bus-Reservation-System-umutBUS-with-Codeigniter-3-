-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Mar 2024, 13:02:21
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otobus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tblo_subs_menu`
--

CREATE TABLE `tblo_subs_menu` (
  `kd_subs_menu` int(11) NOT NULL,
  `kd_menu` int(11) DEFAULT NULL,
  `baslik_subs_menu` varchar(128) DEFAULT NULL,
  `url_subs_menu` varchar(128) DEFAULT NULL,
  `is_aktif_subs_menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tblo_subs_menu`
--

INSERT INTO `tblo_subs_menu` (`kd_subs_menu`, `kd_menu`, `baslik_subs_menu`, `url_subs_menu`, `is_aktif_subs_menu`) VALUES
(0, 1, 'Dashboard', 'backend/home', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `isim_admin` varchar(35) DEFAULT NULL,
  `username_admin` varchar(30) DEFAULT NULL,
  `password_admin` varchar(256) DEFAULT NULL,
  `img_admin` varchar(35) DEFAULT NULL,
  `email_admin` varchar(35) DEFAULT NULL,
  `seviye_admin` varchar(12) DEFAULT NULL,
  `durum_admin` int(1) DEFAULT NULL,
  `tarih_yarat_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `isim_admin`, `username_admin`, `password_admin`, `img_admin`, `email_admin`, `seviye_admin`, `durum_admin`, `tarih_yarat_admin`) VALUES
('ADM0001', 'Yonetici', 'yonetici', '$2y$10$nvmCaXC4Ohua5eW4fFAMauISafgwvPsoRXVNnToZpbF4vWfBw.xvu', 'assets/backend/img/default.png', 'adm@gmail.com', '2', 1, '1552276812'),
('ADM0003', 'Idare', 'idare', '$2y$10$nvmCaXC4Ohua5eW4fFAMauISafgwvPsoRXVNnToZpbF4vWfBw.xvu', 'assets/backend/img/default.png', 'owner@gmail.com', '1', 1, '1552819095');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `kd_bank` varchar(50) NOT NULL,
  `nasabah_bank` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `nomrek_bank` varchar(50) DEFAULT NULL,
  `photo_bank` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_bank`
--

INSERT INTO `tbl_bank` (`kd_bank`, `nasabah_bank`, `nama_bank`, `nomrek_bank`, `photo_bank`) VALUES
('BNK0001', 'ZRT', 'Ziraat Bankasi', '600000521', 'assets/frontend/img/bank/ziraat.png'),
('BNK0002', 'VKF', 'Vakif Bank', '107556540', 'assets/frontend/img/bank/vkfbank.png'),
('BNK0003', 'HLK', 'Halk Bank', '800140000', 'assets/frontend/img/bank/hlkbank.png'),
('BNK0004', 'GRT', 'Garanti Bankasi', '300124589', 'assets/frontend/img/bank/grntbnk.png'),
('BNK0005', 'YKR', 'Yapi Kredi Bankasi', '100025001', '/assets/frontend/img/bank/ypkrdbank.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_bilet`
--

CREATE TABLE `tbl_bilet` (
  `kd_bilet` varchar(50) NOT NULL,
  `kd_siparis` varchar(50) DEFAULT NULL,
  `isim_bilet` varchar(50) DEFAULT NULL,
  `koltuk_bilet` varchar(50) DEFAULT NULL,
  `yas_bilet` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `terminaL_satin_bilet` varchar(50) DEFAULT NULL,
  `fiyat_bilet` varchar(50) NOT NULL,
  `etiket_bilet` varchar(100) DEFAULT NULL,
  `durum_bilet` varchar(50) NOT NULL,
  `yarat_tgl_bilet` date DEFAULT NULL,
  `yarat_admin_bilet` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_bilet`
--

INSERT INTO `tbl_bilet` (`kd_bilet`, `kd_siparis`, `isim_bilet`, `koltuk_bilet`, `yas_bilet`, `terminaL_satin_bilet`, `fiyat_bilet`, `etiket_bilet`, `durum_bilet`, `yarat_tgl_bilet`, `yarat_admin_bilet`) VALUES
('TORD00002J0019202403308', 'ORD00002', 'Must1', '8', '22 Yaşında', 'TJ001', '250', 'assets/backend/upload/etiket/ORD00002.pdf', '2', '2024-03-27', 'idare');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_erisim_menu`
--

CREATE TABLE `tbl_erisim_menu` (
  `kd_erisim_menu` int(11) DEFAULT NULL,
  `kd_seviye` int(11) DEFAULT NULL,
  `kd_menu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_erisim_menu`
--

INSERT INTO `tbl_erisim_menu` (`kd_erisim_menu`, `kd_seviye`, `kd_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `kd_menu` int(11) NOT NULL,
  `isim_menu` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_menu`
--

INSERT INTO `tbl_menu` (`kd_menu`, `isim_menu`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_musteri`
--

CREATE TABLE `tbl_musteri` (
  `kd_musteri` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username_musteri` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password_musteri` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `no_ktp_musteri` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `isim_musteri` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `adres_musteri` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_musteri` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telefon_musteri` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `img_musteri` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `durum_musteri` int(1) DEFAULT NULL,
  `tarih_yarat_musteri` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Tablo döküm verisi `tbl_musteri`
--

INSERT INTO `tbl_musteri` (`kd_musteri`, `username_musteri`, `password_musteri`, `no_ktp_musteri`, `isim_musteri`, `adres_musteri`, `email_musteri`, `telefon_musteri`, `img_musteri`, `durum_musteri`, `tarih_yarat_musteri`) VALUES
('CA0003', 'must3', '$2y$10$tN2vXfpeZ7fORvcrICk1hu.bf5.9EtCeDSOplj7WfgP2js0LpNTRG', '', 'Musteri3', 'adres3', 'must3@gmail.com', '05535535353', 'assets/frontend/img/default.png', 1, '1711540477'),
('CA0001', 'must1', '$2y$10$L.8sKMHrTZ1aviMMjUXe1OPhsmEYeZqrXq3Wb9SPGgKBB/lgGzwm6', '', 'Musteri1', 'adres1', 'must1@gmail.com', '05515515151', 'assets/frontend/img/default.png', 1, '1711540396'),
('CA0002', 'must2', '$2y$10$M7rAS8zaA2F9r7zwH76ItuxJc58WoAW1ZwClYXrQbnuGdUFMPophS', '', 'Musteri2', 'adres2', 'must2@gmail.com', '05525525252', 'assets/frontend/img/default.png', 1, '1711540451');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_onay`
--

CREATE TABLE `tbl_onay` (
  `kd_onay` varchar(50) NOT NULL,
  `kd_siparis` varchar(50) DEFAULT NULL,
  `isim_onay` varchar(50) DEFAULT NULL,
  `isim_bank_onay` varchar(50) DEFAULT NULL,
  `hesap_no` varchar(50) DEFAULT NULL,
  `total_onay` varchar(50) DEFAULT NULL,
  `foto_onay` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_otobus`
--

CREATE TABLE `tbl_otobus` (
  `kd_otobus` varchar(50) NOT NULL,
  `isim_otobus` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `plaka_otobus` varchar(50) DEFAULT NULL,
  `kapasite_otobus` int(13) DEFAULT NULL,
  `durum_otobus` int(1) DEFAULT NULL,
  `tanim_otobus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_otobus`
--

INSERT INTO `tbl_otobus` (`kd_otobus`, `isim_otobus`, `plaka_otobus`, `kapasite_otobus`, `durum_otobus`, `tanim_otobus`) VALUES
('B001', 'KOÇ TURİZM', '34 KOU 41', 23, 1, NULL),
('B002', 'METRO TURİZM', '34 TR 8565', 23, 1, NULL),
('B003', 'KALE SEYAHAT', '57 SNP 142', 23, 1, NULL),
('B004', 'EFE TUR', '06 PS 9842', 23, 1, NULL),
('B005', 'BUZLU TURİZM', '16 AZ 4512', 23, 1, NULL);

--
-- Tetikleyiciler `tbl_otobus`
--
DELIMITER $$
CREATE TRIGGER `delete_otobus_zaman_trigger` BEFORE DELETE ON `tbl_otobus` FOR EACH ROW BEGIN
    DELETE FROM tbl_zaman WHERE kd_otobus = OLD.kd_otobus;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_seviye`
--

CREATE TABLE `tbl_seviye` (
  `kd_seviye` int(11) NOT NULL,
  `isim_seviye` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_seviye`
--

INSERT INTO `tbl_seviye` (`kd_seviye`, `isim_seviye`) VALUES
(1, 'owner'),
(2, 'administrator');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_siparis`
--

CREATE TABLE `tbl_siparis` (
  `id_siparis` int(11) NOT NULL,
  `kd_siparis` varchar(50) DEFAULT NULL,
  `kd_bilet` varchar(50) DEFAULT NULL,
  `kd_zaman` varchar(50) DEFAULT NULL,
  `kd_musteri` varchar(50) DEFAULT NULL,
  `kd_bank` varchar(50) DEFAULT NULL,
  `mc_siparis` varchar(200) DEFAULT NULL,
  `isim_siparis` varchar(50) DEFAULT NULL,
  `tgl_siparis_tamamla` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tgl_ayrilis_siparis` varchar(50) DEFAULT NULL,
  `isim_koltuk_oturan` varchar(50) DEFAULT NULL,
  `yas_koltuk_oturan` varchar(50) DEFAULT NULL,
  `no_koltuk_oturan` varchar(50) DEFAULT NULL,
  `no_ktp_siparis` varchar(50) DEFAULT NULL,
  `no_tlpn_siparis` varchar(50) DEFAULT NULL,
  `adres_siparis` varchar(100) DEFAULT NULL,
  `email_siparis` varchar(100) DEFAULT NULL,
  `gecmis_siparis` varchar(50) DEFAULT NULL,
  `qrcode_siparis` varchar(100) DEFAULT NULL,
  `durum_siparis` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_siparis`
--

INSERT INTO `tbl_siparis` (`id_siparis`, `kd_siparis`, `kd_bilet`, `kd_zaman`, `kd_musteri`, `kd_bank`, `mc_siparis`, `isim_siparis`, `tgl_siparis_tamamla`, `tgl_ayrilis_siparis`, `isim_koltuk_oturan`, `yas_koltuk_oturan`, `no_koltuk_oturan`, `no_ktp_siparis`, `no_tlpn_siparis`, `adres_siparis`, `email_siparis`, `gecmis_siparis`, `qrcode_siparis`, `durum_siparis`) VALUES
(93, 'ORD00001', 'TORD00001J0001202403315', 'J0001', 'CA0001', NULL, 'TJ002', 'Musteri1', 'Çarşamba, 27 Mart 2024, 14:58', '2024-03-31', 'Must1', '22', '5', '39465620704', '05515515151', 'adres1', 'must1@gmail.com', '28-03-2024 14:58:44', 'assets/frontend/upload/qrcode/ORD00001.png', '1'),
(94, 'ORD00002', 'TORD00002J0019202403308', 'J0019', 'CA0001', NULL, 'TJ001', 'Musteri1', 'Çarşamba, 27 Mart 2024, 14:59', '2024-03-30', 'Must1', '22', '8', '39465620704', '05515515151', 'adres1', 'must1@gmail.com', '28-03-2024 14:59:19', 'assets/frontend/upload/qrcode/ORD00002.png', '2'),
(95, 'ORD00003', 'TORD00003J00182024032810', 'J0018', 'CA0002', NULL, 'TJ004', 'Musteri2', 'Çarşamba, 27 Mart 2024, 15:00', '2024-03-28', 'Must2', '20', '10', '39465620704', '05525525252', 'adres2', 'must2@gmail.com', '28-03-2024 15:00:05', 'assets/frontend/upload/qrcode/ORD00003.png', '1'),
(96, 'ORD00003', 'TORD00003J00182024032811', 'J0018', 'CA0002', NULL, 'TJ004', 'Musteri2', 'Çarşamba, 27 Mart 2024, 15:00', '2024-03-28', 'Must2.1', '21', '11', '39465620704', '05525525252', 'adres2', 'must2@gmail.com', '28-03-2024 15:00:05', 'assets/frontend/upload/qrcode/ORD00003.png', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_token_musteri`
--

CREATE TABLE `tbl_token_musteri` (
  `kd_token` int(11) NOT NULL,
  `isim_token` varchar(256) DEFAULT NULL,
  `email_token` varchar(50) DEFAULT NULL,
  `tarih_yarat_token` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_token_musteri`
--

INSERT INTO `tbl_token_musteri` (`kd_token`, `isim_token`, `email_token`, `tarih_yarat_token`) VALUES
(36, '573db1e9734f6fff816b17975dc48a4b', 'must1@gmail.com', 1711540397),
(37, 'f4f72e70b33b167cecc17c6e0d654cd2', 'must2@gmail.com', 1711540451),
(38, '8b696d2ff819af0339af7cef58f94132', 'must3@gmail.com', 1711540477);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_varis`
--

CREATE TABLE `tbl_varis` (
  `kd_terminal` varchar(50) NOT NULL,
  `kota_varis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `isim_terminal_varis` varchar(50) NOT NULL,
  `terminal_varis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_varis`
--

INSERT INTO `tbl_varis` (`kd_terminal`, `kota_varis`, `isim_terminal_varis`, `terminal_varis`) VALUES
('TJ001', 'İSTANBUL', '', 'Esenler Otogar'),
('TJ002', 'Ankara', '', 'Aşti Otogar'),
('TJ003', 'Kocaeli', '', 'Otogar'),
('TJ004', 'Antalya', '', 'Otogar');

--
-- Tetikleyiciler `tbl_varis`
--
DELIMITER $$
CREATE TRIGGER `delete_varis_zaman_trigger` BEFORE DELETE ON `tbl_varis` FOR EACH ROW BEGIN
    DELETE FROM tbl_zaman WHERE kd_terminal = OLD.kd_terminal;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_zaman`
--

CREATE TABLE `tbl_zaman` (
  `kd_zaman` varchar(50) NOT NULL,
  `kd_otobus` varchar(50) DEFAULT NULL,
  `kd_terminal` varchar(50) DEFAULT NULL,
  `kd_hedef_termianl` varchar(50) DEFAULT NULL,
  `vilayet_terminal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `kalkis_zaman` time DEFAULT NULL,
  `varis_zaman` time DEFAULT NULL,
  `fiyat_tarifesi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `tbl_zaman`
--

INSERT INTO `tbl_zaman` (`kd_zaman`, `kd_otobus`, `kd_terminal`, `kd_hedef_termianl`, `vilayet_terminal`, `kalkis_zaman`, `varis_zaman`, `fiyat_tarifesi`) VALUES
('J0001', 'B005', 'TJ004', 'TJ002', 'Antalya', '09:00:00', '17:00:00', '375'),
('J0002', 'B005', 'TJ004', 'TJ002', 'Antalya', '17:00:00', '01:00:00', '375'),
('J0003', 'B005', 'TJ004', 'TJ002', 'Antalya', '01:00:00', '09:00:00', '375'),
('J0004', 'B001', 'TJ001', 'TJ002', 'İSTANBUL', '09:00:00', '14:00:00', '250'),
('J0005', 'B001', 'TJ001', 'TJ002', 'İSTANBUL', '17:00:00', '22:00:00', '250'),
('J0006', 'B001', 'TJ001', 'TJ002', 'İSTANBUL', '01:00:00', '06:00:00', '250'),
('J0007', 'B002', 'TJ003', 'TJ002', 'Kocaeli', '09:00:00', '13:00:00', '200'),
('J0008', 'B002', 'TJ003', 'TJ002', 'Kocaeli', '17:00:00', '21:00:00', '200'),
('J0009', 'B002', 'TJ003', 'TJ002', 'Kocaeli', '01:00:00', '05:00:00', '200'),
('J0010', 'B003', 'TJ002', 'TJ004', 'Ankara', '09:00:00', '17:00:00', '375'),
('J0011', 'B003', 'TJ002', 'TJ004', 'Ankara', '17:00:00', '01:00:00', '375'),
('J0012', 'B003', 'TJ002', 'TJ004', 'Ankara', '01:00:00', '09:00:00', '375'),
('J0013', 'B004', 'TJ001', 'TJ004', 'İSTANBUL', '09:00:00', '19:00:00', '800'),
('J0014', 'B004', 'TJ001', 'TJ004', 'İSTANBUL', '17:00:00', '03:00:00', '800'),
('J0015', 'B004', 'TJ001', 'TJ004', 'İSTANBUL', '01:00:00', '11:00:00', '800'),
('J0016', 'B005', 'TJ003', 'TJ004', 'Kocaeli', '09:00:00', '17:00:00', '750'),
('J0017', 'B005', 'TJ003', 'TJ004', 'Kocaeli', '17:00:00', '01:00:00', '750'),
('J0018', 'B005', 'TJ003', 'TJ004', 'Kocaeli', '01:00:00', '09:00:00', '750'),
('J0019', 'B005', 'TJ002', 'TJ001', 'Ankara', '09:00:00', '14:00:00', '250');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL COMMENT 'unique id',
  `response` text NOT NULL COMMENT 'response from stripe',
  `status` int(11) NOT NULL COMMENT '1 = Success, 0 = Fail',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `transactions`
--

INSERT INTO `transactions` (`id`, `response`, `status`, `created_at`) VALUES
(1, '{\"id\":\"ch_1EeuNnBx71XwPn0QKVEfkiLt\",\"object\":\"charge\",\"amount\":10000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1EeuNoBx71XwPn0QXXY2Iy9m\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":\"August Wiggins\",\"phone\":null},\"captured\":true,\"created\":1559007943,\"currency\":\"gbp\",\"customer\":null,\"description\":\"TEST PAYMENT\",\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"20190528034541-954\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":23,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1EeuNmBx71XwPn0QWdpyyZ7o\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"description\":\"Visa Classic\",\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"IIOX8H95BaAsAfiF\",\"funding\":\"credit\",\"last4\":\"4242\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1EZalpBx71XwPn0Q\\/ch_1EeuNnBx71XwPn0QKVEfkiLt\\/rcpt_F9Cn59G6UlVDArAxz0FK28pW4YDRpZz\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1EeuNnBx71XwPn0QKVEfkiLt\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1EeuNmBx71XwPn0QWdpyyZ7o\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":null,\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"IIOX8H95BaAsAfiF\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"August Wiggins\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', 1, '2019-05-27 22:45:43'),
(2, '{\"id\":\"ch_1EeuO0Bx71XwPn0QiJzi6Kyo\",\"object\":\"charge\",\"amount\":10000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1EeuO0Bx71XwPn0Qcspjb0RV\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":\"August Wiggins\",\"phone\":null},\"captured\":true,\"created\":1559007956,\"currency\":\"gbp\",\"customer\":null,\"description\":\"TEST PAYMENT\",\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"20190528034554-799\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":12,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1EeuNzBx71XwPn0QKmKk2SrA\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"description\":\"Visa Classic\",\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"IIOX8H95BaAsAfiF\",\"funding\":\"credit\",\"last4\":\"4242\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1EZalpBx71XwPn0Q\\/ch_1EeuO0Bx71XwPn0QiJzi6Kyo\\/rcpt_F9CnvrDMUjeO4J0AIckH5nC5TV7fW9W\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1EeuO0Bx71XwPn0QiJzi6Kyo\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1EeuNzBx71XwPn0QKmKk2SrA\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":null,\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"IIOX8H95BaAsAfiF\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"August Wiggins\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', 1, '2019-05-27 22:45:55'),
(3, '{\"id\":\"ch_1EeuOiBx71XwPn0Q5R2u4DYz\",\"object\":\"charge\",\"amount\":10000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_1EeuOjBx71XwPn0QIYsTkQcP\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":\"August Wiggins\",\"phone\":null},\"captured\":true,\"created\":1559008000,\"currency\":\"gbp\",\"customer\":null,\"description\":\"TEST PAYMENT\",\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"20190528034638-524\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":17,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1EeuOhBx71XwPn0QHSgQF7gw\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"description\":\"Visa Classic\",\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"IIOX8H95BaAsAfiF\",\"funding\":\"credit\",\"last4\":\"4242\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1EZalpBx71XwPn0Q\\/ch_1EeuOiBx71XwPn0Q5R2u4DYz\\/rcpt_F9Co9brdHJNAtH4WP6vTCtxb8gypOAZ\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1EeuOiBx71XwPn0Q5R2u4DYz\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1EeuOhBx71XwPn0QHSgQF7gw\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":null,\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":12,\"exp_year\":2020,\"fingerprint\":\"IIOX8H95BaAsAfiF\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"August Wiggins\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', 1, '2019-05-27 22:46:40'),
(4, '{\"charge\":\"ch_3OxneLBxLZhgOMum0N7j1NiC\",\"code\":\"card_declined\",\"decline_code\":\"insufficient_funds\",\"doc_url\":\"https:\\/\\/stripe.com\\/docs\\/error-codes\\/card-declined\",\"message\":\"Your card has insufficient funds.\",\"request_log_url\":\"https:\\/\\/dashboard.stripe.com\\/test\\/logs\\/req_nX5l2NN5ooYrIp?t=1711273653\",\"type\":\"card_error\"}', 0, '2024-03-24 09:47:30'),
(5, '{\"charge\":\"ch_3OxneMBxLZhgOMum0tCYgj8T\",\"code\":\"card_declined\",\"decline_code\":\"insufficient_funds\",\"doc_url\":\"https:\\/\\/stripe.com\\/docs\\/error-codes\\/card-declined\",\"message\":\"Your card has insufficient funds.\",\"request_log_url\":\"https:\\/\\/dashboard.stripe.com\\/test\\/logs\\/req_6e1Xw8j7BuRNCz?t=1711273654\",\"type\":\"card_error\"}', 0, '2024-03-24 09:47:31');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tblo_subs_menu`
--
ALTER TABLE `tblo_subs_menu`
  ADD PRIMARY KEY (`kd_subs_menu`),
  ADD KEY `kd_menu` (`kd_menu`);

--
-- Tablo için indeksler `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Tablo için indeksler `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Tablo için indeksler `tbl_bilet`
--
ALTER TABLE `tbl_bilet`
  ADD PRIMARY KEY (`kd_bilet`),
  ADD KEY `kode_order` (`kd_siparis`);

--
-- Tablo için indeksler `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`kd_menu`);

--
-- Tablo için indeksler `tbl_musteri`
--
ALTER TABLE `tbl_musteri`
  ADD PRIMARY KEY (`kd_musteri`);

--
-- Tablo için indeksler `tbl_onay`
--
ALTER TABLE `tbl_onay`
  ADD PRIMARY KEY (`kd_onay`),
  ADD KEY `kode_order` (`kd_siparis`);

--
-- Tablo için indeksler `tbl_otobus`
--
ALTER TABLE `tbl_otobus`
  ADD PRIMARY KEY (`kd_otobus`);

--
-- Tablo için indeksler `tbl_seviye`
--
ALTER TABLE `tbl_seviye`
  ADD PRIMARY KEY (`kd_seviye`);

--
-- Tablo için indeksler `tbl_siparis`
--
ALTER TABLE `tbl_siparis`
  ADD PRIMARY KEY (`id_siparis`),
  ADD KEY `kd_zaman` (`kd_zaman`),
  ADD KEY `kd_kustomer` (`kd_musteri`),
  ADD KEY `kd_bilet` (`kd_bilet`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Tablo için indeksler `tbl_token_musteri`
--
ALTER TABLE `tbl_token_musteri`
  ADD PRIMARY KEY (`kd_token`);

--
-- Tablo için indeksler `tbl_varis`
--
ALTER TABLE `tbl_varis`
  ADD PRIMARY KEY (`kd_terminal`);

--
-- Tablo için indeksler `tbl_zaman`
--
ALTER TABLE `tbl_zaman`
  ADD PRIMARY KEY (`kd_zaman`),
  ADD KEY `kd_otobus` (`kd_otobus`),
  ADD KEY `kd_terminal` (`kd_terminal`);

--
-- Tablo için indeksler `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `kd_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_seviye`
--
ALTER TABLE `tbl_seviye`
  MODIFY `kd_seviye` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_siparis`
--
ALTER TABLE `tbl_siparis`
  MODIFY `id_siparis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Tablo için AUTO_INCREMENT değeri `tbl_token_musteri`
--
ALTER TABLE `tbl_token_musteri`
  MODIFY `kd_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id', AUTO_INCREMENT=21;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `tbl_zaman`
--
ALTER TABLE `tbl_zaman`
  ADD CONSTRAINT `fk_otobus_zaman` FOREIGN KEY (`kd_otobus`) REFERENCES `tbl_otobus` (`kd_otobus`),
  ADD CONSTRAINT `fk_varis_zaman` FOREIGN KEY (`kd_terminal`) REFERENCES `tbl_varis` (`kd_terminal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
