-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2015 年 10 月 22 日 10:03
-- 服务器版本: 5.5.16-log
-- PHP 版本: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `boss`
--

-- --------------------------------------------------------

--
-- 表的结构 `roc_attachment`
--

DROP TABLE IF EXISTS `roc_attachment`;
CREATE TABLE IF NOT EXISTS `roc_attachment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `path` varchar(128) NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`uid`,`tid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_favorite`
--

DROP TABLE IF EXISTS `roc_favorite`;
CREATE TABLE IF NOT EXISTS `roc_favorite` (
  `fid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `fuid` (`fid`),
  KEY `id` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_floor`
--

DROP TABLE IF EXISTS `roc_floor`;
CREATE TABLE IF NOT EXISTS `roc_floor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL,
  `content` varchar(120) NOT NULL,
  `posttime` int(11) NOT NULL,
  PRIMARY KEY (`id`,`pid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_follow`
--

DROP TABLE IF EXISTS `roc_follow`;
CREATE TABLE IF NOT EXISTS `roc_follow` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`fuid`),
  KEY `uid` (`uid`),
  KEY `fuid` (`fuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- 表的结构 `roc_notification`
--

DROP TABLE IF EXISTS `roc_notification`;
CREATE TABLE IF NOT EXISTS `roc_notification` (
  `nid` mediumint(8) NOT NULL AUTO_INCREMENT,
  `atuid` mediumint(8) NOT NULL,
  `uid` mediumint(8) NOT NULL,
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fid` int(11) unsigned NOT NULL,
  `isread` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  PRIMARY KEY (`nid`),
  KEY `atuid` (`atuid`,`isread`,`nid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_praise`
--

DROP TABLE IF EXISTS `roc_praise`;
CREATE TABLE IF NOT EXISTS `roc_praise` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`uid`,`tid`),
  KEY `uid` (`uid`),
  KEY `fuid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_reply`
--

DROP TABLE IF EXISTS `roc_reply`;
CREATE TABLE IF NOT EXISTS `roc_reply` (
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) NOT NULL,
  `content` varchar(250) NOT NULL,
  `client` varchar(16) NOT NULL,
  `posttime` int(11) NOT NULL,
  PRIMARY KEY (`pid`,`tid`,`uid`),
  KEY `tid` (`tid`,`pid`),
  KEY `uid` (`uid`,`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `roc_reply`
--

INSERT INTO `roc_reply` (`pid`, `tid`, `uid`, `content`, `client`, `posttime`) VALUES
(1, 4, 1, '<p>3232323<br></p>', 'Windows 7', 1445407272);

-- --------------------------------------------------------

--
-- 表的结构 `roc_score`
--

DROP TABLE IF EXISTS `roc_score`;
CREATE TABLE IF NOT EXISTS `roc_score` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `changed` smallint(6) NOT NULL,
  `remain` mediumint(8) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `roc_score`
--

INSERT INTO `roc_score` (`id`, `uid`, `changed`, `remain`, `type`, `time`) VALUES
(1, 1, 10, 5010, 3, 1445392210),
(2, 1, 2, 5012, 1, 1445392295),
(3, 1, 2, 5014, 1, 1445398819),
(4, 1, 2, 5016, 1, 1445399001),
(5, 1, 1, 5017, 2, 1445407272),
(6, 1, 2, 5019, 1, 1445407330),
(7, 1, 2, 5021, 1, 1445418720);

-- --------------------------------------------------------

--
-- 表的结构 `roc_system`
--

DROP TABLE IF EXISTS `roc_system`;
CREATE TABLE IF NOT EXISTS `roc_system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `roc_system`
--

INSERT INTO `roc_system` (`id`, `name`, `value`) VALUES
(1, 'sitename', '站点名'),
(2, 'keywords', '关键词1 关键词2 关键词3'),
(3, 'description', '您的网站描述'),
(4, 'rockey', '39d3#32k%d&2890'),
(5, 'ad', '这里是广告位'),
(6, 'join_switch', '1'),
(7, 'scores_register', '25'),
(8, 'scores_topic', '2'),
(9, 'scores_reply', '1'),
(10, 'scores_praise', '1'),
(11, 'scores_whisper', '5'),
(12, 'scores_sign', '10'),
(13, 'appid', ''),
(14, 'appkey', ''),
(15, 'notice', '这是公告'),
(16, 'theme', 'rocboss'),
(17, 'smtp_server', ''),
(18, 'smtp_port', ''),
(19, 'smtp_user', ''),
(20, 'smtp_password', '');

-- --------------------------------------------------------

--
-- 表的结构 `roc_tag`
--

DROP TABLE IF EXISTS `roc_tag`;
CREATE TABLE IF NOT EXISTS `roc_tag` (
  `tagid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT '0' COMMENT '分类',
  `tagname` varchar(16) NOT NULL,
  `used` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tagid`,`tagname`,`used`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `roc_tag`
--

INSERT INTO `roc_tag` (`tagid`, `type`, `tagname`, `used`) VALUES
(1, 1, '并发症', 3),
(2, 1, '医疗美容', 1),
(3, 1, '手术交流', 1),
(4, 1, '心理辅导', 1),
(5, 1, '语言圈子', 1),
(6, 1, '就诊攻略', 1),
(7, 1, '亲子养成', 1),
(8, 1, '八卦闲聊', 1),
(9, 1, '公益捐助', 1),
(10, 1, '使用规则', 1);

-- --------------------------------------------------------

--
-- 表的结构 `roc_topic`
--

DROP TABLE IF EXISTS `roc_topic`;
CREATE TABLE IF NOT EXISTS `roc_topic` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) NOT NULL,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `comments` mediumint(8) NOT NULL DEFAULT '0',
  `client` varchar(16) DEFAULT NULL,
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islock` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `posttime` int(11) NOT NULL,
  `lasttime` int(11) NOT NULL,
  PRIMARY KEY (`tid`,`uid`,`title`),
  KEY `uid` (`uid`,`tid`),
  KEY `cid` (`lasttime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `roc_topic`
--

INSERT INTO `roc_topic` (`tid`, `uid`, `title`, `content`, `comments`, `client`, `istop`, `islock`, `posttime`, `lasttime`) VALUES
(1, 1, '222222222222', '<p>11111111111<br></p>', 0, 'Windows 7', 0, 0, 1445392295, 1445392295),
(2, 1, '333333', '<p>11111111111<br></p>', 0, 'Windows 7', 0, 0, 1445392295, 1445392295),
(3, 1, '4444444', '<p>445555555555555<br></p>', 0, 'Windows 7', 0, 0, 1445398819, 1445398819),
(4, 1, '333', '<p>222<br></p>', 1, 'Windows 7', 1, 0, 1445399001, 1445407272),
(5, 1, '44444444444', '<p>44444444444<br></p>', 0, 'Windows 7', 0, 0, 1445407330, 1445407330),
(6, 1, '7777', '<p>7777<br></p>', 0, 'Windows 7', 0, 0, 1445418720, 1445418720);

-- --------------------------------------------------------

--
-- 表的结构 `roc_topic_tag_connection`
--

DROP TABLE IF EXISTS `roc_topic_tag_connection`;
CREATE TABLE IF NOT EXISTS `roc_topic_tag_connection` (
  `tid` int(11) unsigned NOT NULL,
  `tagid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`tid`,`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- 转存表中的数据 `roc_topic_tag_connection`
--

INSERT INTO `roc_topic_tag_connection` (`tid`, `tagid`) VALUES
(1, 1),
(2, 2),
(3, 11),
(4, 1),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- 表的结构 `roc_user`
--

DROP TABLE IF EXISTS `roc_user`;
CREATE TABLE IF NOT EXISTS `roc_user` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(26) NOT NULL,
  `email` char(36) NOT NULL,
  `signature` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `regtime` int(11) NOT NULL,
  `lasttime` int(11) NOT NULL,
  `qqid` char(32) NOT NULL,
  `scores` mediumint(8) unsigned NOT NULL,
  `money` mediumint(8) unsigned NOT NULL,
  `groupid` tinyint(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `nickname` (`username`),
  KEY `email` (`email`),
  KEY `qqid` (`qqid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `roc_user`
--

INSERT INTO `roc_user` (`uid`, `username`, `email`, `signature`, `password`, `regtime`, `lasttime`, `qqid`, `scores`, `money`, `groupid`) VALUES
(1, 'admin', 'admin@admin', '我是管理员', 'e10adc3949ba59abbe56e057f20f883e', 1432384146, 1445478956, '', 5021, 0, 9);

-- --------------------------------------------------------

--
-- 表的结构 `roc_user_reset`
--

DROP TABLE IF EXISTS `roc_user_reset`;
CREATE TABLE IF NOT EXISTS `roc_user_reset` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `code` char(16) NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `roc_whisper`
--

DROP TABLE IF EXISTS `roc_whisper`;
CREATE TABLE IF NOT EXISTS `roc_whisper` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `atuid` mediumint(8) unsigned NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL,
  `content` varchar(255) NOT NULL,
  `posttime` int(11) NOT NULL,
  `isread` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `del_flag` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atuid` (`atuid`,`isread`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
