/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tb_harga`;
CREATE TABLE `tb_harga` (
  `id_harga` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `selisih_harga` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tb_histori`;
CREATE TABLE `tb_histori` (
  `id_histori` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `harga_terakhir` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_histori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `satuan`, `tanggal`) VALUES
(1, 'beras', 'kg', '23-05-2022, 12:56:53');
INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `satuan`, `tanggal`) VALUES
(2, 'beras super', 'kg', '24-05-2022, 12:36:03');
INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `satuan`, `tanggal`) VALUES
(3, 'beras solok', 'kg', '24-05-2022, 21:09:11');

INSERT INTO `tb_harga` (`id_harga`, `id_barang`, `harga`, `tgl_input`, `selisih_harga`) VALUES
(8, 2, '11000', '24-05-2022, 21:11:58', NULL);
INSERT INTO `tb_harga` (`id_harga`, `id_barang`, `harga`, `tgl_input`, `selisih_harga`) VALUES
(9, 3, '40000', '24-05-2022, 21:35:35', NULL);
INSERT INTO `tb_harga` (`id_harga`, `id_barang`, `harga`, `tgl_input`, `selisih_harga`) VALUES
(11, 1, '800000', '26-05-2022, 19:29:03', NULL);

INSERT INTO `tb_histori` (`id_histori`, `id_barang`, `harga_terakhir`, `created_at`) VALUES
(3, 1, '90000', '0000-00-00 00:00:00');
INSERT INTO `tb_histori` (`id_histori`, `id_barang`, `harga_terakhir`, `created_at`) VALUES
(4, 1, '80000', '0000-00-00 00:00:00');
INSERT INTO `tb_histori` (`id_histori`, `id_barang`, `harga_terakhir`, `created_at`) VALUES
(5, 1, '70000', '0000-00-00 00:00:00');
INSERT INTO `tb_histori` (`id_histori`, `id_barang`, `harga_terakhir`, `created_at`) VALUES
(6, 1, '800000', '2022-06-01 18:03:55');

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `waktu`, `level`) VALUES
(2, 'yahdi', 'yahdialmukaram03@gmail.com', '58d432c74ad12fc7d0f30300771bec18', '', 'admin');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;