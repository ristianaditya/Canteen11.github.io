/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.34-MariaDB : Database - kantin_ol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`id11828785_canteen11` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `id11828785_canteen11`;

/*Table structure for table `akun_pembeli` */

DROP TABLE IF EXISTS `akun_pembeli`;

CREATE TABLE `akun_pembeli` (
  `id_pembeli` char(16) NOT NULL,
  `id_user` char(16) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `no_telepon` char(16) NOT NULL,
  `foto` text,
  `verifikasi` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pembeli`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `akun_pembeli_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun_pembeli` */

insert  into `akun_pembeli`(`id_pembeli`,`id_user`,`nama`,`email`,`jenis_kelamin`,`no_telepon`,`foto`,`verifikasi`) values 
('PE00014','US00001','yoga nizar','yoganizar35@gmail.com','Laki-laki','085352585452','/upload/pembeli/IMG-20180719-WA0134.jpg','2'),
('PE00015','US00016','herman','herman@gmail.com','Laki-laki','085352585451',NULL,'2'),
('PE00016','US00017','ristian aditya','ristianaditya44@gmail.com','Laki-laki','085352585451','/upload/pembeli/IMG-20180719-WA0017.jpg','2'),
('PE00017','US00019','ristian aditya','ristianaditya35@gmail.com','Laki-laki','085352585451',NULL,'2');

/*Table structure for table `akun_penjual` */

DROP TABLE IF EXISTS `akun_penjual`;

CREATE TABLE `akun_penjual` (
  `id_penjual` char(32) NOT NULL,
  `id_user` char(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `no_telepon` char(16) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` text NOT NULL,
  `surat_pengajuan` text NOT NULL,
  `alamat` text NOT NULL,
  `verifikasi` char(1) NOT NULL,
  PRIMARY KEY (`id_penjual`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `akun_penjual_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `akun_penjual` */

insert  into `akun_penjual`(`id_penjual`,`id_user`,`nama`,`no_ktp`,`no_telepon`,`tgl_lahir`,`foto`,`surat_pengajuan`,`alamat`,`verifikasi`) values 
('PEN00001','US00006','asep nurahmahs','9025205950017','091212132232','1970-01-17','','','cijerah bandung kulon wetan','2'),
('PEN00002','US00007','USEP SANGUINIS','327104650493000','085352585451','2019-12-19','/upload/penjual/IMG_1467-copy.jpg','','Jalan Cigugur Tengah, Cigugur Tengah, Kota Cimahi, Jawa Barat','2'),
('PEN00003','US00008','sartono suaeb','7025205950017','081212132232','2020-01-01','/upload/penjual/IMG-20180719-WA0037.jpg','/upload/pengajuan/ss12.jpg','cijerah bandung kulon','2'),
('PEN00004','US00011','asep sodikin','3277025205950017','081212132232','2020-02-07','','/upload/pengajuan/024514700_1554945891-iStock-821583034.jpg','cianjur ','2'),
('PEN00005','US00012','bejamin','3277025205950017','081212132232','2020-02-19','/upload/penjual/IMG-20180719-WA0017.jpg','/upload/pengajuan/103.jpg','cijerah','2'),
('PEN00006','US00013','eusemartins ','3277025205950017','085352585451','2020-01-29','/upload/penjual/IMG_1467-copy.jpg','/upload/pengajuan/ss13.jpg','bandung','2'),
('PEN00007','US00015','ristian aditya','3277025205950017','085352585451','2020-02-13','','/upload/pengajuan/IMG-20191112-WA00232.jpg','cigugur tengah kota cimahi','2'),
('PEN00008','US00018','satrono suaib','3277025205950017','088809408744','2002-03-29','','/upload/pengajuan/IMG-20180719-WA0017.jpg','jl.Budi no 10','2');

/*Table structure for table `daftar_pesanan` */

DROP TABLE IF EXISTS `daftar_pesanan`;

CREATE TABLE `daftar_pesanan` (
  `id_dafpes` char(32) NOT NULL,
  `id_pesanan` char(32) NOT NULL,
  `id_produk` char(32) NOT NULL,
  `jumlah_pesanan` varchar(32) NOT NULL,
  `deskripsi` text,
  `total_harga` int(32) NOT NULL,
  PRIMARY KEY (`id_dafpes`),
  KEY `id_produk` (`id_produk`),
  KEY `id_pesanan` (`id_pesanan`),
  CONSTRAINT `daftar_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `daftar_produk` (`id_produk`),
  CONSTRAINT `daftar_pesanan_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_pesanan` */

/*Table structure for table `daftar_produk` */

DROP TABLE IF EXISTS `daftar_produk`;

CREATE TABLE `daftar_produk` (
  `id_produk` char(32) NOT NULL,
  `id_kantin` char(32) NOT NULL,
  `id_kategori` char(32) NOT NULL,
  `nama_produk` varchar(32) NOT NULL,
  `harga` int(16) NOT NULL,
  `deskripsi` text,
  `foto_produk` text,
  `status_produk` char(1) NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_kantin` (`id_kantin`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `daftar_produk_ibfk_1` FOREIGN KEY (`id_kantin`) REFERENCES `data_kantin` (`id_kantin`),
  CONSTRAINT `daftar_produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `daftar_produk` */

insert  into `daftar_produk`(`id_produk`,`id_kantin`,`id_kategori`,`nama_produk`,`harga`,`deskripsi`,`foto_produk`,`status_produk`) values 
('PR00001','K0001','ID00002','tusuk pedas',5000,'pedasnya poll','/upload/produk/Bisnis-Jajanan-Anak-Sekolah-dari-Sosis.jpg','2'),
('PR00002','K0001','ID00002','Batagor Setan',6000,'enaknya nendang','/upload/produk/254648434.jpg','2'),
('PR00003','K0001','ID00003','Nasi Mercon',11000,'nasi dengan beraneka toping','/upload/produk/img_1-Usaha-Makanan-Laris-dan-Sederhana.jpg','2'),
('PR00004','K0001','ID00003','seblok',6000,'semua toping','/upload/produk/jajanan-kaki-lima-bandung-22-1024x683.jpg','2'),
('PR00005','K0001','ID00001','juice',7000,'semua buah ada','/upload/produk/024514700_1554945891-iStock-821583034.jpg','2'),
('PR00006','K0001','ID00001','kopi sianida',15000,'meredaakan sakit lambung','/upload/produk/1154482529.jpg','2'),
('PR00008','K0002','ID00002','pitsa hot',3000,'pitsa citarasa nusantara','/upload/produk/banner1.jpg','2'),
('PR00009','K0002','ID00002','keju selimut',4000,'selimut tetangga','/upload/produk/photo.jpg','2'),
('PR00010','K0002','ID00001','juice buah',7000,'enak mantap','/upload/produk/jajanan-kaki-lima-bandung-10.jpg','1'),
('PR00011','K0003','ID00001','kopi senja',5000,'nikmati enaknya minum kopi di-pagi hari','/upload/produk/Penikmat-Kopi-Wajib-Tahu-Nih--Apasih-Bedanya-Kopi-Murah-dan-Mahal--master-1477081870.jpg','1'),
('PR00012','K0003','ID00002','martabak mirah',4000,'nikmati sesansi martabak bintang lima harga kaki lima','/upload/produk/jajanan_bandung_2_5369.jpg','1'),
('PR00013','K0003','ID00002','piscok',2000,'banyak varian : coklat, keju, susu, kacang, asinpedas','/upload/produk/hipwee-banana2-750x422.jpg','1'),
('PR00014','K0002','ID00001','susu soda',7000,'kenikmatan susu tiada tara','/upload/produk/resep-susu-soda-gembira.jpg','2'),
('PR00015','K0004','ID00002','cireng cocol',5000,'cireng dengan beraneka ragam isian ','/upload/produk/6db3c949d6a52f96c94e58aa24eed8df.jpg','2'),
('PR00016','K0004','ID00002','burger ',6000,'burger dengan harga murah dan nikmat\r\n','/upload/produk/5_junk_food_shutterstock_1.jpg','1'),
('PR00017','K0004','ID00002','basreng',3000,'sedia aneka macam rasa basreng\r\n','/upload/produk/cobek-basreng-jajanan-anak-bandung-foto-resep-utama.jpg','1'),
('PR00018','K0004','ID00002','baso tahu',5000,'baso tahu dengan rasa yang khas dan menggoda\r\n','/upload/produk/DxKRJp4UcAAn2FY.jpg','1'),
('PR00019','K0005','ID00004','tempe gila',8000,'ada banyak rsa','/upload/produk/Tempe-Gila-Khas-Bandung.jpg','2'),
('PR00020','K0005','ID00003','bubur ayam',8000,'bubur sapi','/upload/produk/bubur-ayam-rev2.jpg','2'),
('PR00021','K0002','ID00002','cilung',2000,'cilung isi danging dengan aroma khas kasturi','/upload/produk/069416500_1503999950-cilorcov.jpg','2');

/*Table structure for table `data_kantin` */

DROP TABLE IF EXISTS `data_kantin`;

CREATE TABLE `data_kantin` (
  `id_kantin` char(32) NOT NULL,
  `id_penjual` char(32) NOT NULL,
  `id_sekolah` char(32) DEFAULT NULL,
  `nama_kantin` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto_kantin` text NOT NULL,
  `status_kantin` char(1) NOT NULL,
  `penilaian` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_kantin`),
  KEY `id_penjual` (`id_penjual`),
  KEY `id_sekolah` (`id_sekolah`),
  CONSTRAINT `data_kantin_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `akun_penjual` (`id_penjual`),
  CONSTRAINT `data_kantin_ibfk_2` FOREIGN KEY (`id_sekolah`) REFERENCES `data_sekolah` (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_kantin` */

insert  into `data_kantin`(`id_kantin`,`id_penjual`,`id_sekolah`,`nama_kantin`,`deskripsi`,`foto_kantin`,`status_kantin`,`penilaian`) values 
('K0001','PEN00001','SE00001','kantin perjuangan','ANEKA MACAM MAKANAN SEBLAK','/upload/kantin/canteen11.jpg','2',3),
('K0002','PEN00002','SE00002','kantin abah','menyediakan semua makanan yang murah\r\n						  \r\n					','/upload/kantin/Kantin_copy.jpg','2',5),
('K0003','PEN00003','SE00003','kantin Ramlan','Dapatkan jaminan 100% uang kembali jika produk yang Anda terima tidak sesuai foto dan deskripsi kami.','/upload/kantin/logo-ayam-pukul-om-jenggot-973x608.jpg','2',3),
('K0004','PEN00005','SE00004','kantin benjamin','','/upload/kantin/STICKER_KANTIN_BERSAMA_-_NOMOR_PUTIH1.jpg','2',3),
('K0005','PEN00006','SE00006','kantin waone','','/upload/kantin/9abdbb6ff4.jpg','2',2),
('K0006','PEN00007','SE00007','kantin merdeka','kantin yang berjualan beranke ragam makanan khas bandung','/upload/kantin/174531_8e1a19a2-5212-11e5-81e9-05c849bc7260.jpg','',3);

/*Table structure for table `data_sekolah` */

DROP TABLE IF EXISTS `data_sekolah`;

CREATE TABLE `data_sekolah` (
  `id_sekolah` char(16) NOT NULL,
  `nama_sekolah` varchar(64) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `website` text,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_sekolah` */

insert  into `data_sekolah`(`id_sekolah`,`nama_sekolah`,`alamat_sekolah`,`website`) values 
('SE00001','SMK Negeri 1 Bandung','Jl. Wastukancana No. 3, Bandung','http://smknegeri1bandung.com'),
('SE00002','SMK Negeri 2 Kota Bandung','Jl. DR.Wahidin No.2 ke Jalan Ciliwung no. 4 ','http://www.smkn2bandung.sch.id/'),
('SE00003','SMK Negeri 3 Kota Bandung','Jl. Solontongan No. 10 Bandung','http://www.smkn3bandung.sch.id'),
('SE00004','SMK Negeri 4 Bandung','Jl Kliningan Nomor 6 Buah Batu, Bandung','http://smkn4bdg.sch.id'),
('SE00006','SMK Negeri 6 Kota Bandung','Jln Soekarno-Hatta (Riung Bandung) Bandung ','http://smkn6bandung.sch.id'),
('SE00007','SMK Negeri 7 Bandung','Jl. Soekarno-Hatta No. 596 Bandung','http://smkn7bandung.sch.id'),
('SE00008','SMK Negeri 8 Kota Bandung','Jl. Kiliningan No. 8 Bandung','http://smkn8bdg.sch.id'),
('SE00009','SMA 2 CIMAhi','cimahi j','http://www.sma2.sch.id/');

/*Table structure for table `kategori_produk` */

DROP TABLE IF EXISTS `kategori_produk`;

CREATE TABLE `kategori_produk` (
  `id_kategori` char(32) NOT NULL,
  `nama_kategori` varchar(32) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_produk` */

insert  into `kategori_produk`(`id_kategori`,`nama_kategori`) values 
('ID00001','MINUMAN'),
('ID00002','JAJANAN RINGAN'),
('ID00003','MAKANAN BERAT'),
('ID00004','SNACK');

/*Table structure for table `pengajuan_saldo` */

DROP TABLE IF EXISTS `pengajuan_saldo`;

CREATE TABLE `pengajuan_saldo` (
  `id_user` char(32) NOT NULL,
  `bukti` text NOT NULL,
  `nominal` varchar(32) NOT NULL,
  KEY `id_user` (`id_user`),
  CONSTRAINT `pengajuan_saldo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengajuan_saldo` */

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` char(32) NOT NULL,
  `id_pembeli` char(32) NOT NULL,
  `id_kantin` char(32) DEFAULT NULL,
  `alamat` text,
  `status` char(1) NOT NULL,
  `method` char(1) NOT NULL,
  `ongkir` int(32) NOT NULL,
  `jarak` varchar(32) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `id_pembeli` (`id_pembeli`),
  KEY `id_kantin` (`id_kantin`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `akun_pembeli` (`id_pembeli`),
  CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_kantin`) REFERENCES `data_kantin` (`id_kantin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

/*Table structure for table `produk_transaksi` */

DROP TABLE IF EXISTS `produk_transaksi`;

CREATE TABLE `produk_transaksi` (
  `id_produk` char(26) NOT NULL,
  `id_transaksi` char(16) NOT NULL,
  `jumlah_pesanan` varchar(3) NOT NULL,
  `total_harga` varchar(26) NOT NULL,
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `produk_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  CONSTRAINT `produk_transaksi_ibfk_4` FOREIGN KEY (`id_produk`) REFERENCES `daftar_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk_transaksi` */

insert  into `produk_transaksi`(`id_produk`,`id_transaksi`,`jumlah_pesanan`,`total_harga`) values 
('PR00008','TR00001','1','3000'),
('PR00009','TR00001','1','4000'),
('PR00010','TR00001','1','7000'),
('PR00005','TR00002','1','7000'),
('PR00006','TR00002','1','15000'),
('PR00008','TR00003','1','3000'),
('PR00009','TR00004','1','4000'),
('PR00009','TR00005','1','4000'),
('PR00010','TR00005','1','7000'),
('PR00009','TR00006','1','4000'),
('PR00010','TR00007','1','7000'),
('PR00013','TR00009','1','2000'),
('PR00013','TR00010','1','2000'),
('PR00010','TR00011','1','7000'),
('PR00008','TR00012','1','3000'),
('PR00008','TR00013','1','3000'),
('PR00009','TR00014','1','4000'),
('PR00009','TR00015','1','4000'),
('PR00013','TR00018','1','2000'),
('PR00013','TR00019','1','2000'),
('PR00011','TR00019','1','5000'),
('PR00010','TR00020','3','21000'),
('PR00009','TR00020','2','8000'),
('PR00012','TR00021','5','20000'),
('PR00013','TR00022','1','2000'),
('PR00010','TR00023','1','7000'),
('PR00009','TR00023','1','4000'),
('PR00009','TR00024','1','4000'),
('PR00013','TR00025','1','2000'),
('PR00008','TR00026','2','6000'),
('PR00009','TR00026','1','4000'),
('PR00009','TR00027','2','8000'),
('PR00010','TR00027','1','7000'),
('PR00008','TR00027','1','3000'),
('PR00020','TR00028','1','8000'),
('PR00008','TR00029','1','3000'),
('PR00009','TR00030','2','8000'),
('PR00010','TR00030','1','7000'),
('PR00008','TR00030','1','3000'),
('PR00001','TR00031','1','5000'),
('PR00021','TR00032','1','2000'),
('PR00019','TR00033','1','8000'),
('PR00006','TR00034','1','15000'),
('PR00008','TR00035','1','3000'),
('PR00019','TR00036','1','8000'),
('PR00008','TR00038','1','3000'),
('PR00010','TR00038','1','7000'),
('PR00009','TR00039','1','4000'),
('PR00008','TR00039','1','3000'),
('PR00019','TR00040','2','16000'),
('PR00020','TR00040','1','8000'),
('PR00020','TR00041','2','16000'),
('PR00019','TR00041','1','8000'),
('PR00020','TR00042','1','8000'),
('PR00019','TR00042','1','8000'),
('PR00004','TR00043','1','6000'),
('PR00009','TR00056','2','8000'),
('PR00008','TR00056','1','3000'),
('PR00002','TR00057','2','12000'),
('PR00003','TR00057','1','11000');

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `id_report` char(32) NOT NULL,
  `id_kantin` char(32) NOT NULL,
  `id_pembeli` char(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `penilaian` int(12) NOT NULL,
  PRIMARY KEY (`id_report`),
  KEY `id_kantin` (`id_kantin`),
  KEY `id_pembeli` (`id_pembeli`),
  CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_kantin`) REFERENCES `data_kantin` (`id_kantin`),
  CONSTRAINT `report_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `akun_pembeli` (`id_pembeli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `report` */

insert  into `report`(`id_report`,`id_kantin`,`id_pembeli`,`deskripsi`,`penilaian`) values 
('REP00001','K0002','PE00017','harga murah dan pengiriman cepat',5);

/*Table structure for table `saldo` */

DROP TABLE IF EXISTS `saldo`;

CREATE TABLE `saldo` (
  `id_saldo` char(16) NOT NULL,
  `id_user` varchar(16) NOT NULL,
  `saldo` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_saldo`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `saldo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `saldo` */

insert  into `saldo`(`id_saldo`,`id_user`,`saldo`) values 
('SA00001','US00001','27000'),
('SA00002','US00002','2000'),
('SA00005','US00006','20000'),
('SA00006','US00007','69000'),
('SA00007','US00008','18000'),
('SA00008','US00009','2000'),
('SA00009','US00012','0'),
('SA00010','US00013','0'),
('SA00011','US00015','0'),
('SA00012','US00016','30000'),
('SA00013','US00017','0'),
('SA00014','US00018','0'),
('SA00015','US00019','0');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` char(32) NOT NULL,
  `id_kantin` char(32) NOT NULL,
  `id_pembeli` char(32) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(32) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_kantin` (`id_kantin`),
  KEY `id_pembeli` (`id_pembeli`),
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_kantin`) REFERENCES `data_kantin` (`id_kantin`),
  CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_pembeli`) REFERENCES `akun_pembeli` (`id_pembeli`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`id_kantin`,`id_pembeli`,`tanggal`,`total_harga`) values 
('TR00001','K0002','PE00014','2020-01-29',18000),
('TR00002','K0001','PE00014','2020-01-29',24000),
('TR00003','K0002','PE00014','2020-01-30',5000),
('TR00004','K0002','PE00014','2020-02-06',6000),
('TR00005','K0002','PE00014','2020-02-06',13000),
('TR00006','K0002','PE00014','2020-02-06',6000),
('TR00007','K0002','PE00014','2020-02-07',9000),
('TR00008','K0003','PE00014','2020-02-09',9000),
('TR00009','K0003','PE00014','2020-02-09',9000),
('TR00010','K0003','PE00014','2020-02-09',9000),
('TR00011','K0002','PE00014','2020-02-09',21000),
('TR00012','K0002','PE00014','2020-02-10',13000),
('TR00013','K0002','PE00014','2020-02-10',13000),
('TR00014','K0002','PE00014','2020-02-10',14000),
('TR00015','K0002','PE00014','2020-02-10',14000),
('TR00016','K0002','PE00014','2020-02-10',14000),
('TR00017','K0002','PE00014','2020-02-10',14000),
('TR00018','K0003','PE00014','2020-02-10',10000),
('TR00019','K0003','PE00014','2020-02-10',469000),
('TR00020','K0002','PE00014','2020-02-11',31000),
('TR00021','K0003','PE00014','2020-02-12',27000),
('TR00022','K0003','PE00014','2020-02-13',9000),
('TR00023','K0002','PE00014','2020-02-13',20000),
('TR00024','K0002','PE00014','2020-02-13',14000),
('TR00025','K0003','PE00014','2020-02-13',9000),
('TR00026','K0002','PE00014','2020-02-17',26000),
('TR00027','K0002','PE00014','2020-02-17',29000),
('TR00028','K0005','PE00016','2020-03-03',37000),
('TR00029','K0002','PE00014','2020-03-03',27500),
('TR00030','K0002','PE00014','2020-03-04',20000),
('TR00031','K0001','PE00014','2020-03-04',18000),
('TR00032','K0002','PE00014','2020-03-04',11000),
('TR00033','K0005','PE00014','2020-03-04',20000),
('TR00034','K0001','PE00014','2020-03-05',23000),
('TR00035','K0002','PE00014','2020-03-05',14500),
('TR00036','K0005','PE00014','2020-03-05',42000),
('TR00037','K0002','PE00014','2020-03-05',11500),
('TR00038','K0002','PE00014','2020-03-05',21500),
('TR00039','K0002','PE00014','2020-03-05',17000),
('TR00040','K0005','PE00014','2020-03-05',51000),
('TR00041','K0005','PE00014','2020-03-05',58000),
('TR00042','K0005','PE00014','2020-03-05',28000),
('TR00043','K0001','PE00014','2020-03-07',15000),
('TR00044','K0001','PE00017','2020-03-16',22000),
('TR00045','K0001','PE00017','2020-03-16',22000),
('TR00046','K0001','PE00017','2020-03-16',22000),
('TR00047','K0001','PE00017','2020-03-16',22000),
('TR00048','K0001','PE00017','2020-03-16',22000),
('TR00049','K0001','PE00017','2020-03-16',22000),
('TR00050','K0001','PE00017','2020-03-16',187000),
('TR00051','K0001','PE00017','2020-03-16',187000),
('TR00052','K0002','PE00017','2020-03-16',11500),
('TR00053','K0002','PE00017','2020-03-16',11500),
('TR00054','K0002','PE00017','2020-03-16',11500),
('TR00055','K0002','PE00017','2020-03-16',11500),
('TR00056','K0002','PE00017','2020-03-16',35500),
('TR00057','K0001','PE00017','2020-03-16',44000),
('TR00058','K0002','PE00017','2020-03-16',24500);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` char(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`email`,`password`,`level`) values 
('US00001','yoganizar35@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','2'),
('US00002','admin@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','1'),
('US00006','wwws@gamal.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00007','septian@gmail.com','bb2d91d0fbbebe8719509ed0f865c63f','3'),
('US00008','sartono@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00009','fahri@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00011','kantinsemesta@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00012','benjamin@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00013','eusemartin@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00015','ristianaditya21@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','3'),
('US00016','herman@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','2'),
('US00017','ristianaditya44@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','2'),
('US00018','kantin53@gmail.com','3d186804534370c3c817db0563f0e461','3'),
('US00019','ristianaditya35@gmail.com','f5bb0c8de146c67b44babbf4e6584cc0','2');

/* Trigger structure for table `akun_pembeli` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_akun_pembeli` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_akun_pembeli` BEFORE DELETE ON `akun_pembeli` FOR EACH ROW BEGIN 
    DELETE daftar_pesanan FROM daftar_pesanan JOIN pesanan ON daftar_pesanan.`id_pesanan` = pesanan.`id_pesanan` WHERE pesanan.id_pembeli = old.id_pembeli;
    DELETE FROM pesanan WHERE pesanan.id_pembeli = old.id_pembeli;
    delete produk_transaksi from transaksi join produk_transaksi on transaksi.`id_transaksi` = produk_transaksi.`id_transaksi` where id_pembeli = old.id_pembeli;
    DELETE FROM transaksi WHERE id_pembeli = old.id_pembeli;
    DELETE saldo FROM USER JOIN akun_pembeli ON user.`id_user` = akun_pembeli.`id_user` JOIN saldo ON user.`id_user` = saldo.`id_user` WHERE akun_pembeli.`id_pembeli` = old.id_pembeli; 
    delete from report where id_pembeli = old.id_pembeli;    
    END */$$


DELIMITER ;

/* Trigger structure for table `akun_pembeli` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_setelah_pembeli` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_setelah_pembeli` AFTER DELETE ON `akun_pembeli` FOR EACH ROW BEGIN
	DELETE from user where id_user = old.id_user;
    END */$$


DELIMITER ;

/* Trigger structure for table `pesanan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_pesanan` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_pesanan` BEFORE DELETE ON `pesanan` FOR EACH ROW BEGIN
	DELETE FROM daftar_pesanan WHERE daftar_pesanan.id_pesanan = old.id_pesanan;
    END */$$


DELIMITER ;

/* Trigger structure for table `transaksi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `delete_transaksi` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `delete_transaksi` BEFORE DELETE ON `transaksi` FOR EACH ROW BEGIN
	delete from produk_transaksi where produk_transaksi.id_transaksi = old.id_transaksi;
    END */$$


DELIMITER ;

/* Function  structure for function  `grafik_omset_bulan` */

/*!50003 DROP FUNCTION IF EXISTS `grafik_omset_bulan` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `grafik_omset_bulan`(
	id VARCHAR(40),
	tgl CHAR(40)
    ) RETURNS varchar(40) CHARSET latin1
BEGIN
    DECLARE jml_omset INT;
	SET jml_omset = (
	SELECT SUM(total_harga) AS jumlah FROM transaksi 
	JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin` 
	JOIN akun_penjual ON data_kantin.`id_penjual` = akun_penjual.`id_penjual` 
	WHERE akun_penjual.`id_penjual` = id AND MONTH(transaksi.`tanggal`) = tgl);
	RETURN jml_omset;
    END */$$
DELIMITER ;

/* Function  structure for function  `produk_kantin` */

/*!50003 DROP FUNCTION IF EXISTS `produk_kantin` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `produk_kantin`(
	id VARCHAR(40)
    ) RETURNS varchar(40) CHARSET latin1
BEGIN
	
	DECLARE jml_produk INT;
	SET jml_produk = (SELECT COUNT(daftar_produk.`id_produk`)FROM daftar_produk
	join data_kantin on daftar_produk.`id_kantin` = data_kantin.`id_kantin`
	WHERE data_kantin.`id_penjual` = id);
	RETURN jml_produk;
	
    END */$$
DELIMITER ;

/* Function  structure for function  `semua_kantin` */

/*!50003 DROP FUNCTION IF EXISTS `semua_kantin` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `semua_kantin`(
    
    ) RETURNS varchar(40) CHARSET latin1
BEGIN
	DECLARE jml_kantin INT;
	SET jml_kantin = (SELECT COUNT(id_kantin) FROM data_kantin);
	RETURN jml_kantin;
    END */$$
DELIMITER ;

/* Function  structure for function  `semua_pembeli` */

/*!50003 DROP FUNCTION IF EXISTS `semua_pembeli` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `semua_pembeli`() RETURNS varchar(40) CHARSET latin1
BEGIN
	DECLARE jml_pembeli INT;
	SET jml_pembeli = (SELECT COUNT(id_pembeli) FROM akun_pembeli);
	RETURN jml_pembeli;
    END */$$
DELIMITER ;

/* Function  structure for function  `semua_produk` */

/*!50003 DROP FUNCTION IF EXISTS `semua_produk` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `semua_produk`(
    
    ) RETURNS varchar(40) CHARSET latin1
BEGIN
	
	DECLARE jml_produk INT;
	SET jml_produk = (SELECT COUNT(daftar_produk.`id_produk`)FROM daftar_produk
	JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin`);
	RETURN jml_produk;
	
    END */$$
DELIMITER ;

/* Function  structure for function  `total_transaksi_kantin` */

/*!50003 DROP FUNCTION IF EXISTS `total_transaksi_kantin` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `total_transaksi_kantin`(
	id VARCHAR(40),
	tgl char(40)
    ) RETURNS varchar(40) CHARSET latin1
BEGIN
	DECLARE jml_transaksi int;
	SET jml_transaksi = (SELECT COUNT(transaksi.`id_kantin`)FROM transaksi 
	join data_kantin on transaksi.`id_kantin` = data_kantin.`id_kantin`
	WHERE data_kantin.`id_penjual` = id and month(transaksi.`tanggal`) = tgl);
	RETURN jml_transaksi;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `konfirm_pesanan` */

/*!50003 DROP PROCEDURE IF EXISTS  `konfirm_pesanan` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `konfirm_pesanan`(
	
	IN id CHAR(20),
	IN _id_transaksi CHAR(20)
    
    )
BEGIN
	
	INSERT INTO produk_transaksi (id_produk, id_transaksi, jumlah_pesanan, total_harga) 
	SELECT id_produk, _id_transaksi, jumlah_pesanan, total_harga FROM daftar_pesanan 
	JOIN pesanan ON daftar_pesanan.id_pesanan = pesanan.id_pesanan WHERE id_pembeli = id;
	
	DELETE FROM pesanan WHERE STATUS = 4 AND id_pembeli = id;
	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `payment` */

/*!50003 DROP PROCEDURE IF EXISTS  `payment` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `payment`(
	IN id CHAR(20)
    )
BEGIN
		SELECT pesanan.id_pesanan, nama_produk, daftar_pesanan.deskripsi, harga, jumlah_pesanan, status, 
		data_sekolah.`alamat_sekolah`, total_harga, data_sekolah.`nama_sekolah`, ongkir, jarak, daftar_produk.id_kantin 
		FROM daftar_pesanan 
		JOIN pesanan ON daftar_pesanan.`id_pesanan` = pesanan.`id_pesanan` 
		JOIN daftar_produk ON daftar_pesanan.id_produk = daftar_produk.id_produk  
		INNER JOIN data_kantin ON daftar_produk.id_kantin = data_kantin.id_kantin 
		INNER JOIN data_sekolah ON data_kantin.`id_sekolah` = data_sekolah.`id_sekolah` 
		WHERE id_pembeli = id AND STATUS > 1;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `report_produk_admin` */

/*!50003 DROP PROCEDURE IF EXISTS  `report_produk_admin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `report_produk_admin`(
	IN tgl CHAR(20)
    )
BEGIN
		SELECT nama_kantin, nama_produk, nama_kategori, harga, daftar_produk.deskripsi, 
		COUNT(produk_transaksi.`id_produk`) AS jml_transaksi , SUM(produk_transaksi.`total_harga`) AS jumlah_harga 
		FROM produk_transaksi JOIN daftar_produk ON produk_transaksi.`id_produk` = daftar_produk.`id_produk` 
		JOIN kategori_produk ON daftar_produk.`id_kategori` = kategori_produk.`id_kategori` 
		JOIN transaksi ON produk_transaksi.`id_transaksi` =  transaksi.`id_transaksi` 
		JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` 
		WHERE MONTH(tanggal) = tgl 
		GROUP BY daftar_produk.`id_produk` ORDER BY jumlah_harga DESC;
		
		
	END */$$
DELIMITER ;

/* Procedure structure for procedure `report_produk_kantin` */

/*!50003 DROP PROCEDURE IF EXISTS  `report_produk_kantin` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `report_produk_kantin`(
	IN id CHAR(20),
	in tgl char(20)
    )
BEGIN
		SELECT nama_produk, nama_kategori, harga, daftar_produk.deskripsi, 
		COUNT(produk_transaksi.`id_produk`) AS jml_transaksi , SUM(produk_transaksi.`total_harga`) AS jumlah_harga 
		FROM produk_transaksi JOIN daftar_produk ON produk_transaksi.`id_produk` = daftar_produk.`id_produk` 
		JOIN kategori_produk ON daftar_produk.`id_kategori` = kategori_produk.`id_kategori` 
		JOIN transaksi ON produk_transaksi.`id_transaksi` =  transaksi.`id_transaksi` 
		JOIN data_kantin ON daftar_produk.`id_kantin` = data_kantin.`id_kantin` 
		WHERE data_kantin.`id_penjual` = id AND  MONTH(tanggal) = tgl 
		GROUP BY daftar_produk.`id_produk` ORDER BY jumlah_harga DESC;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `riwayat_transaksi` */

/*!50003 DROP PROCEDURE IF EXISTS  `riwayat_transaksi` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `riwayat_transaksi`(
	IN id CHAR(20)
    )
BEGIN
		SELECT id_pembeli, tanggal,nama_produk, harga, nama_kantin, jumlah_pesanan, produk_transaksi.total_harga FROM transaksi 
		JOIN produk_transaksi ON transaksi.`id_transaksi` = produk_transaksi.`id_transaksi` 
		JOIN daftar_produk ON produk_transaksi.`id_produk` = daftar_produk.`id_produk`
		JOIN data_kantin ON transaksi.`id_kantin` = data_kantin.`id_kantin`
		where id_pembeli = id ORDER BY tanggal DESC;
		
	END */$$
DELIMITER ;

/*Table structure for table `data_kantin_recomended` */

DROP TABLE IF EXISTS `data_kantin_recomended`;

/*!50001 DROP VIEW IF EXISTS `data_kantin_recomended` */;
/*!50001 DROP TABLE IF EXISTS `data_kantin_recomended` */;

/*!50001 CREATE TABLE  `data_kantin_recomended`(
 `jml_transaksi` bigint(21) ,
 `id_kantin` char(32) ,
 `id_penjual` char(32) ,
 `id_sekolah` char(16) ,
 `nama_kantin` varchar(32) ,
 `deskripsi` text ,
 `alamat_sekolah` text ,
 `penilaian` int(2) ,
 `status_kantin` char(1) ,
 `foto_kantin` text ,
 `nama` varchar(32) ,
 `nama_sekolah` varchar(64) 
)*/;

/*Table structure for table `data_kantin_view` */

DROP TABLE IF EXISTS `data_kantin_view`;

/*!50001 DROP VIEW IF EXISTS `data_kantin_view` */;
/*!50001 DROP TABLE IF EXISTS `data_kantin_view` */;

/*!50001 CREATE TABLE  `data_kantin_view`(
 `jml_transaksi` bigint(21) ,
 `id_kantin` char(32) ,
 `id_penjual` char(32) ,
 `id_sekolah` char(16) ,
 `nama_kantin` varchar(32) ,
 `deskripsi` text ,
 `alamat_sekolah` text ,
 `penilaian` int(2) ,
 `status_kantin` char(1) ,
 `foto_kantin` text ,
 `nama` varchar(32) ,
 `nama_sekolah` varchar(64) 
)*/;

/*Table structure for table `new_daftar_produk` */

DROP TABLE IF EXISTS `new_daftar_produk`;

/*!50001 DROP VIEW IF EXISTS `new_daftar_produk` */;
/*!50001 DROP TABLE IF EXISTS `new_daftar_produk` */;

/*!50001 CREATE TABLE  `new_daftar_produk`(
 `jml_transaksi` bigint(21) ,
 `id_kantin` char(32) ,
 `id_penjual` char(32) ,
 `nama_kantin` varchar(32) ,
 `id_produk` char(32) ,
 `foto_produk` text ,
 `id_kategori` char(32) ,
 `status_kantin` char(1) ,
 `nama_produk` varchar(32) ,
 `penilaian` int(2) ,
 `status_produk` char(1) ,
 `harga` int(16) 
)*/;

/*Table structure for table `report_daftar_produk` */

DROP TABLE IF EXISTS `report_daftar_produk`;

/*!50001 DROP VIEW IF EXISTS `report_daftar_produk` */;
/*!50001 DROP TABLE IF EXISTS `report_daftar_produk` */;

/*!50001 CREATE TABLE  `report_daftar_produk`(
 `nama_produk` varchar(32) ,
 `nama_kantin` varchar(32) ,
 `nama_kategori` varchar(32) ,
 `harga` int(16) ,
 `deskripsi` text ,
 `jml_transaksi` bigint(21) ,
 `jumlah_harga` double 
)*/;

/*View structure for view data_kantin_recomended */

/*!50001 DROP TABLE IF EXISTS `data_kantin_recomended` */;
/*!50001 DROP VIEW IF EXISTS `data_kantin_recomended` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_kantin_recomended` AS (select count(`data_kantin`.`id_kantin`) AS `jml_transaksi`,`data_kantin`.`id_kantin` AS `id_kantin`,`data_kantin`.`id_penjual` AS `id_penjual`,`data_sekolah`.`id_sekolah` AS `id_sekolah`,`data_kantin`.`nama_kantin` AS `nama_kantin`,`data_kantin`.`deskripsi` AS `deskripsi`,`data_sekolah`.`alamat_sekolah` AS `alamat_sekolah`,`data_kantin`.`penilaian` AS `penilaian`,`data_kantin`.`status_kantin` AS `status_kantin`,`data_kantin`.`foto_kantin` AS `foto_kantin`,`akun_penjual`.`nama` AS `nama`,`data_sekolah`.`nama_sekolah` AS `nama_sekolah` from (((`data_kantin` left join `transaksi` on((`data_kantin`.`id_kantin` = `transaksi`.`id_kantin`))) join `akun_penjual` on((`data_kantin`.`id_penjual` = `akun_penjual`.`id_penjual`))) join `data_sekolah` on((`data_kantin`.`id_sekolah` = `data_sekolah`.`id_sekolah`))) group by `data_kantin`.`id_kantin` order by count(`data_kantin`.`id_kantin`) desc limit 3) */;

/*View structure for view data_kantin_view */

/*!50001 DROP TABLE IF EXISTS `data_kantin_view` */;
/*!50001 DROP VIEW IF EXISTS `data_kantin_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_kantin_view` AS (select count(`data_kantin`.`id_kantin`) AS `jml_transaksi`,`data_kantin`.`id_kantin` AS `id_kantin`,`data_kantin`.`id_penjual` AS `id_penjual`,`data_sekolah`.`id_sekolah` AS `id_sekolah`,`data_kantin`.`nama_kantin` AS `nama_kantin`,`data_kantin`.`deskripsi` AS `deskripsi`,`data_sekolah`.`alamat_sekolah` AS `alamat_sekolah`,`data_kantin`.`penilaian` AS `penilaian`,`data_kantin`.`status_kantin` AS `status_kantin`,`data_kantin`.`foto_kantin` AS `foto_kantin`,`akun_penjual`.`nama` AS `nama`,`data_sekolah`.`nama_sekolah` AS `nama_sekolah` from (((`data_kantin` left join `transaksi` on((`data_kantin`.`id_kantin` = `transaksi`.`id_kantin`))) join `akun_penjual` on((`data_kantin`.`id_penjual` = `akun_penjual`.`id_penjual`))) join `data_sekolah` on((`data_kantin`.`id_sekolah` = `data_sekolah`.`id_sekolah`))) group by `data_kantin`.`id_kantin` order by rand()) */;

/*View structure for view new_daftar_produk */

/*!50001 DROP TABLE IF EXISTS `new_daftar_produk` */;
/*!50001 DROP VIEW IF EXISTS `new_daftar_produk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_daftar_produk` AS (select count(`data_kantin`.`id_kantin`) AS `jml_transaksi`,`data_kantin`.`id_kantin` AS `id_kantin`,`data_kantin`.`id_penjual` AS `id_penjual`,`data_kantin`.`nama_kantin` AS `nama_kantin`,`daftar_produk`.`id_produk` AS `id_produk`,`daftar_produk`.`foto_produk` AS `foto_produk`,`daftar_produk`.`id_kategori` AS `id_kategori`,`data_kantin`.`status_kantin` AS `status_kantin`,`daftar_produk`.`nama_produk` AS `nama_produk`,`data_kantin`.`penilaian` AS `penilaian`,`daftar_produk`.`status_produk` AS `status_produk`,`daftar_produk`.`harga` AS `harga` from (((`daftar_produk` join `data_kantin` on((`data_kantin`.`id_kantin` = `daftar_produk`.`id_kantin`))) left join `transaksi` on((`data_kantin`.`id_kantin` = `transaksi`.`id_kantin`))) join `kategori_produk` on((`daftar_produk`.`id_kategori` = `kategori_produk`.`id_kategori`))) group by `daftar_produk`.`id_produk` desc limit 12) */;

/*View structure for view report_daftar_produk */

/*!50001 DROP TABLE IF EXISTS `report_daftar_produk` */;
/*!50001 DROP VIEW IF EXISTS `report_daftar_produk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_daftar_produk` AS select `daftar_produk`.`nama_produk` AS `nama_produk`,`data_kantin`.`nama_kantin` AS `nama_kantin`,`kategori_produk`.`nama_kategori` AS `nama_kategori`,`daftar_produk`.`harga` AS `harga`,`daftar_produk`.`deskripsi` AS `deskripsi`,count(`produk_transaksi`.`id_produk`) AS `jml_transaksi`,sum(`produk_transaksi`.`total_harga`) AS `jumlah_harga` from ((((`produk_transaksi` join `daftar_produk` on((`produk_transaksi`.`id_produk` = `daftar_produk`.`id_produk`))) join `kategori_produk` on((`daftar_produk`.`id_kategori` = `kategori_produk`.`id_kategori`))) join `transaksi` on((`produk_transaksi`.`id_transaksi` = `transaksi`.`id_transaksi`))) join `data_kantin` on((`daftar_produk`.`id_kantin` = `data_kantin`.`id_kantin`))) group by `daftar_produk`.`id_produk` order by sum(`produk_transaksi`.`total_harga`) desc */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
