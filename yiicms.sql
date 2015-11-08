/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2015-11-08 23:58:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('普通管理员', '2', '1446982381');
INSERT INTO `auth_assignment` VALUES ('超级管理员', '1', '1446975870');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', '所有权限', null, null, '1445273347', '1446387351');
INSERT INTO `auth_item` VALUES ('/main/default/*', '2', '首页测试（所有）', null, null, '1446986681', '1446986681');
INSERT INTO `auth_item` VALUES ('/setting/*', '2', '权限管理（所有）', null, null, '1445273367', '1446980086');
INSERT INTO `auth_item` VALUES ('/setting/permission', '2', '权限列表（菜单）', null, null, '1446978274', '1446978274');
INSERT INTO `auth_item` VALUES ('/setting/permission/*', '2', '权限列表（所有）', null, null, '1446978304', '1446978304');
INSERT INTO `auth_item` VALUES ('/setting/permission/create', '2', '权限列表（新增）', null, null, '1446978386', '1446978386');
INSERT INTO `auth_item` VALUES ('/setting/permission/delete', '2', '权限列表（删除）', null, null, '1446978795', '1446978795');
INSERT INTO `auth_item` VALUES ('/setting/permission/update', '2', '权限列表（修改）', null, null, '1446978532', '1446978532');
INSERT INTO `auth_item` VALUES ('/setting/permission/view', '2', '权限列表（授权）', null, null, '1446978634', '1446978634');
INSERT INTO `auth_item` VALUES ('/setting/roles', '2', '角色管理（菜单）', null, null, '1446385324', '1446977972');
INSERT INTO `auth_item` VALUES ('/setting/roles/*', '2', '角色管理（所有）', null, null, '1446977859', '1446977859');
INSERT INTO `auth_item` VALUES ('/setting/roles/create', '2', '角色管理（新增）', null, null, '1446385374', '1446976895');
INSERT INTO `auth_item` VALUES ('/setting/roles/delete', '2', '角色管理（删除）', null, null, '1446977154', '1446977154');
INSERT INTO `auth_item` VALUES ('/setting/roles/update', '2', '角色管理（修改）', null, null, '1446977126', '1446977126');
INSERT INTO `auth_item` VALUES ('/setting/roles/view', '2', '角色管理（授权）', null, null, '1446385418', '1446976924');
INSERT INTO `auth_item` VALUES ('/setting/route', '2', '路由列表（菜单）', null, null, '1446979171', '1446979171');
INSERT INTO `auth_item` VALUES ('/setting/route/*', '2', '路由列表（所有）', null, null, '1446979317', '1446979317');
INSERT INTO `auth_item` VALUES ('/setting/route/create', '2', '路由列表（新增）', null, null, '1446979199', '1446979199');
INSERT INTO `auth_item` VALUES ('/setting/route/delete', '2', '路由列表（删除）', null, null, '1446979221', '1446979221');
INSERT INTO `auth_item` VALUES ('/setting/rule', '2', '规则列表（菜单）', null, null, '1446979291', '1446979291');
INSERT INTO `auth_item` VALUES ('/setting/rule/*', '2', '规则列表（所有）', null, null, '1446979531', '1446979531');
INSERT INTO `auth_item` VALUES ('/setting/rule/create', '2', '规则列表（新增）', null, null, '1446979544', '1446979544');
INSERT INTO `auth_item` VALUES ('/setting/rule/delete', '2', '规则列表（删除）', null, null, '1446979583', '1446979583');
INSERT INTO `auth_item` VALUES ('/setting/rule/update', '2', '规则列表（修改）', null, null, '1446979567', '1446979567');
INSERT INTO `auth_item` VALUES ('/setting/rule/view', '2', '规则列表（详情）', null, null, '1446979599', '1446979599');
INSERT INTO `auth_item` VALUES ('/setting/user', '2', '用户管理（菜单）', null, null, '1446385148', '1446978141');
INSERT INTO `auth_item` VALUES ('/setting/user/*', '2', '用户管理（所有）', null, null, '1446978175', '1446978175');
INSERT INTO `auth_item` VALUES ('/setting/user/create', '2', '用户管理（新增）', null, null, '1446977571', '1446977571');
INSERT INTO `auth_item` VALUES ('/setting/user/delete', '2', '用户管理（删除）', null, null, '1446977488', '1446977488');
INSERT INTO `auth_item` VALUES ('/setting/user/update', '2', '用户管理（修改）', null, null, '1446977393', '1446977393');
INSERT INTO `auth_item` VALUES ('/setting/user/view', '2', '用户管理（授权）', null, null, '1446977422', '1446977422');
INSERT INTO `auth_item` VALUES ('普通管理员', '1', '普通管理员', null, null, '1441387384', '1446980380');
INSERT INTO `auth_item` VALUES ('权限1', '2', '权限1', null, null, '1445273626', '1445273626');
INSERT INTO `auth_item` VALUES ('权限2', '2', '权限2', null, null, '1446890040', '1446975846');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '拥有所有权限', null, null, '1440871961', '1446885517');
INSERT INTO `auth_item` VALUES ('运营人员', '1', '运营人员使用', null, null, '1441387433', '1441388506');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('权限1', '/*');
INSERT INTO `auth_item_child` VALUES ('权限2', '/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/*');
INSERT INTO `auth_item_child` VALUES ('普通管理员', '/main/default/*');
INSERT INTO `auth_item_child` VALUES ('权限1', '/setting/*');
INSERT INTO `auth_item_child` VALUES ('普通管理员', '/setting/permission/*');
INSERT INTO `auth_item_child` VALUES ('普通管理员', '/setting/roles/*');
INSERT INTO `auth_item_child` VALUES ('普通管理员', '/setting/rule/*');
INSERT INTO `auth_item_child` VALUES ('运营人员', '/setting/user');
INSERT INTO `auth_item_child` VALUES ('普通管理员', '/setting/user/*');
INSERT INTO `auth_item_child` VALUES ('运营人员', '权限1');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '权限2');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('测试的路由规则', 'O:49:\"backend\\modules\\setting\\components\\rule\\RouteRule\":3:{s:4:\"name\";s:21:\"测试的路由规则\";s:9:\"createdAt\";i:1441469215;s:9:\"updatedAt\";i:1446978893;}', '1441469215', '1446978893');

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1437915696');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1437915793');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'lZHrN6Oy1Bla-WvVn0fiYfoTxCAgqtot', '$2y$13$8Ns5gf6zGv2lYyOl8fRq1OwWdBKfsgiZwOAatcHV6iFLgkFokzW9G', null, 'admin@qq.com', '10', '10', '1436457600', '1440872954');
INSERT INTO `user` VALUES ('2', '傻瓜爱白痴', 'D4NOZlQAGosriujsF7olHW60mT6U_rOf', '$2y$13$5RpUf9qLicVzot5c34j0segKOJr3YBITZ/AjsE0GgtBDuSgo78Ux2', null, '1044748759@qq.com', '10', '10', '1439308800', '1439054335');
