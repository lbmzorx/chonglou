/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : chonglou

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-30 01:21:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chonglou_active
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_active`;
CREATE TABLE `chonglou_active` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '活动类型',
  `action_id` int(11) DEFAULT NULL COMMENT '活动',
  `table` varchar(255) DEFAULT NULL COMMENT '表名',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `name` varchar(255) DEFAULT NULL COMMENT '活动名称',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户动态';

-- ----------------------------
-- Records of chonglou_active
-- ----------------------------

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
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
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
  `user_id` int(11) DEFAULT NULL COMMENT '添加者',
  `cate_id` int(11) DEFAULT NULL COMMENT '分类',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `cover` varchar(255) DEFAULT NULL COMMENT '封面',
  `abstract` varchar(255) DEFAULT NULL COMMENT '摘要',
  `content` text COMMENT '内容',
  `remain` tinyint(4) DEFAULT NULL COMMENT '提醒,0未提醒，1已经提醒',
  `publish` tinyint(4) DEFAULT NULL COMMENT '发布,0不发布，1发布,2发布当前',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态值，0待审核,1审核通过,2正在审核,3审核不通过',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
  `tags` varchar(20) DEFAULT NULL COMMENT '标签',
  `commit` int(11) unsigned DEFAULT '0' COMMENT '评论',
  `view` int(11) unsigned DEFAULT '0' COMMENT '浏览',
  `collection` int(11) unsigned DEFAULT '0' COMMENT '收藏',
  `thumbup` int(11) DEFAULT NULL COMMENT '赞',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article
-- ----------------------------
INSERT INTO `chonglou_article` VALUES ('1', '1', '16', null, 'sdfsafa', 'sdfasfsf', '', 'asdfdasfsa', 'asdfasdfasasldkfjklkjkl\r\n\r\n`\r\n	klasdfjklasjklflkasdfjk\r\n	1. asdfasasdfdasfsadfasdfaa\r\n	asdfjkjkl\r\n\r\n	sadfsfsadf\r\n`', '1', null, '2', null, '1515337361', null, null, null, null, null);
INSERT INTO `chonglou_article` VALUES ('2', null, '10', null, '扫扫地', '得到', '', '撒旦发射点发生', '阿萨德发送发送发射点发撒旦发射反', null, '0', '0', '1515082482', '1515429016', null, null, null, null, null);
INSERT INTO `chonglou_article` VALUES ('3', null, '10', null, '酸酸的发射点发大厦发生', '是的发射发as', '阿萨德发送方', '阿萨德发送方', 'as的发射点发撒旦发射点发', null, '1', '1', '1515082835', null, null, null, null, null, null);
INSERT INTO `chonglou_article` VALUES ('5', null, '10', null, '所得税', '得到', '', '撒旦发射反', '阿萨德发送方', null, '0', '1', '1515085778', null, null, null, null, null, null);
INSERT INTO `chonglou_article` VALUES ('6', null, '11', null, '锁定', '撒旦法', '', '撒旦发射点发生', '斯蒂芬斯蒂芬撒旦法司法所地方\r\n斯科拉得分加拉塞克	\r\n	封口令大家深刻理解\r\n	是地方就是快乐\r\n	斯大林开放接口连接来看\r\n	\r\n	风水角度考虑分阶段考虑实际放宽了记录卡', null, '0', '0', '1515808927', null, '撒旦法', null, null, null, null);

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
  `status` tinyint(4) DEFAULT '0' COMMENT '状态',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_cate
-- ----------------------------
INSERT INTO `chonglou_article_cate` VALUES ('9', '教程', null, '0', '0', null, '1514390223', null);
INSERT INTO `chonglou_article_cate` VALUES ('10', '说说', null, '0', '0', null, '1514390230', null);
INSERT INTO `chonglou_article_cate` VALUES ('11', '话题', null, '0', '0', null, '1514390238', null);
INSERT INTO `chonglou_article_cate` VALUES ('12', '案例', null, '0', '0', null, '1514390294', null);
INSERT INTO `chonglou_article_cate` VALUES ('15', '撒旦法', null, '0', '0', null, '1514392637', null);
INSERT INTO `chonglou_article_cate` VALUES ('16', '得到', null, '0', '0', null, '1514392644', null);
INSERT INTO `chonglou_article_cate` VALUES ('17', '扫扫地', null, '0', '0', null, '1514392649', null);
INSERT INTO `chonglou_article_cate` VALUES ('18', '撒撒旦', null, '0', '0', null, '1514392657', null);
INSERT INTO `chonglou_article_cate` VALUES ('19', '432但是', null, '0', '0', null, '1514392664', null);
INSERT INTO `chonglou_article_cate` VALUES ('20', '功夫', null, '0', '0', null, '1514392676', null);
INSERT INTO `chonglou_article_cate` VALUES ('21', '123个', null, '0', '0', null, '1514392685', null);
INSERT INTO `chonglou_article_cate` VALUES ('22', '买那个', null, '0', '0', null, '1514392696', null);
INSERT INTO `chonglou_article_cate` VALUES ('23', '234', null, '0', '0', null, '1514392711', null);
INSERT INTO `chonglou_article_cate` VALUES ('24', '123个是', null, '0', '0', null, '1514392718', null);
INSERT INTO `chonglou_article_cate` VALUES ('25', '12vdfd', null, '0', '0', null, '1514392727', null);
INSERT INTO `chonglou_article_cate` VALUES ('26', '按错v', null, '0', '0', null, '1514392734', null);
INSERT INTO `chonglou_article_cate` VALUES ('27', '按错vasadf', null, '0', '0', null, '1514392740', null);
INSERT INTO `chonglou_article_cate` VALUES ('28', '按错vasadffdds', null, '0', '0', null, '1514392751', null);
INSERT INTO `chonglou_article_cate` VALUES ('29', '模式23489', null, '0', '0', null, '1514392759', null);
INSERT INTO `chonglou_article_cate` VALUES ('30', '1立刻就可的', null, '0', '0', null, '1514392765', null);
INSERT INTO `chonglou_article_cate` VALUES ('31', '淋漓畅快', null, '0', '0', null, '1514392772', null);
INSERT INTO `chonglou_article_cate` VALUES ('32', '开卷考试的', null, '0', '0', null, '1514392795', null);

-- ----------------------------
-- Table structure for chonglou_article_collection
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article_collection`;
CREATE TABLE `chonglou_article_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned DEFAULT NULL COMMENT '文章ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_collection
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_article_commit
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article_commit`;
CREATE TABLE `chonglou_article_commit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned DEFAULT NULL COMMENT '文章ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `commit_id` int(11) unsigned DEFAULT NULL COMMENT '评论ID',
  `content` text COMMENT '内容',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态，0，已发表，1评论成功，3非法评论，2审核不通过',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_commit
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_article_thumbup
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article_thumbup`;
CREATE TABLE `chonglou_article_thumbup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) unsigned DEFAULT NULL COMMENT '文章ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_thumbup
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设计模版';

-- ----------------------------
-- Records of chonglou_layout
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_log
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_log`;
CREATE TABLE `chonglou_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `log_time` float DEFAULT NULL,
  `prefix` text,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_log
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
-- Table structure for chonglou_speaks
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_speaks`;
CREATE TABLE `chonglou_speaks` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL COMMENT '用户ID',
  `content` text COMMENT '说说内容',
  `commit` int(11) unsigned DEFAULT '0' COMMENT '评论',
  `view` int(11) unsigned DEFAULT '0' COMMENT '浏览',
  `thumbup` int(11) DEFAULT '0' COMMENT '点赞',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='说说';

-- ----------------------------
-- Records of chonglou_speaks
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_speaks_collection
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_speaks_collection`;
CREATE TABLE `chonglou_speaks_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `speaks_id` int(11) unsigned DEFAULT NULL COMMENT '说说ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_speaks_collection
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_speaks_commit
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_speaks_commit`;
CREATE TABLE `chonglou_speaks_commit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `speaks_id` int(11) unsigned DEFAULT NULL COMMENT '说说ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `commit_id` int(11) unsigned DEFAULT NULL COMMENT '评论ID',
  `content` text COMMENT '评论内容',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_speaks_commit
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_speaks_thumbup
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_speaks_thumbup`;
CREATE TABLE `chonglou_speaks_thumbup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `speaks_id` int(11) unsigned DEFAULT NULL COMMENT '说说ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_speaks_thumbup
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_tag
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_tag`;
CREATE TABLE `chonglou_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `frequence` int(11) DEFAULT NULL COMMENT '频率',
  `content_type` tinyint(4) DEFAULT NULL COMMENT '标签类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_tag
-- ----------------------------
INSERT INTO `chonglou_tag` VALUES ('1', '撒旦法', null, null);

-- ----------------------------
-- Table structure for chonglou_topic
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_topic`;
CREATE TABLE `chonglou_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL COMMENT '分类',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `author` varchar(20) DEFAULT NULL COMMENT '作者',
  `content` text COMMENT '内容',
  `remain` tinyint(4) DEFAULT NULL COMMENT '提醒,0未提醒，1已经提醒',
  `publish` tinyint(4) DEFAULT NULL COMMENT '发布,0不发布，1发布,2发布当前',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态值，0待审核,1审核通过,2正在审核,3审核不通过',
  `tags` varchar(20) DEFAULT NULL COMMENT '标签',
  `commit` int(11) unsigned DEFAULT '0' COMMENT '评论',
  `view` int(11) unsigned DEFAULT '0' COMMENT '浏览',
  `collection` int(11) unsigned DEFAULT '0' COMMENT '收藏',
  `thumbup` int(11) DEFAULT '0' COMMENT '点赞',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_topic
-- ----------------------------
INSERT INTO `chonglou_topic` VALUES ('1', null, '16', 'sdfsafa', 'sdfasfsf', 'asdfasdfasasldkfjklkjkl\r\n\r\n`\r\n	klasdfjklasjklflkasdfjk\r\n	1. asdfasasdfdasfsadfasdfaa\r\n	asdfjkjkl\r\n\r\n	sadfsfsadf\r\n`', '1', null, '2', null, null, null, null, null, null, '1515337361');
INSERT INTO `chonglou_topic` VALUES ('2', null, '10', '扫扫地', '得到', '阿萨德发送发送发射点发撒旦发射反', null, '0', '0', null, null, null, null, null, '1515082482', '1515429016');
INSERT INTO `chonglou_topic` VALUES ('3', null, '10', '酸酸的发射点发大厦发生', '是的发射发as', 'as的发射点发撒旦发射点发', null, '1', '1', null, null, null, null, null, '1515082835', null);
INSERT INTO `chonglou_topic` VALUES ('5', null, '10', '所得税', '得到', '阿萨德发送方', null, '0', '1', null, null, null, null, null, '1515085778', null);
INSERT INTO `chonglou_topic` VALUES ('6', null, '11', '锁定', '撒旦法', '斯蒂芬斯蒂芬撒旦法司法所地方\r\n斯科拉得分加拉塞克	\r\n	封口令大家深刻理解\r\n	是地方就是快乐\r\n	斯大林开放接口连接来看\r\n	\r\n	风水角度考虑分阶段考虑实际放宽了记录卡', null, '0', '0', '撒旦法', null, null, null, null, '1515808927', null);

-- ----------------------------
-- Table structure for chonglou_topic_collection
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_topic_collection`;
CREATE TABLE `chonglou_topic_collection` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned DEFAULT NULL COMMENT '话题ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_topic_collection
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_topic_commit
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_topic_commit`;
CREATE TABLE `chonglou_topic_commit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned DEFAULT NULL COMMENT '话题ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `commit_id` int(11) unsigned DEFAULT NULL COMMENT '评论ID',
  `content` text COMMENT '评论内容',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_topic_commit
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_topic_thumbup
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_topic_thumbup`;
CREATE TABLE `chonglou_topic_thumbup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) unsigned DEFAULT NULL COMMENT '话题ID',
  `user_id` int(11) unsigned DEFAULT NULL COMMENT '用户ID',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_topic_thumbup
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
  `auth_key` varchar(255) DEFAULT NULL COMMENT '授权登录',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '密码重置口令',
  `role_id` int(11) DEFAULT '10' COMMENT '角色',
  `head` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user
-- ----------------------------
INSERT INTO `chonglou_user` VALUES ('1', 'orx', null, 'lbmzorx@163.com', null, 'R93myqD6Vv5Zk7c9Wj8RhRYbos3C-Lzw', '$2y$13$lTmxv1HXTseguTXnpITtge4pMZvM5iF.8Tnv1aB6/4zdZjth2YKOK', null, '10', null, '10', '1517058710', null);

-- ----------------------------
-- Table structure for chonglou_user_action
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user_action`;
CREATE TABLE `chonglou_user_action` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `action` varchar(200) DEFAULT NULL COMMENT '动作内容',
  `action_id` int(10) unsigned DEFAULT NULL COMMENT '动作ID',
  `action_type` tinyint(4) DEFAULT NULL COMMENT '动作类型',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态，0未读，1已读，2未知',
  `add_time` int(10) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户动态';

-- ----------------------------
-- Records of chonglou_user_action
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_user_login_log
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user_login_log`;
CREATE TABLE `chonglou_user_login_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '请求用户名',
  `ip` varchar(255) DEFAULT NULL COMMENT '请求IP',
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '登录密码',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user_login_log
-- ----------------------------
INSERT INTO `chonglou_user_login_log` VALUES ('16', null, '127.0.0.1', '0,orx787,orx234242,orx23,orx234,orx234s,1', null, '1517246356');

-- ----------------------------
-- Table structure for chonglou_user_message
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user_message`;
CREATE TABLE `chonglou_user_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COMMENT '消息内容',
  `send_id` int(11) unsigned DEFAULT NULL COMMENT '发送者ID',
  `to_id` int(11) unsigned DEFAULT NULL COMMENT '接收者ID',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user_message
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_user_news
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user_news`;
CREATE TABLE `chonglou_user_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `news_count` int(11) DEFAULT NULL COMMENT '通知数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user_news
-- ----------------------------
