/*
Navicat MySQL Data Transfer

Source Server         : mysql-9-3306
Source Server Version : 50636
Source Host           : 192.168.110.9:3306
Source Database       : chonglou

Target Server Type    : MYSQL
Target Server Version : 50636
File Encoding         : 65001

Date: 2017-12-28 01:39:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chonglou_admin
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_admin`;
CREATE TABLE `chonglou_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `nick` varchar(50) DEFAULT NULL COMMENT '昵称',
  `email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `auth_key` varchar(255) DEFAULT NULL COMMENT '授权登录',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '密码重置口令',
  `role_id` int(11) DEFAULT '10' COMMENT '角色',
  `add_time` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_admin
-- ----------------------------
INSERT INTO `chonglou_admin` VALUES ('1', 'orx', 'orx', 'lbmzorx@163.com', '123456', '10', 'sadklfkasfjkl', '$2y$13$gH74ONxbW91v10zPDb5UxuWPdV.p8Th.WHkSWfcNJUFtB.WQifTby', null, '10', null, null);

-- ----------------------------
-- Table structure for chonglou_article
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article`;
CREATE TABLE `chonglou_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL COMMENT '分类',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `author` varchar(20) DEFAULT NULL COMMENT '作者',
  `cover` varchar(255) DEFAULT NULL COMMENT '封面',
  `abstract` varchar(255) DEFAULT NULL COMMENT '摘要',
  `add_admin_id` int(11) DEFAULT NULL COMMENT '添加者',
  `content` text COMMENT '内容',
  `remain` tinyint(4) DEFAULT NULL COMMENT '提醒,0未提醒，1已经提醒',
  `publish` tinyint(4) DEFAULT NULL COMMENT '发布,0不发布，1发布,2发布当前',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态值，0待审核,1审核通过,2正在审核,3审核不通过',
  `add_time` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article
-- ----------------------------
INSERT INTO `chonglou_article` VALUES ('1', null, 'sdfsafa', 'sdfasfsf', 'asdfasfsa', 'asdfdasfsa', '1', 'asdfasdfas', '1', '2', '2', null, null);

-- ----------------------------
-- Table structure for chonglou_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article_cate`;
CREATE TABLE `chonglou_article_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0' COMMENT '名称',
  `parent_id` int(11) DEFAULT '0' COMMENT '父级分类',
  `level` tinyint(4) DEFAULT '0' COMMENT '级别',
  `path` varchar(255) DEFAULT '0' COMMENT '路径',
  `add_time` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_cate
-- ----------------------------
INSERT INTO `chonglou_article_cate` VALUES ('9', '教程', null, '0', '0', '1514390223', null);
INSERT INTO `chonglou_article_cate` VALUES ('10', '说说', null, '0', '0', '1514390230', null);
INSERT INTO `chonglou_article_cate` VALUES ('11', '话题', null, '0', '0', '1514390238', null);
INSERT INTO `chonglou_article_cate` VALUES ('12', '案例', null, '0', '0', '1514390294', null);
INSERT INTO `chonglou_article_cate` VALUES ('15', '撒旦法', null, '0', '0', '1514392637', null);
INSERT INTO `chonglou_article_cate` VALUES ('16', '得到', null, '0', '0', '1514392644', null);
INSERT INTO `chonglou_article_cate` VALUES ('17', '扫扫地', null, '0', '0', '1514392649', null);
INSERT INTO `chonglou_article_cate` VALUES ('18', '撒撒旦', null, '0', '0', '1514392657', null);
INSERT INTO `chonglou_article_cate` VALUES ('19', '432但是', null, '0', '0', '1514392664', null);
INSERT INTO `chonglou_article_cate` VALUES ('20', '功夫', null, '0', '0', '1514392676', null);
INSERT INTO `chonglou_article_cate` VALUES ('21', '123个', null, '0', '0', '1514392685', null);
INSERT INTO `chonglou_article_cate` VALUES ('22', '买那个', null, '0', '0', '1514392696', null);
INSERT INTO `chonglou_article_cate` VALUES ('23', '234', null, '0', '0', '1514392711', null);
INSERT INTO `chonglou_article_cate` VALUES ('24', '123个是', null, '0', '0', '1514392718', null);
INSERT INTO `chonglou_article_cate` VALUES ('25', '12vdfd', null, '0', '0', '1514392727', null);
INSERT INTO `chonglou_article_cate` VALUES ('26', '按错v', null, '0', '0', '1514392734', null);
INSERT INTO `chonglou_article_cate` VALUES ('27', '按错vasadf', null, '0', '0', '1514392740', null);
INSERT INTO `chonglou_article_cate` VALUES ('28', '按错vasadffdds', null, '0', '0', '1514392751', null);
INSERT INTO `chonglou_article_cate` VALUES ('29', '模式23489', null, '0', '0', '1514392759', null);
INSERT INTO `chonglou_article_cate` VALUES ('30', '1立刻就可的', null, '0', '0', '1514392765', null);
INSERT INTO `chonglou_article_cate` VALUES ('31', '淋漓畅快', null, '0', '0', '1514392772', null);
INSERT INTO `chonglou_article_cate` VALUES ('32', '开卷考试的', null, '0', '0', '1514392795', null);

-- ----------------------------
-- Table structure for chonglou_layout
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_layout`;
CREATE TABLE `chonglou_layout` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `templateClass` int(11) DEFAULT NULL COMMENT '模版类',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `sequence` varchar(255) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_layout
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_migration
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_migration`;
CREATE TABLE `chonglou_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_migration
-- ----------------------------
INSERT INTO `chonglou_migration` VALUES ('m000000_000000_base', '1514107193');

-- ----------------------------
-- Table structure for chonglou_tag
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_tag`;
CREATE TABLE `chonglou_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `frequence` int(11) DEFAULT NULL COMMENT '频率',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_tag
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_user
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user`;
CREATE TABLE `chonglou_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `nick` varchar(50) DEFAULT NULL COMMENT '昵称',
  `email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(20) DEFAULT NULL COMMENT '手机号',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `auth_key` varchar(255) DEFAULT NULL COMMENT '授权登录',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '密码重置口令',
  `role_id` int(11) DEFAULT '10' COMMENT '角色',
  `add_time` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user
-- ----------------------------
