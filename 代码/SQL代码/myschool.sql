/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50738
Source Host           : localhost:3306
Source Database       : myschool

Target Server Type    : MYSQL
Target Server Version : 50738
File Encoding         : 65001

Date: 2022-05-21 23:21:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `s_id` int(7) NOT NULL,
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_sex` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `s_age` int(11) NOT NULL,
  `s_course` char(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1900001', '李四', '男', '20', 'CS');
INSERT INTO `students` VALUES ('1912321', '林七', '女', '19', 'CS');
INSERT INTO `students` VALUES ('1900101', '王五', '男', '23', 'CS');
INSERT INTO `students` VALUES ('2000565', '张三', '男', '18', 'IS');
INSERT INTO `students` VALUES ('1956767', '赵六', '女', '19', 'CS');

-- ----------------------------
-- Table structure for s_score
-- ----------------------------
DROP TABLE IF EXISTS `s_score`;
CREATE TABLE `s_score` (
  `s_no` int(7) NOT NULL,
  `co_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_sco` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of s_score
-- ----------------------------
INSERT INTO `s_score` VALUES ('1900001', '数据库', '60');
INSERT INTO `s_score` VALUES ('1900001', 'C++', '50');
INSERT INTO `s_score` VALUES ('1900001', 'PHP', '60');
INSERT INTO `s_score` VALUES ('1912321', '数据库', '70');
INSERT INTO `s_score` VALUES ('1912321', 'C++', '80');
INSERT INTO `s_score` VALUES ('1912321', 'PHP', '80');
INSERT INTO `s_score` VALUES ('1900101', '数据库', '50');
INSERT INTO `s_score` VALUES ('1900101', 'C++', '70');
INSERT INTO `s_score` VALUES ('1900101', 'PHP', '30');
INSERT INTO `s_score` VALUES ('2000565', '数据库', '50');
INSERT INTO `s_score` VALUES ('2000565', 'C++', '90');
INSERT INTO `s_score` VALUES ('2000565', 'PHP', '60');
INSERT INTO `s_score` VALUES ('1956767', '数据库', '98');
INSERT INTO `s_score` VALUES ('1956767', 'C++', '90');
INSERT INTO `s_score` VALUES ('1956767', 'PHP', '99');
INSERT INTO `s_score` VALUES ('1900101', '数据库', '98');
INSERT INTO `s_score` VALUES ('1900101', 'C++', '90');
INSERT INTO `s_score` VALUES ('1900101', 'PHP', '99');
