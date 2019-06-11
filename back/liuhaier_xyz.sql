/*
 Navicat Premium Data Transfer

 Source Server         : db
 Source Server Type    : MySQL
 Source Server Version : 50722
 Source Host           : 106.14.157.75:3306
 Source Schema         : liuhaier_xyz

 Target Server Type    : MySQL
 Target Server Version : 50722
 File Encoding         : 65001

 Date: 02/06/2019 23:22:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for be_admin
-- ----------------------------
DROP TABLE IF EXISTS `be_admin`;
CREATE TABLE `be_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,
  `password` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL,
  `status` int(3) NOT NULL DEFAULT 1,
  `create_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  `last_time` int(11) NULL DEFAULT NULL,
  `count` tinyint(5) NULL DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_admin
-- ----------------------------
INSERT INTO `be_admin` VALUES (1, 'admin', 'a9ddd2e7bdff202e3e9bca32765e9ba0', 1, 1538743898, 1557908810, 1559487774, 2, '');
INSERT INTO `be_admin` VALUES (33, 'test', '4bd9c8dfaaa703aeeab4bb73f7c82c00', 1, 1557915551, 1559488438, 1559488485, NULL, '');

-- ----------------------------
-- Table structure for be_article
-- ----------------------------
DROP TABLE IF EXISTS `be_article`;
CREATE TABLE `be_article`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `keywords` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `pic` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `click` int(64) NULL DEFAULT 0 COMMENT '点赞',
  `create_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  `sort` int(11) NULL DEFAULT 10000,
  `cid` int(11) NULL DEFAULT NULL,
  `rec` int(5) NULL DEFAULT 0 COMMENT '是否推荐',
  `look` int(64) NULL DEFAULT 0 COMMENT '浏览',
  `rec_time` int(11) NULL DEFAULT NULL COMMENT '推荐时间',
  `like_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_article
-- ----------------------------
INSERT INTO `be_article` VALUES (57, '永久激活win10', 'win10,激活', '', '/uploads/20190523/4cf53078e383c326c0efcdef0133b0fe.jpg', '%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%E5%9C%A8%E6%A1%8C%E9%9D%A2%E5%B7%A6%E4%B8%8B%E8%A7%92%E7%9A%84%E2%80%9Ccortana%E2%80%9D%E6%90%9C%E7%B4%A2%E6%A1%86%E4%B8%AD%E8%BE%93%E5%85%A5%E2%80%9CCMD%E2%80%9D%EF%BC%8C%E5%BE%85%E5%87%BA%E7%8E%B0%E2%80%9C%E5%91%BD%E4%BB%A4%E6%8F%90%E7%A4%BA%E7%AC%A6%E2%80%9D%E5%B7%A5%E5%85%B7%E6%97%B6%EF%BC%8C%E5%8F%B3%E5%87%BB%E9%80%89%E6%8B%A9%E2%80%9C%E4%BB%A5%E7%AE%A1%E7%90%86%E5%91%98%E8%BA%AB%E4%BB%BD%E2%80%9D%E8%BF%90%E8%A1%8C%EF%BC%9B%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%E4%BE%9D%E6%AC%A1%E8%BE%93%E5%87%BA%E4%BB%A5%E4%B8%8B%E5%91%BD%E4%BB%A4%EF%BC%9A%3C%2Fspan%3E%3C%2Fspan%3E%3C%2Fp%3E%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%3Cbr%2F%3E%3C%2Fspan%3E%3C%2Fspan%3E%3C%2Fp%3E%3Cpre+class%3D%22brush%3Aphp%3Btoolbar%3Afalse%22%3Eslmgr.vbs%26nbsp%3B%2Fupk%3C%2Fpre%3E%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%E6%AD%A4%E6%97%B6%E5%BC%B9%E5%87%BA%E7%AA%97%E5%8F%A3%E6%98%BE%E6%9C%AA%E2%80%9C%E5%B7%B2%E6%88%90%E5%8A%9F%E5%8D%B8%E8%BD%BD%E4%BA%86%E4%BA%A7%E5%93%81%E5%AF%86%E9%92%A5%E2%80%9D%E3%80%82%3C%2Fspan%3E%3C%2Fp%3E%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%3Cbr%2F%3E%3C%2Fspan%3E%3C%2Fp%3E%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%3C%2Fspan%3E%3C%2Fp%3E%3Cp+style%3D%22box-sizing%3A+border-box%3B+outline%3A+0px%3B+margin-top%3A+0px%3B+margin-bottom%3A+16px%3B+padding%3A+0px%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+color%3A%3D%22%22+line-height%3A%3D%22%22+overflow-x%3A%3D%22%22+overflow-wrap%3A%3D%22%22+white-space%3A%3D%22%22+background-color%3A%3D%22%22%3E%E6%8E%A5%E7%9D%80%E8%BE%93%E5%85%A5%E4%BB%A5%E4%B8%8B%E5%91%BD%E4%BB%A4%EF%BC%9A%3C%2Fp%3E%3Cpre+class%3D%22brush%3Aphp%3Btoolbar%3Afalse%22%3Eslmgr%26nbsp%3B%2Fipk%26nbsp%3BW269N-WFGWX-YVC9B-4J6C9-T83GX%3C%2Fpre%3E%3Cp+style%3D%22box-sizing%3A+border-box%3B+outline%3A+0px%3B+margin-top%3A+0px%3B+margin-bottom%3A+16px%3B+padding%3A+0px%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+color%3A%3D%22%22+line-height%3A%3D%22%22+overflow-x%3A%3D%22%22+overflow-wrap%3A%3D%22%22+white-space%3A%3D%22%22+background-color%3A%3D%22%22%3E%E5%BC%B9%E5%87%BA%E7%AA%97%E5%8F%A3%E6%8F%90%E7%A4%BA%EF%BC%9A%E2%80%9C%E6%88%90%E5%8A%9F%E7%9A%84%E5%AE%89%E8%A3%85%E4%BA%86%E4%BA%A7%E5%93%81%E5%AF%86%E9%92%A5%E2%80%9D%E3%80%82%3C%2Fp%3E%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%3Cbr%2F%3E%3C%2Fspan%3E%3C%2Fp%3E%3Cp+style%3D%22box-sizing%3A+border-box%3B+outline%3A+0px%3B+margin-top%3A+0px%3B+margin-bottom%3A+16px%3B+padding%3A+0px%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+color%3A%3D%22%22+line-height%3A%3D%22%22+overflow-x%3A%3D%22%22+overflow-wrap%3A%3D%22%22+white-space%3A%3D%22%22+background-color%3A%3D%22%22%3E%E7%BB%A7%E7%BB%AD%E8%BE%93%E5%85%A5%E4%BB%A5%E4%B8%8B%E5%91%BD%E4%BB%A4%EF%BC%9A%3C%2Fp%3E%3Cpre+class%3D%22brush%3Aphp%3Btoolbar%3Afalse%22%3Eslmgr%26nbsp%3B%2Fskms%26nbsp%3Bzh.us.to%3C%2Fpre%3E%3Cp+style%3D%22box-sizing%3A+border-box%3B+outline%3A+0px%3B+margin-top%3A+0px%3B+margin-bottom%3A+16px%3B+padding%3A+0px%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+color%3A%3D%22%22+line-height%3A%3D%22%22+overflow-x%3A%3D%22%22+overflow-wrap%3A%3D%22%22+white-space%3A%3D%22%22+background-color%3A%3D%22%22%3E%E5%BC%B9%E5%87%BA%E7%AA%97%E5%8F%A3%E6%8F%90%E7%A4%BA%EF%BC%9A%E2%80%9C%E5%AF%86%E9%92%A5%E7%AE%A1%E7%90%86%E6%9C%8D%E5%8A%A1%E8%AE%A1%E7%AE%97%E6%9C%BA%E5%90%8D%E6%88%90%E5%8A%9F%E7%9A%84%E8%AE%BE%E7%BD%AE%E4%B8%BAzh.us.to%E2%80%9D%E3%80%82%3C%2Fp%3E%3Cp%3E%3Cbr%2F%3E%3C%2Fp%3E%3Cp+style%3D%22box-sizing%3A+border-box%3B+outline%3A+0px%3B+margin-top%3A+0px%3B+margin-bottom%3A+16px%3B+padding%3A+0px%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+color%3A%3D%22%22+line-height%3A%3D%22%22+overflow-x%3A%3D%22%22+overflow-wrap%3A%3D%22%22+white-space%3A%3D%22%22+background-color%3A%3D%22%22%3E%E6%8E%A5%E4%B8%8B%E6%9D%A5%E8%BE%93%E5%85%A5%E4%BB%A5%E4%B8%8B%E5%91%BD%E4%BB%A4%EF%BC%9A%3C%2Fp%3E%3Cpre+class%3D%22brush%3Aphp%3Btoolbar%3Afalse%22%3Eslmgr%26nbsp%3B%2Fato%3C%2Fpre%3E%3Cp+style%3D%22box-sizing%3A+border-box%3B+outline%3A+0px%3B+margin-top%3A+0px%3B+margin-bottom%3A+16px%3B+padding%3A+0px%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+color%3A%3D%22%22+line-height%3A%3D%22%22+overflow-x%3A%3D%22%22+overflow-wrap%3A%3D%22%22+white-space%3A%3D%22%22+background-color%3A%3D%22%22%3E%E6%AD%A4%E6%97%B6%E5%B0%86%E5%BC%B9%E5%87%BA%E7%AA%97%E5%8F%A3%E6%8F%90%E7%A4%BA%EF%BC%9A%E2%80%9C%E6%88%90%E5%8A%9F%E7%9A%84%E6%BF%80%E6%B4%BB%E4%BA%86%E4%BA%A7%E5%93%81%E2%80%9D%E3%80%82%3C%2Fp%3E%3Cp%3E%3Cbr%2F%3E%3C%2Fp%3E%3Cp%3E%3Cspan+style%3D%22color%3A+rgb%2879%2C+79%2C+79%29%3B+font-family%3A+%22+microsoft%3D%22%22+sf%3D%22%22+pro%3D%22%22+pingfang%3D%22%22+background-color%3A%3D%22%22%3E%E6%9C%80%E5%90%8E%E5%B0%B1%E5%8F%AF%E4%BB%A5%E5%86%8D%E6%AC%A1%E6%9F%A5%E7%9C%8B%E5%BD%93%E5%89%8DWin10%E6%AD%A3%E5%BC%8F%E4%B8%93%E4%B8%9A%E7%89%88%E7%B3%BB%E7%BB%9F%E7%9A%84%E6%BF%80%E6%B4%BB%E7%8A%B6%E6%80%81%E5%95%A6%E3%80%82%E5%A6%82%E5%9B%BE%E6%89%80%E7%A4%BA%EF%BC%8C%E8%A1%A8%E6%98%8E%E5%B7%B2%E6%88%90%E5%8A%9F%E6%BF%80%E6%B4%BBWin10%E6%AD%A3%E5%BC%8F%E4%B8%93%E4%B8%9A%E7%89%88%E7%B3%BB%E7%BB%9F%E3%80%82%3C%2Fspan%3E%3C%2Fp%3E%3Cp%3E%3Cbr%2F%3E%3C%2Fp%3E%3Cp%3E%3Cbr%2F%3E%3C%2Fp%3E', 0, 1558577405, 1558602293, 10000, 35, 0, 8, 1558577518, NULL);

-- ----------------------------
-- Table structure for be_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `be_auth_group`;
CREATE TABLE `be_auth_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `rules` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_auth_group
-- ----------------------------
INSERT INTO `be_auth_group` VALUES (4, 'test用户', 1, '27,28,31,32,65,66,69,70,82,59,61,35,36,37,38');

-- ----------------------------
-- Table structure for be_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `be_auth_group_access`;
CREATE TABLE `be_auth_group_access`  (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_auth_group_access
-- ----------------------------
INSERT INTO `be_auth_group_access` VALUES (1, 4);
INSERT INTO `be_auth_group_access` VALUES (33, 4);

-- ----------------------------
-- Table structure for be_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `be_auth_rule`;
CREATE TABLE `be_auth_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1菜单(只是做下拉框) 2列表(显示数据) 3不显示(删除或者修改等隐藏操作)',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `condition` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `pid` mediumint(9) NULL DEFAULT 0,
  `level` tinyint(1) NULL DEFAULT NULL,
  `sort` int(5) NULL DEFAULT 1000,
  `style` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_fun` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_auth_rule
-- ----------------------------
INSERT INTO `be_auth_rule` VALUES (27, 'Article', '文章管理', 1, 1, '', 0, 0, 8000, 'fa-cloud', 0);
INSERT INTO `be_auth_rule` VALUES (28, 'article/index', '文章列表', 2, 1, '', 27, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (29, 'article/edit', '文章修改', 2, 1, '', 27, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (30, 'article/delete', '文章删除', 2, 1, '', 27, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (31, 'Cate', '栏目管理', 1, 1, '', 0, 0, 7000, 'fa-align-justify', 0);
INSERT INTO `be_auth_rule` VALUES (32, 'cate/index', '栏目列表', 2, 1, '', 31, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (33, 'cate/edit', '栏目修改', 2, 1, '', 31, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (34, 'cate/delete', '栏目删除', 2, 1, '', 31, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (35, 'Data', '数据备份/还原', 1, 1, '', 0, 0, 1000, 'fa-desktop', 0);
INSERT INTO `be_auth_rule` VALUES (36, 'data/index', '列表', 2, 1, '', 35, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (37, 'Img', '轮播图管理', 1, 1, '', 0, 0, 1000, 'fa-caret-square-o-left', 0);
INSERT INTO `be_auth_rule` VALUES (38, 'img/index', '轮播图列表', 2, 1, '', 37, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (39, 'img/edit', '轮播图修改', 2, 1, '', 37, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (40, 'img/delete', '轮播图删除', 2, 1, '', 37, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (41, 'Admin', '管理员', 1, 1, '', 0, 0, 9000, 'fa-users', 0);
INSERT INTO `be_auth_rule` VALUES (42, 'admin/index', '管理员列表', 2, 1, '', 41, 1, 1000, '0', 0);
INSERT INTO `be_auth_rule` VALUES (43, 'admin/edit', '管理员修改', 2, 1, '', 41, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (44, 'admin/delete', '管理员删除', 2, 1, '', 41, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (45, 'Conf', '系统', 1, 1, '', 0, 0, 1000, 'fa-gear', 0);
INSERT INTO `be_auth_rule` VALUES (46, 'conf/index', '配置项', 2, 1, '', 45, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (47, 'conf/lists', '配置列表（配置功能）', 2, 1, '', 45, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (48, 'conf/edit', '配置项修改', 2, 1, '', 45, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (49, 'conf/delete', '配置项删除', 2, 1, '', 45, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (51, 'data/importdata', '备份', 2, 1, '', 35, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (52, 'data/backdata', '还原', 2, 1, '', 35, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (59, 'auth_group/index', '权限用户组列表', 2, 1, '', 82, 1, 1030, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (60, 'auth_group/delete', '权限用户组删除', 2, 1, '', 82, 1, 1040, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (61, 'auth_rule/index', '权限列表', 2, 1, '', 81, 1, 1004, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (62, 'auth_group/edit', '权限用户组修改', 2, 1, '', 82, 1, 1020, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (63, 'auth_rule/delete', '权限列表删除', 2, 1, '', 81, 1, 1002, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (64, 'auth_rule/edit', '权限列表修改', 3, 1, '', 81, 1, 1003, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (65, 'Comment', '评论管理', 1, 1, '', 0, 0, 1000, 'fa-comment', 0);
INSERT INTO `be_auth_rule` VALUES (66, 'comment/index', '评论列表', 2, 1, '', 65, 1, 1000, '', 0);
INSERT INTO `be_auth_rule` VALUES (67, 'comment/delete', '评论删除', 2, 1, '', 65, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (68, 'comment/edit', '评论修改', 2, 1, '', 65, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (69, 'Link', '友情链接', 1, 1, '', 0, 0, 1000, 'fa-link', 0);
INSERT INTO `be_auth_rule` VALUES (70, 'link/index', '链接列表', 2, 1, '', 69, 1, 1000, NULL, 0);
INSERT INTO `be_auth_rule` VALUES (71, 'link/delete', '链接删除', 2, 1, '', 69, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (72, 'link/edit', '链接修改', 2, 1, '', 69, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (73, 'link/add', '链接添加', 2, 1, '', 69, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (74, 'img/add', '轮播图添加', 2, 1, '', 37, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (75, 'cate/add', '栏目添加', 2, 1, '', 31, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (76, 'article/add', '文章添加', 2, 1, '', 27, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (77, 'conf/add', '配置项添加', 2, 1, '', 45, 1, 1000, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (78, 'admin/add', '管理员添加', 2, 1, '', 41, 1, 1000, '0', 1);
INSERT INTO `be_auth_rule` VALUES (79, 'auth_group/add', '权限用户组添加', 2, 1, '', 82, 1, 1010, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (80, 'auth_rule/add', '权限列表添加', 2, 1, '', 81, 1, 1001, NULL, 1);
INSERT INTO `be_auth_rule` VALUES (81, 'AuthRule', '权限列表管理', 1, 1, '', 0, 0, 1000, ' fa-list-ul', 0);
INSERT INTO `be_auth_rule` VALUES (82, 'AuthGroup', '权限用户组', 1, 1, '', 0, 0, 1000, 'fa-fighter-jet', 0);
INSERT INTO `be_auth_rule` VALUES (83, 'conf/awesome', '图标库', 1, 1, '', 45, 1, 1000, '0', 0);

-- ----------------------------
-- Table structure for be_cate
-- ----------------------------
DROP TABLE IF EXISTS `be_cate`;
CREATE TABLE `be_cate`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `desc` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `type` tinyint(1) NULL DEFAULT 0,
  `sort` int(11) NULL DEFAULT 10000,
  `create_time` int(11) NULL DEFAULT NULL,
  `content` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `pid` int(11) NULL DEFAULT NULL COMMENT '上级id',
  `edit_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_cate
-- ----------------------------
INSERT INTO `be_cate` VALUES (14, '随笔集', '', '', 1, 10000, 1538897944, '', 0, 1558023302);
INSERT INTO `be_cate` VALUES (15, 'Laravel55', '', '', 1, 10000, 1538897964, '', 14, 1542592954);
INSERT INTO `be_cate` VALUES (16, 'ThinkPHP5', '', '', 1, 10000, 1538897977, '', 14, 1542592935);
INSERT INTO `be_cate` VALUES (17, '图库', '', '', 3, 80, 1538898108, '', 0, 1541648112);
INSERT INTO `be_cate` VALUES (18, '代码', '', '', 1, 70, 1538898120, '', 0, 1552143480);
INSERT INTO `be_cate` VALUES (35, '二〇一九年', '', '', 1, 10000, 1539093243, '', 36, 1542870378);
INSERT INTO `be_cate` VALUES (36, '闲言', '', '', 1, 10000, 1539093339, '', 0, 1544079248);
INSERT INTO `be_cate` VALUES (39, '二〇一七年', '', '', 1, 10000, 1539093722, '', 36, 1542870168);
INSERT INTO `be_cate` VALUES (40, '二〇一八年', '', '', 1, 10000, 1539093339, '', 36, 1542870181);
INSERT INTO `be_cate` VALUES (41, '关于我', '', '', 2, 60, 1539486240, '%3Cp+style%3D%22text-align%3A+left%3B%22%3E%E5%B0%8F%E4%BC%99%E4%BC%B4%E4%BB%AC%2C%E4%BD%A0%E4%BB%AC%E5%A5%BD%EF%BC%81%3Cimg+src%3D%22http%3A%2F%2Fimg.baidu.com%2Fhi%2Fjx2%2Fj_0002.gif%22+width%3D%2220%22+height%3D%2224%22+style%3D%22width%3A+20px%3B+height%3A+24px%3B%22%2F%3E%3C%2Fp%3E%3Cp+style%3D%22text-align%3A+left%3B%22%3E%E6%88%91%E6%98%AF%E6%9C%AC%E5%8D%9A%E5%AE%A2%E7%9A%84%E5%8D%9A%E4%B8%BB%2C%E4%BD%A0%E4%BB%AC%E5%8F%AF%E4%BB%A5%E5%8F%AB%E6%88%91%3Cstrong%3E%E9%98%BF%E6%B5%B7%3C%2Fstrong%3E%E3%80%82%3Cimg+src%3D%22http%3A%2F%2Fimg.baidu.com%2Fhi%2Fjx2%2Fj_0002.gif%22+width%3D%2220%22+height%3D%2224%22+style%3D%22white-space%3A+normal%3B+width%3A+20px%3B+height%3A+24px%3B%22%2F%3E%3C%2Fp%3E%3Cp+style%3D%22text-align%3A+left%3B%22%3E%E6%9C%AC%E4%BA%BA%E5%9C%A8%E5%85%B1%E9%9D%92%E5%B0%B1%E8%AF%BB%2C%E5%A6%82%E6%9C%89%E4%BB%80%E4%B9%88%E9%97%AE%E9%A2%98%E5%8F%AF%E4%BB%A5%E8%81%94%E7%B3%BB%E6%88%91%E3%80%82%3C%2Fp%3E%3Cp+style%3D%22text-align%3A+left%3B%22%3E%3Cbr%2F%3E%3C%2Fp%3E%3Cp+style%3D%22text-align%3A+center%3B%22%3E%3Cimg+src%3D%22%2Fueditor%2Fphp%2Fupload%2Fimage%2F20190310%2F1552213238.jpg%22+title%3D%221552213238.jpg%22+alt%3D%22bg-11.jpg%22+width%3D%221102%22+height%3D%22603%22+style%3D%22width%3A+1102px%3B+height%3A+603px%3B%22%2F%3E%3C%2Fp%3E', 0, 1552213512);
INSERT INTO `be_cate` VALUES (42, 'Linux', '', '', 1, 10000, 1542593449, '', 14, NULL);
INSERT INTO `be_cate` VALUES (44, 'Git', '', '', 1, 10000, 1543664446, '', 14, NULL);
INSERT INTO `be_cate` VALUES (47, 'workman', '', '', 1, 10000, 1539093339, '', 14, 1552057560);

-- ----------------------------
-- Table structure for be_comment
-- ----------------------------
DROP TABLE IF EXISTS `be_comment`;
CREATE TABLE `be_comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `user_email` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `user_avatar` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `user_comment` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `aid` int(11) NULL DEFAULT NULL,
  `cid` int(11) NULL DEFAULT NULL,
  `status` tinyint(3) NULL DEFAULT 1 COMMENT '0禁止 1启用',
  `mid` int(11) NULL DEFAULT NULL COMMENT '回复管理员的id',
  `ip` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `path` varchar(25) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `send_email` bigint(5) NULL DEFAULT 0 COMMENT '1发送,0不发送',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_comment
-- ----------------------------

-- ----------------------------
-- Table structure for be_conf
-- ----------------------------
DROP TABLE IF EXISTS `be_conf`;
CREATE TABLE `be_conf`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cn_name` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `en_name` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `type` tinyint(3) NULL DEFAULT 1 COMMENT '配置类型:1:单行文本框、2:文本域、3:单选按钮、4:复选按钮、5:下拉菜单',
  `value` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL COMMENT '配置值',
  `values` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL COMMENT '配置可选值',
  `sort` int(11) NULL DEFAULT 10000,
  `create_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  `status` tinyint(3) NULL DEFAULT 1 COMMENT '中英文转换',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_conf
-- ----------------------------
INSERT INTO `be_conf` VALUES (1, '网站名称', 'seo_name', 1, '刘海 | LH\'Blog', '', 8, 1538814376, 1539012946, 1);
INSERT INTO `be_conf` VALUES (2, '网站关键字', 'keywords', 1, '个人技术博客,PHP,JQ,刘海,刘海的个人博客', '', 2, 1538814421, 1538831877, 1);
INSERT INTO `be_conf` VALUES (3, '网站描述', 'desc', 2, '个人技术博客，记录生活点点滴滴，分享PHP技术的个人博客', '', 1, 1538814507, NULL, 1);
INSERT INTO `be_conf` VALUES (4, '是否关闭网站', 'close', 3, '否', '是,否', 3, 1538814572, 1538840202, 1);
INSERT INTO `be_conf` VALUES (6, '导航栏是否固定', 'fixed', 4, '是', '是', 5, 1538824206, 1544842490, 1);
INSERT INTO `be_conf` VALUES (8, '网站申明', 'copyright', 1, '2018-2020', '', 6, 1538831582, 1539506514, 1);
INSERT INTO `be_conf` VALUES (9, '备案号', 'banquan', 1, '赣ICP备12004272号-3', '', 10000, 1539506562, 1539742949, 1);
INSERT INTO `be_conf` VALUES (10, '个性签名', 'qianming', 1, '乘风波浪会有时,直挂云帆破沧海', '', 10000, 1539506909, NULL, 1);
INSERT INTO `be_conf` VALUES (11, '页脚背景图', 'foot_background', 1, '', '', 10000, 1544603038, NULL, 1);
INSERT INTO `be_conf` VALUES (12, '轮播图特效', 'effect', 2, 'jQuery(\".slideBox\").slide({mainCell:\".bd ul\",effect:\"leftLoop\",autoPlay:true,delayTime:1000});', '', 10000, 1544603496, 1551890310, 1);

-- ----------------------------
-- Table structure for be_img
-- ----------------------------
DROP TABLE IF EXISTS `be_img`;
CREATE TABLE `be_img`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `desc` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `sort` int(11) NULL DEFAULT 10000,
  `status` tinyint(3) NULL DEFAULT 0 COMMENT '发布状态',
  `item` tinyint(1) NULL DEFAULT 0 COMMENT '第一展示',
  `rec_index` tinyint(3) NULL DEFAULT NULL COMMENT '广告位 1首页,2右侧',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_img
-- ----------------------------
INSERT INTO `be_img` VALUES (1, '/uploads/20190425/637674215883226372ddfc597291f23a.jpg', '吃鸡', '#', 1, 1, 1, NULL);
INSERT INTO `be_img` VALUES (10, '/uploads/20190425/a8b359a860ff641150a7fa0712266f70.jpg', '艺术气息', '#', 10000, 1, 0, NULL);
INSERT INTO `be_img` VALUES (11, '/uploads/20190425/b5a2761e9f68721792984d9c832e8540.jpg', '春风拂柳叶枝飞', '#', 10000, 1, 0, NULL);
INSERT INTO `be_img` VALUES (12, '/uploads/20190425/68ceb64ae7bd5ea122783eb51877084b.jpg', '复联', '#', 10000, 1, 0, NULL);
INSERT INTO `be_img` VALUES (13, '/uploads/20181120/136086e540a59938f321142d3282eaf8.png', '领红包', '', 10000, 1, 0, 1);
INSERT INTO `be_img` VALUES (14, '/uploads/20190516/21e392c59f03a6682142c2b2ff77fc1f.jpg', 'Free', '/page/41', 10000, 1, 0, 2);

-- ----------------------------
-- Table structure for be_link
-- ----------------------------
DROP TABLE IF EXISTS `be_link`;
CREATE TABLE `be_link`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `status` tinyint(3) NULL DEFAULT 1,
  `name` varchar(64) CHARACTER SET gbk COLLATE gbk_chinese_ci NULL DEFAULT NULL,
  `sort` int(11) NULL DEFAULT 10000,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_link
-- ----------------------------
INSERT INTO `be_link` VALUES (11, 'http://liuhai.fun./', '刘海的博客', 1, '刘海', 6);
-- ----------------------------
-- Table structure for be_reply
-- ----------------------------
DROP TABLE IF EXISTS `be_reply`;
CREATE TABLE `be_reply`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET gbk COLLATE gbk_chinese_ci NULL,
  `mid` int(11) NULL DEFAULT NULL COMMENT '回复id',
  `create_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = gbk COLLATE = gbk_chinese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of be_reply
-- ----------------------------
INSERT INTO `be_reply` VALUES (5, '<p>秀</p>', 14, 1557915489);

SET FOREIGN_KEY_CHECKS = 1;
