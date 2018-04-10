/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : chonglou

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-11 01:02:56
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
  `name` varchar(50) NOT NULL COMMENT '名称',
  `head` varchar(255) NOT NULL COMMENT '头像',
  `email` varchar(20) NOT NULL COMMENT '邮箱',
  `mobile` varchar(20) NOT NULL COMMENT '手机号',
  `status` tinyint(4) NOT NULL COMMENT '状态',
  `auth_key` varchar(255) NOT NULL COMMENT '授权登录',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `password_reset_token` varchar(255) NOT NULL COMMENT '密码重置口令',
  `role_id` int(11) NOT NULL DEFAULT '10' COMMENT '角色',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `edit_time` int(11) NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_admin
-- ----------------------------
INSERT INTO `chonglou_admin` VALUES ('1', 'orx', '/upload/img/743185a1e6ca5007891c48150595d011.png', 'lbmzorx@163.com', '123456', '10', 'sadklfkasfjkl', '$2y$13$gH74ONxbW91v10zPDb5UxuWPdV.p8Th.WHkSWfcNJUFtB.WQifTby', '', '10', '0', '1523201831');

-- ----------------------------
-- Table structure for chonglou_admin_info
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_admin_info`;
CREATE TABLE `chonglou_admin_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `real_name` varchar(50) NOT NULL DEFAULT '' COMMENT '实名',
  `sex` tinyint(4) NOT NULL DEFAULT '1' COMMENT '性别.0女,1男',
  `birthday` varchar(20) NOT NULL DEFAULT '' COMMENT '生日',
  `province` varchar(20) NOT NULL DEFAULT '' COMMENT '省',
  `city` varchar(20) NOT NULL DEFAULT '' COMMENT '市',
  `county` varchar(20) NOT NULL DEFAULT '' COMMENT '县/区',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `identified_card` varchar(18) NOT NULL DEFAULT '' COMMENT '身份证',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态.0未实名,1已实名',
  `qq` varchar(12) NOT NULL DEFAULT '' COMMENT 'QQ',
  `wechat` varchar(20) NOT NULL DEFAULT '0' COMMENT '微信',
  `weibo` varchar(20) NOT NULL DEFAULT '0' COMMENT '微博',
  `other_mongodb` varchar(255) NOT NULL DEFAULT '0' COMMENT '其他信息',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`,`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_admin_info
-- ----------------------------
INSERT INTO `chonglou_admin_info` VALUES ('1', '1', 'orx', '1', '19910901', '贵州省', '黔南州', '荔波县', '贵州省荔波县', '522722199109010714', '0', '234234', '042342341', '021341234', '0213412432阿斯蒂芬', '1523199335', '1523201831');

-- ----------------------------
-- Table structure for chonglou_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_admin_log`;
CREATE TABLE `chonglou_admin_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(11) unsigned NOT NULL COMMENT '管理员用户id',
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '操作路由',
  `description` text COLLATE utf8_unicode_ci COMMENT '操作描述',
  `add_time` int(11) unsigned NOT NULL COMMENT '添加时间',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chonglou_admin_log
-- ----------------------------
INSERT INTO `chonglou_admin_log` VALUES ('60', '1', 'permission/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /fsdff/asdfasd/f/asdfdasf:GET,<br>Type(type) => ,<br>描述(description) => asdfasfasfasfsfsfasdffasdfsf,<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /fsdff/asdfasd/f/asdfdasf,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => asdfsdfsfsfs,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ', '1522497377', '0');
INSERT INTO `chonglou_admin_log` VALUES ('61', '1', 'permission/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /asdfasfsafasdf/asdfasf:GET,<br>Type(type) => ,<br>描述(description) => asdfasfasasdfasfasf,<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /asdfasfsafasdf/asdfasf,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => ddd,<br>排序(sort) => 4,<br>权限(permissions) => ,<br>角色(roles) => ', '1522497443', '0');
INSERT INTO `chonglou_admin_log` VALUES ('62', '1', 'permission/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /article/default/index:GET,<br>Type(type) => ,<br>描述(description) => 文章(查看),<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /article/default/index,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => 连连看,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ', '1522513308', '0');
INSERT INTO `chonglou_admin_log` VALUES ('63', '1', 'permission/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /article/default/update:GET,<br>Type(type) => ,<br>描述(description) => 文章更新(查看),<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /article/default/update,<br>请求方式(method) => GET,<br>组(group) => asdfaasdfasdf,<br>分类(category) => 连连看,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ', '1522513356', '0');
INSERT INTO `chonglou_admin_log` VALUES ('64', '1', 'permission/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => /article/default/update:POST,<br>Type(type) => ,<br>描述(description) => 文章更新(确定),<br>Rule Name(ruleName) => ,<br>Data(data) => ,<br>路由(route) => /article/default/update,<br>请求方式(method) => POST,<br>组(group) => asdfaasdfasdf,<br>分类(category) => 连连看,<br>排序(sort) => 0,<br>权限(permissions) => ,<br>角色(roles) => ', '1522514529', '0');
INSERT INTO `chonglou_admin_log` VALUES ('65', '1', 'role/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => \"\\u5362\\u65af\\u79d1\\u62c9\\u4f1a\\u8ba1\\u6cd5\",<br>Type(type) => null,<br>描述(description) => \"\\u5206\\u5f00\\u62c9\\u5c71\\u53e3\",<br>Rule Name(ruleName) => null,<br>Data(data) => null,<br>路由(route) => null,<br>请求方式(method) => null,<br>组(group) => null,<br>分类(category) => null,<br>排序(sort) => \"3\",<br>权限(permissions) => {\"\\/article\\/default\\/update:GET\":\"\\/article\\/default\\/update:GET\",\"\\/article\\/default\\/index:GET\":\"\\/article\\/default\\/index:GET\",\"\\/asdfasfsafasdf\\/asdfasf:GET\":\"\\/asdfasfsafasdf\\/asdfasf:GET\",\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\":\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\",\"\\/aslkdfjk\\/aslkdfj:GET\":\"\\/aslkdfjk\\/aslkdfj:GET\"},<br>角色(roles) => null', '1522682166', '0');
INSERT INTO `chonglou_admin_log` VALUES ('66', '1', 'role/create', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac  {{%CREATED%}}  {{%RECORD%}}: <br>角色(name) => \"\\u963f\\u8428\\u5fb7\\u53d1\\u9001\\u65b9\",<br>Type(type) => null,<br>描述(description) => \"\\u963f\\u8428\\u5fb7\\u53d1\\u9001\",<br>Rule Name(ruleName) => null,<br>Data(data) => null,<br>路由(route) => null,<br>请求方式(method) => null,<br>组(group) => null,<br>分类(category) => null,<br>排序(sort) => \"1\",<br>权限(permissions) => {\"\\/article\\/default\\/update:GET\":\"\\/article\\/default\\/update:GET\",\"\\/article\\/default\\/update:POST\":\"\\/article\\/default\\/update:POST\",\"\\/article\\/default\\/index:GET\":\"\\/article\\/default\\/index:GET\",\"\\/asdfasfsafasdf\\/asdfasf:GET\":\"\\/asdfasfsafasdf\\/asdfasf:GET\",\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\":\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\"},<br>角色(roles) => null', '1522682981', '0');
INSERT INTO `chonglou_admin_log` VALUES ('67', '1', 'role/delete', '{{%ADMIN_USER%}} [ orx ] {{%BY%}} backend\\models\\form\\Rbac   {{%DELETED%}}  {{%RECORD%}}: <br>角色(name) => \"\\u5362\\u65af\\u79d1\\u62c9\\u4f1a\\u8ba1\\u6cd5\",<br>Type(type) => null,<br>描述(description) => \"\\u5206\\u5f00\\u62c9\\u5c71\\u53e3\",<br>Rule Name(ruleName) => null,<br>Data(data) => null,<br>路由(route) => null,<br>请求方式(method) => null,<br>组(group) => null,<br>分类(category) => null,<br>排序(sort) => \"4\",<br>权限(permissions) => {\"\\/article\\/default\\/index:GET\":\"\\/article\\/default\\/index:GET\",\"\\/article\\/default\\/update:GET\":\"\\/article\\/default\\/update:GET\",\"\\/article\\/default\\/update:POST\":\"\\/article\\/default\\/update:POST\",\"\\/asdfasfsafasdf\\/asdfasf:GET\":\"\\/asdfasfsafasdf\\/asdfasf:GET\",\"\\/aslkdfjk\\/aslkdfj:GET\":\"\\/aslkdfjk\\/aslkdfj:GET\",\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\":\"\\/fsdff\\/asdfasd\\/f\\/asdfdasf:GET\"},<br>角色(roles) => [\"\\u5362\\u65af\\u79d1\\u62c9\\u4f1a\\u8ba1\\u6cd5\"]', '1522682985', '0');

-- ----------------------------
-- Table structure for chonglou_admin_message
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_admin_message`;
CREATE TABLE `chonglou_admin_message` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `to_admin_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '收信管理员',
  `from_admin_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发信管理员',
  `spread_type` tinyint(4) unsigned NOT NULL DEFAULT '3' COMMENT '消息类型.0=广播,1组,3私信',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星',
  `name` varchar(20) NOT NULL DEFAULT '0' COMMENT '消息名',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '内容',
  `read` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '已读.0未读,1已读',
  `from_type` tinyint(3) unsigned DEFAULT '0' COMMENT '来源类型.0管理员,1用户,2路人,10操作系统,11其他',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员消息表';

-- ----------------------------
-- Records of chonglou_admin_message
-- ----------------------------
INSERT INTO `chonglou_admin_message` VALUES ('1', '1', '0', '0', '0', '新年贺喜', '阿斯利康打飞机阿萨德及开发', '0', '0', '1523379561');
INSERT INTO `chonglou_admin_message` VALUES ('2', '1', '0', '2', '0', '阿萨德发送方', '阿斯短发岁的法书法大师傅大师', '0', '0', '1523379678');

-- ----------------------------
-- Table structure for chonglou_admin_message_log
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_admin_message_log`;
CREATE TABLE `chonglou_admin_message_log` (
  `admin_message_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_message_id`,`admin_id`),
  KEY `admin_message_id` (`admin_message_id`,`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_admin_message_log
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_article
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article`;
CREATE TABLE `chonglou_article` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `cate_id` int(11) DEFAULT NULL COMMENT '分类',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `cover` varchar(255) DEFAULT NULL COMMENT '封面',
  `abstract` varchar(255) DEFAULT NULL COMMENT '摘要',
  `content_id` bigint(20) NOT NULL COMMENT '文章内容',
  `remain` tinyint(4) DEFAULT '0' COMMENT '提醒.0未提醒，1已经提醒',
  `auth` tinyint(4) DEFAULT '0' COMMENT '权限.0所有人，1好友，2加密，3自己',
  `tag` varchar(20) DEFAULT NULL COMMENT '标签',
  `commit` int(11) unsigned DEFAULT '0' COMMENT '评论',
  `view` int(11) unsigned DEFAULT '0' COMMENT '浏览',
  `collection` int(11) unsigned DEFAULT '0' COMMENT '收藏',
  `thumbup` int(11) DEFAULT '0' COMMENT '赞',
  `level` tinyint(4) DEFAULT '2' COMMENT '文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才',
  `score` tinyint(4) DEFAULT '0' COMMENT '评分',
  `publish` tinyint(4) DEFAULT NULL COMMENT '发布.0草稿,1发布',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态值.0待审核,1审核通过,2正在审核,3审核不通过',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article
-- ----------------------------
INSERT INTO `chonglou_article` VALUES ('1', '1', '16', '1', 'sdfsafa', 'sdfasfsf', 'http://www.chongloua.com/upload/img/eedd49bd0c6de401ae0770d919070b10.png', 'asdfdasfsa', '1', '1', '1', '', '0', '0', '0', '0', '4', '0', '0', '1', null, '1521867600');
INSERT INTO `chonglou_article` VALUES ('2', null, '10', null, '扫扫地', '得到', '', '撒旦发射点发生', '2', '1', '1', '', '0', '0', '0', '0', '4', '0', '0', '1', '1515082482', '1521867600');
INSERT INTO `chonglou_article` VALUES ('3', null, '29', null, '酸酸的发射点发大厦发生', '是的发射发as', '阿萨德发送方', '阿萨德发送方', '3', '0', '1', '', '0', '0', '0', '0', '4', '0', '1', '1', '1515082835', '1521867600');
INSERT INTO `chonglou_article` VALUES ('5', null, '10', null, '所得税', '得到', '', '撒旦发射反', '4', '1', '0', null, '0', '0', '0', '0', '4', '0', '0', '1', '1515085778', '1521867600');
INSERT INTO `chonglou_article` VALUES ('9', '1', '12', null, '阿萨德发送', null, null, null, '5', '1', '0', 'asd阿斯蒂芬as阿斯', '0', '0', '0', '0', '4', '0', '1', '1', '1517737578', '1521867600');
INSERT INTO `chonglou_article` VALUES ('10', '1', '11', null, '阿萨德发送', null, null, null, '6', '1', '0', 'asd阿萨德发送', '0', '0', '0', '0', '4', '0', '1', '1', '1517737870', '1521867600');
INSERT INTO `chonglou_article` VALUES ('12', '1', '10', null, '阿萨德发送方', null, null, null, '7', '0', '0', '阿萨德发送方', '0', '0', '0', '0', '4', '0', '0', '0', '1517747813', '1521867600');
INSERT INTO `chonglou_article` VALUES ('13', '1', '10', null, '啊岁的发撒地方', null, null, null, '8', '0', '0', 'as阿萨德发送方', '0', '0', '0', '0', '4', '0', '1', '1', '1517747893', '1521867600');
INSERT INTO `chonglou_article` VALUES ('14', '1', '9', null, '凯利数据看来飞机看来', null, null, null, '9', '1', '0', '理了理', '0', '0', '0', '0', '4', '0', '1', '1', '1518937954', '1521867600');
INSERT INTO `chonglou_article` VALUES ('15', null, '10', '1', '阿萨德发', '阿斯蒂芬', '', '暗室逢灯', '13', '0', '0', '啊df', '0', '0', '0', '0', '4', '0', '0', '0', '1521564629', '1521867600');
INSERT INTO `chonglou_article` VALUES ('16', null, '10', '1', '阿萨德发', '阿斯蒂芬', '', '暗室逢灯', '14', '0', '0', '啊df', '0', '0', '0', '0', '4', '0', '0', '0', '1521564659', '1521867600');
INSERT INTO `chonglou_article` VALUES ('17', null, '12', '0', 'lasdkjlf', 'lsakdfjklsa', '/upload/img/a1394f470bfb41b26bf2fa8a0e17031e.png', 'asdfasfs', '15', '0', '0', 'asdfasf', '0', '0', '0', '0', '2', '0', '0', '0', '1521906949', null);

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
  `status` tinyint(4) DEFAULT '1' COMMENT '状态.0未开启，1启用',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_cate
-- ----------------------------
INSERT INTO `chonglou_article_cate` VALUES ('9', '教程', '0', '0', '0', '1', '1514390223', '1522080969');
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
INSERT INTO `chonglou_article_cate` VALUES ('29', '模式23489', '25', '0', '0', '1', '1514392759', '1521134090');
INSERT INTO `chonglou_article_cate` VALUES ('30', '1立刻就可的', null, '0', '0', null, '1514392765', null);
INSERT INTO `chonglou_article_cate` VALUES ('31', '淋漓畅快', null, '0', '0', null, '1514392772', null);

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
  `content` varchar(400) DEFAULT NULL COMMENT '内容',
  `status` tinyint(4) DEFAULT '0' COMMENT '状态.0，已发表，1评论成功，3非法评论，2审核不通过',
  `add_time` int(11) unsigned DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_commit
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_article_content
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_article_content`;
CREATE TABLE `chonglou_article_content` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '文章内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_article_content
-- ----------------------------
INSERT INTO `chonglou_article_content` VALUES ('1', '![](http://www.chongloua.com/upload/img/aa90b32dbdeb45398ac5790777afba84.png)md\r\n\r\n\r\n\r\n\r\nasdfasdf\r\n\r\nasdf\r\na\r\nf\r\nasd\r\nfa\r\nsdf\r\nasf\r\nasd\r\nfa\r\ns\r\nfs\r\nfsd\r\nf\r\ndas\r\nf\r\nasf\r\nasd\r\nfsd\r\na');
INSERT INTO `chonglou_article_content` VALUES ('2', 'sdfas![](www.chongloua.com/upload/img/9dff0094b9b0b6d2314bb2177253d8f3.png)');
INSERT INTO `chonglou_article_content` VALUES ('3', 'asdf');
INSERT INTO `chonglou_article_content` VALUES ('4', 'asdf');
INSERT INTO `chonglou_article_content` VALUES ('5', 'asdf');
INSERT INTO `chonglou_article_content` VALUES ('6', 'asdf');
INSERT INTO `chonglou_article_content` VALUES ('7', 'asdfff');
INSERT INTO `chonglou_article_content` VALUES ('8', 'dfdsfaf');
INSERT INTO `chonglou_article_content` VALUES ('9', 'asdfasasdfas');
INSERT INTO `chonglou_article_content` VALUES ('10', 'asdfasdfasfd');
INSERT INTO `chonglou_article_content` VALUES ('11', '电费阿斯蒂芬a\r\n阿萨德发送 ');
INSERT INTO `chonglou_article_content` VALUES ('12', '电费阿斯蒂芬a\r\n阿萨德发送 ');
INSERT INTO `chonglou_article_content` VALUES ('13', '电费阿斯蒂芬a\r\n阿萨德发送 ');
INSERT INTO `chonglou_article_content` VALUES ('14', '电费阿斯蒂芬a\r\n阿萨德发送 ');
INSERT INTO `chonglou_article_content` VALUES ('15', 'asdfasdfasdfasf');

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
-- Table structure for chonglou_auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_auth_assignment`;
CREATE TABLE `chonglou_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_auth_item
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_auth_item`;
CREATE TABLE `chonglou_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_auth_item
-- ----------------------------
INSERT INTO `chonglou_auth_item` VALUES ('/article/default/index:GET', '2', '文章(查看)', null, 0x733A36383A227B2267726F7570223A2261736466616173646661736466222C22736F7274223A2233222C2263617465676F7279223A225C75386664655C75386664655C7537373062227D223B, '1522513308', '1522515271');
INSERT INTO `chonglou_auth_item` VALUES ('/article/default/update:GET', '2', '文章更新(查看)', null, 0x733A36383A227B2267726F7570223A2261736466616173646661736466222C22736F7274223A2230222C2263617465676F7279223A225C75386664655C75386664655C7537373062227D223B, '1522513356', '1522759224');
INSERT INTO `chonglou_auth_item` VALUES ('/article/default/update:POST', '2', '文章更新(确定)', null, 0x733A36383A227B2267726F7570223A2261736466616173646661736466222C22736F7274223A2230222C2263617465676F7279223A225C75386664655C75386664655C7537373062227D223B, '1522514528', '1522514528');
INSERT INTO `chonglou_auth_item` VALUES ('/asdfasfsafasdf/asdfasf:GET', '2', 'asdfasfasasdfasfasf', null, 0x733A35343A227B2267726F7570223A2261736466616173646661736466222C22736F7274223A223131222C2263617465676F7279223A22646464227D223B, '1522497442', '1522500042');
INSERT INTO `chonglou_auth_item` VALUES ('/aslkdfjk/aslkdfj:GET', '2', 'asdfasfas[get]', null, 0x733A34333A227B2267726F7570223A226173222C22736F7274223A223133222C2263617465676F7279223A22646464227D223B, '1522489665', '1522500023');
INSERT INTO `chonglou_auth_item` VALUES ('/fsdff/asdfasd/f/asdfdasf:GET', '2', 'asdfasfasfasfsfsfasdffasdfsf', null, 0x733A36333A227B2267726F7570223A2261736466616173646661736466222C22736F7274223A223131222C2263617465676F7279223A22617364667364667366736673227D223B, '1522497377', '1522500019');
INSERT INTO `chonglou_auth_item` VALUES ('阿萨德发送方', '1', '阿萨德发送', null, 0x733A31323A227B22736F7274223A2231227D223B, '1522682981', '1522758940');

-- ----------------------------
-- Table structure for chonglou_auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_auth_item_child`;
CREATE TABLE `chonglou_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_auth_item_child
-- ----------------------------
INSERT INTO `chonglou_auth_item_child` VALUES ('asdfasdf', '/article/default/index:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('asdfasdf', '/article/default/update:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('asdfasdf', '/article/default/update:POST');
INSERT INTO `chonglou_auth_item_child` VALUES ('asdfasdf', '/asdfasfsafasdf/asdfasf:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('asdfasdf', '/aslkdfjk/aslkdfj:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('asdfasdf', '/fsdff/asdfasd/f/asdfdasf:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('卢斯科拉会计法', '/article/default/index:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('卢斯科拉会计法', '/article/default/update:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('卢斯科拉会计法', '/article/default/update:POST');
INSERT INTO `chonglou_auth_item_child` VALUES ('卢斯科拉会计法', '/asdfasfsafasdf/asdfasf:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('卢斯科拉会计法', '/aslkdfjk/aslkdfj:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('卢斯科拉会计法', '/fsdff/asdfasd/f/asdfdasf:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('阿萨德发送方', '/article/default/index:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('阿萨德发送方', '/article/default/update:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('阿萨德发送方', '/article/default/update:POST');
INSERT INTO `chonglou_auth_item_child` VALUES ('阿萨德发送方', '/asdfasfsafasdf/asdfasf:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('阿萨德发送方', '/aslkdfjk/aslkdfj:GET');
INSERT INTO `chonglou_auth_item_child` VALUES ('阿萨德发送方', '/fsdff/asdfasd/f/asdfdasf:GET');

-- ----------------------------
-- Table structure for chonglou_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_auth_rule`;
CREATE TABLE `chonglou_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_img_upload
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_img_upload`;
CREATE TABLE `chonglou_img_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filePath` varchar(255) DEFAULT NULL COMMENT '文件路径',
  `add_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `admin_id` int(11) DEFAULT NULL COMMENT '管理员ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_img_upload
-- ----------------------------
INSERT INTO `chonglou_img_upload` VALUES ('1', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/bd82c1f700892d28e68f6ffc3c8ba841.png', '1521477967', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('2', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/4a17be0ff77a3883b4c8f0a17a6dd5b1.png', '1521478092', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('3', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/eedd49bd0c6de401ae0770d919070b10.png', '1521547697', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('4', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/efddb559587e6c27dee6855a7e6689bc.png', '1521563482', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('5', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/820a2a17a05ffa8e28c80636c658df0f.png', '1521563861', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('6', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/e1e1d82036791630101d97da6920fe36.png', '1521563984', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('7', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/a1394f470bfb41b26bf2fa8a0e17031e.png', '1521906907', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('8', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/cdec4647d197ae82277f4b92fd53c2e5.png', '1522251387', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('9', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/e9b9fc1372553d3ed05916c6d0b5b20b.png', '1522251600', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('10', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/7930639c2d0c4e54ff99df7659df649d.png', '1522251814', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('11', 'E:\\www\\Yii\\chonglou/frontend/web/upload/img/9f89537a5e40a04aba9a98f56b86222d.png', '1522462928', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('12', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/8c8b571a6cbb423ee76cf9cadb368d7d.png', '1523194102', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('13', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/7c0c6f27bf0d43e611dd712483d01542.png', '1523199281', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('14', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/7705e4d76d760ea2533c0878702eda79.png', '1523199966', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('15', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/e84b3f3e7af44392ea0cbb7560ea350d.png', '1523200046', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('16', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/3cc641c103a653119e5c316fcd8a4dfb.png', '1523200214', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('17', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/31af545be947f44a6ce648104f6c5f44.png', '1523200326', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('18', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/3bbe5be57e95ed4f3dad547957e3d103.png', '1523200382', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('19', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/fedde1f51cdad3f87df632a61b6da59d.png', '1523200434', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('20', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/bc2a7cce6f59dd45556ddaf0a1e8bf21.png', '1523200615', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('21', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/8e6e94a366f4c5628df21bd27d27b670.png', '1523200700', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('22', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/1e0e90083a9d2a9108c455a7f2505644.png', '1523200724', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('23', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/2d7bdf7e59c11eb3bc40e8445efd60c3.png', '1523200785', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('24', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/dd3b8c5073c7c8aa29c296d5343ae1f3.png', '1523200811', null, '1');
INSERT INTO `chonglou_img_upload` VALUES ('25', 'E:\\www\\Yii\\chonglou/backend/web/upload/img/743185a1e6ca5007891c48150595d011.png', '1523201828', null, '1');

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
  `level` int(11) DEFAULT NULL COMMENT '级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END',
  `category` varchar(255) DEFAULT NULL COMMENT '分类',
  `log_time` float DEFAULT NULL COMMENT '记录时间',
  `prefix` text COMMENT '前缀',
  `message` text COMMENT '信息',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_log
-- ----------------------------

-- ----------------------------
-- Table structure for chonglou_maintain
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_maintain`;
CREATE TABLE `chonglou_maintain` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `options_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '位置类型.0首页轮播,1侧栏1,2侧栏2',
  `show_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '显示类型.0图片,2文字,3markdown',
  `name` varchar(50) NOT NULL COMMENT '名称',
  `value` varchar(255) NOT NULL COMMENT '值',
  `sign` varchar(50) NOT NULL COMMENT '标识',
  `url` varchar(255) NOT NULL COMMENT 'URL',
  `info` varchar(255) NOT NULL COMMENT '备注',
  `sort` int(11) NOT NULL COMMENT '排序',
  `add_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `edit_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态.0禁用,1启用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='运营';

-- ----------------------------
-- Records of chonglou_maintain
-- ----------------------------
INSERT INTO `chonglou_maintain` VALUES ('1', '0', '0', 'asdfasfas', '/upload/img/7930639c2d0c4e54ff99df7659df649d.png', 'asdfasfasdfdsaf', '/askldfjka/asdfkaksl', 'asdfasdfdasfasdf', '11', '1522251818', '1522515509', '0');
INSERT INTO `chonglou_maintain` VALUES ('2', '25', '0', '好文章', '/upload/img/9f89537a5e40a04aba9a98f56b86222d.png', 'aasdfas', '/article/default/index', '阿隆索肯德基防空雷达数据', '10', '1522463042', '1522467680', '1');

-- ----------------------------
-- Table structure for chonglou_menu
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_menu`;
CREATE TABLE `chonglou_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '菜单类型.0后台,1前台',
  `position` tinyint(4) NOT NULL DEFAULT '0' COMMENT '位置。0左，1上',
  `parent_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单id',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '英文名',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'url地址',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '图标',
  `sort` float unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '打开方式._blank新窗口,_self本窗口',
  `is_absolute_url` tinyint(6) unsigned NOT NULL DEFAULT '0' COMMENT '是否绝对地址',
  `is_display` tinyint(6) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示.0否,1是',
  `add_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `edit_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `top_id` int(11) NOT NULL DEFAULT '0' COMMENT '顶部菜单',
  `module` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '模块',
  `controller` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '控制器',
  `action` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '方法',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chonglou_menu
-- ----------------------------
INSERT INTO `chonglou_menu` VALUES ('1', '0', '0', '0', '首页', null, '/', 'fa fa-home', '0', '0', '0', '1', '1521036199', '1521036239', '0', 'home', 'default', 'index');
INSERT INTO `chonglou_menu` VALUES ('2', '0', '0', '0', '系统', null, '/system/default/index', 'fa fa-train', '0', '0', '0', '1', '1520943218', '1522475386', '0', 'system', '', '');
INSERT INTO `chonglou_menu` VALUES ('3', '0', '0', '0', '设置', null, '/setting', 'fa fa-cog', '0', '0', '0', '1', '1521868490', '1521884965', '0', 'setting', '', '');
INSERT INTO `chonglou_menu` VALUES ('4', '0', '0', '3', '网站', null, '/setting/website/index', 'fa fa-certificate', '0', '0', '0', '0', '1521869641', '1522409760', '0', 'settting', 'website', 'index');
INSERT INTO `chonglou_menu` VALUES ('5', '0', '0', '3', '网站设置', null, '/setting/default/website', 'fa fa-asterisk', '0', '0', '0', '1', '1521882820', '1522409753', '0', 'settting', 'default', 'website');
INSERT INTO `chonglou_menu` VALUES ('6', '0', '0', '3', '自定义设置', null, '/setting/custom/index', 'fa fa-user-secret', '0', '0', '0', '1', '1521969996', '1521970078', '0', 'settting', 'custom', 'index');
INSERT INTO `chonglou_menu` VALUES ('13', '0', '0', '0', '用户', null, '/user', 'fa fa-users', '0', '', '0', '1', '1505570745', '1522161522', '0', 'user', '', '');
INSERT INTO `chonglou_menu` VALUES ('24', '1', '0', '0', 'php', null, '/php', '', '0', '_self', '0', '1', '1505636915', '1505636937', '0', null, null, null);
INSERT INTO `chonglou_menu` VALUES ('25', '1', '0', '0', 'java', null, '/java', '', '0', '_self', '0', '1', '1505636975', '1519534861', '0', null, null, null);
INSERT INTO `chonglou_menu` VALUES ('26', '1', '0', '0', 'javascript', null, '/javascript', '', '0', '_self', '0', '1', '1505637000', '1505637000', '0', null, null, null);
INSERT INTO `chonglou_menu` VALUES ('27', '0', '0', '0', '运营管理', null, '/maintain', 'fa fa-ils', '0', '', '0', '1', '1505637000', '1522250705', '0', 'maintain', '', '');
INSERT INTO `chonglou_menu` VALUES ('28', '0', '0', '27', 'Banner管理', null, '/maintain/banner/index', 'fa fa-map', '0', '0', '0', '1', '1505637000', '1522250680', '0', 'maintain', 'banner', 'index');
INSERT INTO `chonglou_menu` VALUES ('29', '0', '0', '27', '广告管理', null, 'ad/index', 'fa fa-flag-checkered', '0', '', '0', '1', '1505637000', '1522475904', '0', '', '', '');
INSERT INTO `chonglou_menu` VALUES ('30', '0', '0', '22', '警告', null, 'log/waring', 'fa list', '0', '_blank', '0', '1', '1519534765', '1519534765', '0', null, null, null);
INSERT INTO `chonglou_menu` VALUES ('31', '0', '0', '0', '内容', null, '/article', 'fa fa-file-o', '0', '0', '0', '1', '1520873439', '1522475605', '0', 'article', '', '');
INSERT INTO `chonglou_menu` VALUES ('32', '0', '0', '31', '文章', null, '/article/default/index', 'fa fa-file-text', '0', '0', '0', '1', '1520874846', '1522475552', '0', 'article', 'default', 'index');
INSERT INTO `chonglou_menu` VALUES ('35', '0', '0', '2', '菜单', null, '/system/menu/index', 'fa fa-list-ol', '0', '0', '0', '1', '1520949853', '1522475437', '0', 'system', 'menu', 'index');
INSERT INTO `chonglou_menu` VALUES ('37', '0', '0', '31', '评论', null, '/article/commit', 'fa fa-comments-o', '0', '0', '0', '1', '1521036315', '1522475623', '0', 'article', 'commit', 'index');
INSERT INTO `chonglou_menu` VALUES ('38', '0', '0', '31', '分类', null, '/article/cate/index', 'fa fa-th', '0', '0', '0', '1', '1521126691', '1522475731', '0', 'article', 'cate', 'index');
INSERT INTO `chonglou_menu` VALUES ('39', '0', '0', '31', '标签', null, '/article/tag/index', 'fa fa-tag', '0', '0', '0', '1', '1521126891', '0', '0', 'article', 'tag', 'index');
INSERT INTO `chonglou_menu` VALUES ('40', '0', '0', '2', '通知设置', null, '/system/toastr', 'fa fa-bell-o', '0', '0', '0', '1', '1521549369', '1522475509', '0', 'system', 'toastr', 'index');
INSERT INTO `chonglou_menu` VALUES ('45', '0', '0', '0', '日志', null, '/log', 'fa fa-copy', '0', '0', '0', '1', '1522160183', '0', '0', 'log', '', '');
INSERT INTO `chonglou_menu` VALUES ('46', '0', '0', '45', '管理员日志', null, '/log/admin-log', 'fa fa-user-circle', '0', '0', '0', '1', '1522160321', '0', '0', 'log', 'admin-log', 'index');
INSERT INTO `chonglou_menu` VALUES ('47', '0', '0', '45', '系统日志', null, '/log/running', 'fa fa-bug', '0', '0', '0', '1', '1522160396', '1522475862', '0', 'log', 'running', 'index');
INSERT INTO `chonglou_menu` VALUES ('49', '0', '0', '0', '权限', null, '/auth', 'fa fa-cogs', '0', '0', '0', '1', '1522161245', '0', '0', 'auth', '', '');
INSERT INTO `chonglou_menu` VALUES ('50', '0', '0', '49', '管理员', null, '/auth/admin', 'fa fa-user-circle', '0', '0', '0', '1', '1522161618', '1522161633', '0', 'auth', 'admin', 'index');
INSERT INTO `chonglou_menu` VALUES ('51', '0', '0', '49', '角色', null, '/auth/role', 'fa fa-smile-o', '0', '0', '0', '1', '1522161686', '0', '0', 'auth', 'role', 'index');
INSERT INTO `chonglou_menu` VALUES ('52', '0', '0', '49', '权限', null, '/auth/permission', 'fa fa-toggle-on', '0', '0', '0', '1', '1522161754', '0', '0', 'auth', 'permission', 'index');
INSERT INTO `chonglou_menu` VALUES ('53', '0', '1', '0', '管理员', null, '/admin', 'fa fa-envelope-o', '0', '0', '0', '1', '1522771586', '0', '0', 'admin', '', '');
INSERT INTO `chonglou_menu` VALUES ('54', '0', '0', '31', '单页', 'Single Page', '/article/single/index', 'fa fa-file-powerpoint-o', '0', '0', '0', '1', '1523193072', '0', '0', 'article', 'single', 'index');

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
-- Table structure for chonglou_options
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_options`;
CREATE TABLE `chonglou_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `type` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '类型.0系统,1自定义,2banner,3广告',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '标识符',
  `value` text COLLATE utf8_unicode_ci NOT NULL COMMENT '值',
  `input_type` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '输入框类型',
  `autoload` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '自动加载.0否,1是',
  `tips` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '提示备注信息',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chonglou_options
-- ----------------------------
INSERT INTO `chonglou_options` VALUES ('1', '0', 'seo_keywords', '烟雨重楼cms,文章发布,优质用户体验', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('2', '0', 'seo_description', '烟雨重楼，领先的cms管理', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('3', '0', 'website_title', '烟雨重楼', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('4', '0', 'website_description', 'Based on most popular php framework yii2', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('5', '0', 'website_email', 'lbmzorx@163.com', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('6', '0', 'website_language', 'zh-CN', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('7', '0', 'website_icp', '审(重楼)', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('8', '0', 'website_statics_script', '斯卡拉', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('9', '0', 'website_status', '1', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('10', '0', 'website_comment', '0', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('11', '0', 'website_comment_need_verify', '1', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('12', '0', 'website_timezone', 'Asia/Shanghai', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('13', '0', 'website_url', 'www.chonglou.com', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('14', '0', 'smtp_host', 'alskdfk', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('15', '0', 'smtp_username', 'asdlkfk', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('16', '0', 'smtp_password', 'fklsajdfk', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('17', '0', 'smtp_port', '24', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('18', '0', 'smtp_encryption', 'fklsajkd', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('19', '0', 'smtp_nickname', 'aslkdjfklsasdfsaasdfasf', '1', '0', '', '0');
INSERT INTO `chonglou_options` VALUES ('20', '1', 'weibo', 'http://www.weibo.com/feeppp', '1', '1', '新浪微博', '0');
INSERT INTO `chonglou_options` VALUES ('21', '1', 'facebook', 'http://www.facebook.com/liufee', '1', '1', 'facebook', '0');
INSERT INTO `chonglou_options` VALUES ('22', '1', 'wechat', '飞得更高', '1', '1', '微信', '0');
INSERT INTO `chonglou_options` VALUES ('23', '1', 'qq', '1838889850阿斯蒂芬撒旦法', '1', '1', 'QQ号码', '0');
INSERT INTO `chonglou_options` VALUES ('24', '1', 'email', 'admin@feehi.com', '1', '1', '邮箱', '0');
INSERT INTO `chonglou_options` VALUES ('25', '2', 'index', '首页banner', '1', '1', '首页banner', '0');
INSERT INTO `chonglou_options` VALUES ('26', '3', 'sidebar_right_1', '{\"ad\":\"\\/uploads\\/setting\\/ad\\/5a292c0fda836_cms.jpg\",\"link\":\"http://www.feehi.com\",\"target\":\"_blank\",\"desc\":\"FeehiCMS\",\"created_at\":1512641320,\"updated_at\":1512647776}', '1', '1', '网站右侧广告位1', '0');
INSERT INTO `chonglou_options` VALUES ('27', '3', 'sidebar_right_2', '{\"ad\":\"\\/uploads\\/setting\\/ad\\/5a291f9236479_22.jpg\",\"link\":\"\",\"target\":\"_blank\",\"desc\":\"\\u6700\\u597d\\u7684\\u8fd0\\u52a8\\u624b\\u8868\",\"created_at\":1512644498,\"updated_at\":1512647586}', '1', '1', '网站右侧广告位2', '0');
INSERT INTO `chonglou_options` VALUES ('40', '1', '阿斯短发岁的发送', '阿斯短发的沙发上的发', '1', '1', '啊岁的发生发所得发', '0');
INSERT INTO `chonglou_options` VALUES ('41', '1', '啊岁的发生发所得发', '阿斯短发岁的法岁的法', '1', '1', '', '0');
INSERT INTO `chonglou_options` VALUES ('42', '1', '阿斯短发打岁发生', '阿斯短发散发大赛法的撒', '1', '1', '', '0');
INSERT INTO `chonglou_options` VALUES ('43', '2', '尾页', '拉萨的空间放大圣诞快乐分', '1', '1', '', '0');

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
-- Table structure for chonglou_test
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_test`;
CREATE TABLE `chonglou_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL COMMENT '名称',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  `edit_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_test
-- ----------------------------

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
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
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
INSERT INTO `chonglou_user` VALUES ('1', 'orx', 'lbmzorx@163.com', null, 'R93myqD6Vv5Zk7c9Wj8RhRYbos3C-Lzw', '$2y$13$X291dbSp32i9Re3tfsZS9O16h2.vL8L4.ho7wmA6RjwCAG70wIQrq', null, '10', null, '10', '1517058710', null);

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
-- Table structure for chonglou_user_info
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user_info`;
CREATE TABLE `chonglou_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sign` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user_info
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

-- ----------------------------
-- Table structure for chonglou_user_score
-- ----------------------------
DROP TABLE IF EXISTS `chonglou_user_score`;
CREATE TABLE `chonglou_user_score` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `wealth` bigint(20) DEFAULT NULL,
  `prestige` bigint(20) DEFAULT NULL,
  `score` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chonglou_user_score
-- ----------------------------
