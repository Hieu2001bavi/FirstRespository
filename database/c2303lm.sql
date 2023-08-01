/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : c2303lm

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-06-21 19:38:43
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO tbl_category VALUES ('1', 'Nam', '1', '2023-06-12 15:44:41');
INSERT INTO tbl_category VALUES ('2', 'Nữ', '1', '2023-06-12 15:45:01');
INSERT INTO tbl_category VALUES ('3', 'Trẻ Em', '1', '2023-06-12 15:45:14');
INSERT INTO tbl_category VALUES ('4', 'Other', '1', '2023-06-19 14:06:30');
INSERT INTO tbl_category VALUES ('8', 'Demo Demo', '1', '2023-06-21 14:02:19');
INSERT INTO tbl_category VALUES ('9', 'Demo Demo', '1', '2023-06-21 14:02:42');

-- ----------------------------
-- Table structure for `tbl_product`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(50) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_images` varchar(50) DEFAULT NULL,
  `pro_description` text DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  PRIMARY KEY (`pro_id`,`pro_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO tbl_product VALUES ('1', 'Quần Sooc Nam', '125', '../uploads/category-2.jpg', '<p>Xấu B&igrave;nh thường</p>', '1', '1', '2023-06-21 14:37:20', '0');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO tbl_users VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '1', '98765434', '1');
INSERT INTO tbl_users VALUES ('2', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'admin2@gmail.com', '1', '98537587', '1');
