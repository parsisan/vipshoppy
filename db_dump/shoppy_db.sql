/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : shoppy_db

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 08/12/2019 19:59:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_product_categories
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_categories`;
CREATE TABLE `tbl_product_categories`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_categories
-- ----------------------------
INSERT INTO `tbl_product_categories` VALUES (1, 'Accesories', 1, NULL, NULL);
INSERT INTO `tbl_product_categories` VALUES (2, 'Digital Devices', 1, NULL, '2019-12-01 21:09:57');

-- ----------------------------
-- Table structure for tbl_product_slider_slides
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_slider_slides`;
CREATE TABLE `tbl_product_slider_slides`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slider_ID` int(10) NULL DEFAULT NULL,
  `picURL` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `placement` int(2) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `slider_ID`(`slider_ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_slider_slides
-- ----------------------------
INSERT INTO `tbl_product_slider_slides` VALUES (1, 1, '01.jpg', 'BEST 1', 'IDEA 1', 1, 1);
INSERT INTO `tbl_product_slider_slides` VALUES (2, 1, '02.jpg', 'BEST 2', 'IDEA 2', 3, 1);
INSERT INTO `tbl_product_slider_slides` VALUES (3, 1, '03.jpg', 'BEST 3', 'IDEA 3', 2, 1);
INSERT INTO `tbl_product_slider_slides` VALUES (5, 2, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product_sliders
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_sliders`;
CREATE TABLE `tbl_product_sliders`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sliderTitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sliderTitle`(`sliderTitle`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_sliders
-- ----------------------------
INSERT INTO `tbl_product_sliders` VALUES (1, 'MainPage', 1);
INSERT INTO `tbl_product_sliders` VALUES (2, 'About', 1);

-- ----------------------------
-- Table structure for tbl_product_subcategories
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_subcategories`;
CREATE TABLE `tbl_product_subcategories`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NOT NULL,
  `cat_id` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cat_id`(`cat_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_subcategories
-- ----------------------------
INSERT INTO `tbl_product_subcategories` VALUES (1, 'Watch', 1, 1);
INSERT INTO `tbl_product_subcategories` VALUES (2, 'TV', 1, 2);
INSERT INTO `tbl_product_subcategories` VALUES (3, 'Freezer', 1, 2);
INSERT INTO `tbl_product_subcategories` VALUES (4, 'TEST', 1, 3);

-- ----------------------------
-- Table structure for tbl_products
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE `tbl_products`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  `qntty` int(6) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `mainpic` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `subcat_id` int(10) NULL DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_products
-- ----------------------------
INSERT INTO `tbl_products` VALUES (1, 'Samsung TV 2019', 1000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2019.jpg', 2, 1, NULL, '2019-12-01 19:02:02');
INSERT INTO `tbl_products` VALUES (3, 'Samsung TV 2019', 1000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2019.jpg', 2, 1, NULL, '2019-12-01 19:02:01');
INSERT INTO `tbl_products` VALUES (4, 'Samsung TV 2018', 2000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2018.jpg', 2, 1, NULL, '2019-12-01 19:01:59');
INSERT INTO `tbl_products` VALUES (5, 'Samsung TV 2018', 2000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2018.jpg', 2, 1, NULL, '2019-12-01 19:02:00');
INSERT INTO `tbl_products` VALUES (6, 'Samsung TV 2018', 2000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2018.jpg', 2, 1, NULL, '2019-12-01 19:01:58');
INSERT INTO `tbl_products` VALUES (7, 'Samsung TV 2018', 2000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2018.jpg', 2, 1, NULL, '2019-12-01 19:01:58');
INSERT INTO `tbl_products` VALUES (8, 'Samsung TV 2018', 2000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2018.jpg', 2, 1, NULL, '2019-12-01 19:01:57');
INSERT INTO `tbl_products` VALUES (9, 'Samsung TV 2018', 2000000, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'samsung2018.jpg', 2, 1, NULL, '2019-12-01 19:01:57');
INSERT INTO `tbl_products` VALUES (10, 'Rado Watch', 20000, 20, 'VEry Very Nice', 'rado_1.jpg', 1, 1, NULL, '2019-12-01 18:59:07');

-- ----------------------------
-- Table structure for tbl_products_gallery
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products_gallery`;
CREATE TABLE `tbl_products_gallery`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NULL DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_system
-- ----------------------------
DROP TABLE IF EXISTS `tbl_system`;
CREATE TABLE `tbl_system`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteTitle` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `siteUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_system
-- ----------------------------
INSERT INTO `tbl_system` VALUES (6, 'فروشگاه من', 'http://localhost/shoppy', 'mylogo.png', 1);

-- ----------------------------
-- Table structure for tbl_system_menus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_system_menus`;
CREATE TABLE `tbl_system_menus`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mainMenu_id` int(10) NULL DEFAULT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_system_menus
-- ----------------------------
INSERT INTO `tbl_system_menus` VALUES (1, 0, 'Home', '', 1);
INSERT INTO `tbl_system_menus` VALUES (2, 0, 'About', 'about.php', 1);
INSERT INTO `tbl_system_menus` VALUES (3, 0, 'Contact', 'contact.php', 1);
INSERT INTO `tbl_system_menus` VALUES (4, 2, 'Sell Centers', 'team.php', 0);
INSERT INTO `tbl_system_menus` VALUES (5, 4, 'States', NULL, 0);
INSERT INTO `tbl_system_menus` VALUES (6, 4, 'Main Branch', NULL, 0);

-- ----------------------------
-- Table structure for tbl_system_submenus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_system_submenus`;
CREATE TABLE `tbl_system_submenus`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mainMenu_id` int(10) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_system_submenus
-- ----------------------------
INSERT INTO `tbl_system_submenus` VALUES (1, 4, 'تست', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_userdetails
-- ----------------------------
DROP TABLE IF EXISTS `tbl_userdetails`;
CREATE TABLE `tbl_userdetails`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NULL DEFAULT NULL,
  `firstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `lastName` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `birthdate` date NULL DEFAULT NULL,
  `state` int(2) NULL DEFAULT NULL,
  `city` int(2) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `cell` varchar(11) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `tell` varchar(11) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `type` int(1) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'saeed@shoppy.me', '202cb962ac59075b964b07152d234b70', NULL, '1', NULL, '2019-11-26 18:20:51');
INSERT INTO `tbl_users` VALUES (2, 'sadsadsad', 'a8f5f167f44f4964e6c998dee827110c', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (3, 'david@david.usa', '202cb962ac59075b964b07152d234b70', NULL, '1', NULL, '2019-11-24 21:03:14');
INSERT INTO `tbl_users` VALUES (4, 'test', '28b662d883b6d76fd96e4ddc5e9ba780', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (5, 'test@test.ir', '202cb962ac59075b964b07152d234b70', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (8, 'saeed2@me.me', '202cb962ac59075b964b07152d234b70', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (9, '12@12.me', '202cb962ac59075b964b07152d234b70', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (10, 'asdasdsad@dsfsdf.fgh', '5e6d8b7894ed82467bbec4a1c9ba5ae6', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (11, 'asdas@as.dfg', 'cd6a1a15421189de23d7309feebff8d7', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (12, 'asdsa@35dfh.gtfh', 'adbdf611e86c678f4c90187e798fd7b1', NULL, '1', NULL, NULL);
INSERT INTO `tbl_users` VALUES (13, 'vahid@1.com', '202cb962ac59075b964b07152d234b70', NULL, '1', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
