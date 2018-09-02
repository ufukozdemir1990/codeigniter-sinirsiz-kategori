/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : codeigniter_sinirsiz_kategori

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 02/09/2018 22:30:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kategoriler
-- ----------------------------
DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler` (
  `kategori_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_adi` char(100) NOT NULL,
  `kategori_ustid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategori_id` (`kategori_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of kategoriler
-- ----------------------------
BEGIN;
INSERT INTO `kategoriler` VALUES (1, 'Telefon', 0);
INSERT INTO `kategoriler` VALUES (2, 'Bilgisayar', 0);
INSERT INTO `kategoriler` VALUES (3, 'Bilgisayar Parçaları', 0);
INSERT INTO `kategoriler` VALUES (4, 'Foto & Kamera', 0);
INSERT INTO `kategoriler` VALUES (5, 'TV & Ev Elektroniği', 0);
INSERT INTO `kategoriler` VALUES (6, 'Yazıcı & Sarf & Ofis', 0);
INSERT INTO `kategoriler` VALUES (7, 'Aksesuarlar', 0);
INSERT INTO `kategoriler` VALUES (8, 'Oyun & Hobi', 0);
INSERT INTO `kategoriler` VALUES (9, 'Cep Telefonları', 1);
INSERT INTO `kategoriler` VALUES (10, 'Tabletler', 1);
INSERT INTO `kategoriler` VALUES (11, 'Telefon Kılıfları', 1);
INSERT INTO `kategoriler` VALUES (12, 'Ekran Koruyucu', 1);
INSERT INTO `kategoriler` VALUES (13, 'Notebook', 2);
INSERT INTO `kategoriler` VALUES (14, 'Masaüstü Bilgisayarlar', 2);
INSERT INTO `kategoriler` VALUES (15, 'Bilgisayar Kasaları', 3);
INSERT INTO `kategoriler` VALUES (16, 'Anakart', 3);
INSERT INTO `kategoriler` VALUES (17, 'İşlemci', 3);
INSERT INTO `kategoriler` VALUES (18, 'iPhone', 9);
INSERT INTO `kategoriler` VALUES (19, 'iPhone 6', 18);
INSERT INTO `kategoriler` VALUES (20, 'iPhone 7', 18);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
