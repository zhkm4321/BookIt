/*
Navicat MySQL Data Transfer

Source Server         : xamppMYSQL
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : bookit

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-11-09 05:17:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `b_agen`
-- ----------------------------
DROP TABLE IF EXISTS `b_agen`;
CREATE TABLE `b_agen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `agen_name` varchar(255) NOT NULL,
  `agen_info` longtext,
  `sort_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_agen
-- ----------------------------
INSERT INTO `b_agen` VALUES ('2', '6', 'XXXX出版社', '', null);
INSERT INTO `b_agen` VALUES ('20', '9', '等公益金后速度发给', '<p>			</p><p>撒打发合肥将红烧肉和地方官号jgh j sdfhadh蹈赴汤火返回是东方红双方各</p><p style=\"text-align: center;\"><img src=\"/uploadfile/ueditor/image/20141107/1415352308222560.jpg\" title=\"1415352308222560.jpg\" alt=\"0109-02_webdesigners_vs_web.jpg\" width=\"370\" height=\"569\" style=\"width: 370px; height: 569px;\"/></p>', '4');
INSERT INTO `b_agen` VALUES ('28', '9', '通达海', '<p>真想见你发噶的境况个是嘎哈噶地方给哈斯蒂芬给后死风光好阿道夫后啊啥的风光好是费哈达飞嘎斯等飞嘎斯等飞</p>', '6');
INSERT INTO `b_agen` VALUES ('48', '9', '死做等法撒旦', '', '15');
INSERT INTO `b_agen` VALUES ('51', '7', 'ads风格大方给', '', '3');
INSERT INTO `b_agen` VALUES ('55', '8', '大法官撒打发皇贵妃', '<p>改好快退了天和公司和地方官号等飞给哈斯蒂芬后斯蒂芬嘎哈地方给哈达飞给<br/></p>', '1');
INSERT INTO `b_agen` VALUES ('56', '8', '和改扩建规划局哭', '', '2');
INSERT INTO `b_agen` VALUES ('57', '8', '复健科红歌会', '', '3');
INSERT INTO `b_agen` VALUES ('110', '8', '444', '', '4');
INSERT INTO `b_agen` VALUES ('111', '9', '555', '', '16');
INSERT INTO `b_agen` VALUES ('112', '7', '知道及擦地似懂非懂规范', '<p>是东方红阿道夫嘎斯等费撒等费该撒旦法光大法官发的给规划局哭天改好少废话第三方和购房人</p>', '4');

-- ----------------------------
-- Table structure for `b_book`
-- ----------------------------
DROP TABLE IF EXISTS `b_book`;
CREATE TABLE `b_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '书名',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `cover` varchar(255) DEFAULT NULL,
  `zjtj` longtext COMMENT '专家推荐',
  `nrjs` longtext COMMENT '内容介绍',
  `zyzj` longtext COMMENT '主要章节',
  `jczy` longtext COMMENT '精彩摘要',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_book
-- ----------------------------
INSERT INTO `b_book` VALUES ('1', '三国战记', '呵呵', null, '&lt;p&gt;的发生过费死到哈斯蒂芬给爱迪生飞嘎斯地方给三等功发送到费规范化&lt;/p&gt;', '&lt;p&gt;撒打发和死飞给哈斯蒂芬给斯蒂芬哈地方给和购房人h&lt;/p&gt;', '&lt;p&gt;的萨芬后死飞给哈斯蒂芬后地方官哈东方红将到房管局牛地方官加工费j&lt;/p&gt;', '');
INSERT INTO `b_book` VALUES ('2', '大材小用', '大牛', null, '', '', '', '');
INSERT INTO `b_book` VALUES ('3', '我的团长我的团', '兵家常事', null, '', '', '', '');
INSERT INTO `b_book` VALUES ('7', '《地图（人文版）》手绘世界地图·儿童百科绘本', '阿道夫光,只需的', null, '&lt;p&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;★世界各国广泛引进：美国、英国、法国、比利时、荷兰、德国、俄罗斯、意大利、挪威、立陶宛、芬兰、冰岛、日本、乌克兰、韩国、澳大利亚等。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　★荣获多国重要奖项。如：&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　法国：2013年度法国女巫奖最佳非虚构类图书奖。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　意大利：2013年度意大利安徒生奖最佳非虚构类图书奖。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　美国：2013年度《纽约时报》最有趣6本童书之一。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　俄罗斯：《福布斯杂志》2013年度最佳图书。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　★获得国外媒体如《纽约时报》《华尔街日报》高度好评。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　★受到读者欢迎。如美国，上市首日1万册销售一空。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　★超大信息量，符合信息时代的儿童需要。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　★丰富的细节、柔和别致的色彩、俏皮的笔触，尽显地球的可爱，是培养儿童探索世界、热爱地球的工具性绘本。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　★精装全彩大开本：8开，不用放大镜，一目了然。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　适读年龄：4-99岁&lt;/span&gt;&lt;/p&gt;', '&lt;p&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;介绍了7大洲、4大洋、南北极和42个国家，是一本不同于一般的地图，绘本式地呈现了边界、城市、河流、险峰，呈现了有代表性的动物、植物、历史、人文名胜、文化事件和很多与当地有关的奇妙趣闻。它以引人入胜的细节、柔和别致的时尚色彩、俏皮的笔触，描绘出了地球的可爱，是儿童认识地球和世界的工具性绘本，是为地图爱好者奉上的一场视觉盛宴。&lt;/span&gt;&lt;/p&gt;', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style-type: none; border: 0px; font-family: SimSun, Arial; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;&lt;strong&gt;7大洲、4大洋；&lt;/strong&gt;&lt;strong&gt;42个国家和&lt;/strong&gt;&lt;strong&gt;北极、南极。&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style-type: none; border: 0px; font-family: SimSun, Arial; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;欧洲17个（冰岛、瑞典、芬兰、英国、荷兰、比利时、德国、瑞士、奥地利、波兰、捷克、法国、西班牙、意大利、克罗地亚、罗马尼亚、希腊）；&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;亚洲8个&amp;nbsp;（俄罗斯、蒙古、中国、尼泊尔、印度、泰国、日本、约旦）；&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;非洲7个（摩洛哥、埃及、加纳、坦桑尼亚、纳米比亚、南非、马达加斯加）；&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;北美洲3个（加拿大、美国、墨西哥）；&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;南美洲4个（厄瓜多尔、秘鲁、巴西、智利）；&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style-type: none; border: 0px; font-family: SimSun, Arial; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;大洋洲3个（澳大利亚、新西兰、斐济）。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; list-style-type: none; border: 0px; font-family: SimSun, Arial; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;&gt;世界各国国旗&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '&lt;p&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;这是一本美不胜收的儿童地图绘本，色彩柔和别致、画风诙谐有趣、知识视野广博，呈现在极富质感的纸张上，书香浓郁，让人忍不住翻阅下去，从头至尾充满审美的愉悦。相信无论是七岁的小孩，还是成年人，都会被它深深吸引。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　—— 《华尔街日报》&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　这本漂亮别致、充满阅读趣味的地图绘本，会让足不出户的神游旅行者激起旅行的愿望……柔和的大地色系，装饰性的边框，精巧的线条，透着古朴典雅的气息；众多有趣的手绘插图，为这本书增添了轻松明快的现代感。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　—— 《学校图书馆杂志》&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　这本书以俏皮的线条、笔触，勾勒出各个国家民族的地理特性，其中包括很多当地的著名人物（如弗洛伊德、康定斯基、吸血鬼德古拉伯爵等等）……对萌芽期的地理爱好者，或即将环游世界的旅行家，这本《地图（人文版）》是一个兼具知识性和娱乐性的阅读之选。&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　——《纽约时报》&amp;nbsp;&lt;/span&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;span style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; background-color: rgb(255, 255, 255);&quot;&gt;　　一部纪实风格的视觉盛宴……用柔和复古时尚的米黄色、淡紫色和青灰色调，精美地描绘了世界丰富多彩的自然物种、山川河流和令人叹为观止的人类建筑艺术……&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464366276909.jpg&quot; alt=&quot;插图&quot; width=&quot;350&quot; height=&quot;530&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464367127619.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;475&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464367402045.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;477&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464367128428.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;475&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464367105815.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;475&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464367760844.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;474&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464368401701.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;476&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;font-family: SimSun, Arial; font-size: 14px; line-height: 24px; white-space: normal; background-color: rgb(255, 255, 255);&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/uploadfile/ueditor/image/20141109/1415464368366845.jpg&quot; alt=&quot;插图&quot; width=&quot;700&quot; height=&quot;475&quot; style=&quot;margin: 0px; padding: 0px; list-style-type: none; border: 0px; display: inline;&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;');
INSERT INTO `b_book` VALUES ('10', '测试书籍', '郑航', '/uploadfile/cover/20141108/1415472012_IS0UX.jpg', '&lt;p&gt;阿斯顿飞个撒打发宏达噶第三方嘎达费噶搜到发送等给斯蒂芬哈地方给死到范甘迪双方各&lt;/p&gt;', '&lt;p&gt;第三方嘎斯飞给和等过一会就刚喝酒&lt;/p&gt;', '&lt;p&gt;Z护送到访第三方合肥个后风光好&lt;/p&gt;', '&lt;p&gt;jczy&lt;/p&gt;');

-- ----------------------------
-- Table structure for `b_channel`
-- ----------------------------
DROP TABLE IF EXISTS `b_channel`;
CREATE TABLE `b_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `ch_name` varchar(255) NOT NULL,
  `ch_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_channel
-- ----------------------------

-- ----------------------------
-- Table structure for `b_employee`
-- ----------------------------
DROP TABLE IF EXISTS `b_employee`;
CREATE TABLE `b_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realname` varchar(255) NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `job` int(255) DEFAULT NULL,
  `sculpture` varchar(255) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_employee
-- ----------------------------
INSERT INTO `b_employee` VALUES ('1', '阿斯顿发', '华宇软件', '东方红京东方后说他太哈斯人哈根asdg agh\r\n啊东方红金色大厅严酷的后阿斯钢阿斯顿刚io阿道夫后让他加我仁凤阁撒旦嘎斯等费后杀毒犯规哈斯等发广告阿道夫光大发光火\r\n撒大富翁v替换风光好大发光火', '3', '/uploadfile/employee/20141107/1415326070_CiWCN.jpg', '1');
INSERT INTO `b_employee` VALUES ('4', '大双方各', '人体后阿迪锅', '撒嘎斯等飞嘎达飞嘎斯等费给', '1', '/uploadfile/employee/20141106/1415259386_WWDLc.jpg', '2');
INSERT INTO `b_employee` VALUES ('7', '风光好康', '十分', '风光好覆盖黄风怪后刚喝酒', '2', '/uploadfile/employee/20141106/1415260571_is2EC.jpg', '4');
INSERT INTO `b_employee` VALUES ('8', '江骅', '会爱与', '等该撒旦法', '2', '/uploadfile/employee/20141106/1415260766_MRkWX.jpg', '5');

-- ----------------------------
-- Table structure for `b_info`
-- ----------------------------
DROP TABLE IF EXISTS `b_info`;
CREATE TABLE `b_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `info_title` varchar(255) NOT NULL,
  `info_title_img` varchar(255) DEFAULT NULL,
  `info_author` varchar(255) DEFAULT NULL,
  `info_content` longtext,
  `info_create_date` bigint(20) DEFAULT NULL,
  `info_sort_date` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_info
-- ----------------------------
INSERT INTO `b_info` VALUES ('12', '5', '文章标题文字', '/uploadfile/info/20141108/1415445107_SDGyu.jpg', '测试', '<p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..</p><p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..</p><p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..</p><p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..</p><p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..</p><p>文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..文章简介文字内容概括文章简介文字内容概括文章简介文字内容概括文章简介文字内容..</p><p><br/></p>', '1415445108', '1415445108');
INSERT INTO `b_info` VALUES ('13', '5', '习近平:我国将出资400亿美元成立丝路基金', '/uploadfile/info/20141108/1415445163_wZwqZ.png', '很健康', '<p>			</p><p>新华网快讯：中国国家主席习近平8日宣布，中国将出资400亿美元成立丝路基金。丝路基金是开放的，欢迎亚洲域内外的投资者积极参与。</p><p class=\"\\&quot;article-editor\\&quot;\">编辑：SN117</p><p><br/></p><p>		</p>', '1415445152', '1415445152');
INSERT INTO `b_info` VALUES ('14', '5', '李克强:中巴要建设好瓜达尔港等项目', '', '李克强', '<p>			</p><p><img src=\"/uploadfile/ueditor/image/20141108/1415453485861582.jpg\" style=\"\" title=\"1415453485861582.jpg\"/></p><p><img src=\"/uploadfile/ueditor/image/20141108/1415453485425670.jpg\" style=\"\" title=\"1415453485425670.jpg\"/></p><p><img src=\"/uploadfile/ueditor/image/20141108/1415453485546718.jpg\" style=\"\" title=\"1415453485546718.jpg\"/></p><p><img src=\"/uploadfile/ueditor/image/20141108/1415453485832019.jpg\" style=\"\" title=\"1415453485832019.jpg\"/></p><p><img src=\"/uploadfile/ueditor/image/20141108/1415453485780639.png\" style=\"\" title=\"1415453485780639.png\"/></p><p><br/></p><p><strong>李克强会见巴基斯坦总理谢里夫时强调 打造中巴经济走廊旗舰项目</strong></p><p>　　新华网北京11月8日电（记者谭晶晶）国务院总理李克强8日上午在人民大会堂会见巴基斯坦总理谢里夫。</p><p>　　李克强表示，中巴互为亲密友好邻邦，是铁杆朋友。中方始终将对巴关系置于外交优先方向，愿同巴方一道，打造中巴命运共同体，促进两国战略合作伙伴关系发展。</p><p>　　李克强指出，中巴经济走廊为两国务实合作搭建了战略框架，是中国同周边互联互通的旗舰项目。此访期间，两国签署20多项合作协议，相信会助力中巴各领域合作，实现互利双赢。双方要共同建设好瓜达尔港等重大基础设施项目，加强能源电力项目合作，规划好经济走廊沿线工业园区建设。希望巴方继续采取一切有效措施，确保中国在巴机构和人员安全。</p><p>　　谢里夫表示，巴中友好是巴基斯坦外交政策的基石，两国关系建立在强有力的互信和良好的合作基础之上。巴方愿同中方落实好巴中经济走廊等重大合作项目，促进两国和地区的共同发展。欢迎更多中国企业赴巴基斯坦投资兴业，将全力确保中方在巴机构和人员安全。</p><p>　　会见后，两国总理共同见证了中巴经济走廊远景规划纲要以及经济、技术、能源、金融、工业园、信息通信等合作文件的签署。</p><p class=\"\\&quot;\\\\&quot;article-editor\\\\&quot;\\&quot;\">编辑：SN117</p><p><br/></p><p><br/></p><p>		</p>', '1415445202', '1415445202');
INSERT INTO `b_info` VALUES ('15', '5', '中日达成四点共识 提出钓鱼岛存不同主张', '', '中日大使', '<p>昨天，APEC会议召开了部长级会议、高峰论坛等一系列会议，但舆论最为关注的仍是中日关系的重大进展——昨天，国务委员杨洁篪与来访的日本国家安全保障局长谷内正太郎举行会谈，就改善中日关系达成四点原则共识。</p><p>　　同日，外交部发言人秦刚表示，将为两国领导人在APEC期间接触营造必要的环境。</p><p>　　综合京华时报记者刘雪玉潘珊菊黄海蕾 新华社 央视</p><p>　<strong>　中日关系</strong></p><p><strong> </strong></p><p><strong>　　达成四点共识提出钓鱼岛存不同主张</strong></p><p>　　昨天，国务委员杨洁篪在钓鱼台国宾馆同来访的日本国家安全保障局长谷内正太郎举行会谈。</p><p>　　杨洁篪指出，发展长期健康稳定的中日关系，符合两国和两国人民的根本利益，中方一贯主张在中日四个政治文件基础上，本着“以史为鉴、面向未来”\n的精神发展中日关系。由于众所周知的原因，中日关系持续面临严重困难局面，近几个月来，双方通过外交渠道就克服中日关系政治障碍进行了多轮磋商，中方重申\n了严正立场，要求日方正视和妥善处理历史、钓鱼岛等重大敏感问题，同中方共同努力推动两国关系改善发展。</p><p>　　谷内表示，日方高度重视日中战略互惠关系，愿意着眼大局，同中方通过对话磋商，增进共识和互信，妥善处理分歧和敏感问题，推进日中关系改善进程。</p><p>　　双方就处理和改善中日关系达成以下四点</p><p>　　原则共识：</p><p>　　一、双方确认将遵守中日四个政治文件的各项原则和精神，继续发展中日战略互惠关系。</p><p>　　二、双方本着“正视历史、面向未来”的精神，就克服影响两国关系政治障碍达成一些共识。</p><p>　　三、双方认识到围绕钓鱼岛等东海海域近年来出现的紧张局势存在不同主张，同意通过对话磋商防止局势恶化，建立危机管控机制，避免发生不测事态。</p><p>　　四、双方同意利用各种多双边渠道逐步重启政治、外交和安全对话，努力构建政治互信。</p><p>　　杨洁篪强调，双方应切实按照上述共识精神维护中日关系政治基础，把握两国关系正确发展方向，及时妥善处理敏感问题，以实际行动构建中日政治互信，推动两国关系逐步走上良性发展轨道。</p><p>　　谷内表示，上述四点原则共识非常重要，日方愿意同中方相向而行。</p><p>　　希望相向而行为领导人接触营造环境</p><p>　　昨天，外交部发言人秦刚就日媒称中日双方就两国领导人在北京亚太经合组织领导人非正式会议期间举行会晤达成一致回答了记者提问。</p><p>　　有记者问，有日本媒体报道称，中日双方就两国领导人在北京亚太经合组织领导人非正式会</p><p>　　议期间举行会晤达成一致。请中方予以证实。</p><p>　　秦刚说，在中日领导人接触问题上，中方态度很明确。我们希望日方继续与中方相向而行，以实际行动为改善两国关系作出努力，为两国领导人接触营造必要的环境。</p><p>　<strong>　■解读</strong></p><p><strong> </strong></p><p><strong>　　中日为改善关系迈出可贵一步</strong></p><p>　　分析人士认为，中日达成的四点原则共识是中日双方为改善关系迈出的可贵一步，为中日关系的未来发展打下了政治基础，但关键在于日方要言而有信，切实履行承诺，真正做到与中方相向而行。</p><p>　　1</p><p>　　创造条件改善关系</p><p>　　四点基本共识中提及的中日四个政治文件，是指1972年的《中日联合声明》、1978年的《中日和平友好条约》、1998年的《中日联合宣言》和2008年的《中日关于全面推进战略互惠关系的联合声明》。</p><p>　　近两年来，日方违背上述声明，制造了“购岛”闹剧、领导人参拜靖国神社等一系列单方面行为，对中日关系造成严重损害。</p><p>　　“一段时间以来，中日关系每次出现问题都是因为日本在历史问题和领土争端这两个问题上的错误做法。因此，这四点原则共识的达成对中日关系的发展有重要的现实意义。”中国社科院日本研究所副所长高洪说。</p><p>　　中国国际问题研究院院长曲星表示，这四点原则共识概括了中日关系的基础、历史、现实和未来，对于未来中日关系的发展是一个重要政治基础。</p><p>　　曲星称，四点原则共识之间也有内在的逻辑联系，“前三点都做好了，才能实现下一步对话的重启。如果中日双方能严格遵守这四点原则共识，双边关系就有望向好的方向发展”。</p><p>　　2</p><p>　　利于管控地区矛盾</p><p>　　中日互为重要的经贸合作伙伴，但去年，中日在投资和贸易领域却出现了“双降”现象，政治关系恶化给经贸关系带来的负面影响不容小觑。“中日关系\n无论是共同利益还是结构性矛盾都在同步增加，但是中日之间的相互需求度没有下降。中日两国处于同一个生态环境系统中，这样的先天环境决定了彼此很难相互切\n割。”中国社科院日本研究所副所长杨伯江说。</p><p>　　曲星表示，安倍政府在认识侵略历史、参拜靖国神社问题上的错误做法不仅让日本与周边国家关系受到很大损害，对日本的国际形象也造成很大损失。安\n倍参拜靖国神社后，不仅中国、韩国表示反对，俄罗斯、欧盟、新加坡等也纷纷表达了担忧。作为日本的首要盟友，美国对安倍的参拜行为也罕见地公开表示“失\n望”。</p><p>　　分析人士认为，中日四点原则共识的达成，将有利于亚太地区矛盾的管控，符合域内外国家的利益。“当前，中国经济对美国的重要性在增加，美国无法在中日之间断然支持其中一方。如果中日关系能克服困难继续前行，将减轻美国对中日之间爆发冲突的忧虑。”曲星说。</p><p>　　3</p><p>　　改善不会一蹴而就</p><p>　　“冰冻三尺非一日之寒，这四点原则共识也只是中日双方改善关系的第一步，不可能一蹴而就。”杨伯江说。</p><p>　　分析人士普遍认为，听其言，更要观其行，现在中日关系的困境完全是日方造成的，要改善中日关系，需要日方展示诚意，采取行动，与中方相向而行。</p><p>　　高洪认为，四点原则共识的一个重要成果，就是将中日双方在钓鱼岛等领土问题上的争议明确地见诸文字，这是对客观现实的承认。曲星也表示，此次四\n点共识第一次在中日之间正式地、文字性地使用了“钓鱼岛”几个字，而且确认彼此存在不同的主张，实际上间接承认了钓鱼岛是存在争议的。</p><p>　　杨伯江表示，目前中日之间彻底解决领土主权争端问题的条件并不具备，最现实、最具建设性的做法就是有效管控。希望两国能建立切实有效的危机管控机制，对地区和平稳定和两国关系的未来承担起责任。</p><p>　　“要看到中日关系改善前景的艰巨性、复杂性，相信前途是光明的，但道路肯定是曲折的。”杨伯江说。</p><p>　　会议 部长级</p><p>　　部长级会议昨在京开幕</p><p>　　昨天，APEC第26届部长级会议在北京开幕。APEC各经济体部长或代表、秘书处执行主任、工商咨询理事会主席、观察员代表及特邀嘉宾等出席。会议联合主席中国外交部长王毅和商务部长高虎城分别致开幕词。</p><p>　　王毅表示，APEC成立25年来，顺应历史潮流，为亚太经济发展和民生改善做出重要贡献。亚太与世界的关系发生历史性巨变。全球比以往任何时候都更需要一个和谐、发展和繁荣的亚太。</p><p>　　高虎城指出，当前，APEC成员的对外贸易总额和经济总量分别占到全球的48%和57%，亚太经济在世界经济中扮演着举足轻重的角色，担负着世界经济增长引擎的重要责任。</p><p>　　高虎城称，在新形势下，各成员亟须拿出足够的智慧和勇气，继续坚定维护多边贸易体制，加快推动以亚太自贸区为远景目标、以全球价值链为重要抓手的亚太经济一体化进程。同时，积极开展经济技术合作，以更加紧密的伙伴关系谋求互利共赢、共同发展。</p><p>　　高虎城说，今年初以来，在各方共同努力下，我们就各项经贸议题进行了广泛而深入的讨论，就推动亚太自贸区建设、促进全球价值链和供应链合作、加\n强经济技术合作和能力建设以及投资、服务、规则合作等达成了一系列务实而富有意义的重要共识。本届会议是APEC中国年最后一场部长级会议，也是直接为领\n导人会议做准备的一场会议。相信本届会议一定可以取得积极、务实和全面的成果，为即将举行的领导人会议打下坚实基础。</p><p>　　会议高峰论坛</p><p>　　预计今年年末中国将成资本净输出国</p><p>　　昨日，2014“APEC中国日高峰论坛”在北京国际饭店举行，“APEC之父”澳大利亚前总理鲍勃·霍克在会上表示，亚太地区要建立一个适应中国崛起的新秩序，这</p><p>　　个新秩序要承认和容纳新的财富和权力分配，更多体现中国的期望和保有美国亚太地区的领导力，使中美更好融合，共负重任实现亚太地区共同发展。</p><p><strong>　　■说法</strong></p><p><strong> </strong></p><p><strong>　　澳大利亚前总理鲍勃·霍克</strong></p><p><strong> </strong></p><p><strong>　　亚太将成全球经济催化剂</strong></p><p>　　鲍勃·霍克是首先倡议成立APEC的经济体领导人，因此也被誉为“APEC之父”。霍克在APEC25年的发展历程中，见证了中国与APEC携手发展的历史。</p><p>　　昨日，出席APEC中国日的鲍勃·霍克实现了他第100次访问中国，鲍勃·霍克表示，在不远的未来，亚太地区将成为加强全球经济发展的主要催化\n剂，同样的潜力存在于东亚其他地区，最重要的是在中国，亚太地区需要一个更自由的国际贸易环境，紧密的区域经济一体化不会发生没有强有力的政治领导。亚太\n经合组织的想法总是达到超越政府接受企业和其他元素的亚洲更广泛的社区。“但创建一个更强大，更紧密整合区域经济是需要艰难的政治决定的，而这些决定将需\n要致力于高级政府之间的讨论。”</p><p>　　中国工业经济联合会会长李毅中</p><p>　　对外投资将超过对华投资</p><p>　　昨日，李毅中表示，中国经济增长缓中趋稳，稳中提质，稳中有进，中国经济处在世界经济的大形势、大格局之中，同时中国经济的健康发展也是世界经济复苏的贡献，去年中国GDP总量为56.9万亿人民币，占世界的12.3%。</p><p>　　李毅中预测，今年末中国对外投资将首次超过外国对华的投资，将成为资本的净输出国。今年前三季度，中国经济的增长率为7.4%，增速适当放缓，有利于我们集中精力调整结构，有利于减轻对资源环境的压力。</p><p>　　今年前三个季度，中国境内贸易投资者对152个国家和地区投资751亿美元，其中中国大陆对中国香港、澳大利亚、美国、俄罗斯和日本等亚太的主要经济体投资占到对外投资的65%，预测今年末中国对外投资将首超外国对华投资，成为资本净输出国。</p><p>　　会议商务部吹风</p><p>　　全球价值链合作为把蛋糕做更大分更匀</p><p>　　昨天下午，中华人民共和国商务部在北京国家会议中心举行主题为“以全球价值链推动亚太经济体合作与发展”的吹风会。会上，商务部新闻发言人、商务部政研室主任沈丹阳称，各个国家通过全球价值链的合作，是在把一个有营养的蛋糕做得更大，并且通过合作分配得更均匀、合理。</p><p>　　沈丹阳在会上表示，今年5月，在青岛召开的2014年亚太经合组织贸易部长会议上达成的一些重要成果，包括批准中方与相关经济体提出的促进亚太\n地区全球价值链发展战略蓝图和全球价值链中的APEC贸易增加值核算战略框架这两个重要倡议。这个战略蓝图实际上已经成为世界上首份全球价值链的政策纲\n领，将为APEC全球价值链的合作发挥引领和指导作用。</p><p>　　■追问</p><p>　　价值链对成员影响范围？</p><p>　　21成员总和定大于总数</p><p>　　沈丹阳认为，比如说通过融入全球价值链，贸易和投资规模的扩大，经济增长、税收增加、就业增加、创新技术得到了提高，这都是中国在改革开放和融入全球价值链中，可以和大家分享的。融入全球价值链提升的过程，实际上是各经济体和企业不断扩大贸易投资结构的过程。</p><p>　　这样的合作，并不仅对单方成员有利，对一个区域、对全球也有利。实际上，全球价值链的合作是一加一大于二的关系。21个成员方加起来一定是大于总数的。</p><p>　　目前最主要工作有哪些？</p><p>　　营造气氛和提升地位等</p><p>　　沈丹阳称，关于亚太地区如何加强全球价值链的合作，有一个情况可以跟大家汇报。去年9月在厦门，中国国际合资方洽谈举办了一个国际投资论坛，这\n个国际投资论坛的主题，就是全球价值链的合作，国务院副总理马凯代表中国政府就如何在全球范围内价值链合作，特别提出四点倡议。一、要为全球价值链健康发\n展营造良好的氛围；二、提升发展中国家在全球价值链的地位；三、加强全球价值链的国际合作；四、要促进全球价值链在服务领域的延伸。这四点倡议，我们认为\n同样适用于亚太地区。</p><p>　　揭秘会场及幕后</p><p>　　双部长座位后侧排12座椅“方阵”</p><p>　　昨天下午，APEC外交和贸易双部长会议在国家会议中心召开，今天上午会议结束。来自21个经济体的双部长齐聚国家会议中心一层，为即将于10日至11日召开的APEC领导人非正式会议做最后准备。</p><p>　　北京市筹备办会务服务部副部长梅建军告诉京华时报记者，双部长会议与最后一次高官会议在同一会场，两者仅差1天时间。为了节约会场布置的时间，\n会场中间的大背板提前做好，高官会议在前，双部长会议在后，高官会议结束后，直接把第一层背板揭掉便露出双部长会议的背板。除了更换背板，还要更换桌签，\n重新摆放座椅，调试部长发言时的影像追踪系统，对部长合影提前排练。</p><p>　　有关桌签以及座椅的摆放有一定讲究。梅建军说，21个经济体的双部长围桌而坐，桌签的位置按照英文字母排列，A为第一个，因此澳大利亚排在首\n位。在双部长的座位后面，会为随行人员准备12张座椅，座椅3张一排共4排，每个代表团的座椅就如同一个“方阵”，“方阵”与“方阵”中间留出缝隙，这样\n既便于区别各代表团，同时也方便代表出入。</p><p>　　志愿者复印资料全部穿防辐射服</p><p>　　APEC会议周期间，代表团各自带来很多文字资料用于交流，高官会议和双部长会议召开前，这些文件经过打印、装订摆放在每个经济体代表的桌前。</p><p><ins style=\"display: block; overflow: hidden; text-decoration: none;\" data-ad-offset-top=\"0\" data-ad-offset-left=\"0\" class=\"sinaads sinaads-done\" id=\"Sinads49447\" data-ad-pdps=\"PDPS000000044086\" data-ad-status=\"done\"><ins style=\"text-decoration:none;margin:0px auto;display:block;overflow:hidden;width:200px;height:300px;\"><a href=\"http://sax.sina.com.cn/mfp/click?type=3&t=MjAxNC0xMS0wOCAxOToxMzo0OQkyMjIuMTI4LjEzOS4yNDkJMTExLjE5Mi4yNDQuNDBfMTQxMzg5Nzk2OC41ODc1NTEJaHR0cDovL25ld3Muc2luYS5jb20uY24vYy8yMDE0LTExLTA4LzAyMjAzMTExMjg5OC5zaHRtbAlQRFBTMDAwMDAwMDQ0MDg2CTJlNDc5YTg0LTcxNDgtNGRkMC04NjIxLTU3NzBhMzY5ZTQzZQlkMzcyYmZmMWE2NjEJZDM3MmJmZjFhNjYxCS0JLQkzMDIwMDB8MzAyMDAwCWQzNzJiZmYxYTY2MQk0Y2ViZTI5YTZiYjIJCTA3Nzg2YzZjMTllYwlBRQktCTgJLQktCS0JLQktCS0JLQktCTI%3D&url=http%3A%2F%2Fclick.mediav.com%2Fc%3Ftype%3D2%26db%3Dmediav%26pub%3D130_2854_1026826%26cus%3D12_162766_1250971_11503769_11503769000%26url%3Dhttp%3A%2F%2Fcars.changan.com.cn%2Fcs35%2F%23%2Fhome&captcha=6515357601635029648\" target=\"_blank\"><img src=\"/uploadfile/ueditor/image/20141108/1415445239123255.jpg\" style=\"width:200px;height:300px;border:0\" alt=\"http://d1.sina.com.cn/201408/13/566828.jpg\" border=\"0\"/></a></ins></ins></p><p>　\n　文件中心负责人崔华表示，各代表团需要打印的资料提前一天提交，会议开始前1小时送至会场。“打印工作看似简单，出现错误就是大事儿。”崔华说，任何打\n印内容都要核对，就连输入的份数也要有两个人把关，如果不小心把30份输成300份，会造成巨大浪费。另外，文件打印完后统一摆放在房间内，任何人不得碰\n触，防止有人挪动造成页码和资料单元的混乱。</p><p>　　截至昨天，文件中心已经打印了25万页资料，仅昨天的双部长会议就准备了8万份，每个代表拿的资料厚达六七厘米。这些资料都是由6台激光高速打印机完成，1分钟可打印110页，而普通打印机仅十几页。</p><p>　　考虑打印机的辐射问题，筹备处为17名志愿者准备了孕妇用的防辐射服，走进打印间会看到，即便是年轻的小伙子也都穿着灰色的防辐射服。另外，打\n印间墨味浓重，有些志愿者甚至戴着口罩工作。为了改善打印间环境，筹备组特意在房间放置两台电扇形成自制空气循环系统，缓解屋内环境的污染。</p><p style=\"text-align:right;\">(原标题：中日同意逐步重启政治外交安全对话)</p><p class=\"article-editor\">编辑：SN067</p><p><br/></p>', '1415445240', '1415445240');
INSERT INTO `b_info` VALUES ('16', '5', '习近平文艺座谈会见贾平凹：你的书我都看过', '/uploadfile/info/20141108/1415445306_srxWO.jpg', '', '<p style=\"text-align:center\"><img src=\"/uploadfile/ueditor/image/20141108/1415445280947129.jpg\" alt=\"贾平凹\" title=\"贾平凹\"/></p><p><span class=\"img_descr\">贾平凹</span><br/></p><p>　　很少有人像贾平凹一样，单纯因为写作而获得如此大的名气，况且在20年前，他就已经盛名傍身却也毁誉参半。他的作品一直关注着转型期的中国，无\n论是书写历史还是直面当下，都是如此。这一次他的新作《老生》仍然写了中国四个重要的转型期，写出了那些时代转轨背后的变换与无常</p><p>　　本刊记者/陈涛</p><p>　　这段时间，陕西省作协主席贾平凹的主要工作是开会。</p><p>　　10月15日这一天，贾平凹要去鲁迅文学院举办的“文学陕军新梯队”小说研讨会，“这几年省作协一直在抓年轻人的创作，这次有八个陕西青年作家集体亮相”。他对《中国新闻周刊》说。</p><p>　　但在从西安来北京的路上，他被通知还有个更重要的中央会议要他参加。“也不知道什么会，反正是文艺方面的会。我还以为是了解文艺界情况的会，或者是个通气会。”贾平凹对《中国新闻周刊》回忆，“通知时间特别紧张，就去了。”</p><p>　　10月14日到京，他只能跟鲁迅文学院那边说，他得去后面这个在人民大会堂的会议。第二天去了，“才知道习近平要到人民大会堂作重要讲话”。那就是日后广为人知的文艺工作座谈会，与会的有72位全国文艺工作者。</p><p>　　会议结束后，习近平与大家握手，到贾平凹这里时问他“有没有新作？”贾平凹说，“我刚出版了一本叫《老生》的长篇小说。”习近平说：“好啊。你以前的书我都看过。”</p><p>　　10月下旬，贾平凹还得忙在北京大学举办的这本新书的发布会，并接受媒体的轮番采访，随后又得回西安忙其他会议。</p><p>　　“解放前、土改、‘文革’前后、改革开放。”点上香烟，贾平凹坐在下榻的宾馆房里谈起《老生》里的四个故事，“这四个阶段基本上是社会转型期，像路在拐弯处，容易发生很多事情，车过来要开小心一点，不然容易翻车。”</p><p>　　当代社会转型为贾平凹提供了丰富的素材，“也给作家提出了很大的担当”，他不断书写农村的人和事，以及城市化进程中的底层民众和知识分子。这个时代是一个“命运交叉的城堡”，作为受争议的当代作家，他自己也处于转型社会当中，贾平凹的写作与生活也在那座“城堡”之中。</p><p>　　他是“著名的病人”，同时也试探着时代的病脉。</p><p>　　<strong>开会</strong></p><p>　　因为写小说，贾平凹经历过被批判，也拿过不少文学奖项。他爱收藏，在西安的工作室“上书房”里摆满各种石头，他爱画画和书法，也明码标价卖过字画。但对于这段时间的“主业”开会，其实他“哪儿都不想去”，但作为领导，他不得不去。</p><p>　　比如这一次的“文艺座谈会”。“开头要安排七个人发言，我后来从七个人的发言才知道，他们也不知道该说啥，个人有个人的看法那么样地说了几句。大家主要听总书记说啥。”贾平凹对《中国新闻周刊》回忆。</p><p>　　“我当时也不知道该说点啥，也不能很高兴地说‘哎呀，你还看我的东西’之类的，只能说谢谢了。说几句就过去，七十多人被你一人说过去那就把事件耽搁了。”他说。当然，和谁说话，他都是说陕西话，他不会说普通话。</p><p>　　“我努力学过普通话，舌头发硬，像大街上走模特儿的一字步，有醋溜过的味儿。普通人才说普通话，后来想，毛主席都不说普通话，我也不说了。”他曾在散文《说话》中提到。</p><p>　　开完中央的文艺座谈会，贾平凹当天坐动车回西安，列车员还找他要签名。贾平凹回到西安后，在省作协也召开了学习文艺座谈讲话的会议，“两个时期的两位领袖讲到同一个问题，这个问题或许是产生好作品、大作品的最基本条件。”</p><p>　　然后，他还得再次返回北京，参加24日、25日在北师大举办的“莫言与中国当代文学国际研讨会”。事实上，10月24日在上海举办的“作家的历史，历史中的作家”研讨会也邀请了贾平凹。</p><p>　　“后面这个最早跟我说的，我都答应要去，但后来莫言又通知我。”贾平凹说，“为啥莫言这个会我必须参加，因为我是北师大的驻校作家。再一个，我\n和莫言个人关系比较好，开会我不来也不好。”在北京，还有他自己的新书发布会，中间只隔两天，“如果去一趟上海再回来太劳累”。这就是如今，作家贾平凹每\n日生活的常态。</p><p>　　上海那个会这也是作家熟人叫去，没啥任务就是聚一聚，到嘉兴去转一两天。贾平凹对《中国新闻周刊》说，“我年轻的时候基本上都不出来。但是这样\n吧，也有它的弊病，能专心写一些东西，慢慢就不会交往了，我觉得也不好。后来吧，你不来不行了，比如说我是陕西作协主席，你不来不像话吗，失责任呐。”</p><p>　　“有时就得逼着你出来，实际上按我这个心性，我哪儿都不去。”贾平凹又补充说。</p><p>　　<strong>“老生”</strong></p><p>　　早在1980年代中期的一个夏天，当时莫言突然给贾平凹发了个电报，“让我去西安火车站接他。那时我还未见过莫言，就在一个纸牌上写了‘莫言’二字在车站转来转去等他。”等了一上午，莫言因故没到西安。</p><p>　　在散文《说话》中，贾平凹曾回忆那个上午他没说一句话，“好多人直瞅着我也不说话”，迫不得已他问了一个人列车到站没有，那人先把贾手中的纸牌掉了个个，“现在我可以对你说话了，我不知道。”贾平凹才醒悟到纸牌上写的是“莫言”二字，“这两个字真好”。</p><p>　　多年以后，莫言文学馆门口的对联都是出自贾平凹之手。“莫言为中国文学长了脸，应该学习他、爱护他。”贾平凹在研讨会上说。</p><p>　　实际上，和莫言等当代名家一样，贾平凹的老家陕西省商洛市的棣花镇也为其打造了故居之类。“故居那边在打造一个古镇，现在基本上弄好了，国庆时开始对外开放了，现在变成了一个旅游点，来的人特别多，也挺好的。”贾平凹对《中国新闻周刊》说。</p><p>　　莫言快60岁了，而贾平凹已过60岁，上世纪80年代成名的很多作家已然是“老生”。</p><p>　　新作《老生》，这是贾平凹给自己的寿礼。书中的唱师贯穿主线，其年龄模糊，大概活过了百岁，“年龄最老，他是个老生，从戏剧角色里看也有‘老生’，很苍老的感觉。”贾平凹解释说，“而具体到各个故事里，人名也取一个‘老’字和‘生’字。”</p><p>　　贾平凹喜欢两个字的书名，从小说《浮躁》《废都》《土门》《秦腔》，到近年的《古炉》《带灯》，甚至散文集也多是两字书名。他觉得这样“厚\n重”，“窗前一轮明月，天边一道风景线，我最反对这种表面上有诗意，其实毫无东西的。”贾平凹说，“我最多有三四个字的书名，也是偶然为之。两字给人一种\n好记又让人捉摸不透的感觉。”</p><p>　　“作品不要单一的指向或者简单讨论是与非，人生和人性的东西，无常的东西，从这个角度考虑得多一些。”贾平凹谈起新作中的四个故事以及那个贯穿全书的唱师。</p><p>　　第一个故事，写老黑、匡三、李得胜等在秦岭的游击队起义，最后匡三活了下来，官至秦岭地区总司令。第二个故事，写土改、划成份、成立人民公社，\n王财东被划为地主被批斗，其妻玉镯被干部玷污，曾经的佃农白土娶了玉镯，两人出走并终老于首阳山。第三个故事，写风楼镇书记老皮和一个青年墓生下村开展革\n命工作，“反革命分子”张收成和苗天义被送去改造。第四个故事写当归村的戏生和荞荞两口子如何致富，挖当归，农产品打催长素，老皮还帮忙制造“老虎照片”\n事件，以及最后写到瘟疫的蔓延并毁了这个村。</p><p>　　自始至终，人死了，唱师都会去唱阴歌，而《山海经》掺杂于全书。这个视角去讲故事，也隐含了作者在背后的“全知全能”，因为超越了时间和空间，\n“你不知道他活了一百岁还是一百二十岁，也不知道是哪个种族、哪个村子的人，因为地主死了他在唱，贫农死了他在唱，游击队死了他也在唱。他超越生与死的东\n西，他才能比较真实地看待这一段历史。”贾平凹说。</p><p>　　<strong>“朋友圈”</strong></p><p>　　贾平凹喜欢写农村题材，诚如他自己写到的自传性长篇散文《我是农民》。今年8月底，他还在《人民日报》发表过署名文章《让世界读懂中国》。</p><p>　　他深知目前中国社会处于大转型期，“在这个年代，中国是最有新闻的国家，它几乎每天都有大新闻。可以说，中国的社会现象对人类的发展是有启示的，提供了多种可能的经验，也给中国作家提供了写作的丰厚土壤和活跃的舞台。”</p><p>　　被大众熟知的拍成电影的《高兴》，里面的刘高兴是贾平凹的初中同学。出版于2007年的该书写的是新世纪后进城务工人员的底层生活。贾平凹特地去拜访过很多拾荒者。</p><p>　　贾平凹有时也和朋友去终南山拜访隐者，“那里面修行的人特别多，我也认识一些，但是我认识的更多的是庙里的，就是正儿八经出家的和尚。”</p><p>　　贾平凹是个足球迷，世界杯、欧洲杯、国足、女足和省里的足球都看，也写过评球的文章。贾平凹喜欢收藏，从上世纪90年代开始收藏各种汉陶罐、各\n种石头、木雕、玉、珊瑚，应有尽有。他写的散文《丑石》还被选入中学语文课本。而他最奇特的一个收藏当属各种盗版的《废都》，累计收藏了60多个版本。</p><p>　　以前，因为他的名气，也总有来索要字画的朋友。他后来发现有人要字画的目的不纯，比如会拿去送礼给领导。1996年时他干脆写了个“润格告\n示”，自己卖字画，比如“字斗方千元”。如果没有会议，他至今保持的写作习惯是上午八点到工作室“上书房”，写到11点过吃饭、睡午觉，下午之后访客就陆\n续来了，其中也有聊收藏的，或买字画的。</p><p>　　贾平凹成名于上世纪80年代。最初他写的是中长篇小说以及散文，1987年，贾平凹发表了自己的第一部长篇小说《商周》，写的就是老家商周地区\n在80年代初期乡村的淳朴生活。而第二年他再发长篇小说《浮躁》，斩获美国美孚飞马文学奖，也被誉为奠定他在中国文坛地位的作品，该书以农村青年金狗和小\n水的感情为主线，描写改革开放初期暴露的社会问题，“浮躁”一词展现的是打破封闭的躁动。</p><p>　　“我特别喜欢陕西作家贾平凹的书，在台湾只看到了平凹的两本书，一本是《天狗》，一本是《浮躁》。我很崇拜他，他是当代最好的作家，当然这只是我个人的看法。”台湾作家三毛当年来大陆时对记者这样提及贾平凹。</p><p>　　三毛让人转告贾平凹，有新书了，一定得寄给她。贾平凹就去邮局寄了四本。“今生阅读三个人的作品，在二十次以上，一位是曹禺，一位是张爱玲，一\n位是您。”三毛在给贾平凹的心中直言不讳地称后者为“当代大师”。1991年1月1日夜，三毛写了回信，贾平凹后来才收到，但三毛已于当年1月4日在医院\n自杀。这一年三毛本计划还会到西安，让贾平凹找自行车带她在西安逛逛，然后去商周地区转转。</p><p>　　虽然与三毛一直未曾谋面，但她的死对贾平凹打击很大，他写下了散文《哭三毛》和《再哭三毛》。而次年，贾平凹在西安的好友，作家路遥病逝。“想\n起在省作协换届时，票一投完，他在厕所里给我说：好得很，咱要的就是咱俩的票比他们多！他然后把尿尿得很高。”贾平凹在散文《怀念路遥》中说。</p><p>　　贾平凹的好友中也不乏文学评论家，与谢有顺合出过一本对话录，又比如和他交往甚好的李星、雷达、白烨等，也有这次出席新书发布会的陈晓明、李敬\n泽。当然，陈晓明等人在1993年用很短的时间合编了一部批评、讨论贾平凹的书，叫《废都滋味》。2009年，《废都》解禁，评论界再次重新评价了这部\n“奇书”。</p><p>　　2005年时，贾平凹的《秦腔》获得第七届茅盾文学奖，这是陕西作家中继路遥《平凡的世界》、陈忠实《白鹿原》之后的第三部获奖作品。2007\n年9月，贾平凹从陈忠实手中接过了省作协主席的职务，从此不得不开始了频繁会议和活动。事实上，那次换届后，在各界发来祝贺和记者造访时，贾平凹刚刚在老\n家棣花镇给母亲办完丧事。</p><p><br/></p>', '1415445307', '1415445307');
INSERT INTO `b_info` VALUES ('17', '5', '上海3名中小学生捐50万压岁钱设立慈善基金', '/uploadfile/info/20141108/1415445361_dYGrW.jpg', '扬子晚报网', '<p style=\"text-align:center\"><img src=\"/uploadfile/ueditor/image/20141108/1415445348399507.jpg\" alt=\"三名学生捐出50万元设立基金\" title=\"三名学生捐出50万元设立基金\"/></p><p style=\"text-align: center;\"><span class=\"img_descr\">三名学生捐出50万元设立基金</span><br/></p><p>　　50万能买什么？也许是80多个IPHONE6，也许是无数大餐。但为了帮助贫困孩子，上海市世界外国语中学的魏琮泰、杨行同学和上海市世界外\n国语小学的魏启泰同学却毫不犹豫地捐出了积攒10余年的50万压岁钱，用于设立市慈善基金会“青春之光爱心专项基金”，而现年14岁的魏琮泰也成为沪上年\n龄最小的慈善专项基金主任。</p><p>　　<strong>三名学生捐出压岁钱</strong></p><p>　　上周五，三位同学一同来到了上海市慈善基金会，共同捐出了积攒了十多年的压岁钱50万元。今年上小学5年级的小启泰对慈善捐款没有太多概念，他说，这全是哥哥的主意，自己听从哥哥的建议，捐出了压岁钱。</p><p>　　哥哥魏琮泰是该专项基金的管委会主任，也是这次捐款最多的人，捐款金额为25万元。小小年纪就当上“一把手”，琮泰腼腆地笑了笑，觉得“亚历山\n大”，“以前在电视上看到需要帮助的同学，却不知道怎么帮助他们，以后我会在妈妈的帮助下寻找一些需要帮助的孩子，去探望他们，关心他们，要一辈子做一个\n有爱心的人。”</p><p>　　这位“新晋主任”做的第一件事就是在班级里找赞助人，在他的游说下，14岁的同班同学杨行也慷慨解囊，捐出了5万元的压岁钱。</p><p>　　两位小兄弟的妈妈、专项基金联络员之一的陈晓军透露说，琮泰和启泰平时没什么开销。从满月开始，每年逢年过节长辈和亲戚朋友都会给孩子送压岁钱，这些钱都由家长代为存了起来，积少成多就有几十万元。</p><p>　　“其实，这些年他们一直在做慈善，雅安地震的时候捐衣服、捐书，碰到需要帮助的同学捐班费。这次有机会成立专项基金，就能系统地帮助其他孩子。”</p><p>　　“孩子们能捐出压岁钱，帮助别人也和学校的培养分不开。”另一位联络员、杨行的妈妈吴蓉说，从小学到中学，世界外国语学校会举行各类慈善公益活动，三名孩子从小受到慈善熏陶，很有爱心。</p><p>　　<strong>首批资助了15位特困生</strong></p><p>　　魏琮泰的爸爸魏宝龙是一位企业家，他表示，尽管孩子从小生活环境优越，但不希望他们养尊处优，时刻不要忘记那些需要帮助的人。</p><p>　　记者了解到，该专项基金将用于资助特困家庭的中小学生和自闭症患儿，以及患有视力、听力和智力障碍的特殊儿童。这也是上海市慈善基金会成立的首个由中小学生用自己节俭积存的压岁钱设立的慈善专项基金。据悉，该专项基金首批资助了15位特困学生和15位特殊儿童。&nbsp;&nbsp;</p><p>　　昨天，记者还联系到了宝山虎林路小学的受助学生黄林(化名)，小黄的父亲过世了，母亲要养活两个人十分辛苦。他表示，自己拿到捐款后很感动，长大后如果有能力，一定要回报社会。</p><p>　　上海市慈善基金会的一位负责人表示，这笔善款真不算一个小数目了，这份爱心也许可以改变一个人的命运，甚至改变一个家庭的命运。“我们希望这三个孩子将爱传递、将爱延续，让身边困难的人们能沐浴爱的阳光，拥有更美好的未来。”</p><p>　　<strong>[释疑]</strong></p><p>　<strong>　14岁孩子能成为专项基金法人吗？</strong></p><p>　　14岁的孩子当上了慈善专项基金的主任，他的手中有些什么权利？这样的操作合不合规？针对这些问题，记者专访了慈善基金会秘书长方国平。</p><p>　<strong>　主任有没有签字权？</strong></p><p>　　记者：“青春之光爱心专项基金”的主任才14岁，尚未成年，按照相关法律法规，能成为专项基金法人吗？有签字权吗？</p><p>　　方国平：国家尚没有法律规定，未成年人不能成为专项基金的主任。要知道，专项基金不是组织，不具备法人资格。专项基金只是按照捐赠人意愿设立的\n定向使用的基金，然后尊重捐赠人的意愿实现民主管理，共同成立管理委员会，再推选捐赠人担任管委会主任一职。由其召集、讨论专项基金的使用事宜。</p><p>　　现在慈善法还没有问世，慈善基金会制订了慈善专项基金管理办法，其中也没有提到专项基金主任的年龄限制。如果碰到签字做决策，主任可以签字，也可以委托副主任签字，一般尊重捐赠人的意愿。</p><p>　　记者：以前有未成年人担任过专项基金的主任吗？</p><p>　　方国平：从未有过，这是个很好的尝试，值得鼓励。</p><p>　　<strong>基金主任有什么职责？</strong></p><p>　　记者：身为专项基金主任，要承担什么样的职责呢？</p><p>　　方国平：主任要做的工作很多。第一就是监督专项基金的使用情况，二是参与研究专项基金如何使用，三是跟踪专项基金的资助项目以及参加专项基金开展的各种活动。</p><p>　　记者：据我们所知，专项基金的副主任就是主任的父亲，为何不能由家长直接担任主任一职呢？</p><p>　　方国平：在设立专项基金筹备过程中，我们就与捐助人进行了长达一个月的多次沟通，这笔钱是由三名学生捐的，理应由他们参与管理。家长的意思是，\n希望通过这件事，让学生从小做慈善，而担任主任一职，能让孩子直接接触专项基金的运作和管理，培养他们的能力。过去我们讲要从小培养理财能力，其实慈善能\n力也要从小开始培养。这些能力都是课堂上学不到的，说明家长很有远见。</p><p>　<strong>　专项基金能不能公募？</strong></p><p>　　记者：慈善专项基金的“起步价”是多少？目前慈善基金会有多少专项基金？</p><p>　　方国平：法律没有规定。我会自己制定的《专项基金管理办法》规定的“起步价”是50万元。</p><p>　　记者：那么专项基金能定期“充值”吗？如果资金不足了，能对外公募吗？</p><p>　　方国平：专项基金是不能对外公募的，有一种情况例外，就是大家觉得你的项目很好，主动捐钱给你。以“青春之光爱心专项基金”为例，主要有三个来\n源：一是孩子们继续捐出压岁钱；二是将基金存在银行产生利息或由慈善基金会专业人士通过理财保值增值，产生的利润追加到基金中；三是三名学生的其他同学自\n愿将多余的压岁钱投入到该基金中，共同管理该专项基金。</p><p>　　<strong>有钱人的孩子才能做慈善？</strong></p><p>　　记者：捐助人的父亲是一位企业家，有人质疑说是不是有钱人的孩子才能做慈善？</p><p>　　方国平：我是这么看的，有钱人的孩子做慈善，社会应该大力支持，不做慈善，难道去做纨绔子弟吗？出生在什么样的家庭不是他们能选择的，但他们可以选择正确的人生目标和价值追求。</p><p>　　但另一方面，是不是没钱人的孩子就不能做慈善了呢？答案是否定的。我们这里有个叫龙龙的捐助人，家境并不好，但他的妈妈从怀孕开始，就以孩子的\n名义在孩子的生日或重要日子捐赠善款，每次不多，就十几元、百来元，已经坚持十几年了。我认为，没钱人的孩子捐十几元和有钱人的孩子捐一万元的爱心是一样\n的。甚至，这些年，我个人感觉家庭不富裕(或者工薪阶层)的孩子做慈善的人数比富裕家庭的孩子还要多。&nbsp;青年报首席记者 范彦萍</p><p>　　<strong>[专家解剖]</strong></p><p><strong> </strong></p><p><strong>　　慈善需要学习并非一蹴而就</strong></p><p>　　映绿公益事业发展中心负责人、首席顾问，中国基金会中心网第一任总裁庄爱玲介绍说，“据我所知，在国外未成年人担任专项基金的情况较少，上海的\n这一案例，我个人认为，它的初衷是希望让孩子独立担任事务，培养未来领袖。在中国讲究长者为先，有权威的人有话语权，我们应该鼓励年轻人也参与社会事\n务。”</p><p>　　“个人觉得，这个孩子的主任之职可能是挂个名，倘若真的要去管理一个专项基金，不光是捐钱那么简单，而要承担起很多责任。”庄爱玲建议，以该专\n项基金为例，家长可以先承担起责任，甚至请专业人士帮忙管理，孩子跟着学习而不是名副其实地起到决策作用，等到他成人后，便可挑起重任。其实，不管是成人\n还是未成年人，慈善都是需要学习的，并非给了职务，就一蹴而就的。</p><p><ins style=\"display: block; overflow: hidden; text-decoration: none;\" data-ad-offset-top=\"0\" data-ad-offset-left=\"0\" data-ad-status=\"done\" class=\"sinaads sinaads-done\" id=\"Sinads49447\" data-ad-pdps=\"PDPS000000042120\"><ins style=\"text-decoration:none;margin:0px auto;display:block;overflow:hidden;width:200px;height:300px;\"><a href=\"http://sax.sina.com.cn/dsp/click?t=MjAxNC0xMS0wOCAxOToxNTo0MQkyMjIuMTI4LjEzOS4yNDkJMTExLjE5Mi4yNDQuNDBfMTQxMzg5Nzk2OC41ODc1NTEJY2I2YzRjODEtYTg5YS00ZTkwLWE4N2MtN2ZmNGI1MzM2YzRlCTM5NzMxCTM4NTgxNDk0MTNfUElOUEFJLUNQQwkxMTUyOQkxNTYxNDgJMC4wMDE2NjU2NTExCTEJdHJ1ZQlQRFBTMDAwMDAwMDQyMTIwCTE3MDAzNwlQQwlpbWFnZQkwCTE=&p=U4PSCN%2b3QX%2bExPRX9esV603RU6j33Suy1C0AyQ%3d%3d&url=http%3a%2f%2fsax.sina.com.cn%2fclick%3ftype%3d2%26t%3dNTM4M2QyMDgtZGZiNy00MTdmLTg0YzQtZjQ1N2Y1ZWIxNWViCTE3CVBEUFMwMDAwMDAwNDIxMjAJMTcwMDM3CTEJUlRCCXVudXNlZF9pZA%253d%253d%26id%3d17%26url%3dhttp%253a%252f%252fpalmpolo.tmall.com%252f%253fspm%253da220o.1000855.w5001-7237364021.8.QSGvEk%2526%2526%2526%2526%2526%2526%2526%2526%2526%2526%2526%2526%2526%2526%2526scene%253dtaobao_shop%26sina_sign%3d0675c2e4168b3a50&sign=a6adfb61d0caf1d0\" target=\"_blank\"><img src=\"/uploadfile/ueditor/image/20141108/1415445348103973.jpg\" style=\"width:200px;height:300px;border:0\" alt=\"http://d3.sina.com.cn/pfpghc/54a06fa890e44427b86a38ce53f7607d.jpg\" border=\"0\"/></a></ins></ins></p><p>　\n　“我觉得，未来，中国的家族基金会会越来越多。”庄爱玲认为，随着中国家庭的财富增长，有的孩子已不需要像父辈一样艰苦创业，就能拥有很好的生活条件。\n成立专项基金，钱只是起到杠杆的作用，真正的目的是通过资金的捐赠，让孩子了解社会，洞悉社会问题产生的根本原因，尝试解决一些问题，成为很好的社会公\n民。而不是像现在的一些富二代一样，开豪车、出入高档会所，成为物质的巨人，精神的矮子。</p><p>　　“黄毛小子当专项基金主任，其实没什么好稀奇的。”中国公益研究院院长王振耀透露说，在国外有10多万个基金会，很多是家庭基金会，都是孩子当\n主角，区区几百美元就能成立一个小型基金会。美国孩子做公益的形式也很多元，譬如大雪天在家门口卖糖。对青少年做公益应该鼓励。</p><p>　　公益研究专家、华东政法大学社会发展学院副教授童潇分析说，慈善事业的发展不仅仅要靠政府部门或者慈善机构来做，更要动员社会各个方面的力量。青少年做慈善的过程中，要不断提升自己的能力，多向前辈学习。 来源：青年报</p><p style=\"text-align: right;\">（原标题：三学生捐50万压岁钱 14岁男生成慈善专项基金主任）</p><p class=\"article-editor\">编辑：SN067</p><p><br/></p>', '1415445362', '1415445362');
INSERT INTO `b_info` VALUES ('18', '5', 'PHP截取并生成纯文本字符串', '/uploadfile/info/20141108/1415448260_tZpwY.jpg', '', '<p style=\"text-indent:2em;\">想必很多人从一开始接触编程到现在，都有一个惯性思维：英文字符占用一个字节，中文字符占用两\n个字节。不错，英文字符是占用一个字节，但中文字符占用两个字节是相对于GBK编码而言（当然，其他一些编码如GB2312也是），但是在时下国际流行的\nUTF8编码中，一个中文字符占用3个字节。不要惊讶，这是一个事实，而且应该成为一个常识。<br/>UTF8编码可能出现一个字符占用1个、2个、3个甚至更多字节的情况，如英文字符abc占用一个字节，中文字符占用三个字节，那么什么字符占用两个字节呢？这个问题我一开始并没有发现，只是前几天有人留言，首页的评论截取竟然出现了乱码的情况：</p><p style=\"text-indent:2em;\"><img alt=\"2011年09月21日 - bzyyc.happy - 点烟看寂寞燃烧\" src=\"http://www.qiyuuu.com/content/uploadfile/201104/f3ccdd27d2000e3f9255a7e3e2c4880020110407064609.jpg\" style=\"margin-top: 0.4em; max-width: 97.5%;\"/><br/>最开始并没有发现这两个乱码出现的问题在哪里，后来仔细验证了下，发现是处在·这个字符上（键盘左上角，中文输入法下），它占用两个字节。而emlog的截取字符串函数，除了英文字符外，默认其他的都占三个字节了，因此导致乱码出现。<br/>查\n阅了相关资料，得出了一个结论：UTF8编码的字符中，第一个字节ASCII值大于等于224的，其与之后的2个字节一起组成一个UTF8字符，第一个字\n节ASCII值大于192等于小于224的，其与之后的1个字节组成一个UTF-8字符，第一个字节ASCII值小于192的，其本身成为一个UTF8字\n符。于是在PHP中将·字符的ASCII打印出来，第一个字节是194，第二个字节是183，木有第三个字节了，于是截取的字符中，若包含·字符，就会出\n现乱码了。<br/>问题找到，解决方案也就很简单了，分别判断处理下就OK。写了如下函数用于截取：</p><p><br/></p><p><span style=\"font-size:16px\"></span></p><p>function subString($str, $start, $length) {</p><p>&nbsp; &nbsp; $i = 0;</p><p>&nbsp; &nbsp; //完整排除之前的UTF8字符</p><p>&nbsp; &nbsp; while($i &lt; $start) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; $ord = ord($str{$i});</p><p>&nbsp; &nbsp; &nbsp; &nbsp; if($ord &lt; 192) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i++;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; } elseif($ord &lt;224) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i += 2;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; } else {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i += 3;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; }</p><p>&nbsp; &nbsp; }</p><p>&nbsp; &nbsp; //开始截取</p><p>&nbsp; &nbsp; $result = &#39;&#39;;</p><p>&nbsp; &nbsp; while($i &lt; $start + $length &amp;&amp; $i &lt; strlen($str)) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; $ord = ord($str{$i});</p><p>&nbsp; &nbsp; &nbsp; &nbsp; if($ord &lt; 192) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $result .= $str{$i};</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i++;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; } elseif($ord &lt;224) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $result .= $str{$i}.$str{$i+1};</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i += 2;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; } else {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $result .= $str{$i}.$str{$i+1}.$str{$i+2};</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $i += 3;</p><p>&nbsp; &nbsp; &nbsp; &nbsp; }</p><p>&nbsp; &nbsp; }</p><p>&nbsp; &nbsp; if($i &lt; strlen($str)) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp; $result .= &#39;...&#39;;</p><p>&nbsp; &nbsp; }</p><p>&nbsp; &nbsp; return $result;</p><p>}</p><p></p><p><br/></p>', '1415448262', '1415448262');
INSERT INTO `b_info` VALUES ('19', '5', '汇总优化过程中常见的SEO快速优化方式有哪些汇总优化过程中常见的SEO快速优化方式有哪些', '', '擦撒打发', '<p>			</p><p><br/></p><p>&nbsp;&nbsp;&nbsp;&nbsp;SEO优化市场一直都是鱼龙混杂，各类优化手法层出不穷，但不论什么样的手法，都脱离不了最基础的以收录排名流量为导向的优化方式，那么在优化的过程中，最常见的的优化手法有哪些呢?首先，我们要做的是对自己的网站的主体内容有个细致的分析过程。</p><p><strong>　　排名型优化方式</strong></p><p>　　这类优化的方式需要较高的职业素质，要求对百度的算法有一定的了解，包括包括IDF算法，即词频与逆文本频率之间的关系，掌握了竞争对手的词频与逆文本频率，用于自身的关键词密度的调整，加上一定的权重导入，排名将会上升得非常快，有人可能会问，如何进行权重的导入，这个很简单，一般做网站排名的人手中必然不会只有一个站，当你在做一个新站的时候，其他稍微古老一点的网站，在这个时候可以发挥出良好的效果，此外，外链，尤其是锚文本外链在这个时候权重导入的作用也是非常的明显，可以很好的利用，如果您连发外链的时间都没有，这个时候，花点小钱购买点质量高的友链是一个非常不错的选择，如果您连购买友链的地方都找不到，这里推荐下A5论坛，一个很好的选择。</p><p>　　<strong>流量导入型网站的优化方式</strong></p><p>　　流量导入型的网站大部分都是较大的站点，或者是一些资讯类的站点，当然，这二者的优化方式有着明显的区别，先说说资讯类网站的优化方式，资讯类网站的优化方式其实非常的简单，在做资讯类网站的时候，我们一定要学会一样东西，那便是采集器，不论是使用火车头采集器还是说我们自身写的采集规则，如织梦程序本身自带的采集功能，这些对我们来说都是比较重要的，因为我们没那么多的时间和精力去管理那么多批量的文章，而这些文章的标题，包括长尾关键词流量的来源，采集的文章带来的流量占据了主要的渠道来源，有人可能会说采集不是被百度所禁止的吗，不怕被惩罚吗，不知道大家对百度官方的规定是否进行了熟读，采集也是分方式的，如果我们采集的东西对读者是有益的，这个时候百度是不会对站点进行打击的，这个笔者有过亲身的经验，完全可以实施。对于大型网站的流量导入，重点还是优化人员的素质，如何发掘别人没有发掘过的关键词，如果做好关键词的着陆页，如何用长尾吸引流量，是每一个大型站点人员所必须直面的问题。</p><p>　<strong>　个人网站的优化</strong></p><p>　　这类网站的比例大部分都是站长作为自己经验的积累，本不应该在乎排名流量的问题，但由于是一个网站，也是我们的一个实战的结果，排名流量的大小也是对一个站长的肯定，在这里，多多的分享干货，真正吸引一定的用户拜访，产生定期的流量效应，如当初的点石论坛，如今的卢松松博客等等，之前正是依托于此建立起来的。</p><p>　　以上是笔者的一点干货分享，本文出自win7之家http://www.win780.com/，转载请注明出处。</p><p><br/></p><p><br/></p><p>		</p>', '1415448311', '1415448311');

-- ----------------------------
-- Table structure for `b_job`
-- ----------------------------
DROP TABLE IF EXISTS `b_job`;
CREATE TABLE `b_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_job
-- ----------------------------
INSERT INTO `b_job` VALUES ('1', '主编');
INSERT INTO `b_job` VALUES ('2', '副主编');
INSERT INTO `b_job` VALUES ('3', '策划编辑');

-- ----------------------------
-- Table structure for `b_model`
-- ----------------------------
DROP TABLE IF EXISTS `b_model`;
CREATE TABLE `b_model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `sortId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_model
-- ----------------------------
INSERT INTO `b_model` VALUES ('1', null, '首页管理', 'indexMng', '1');
INSERT INTO `b_model` VALUES ('2', null, '图书介绍', 'bookIntro', '2');
INSERT INTO `b_model` VALUES ('3', null, '编写团队', 'authorTeam', '3');
INSERT INTO `b_model` VALUES ('4', null, '合作机构', 'coopAgen', '4');
INSERT INTO `b_model` VALUES ('5', null, '资讯管理', 'infoMng', '5');
INSERT INTO `b_model` VALUES ('6', '4', '发起单位', 'fqdw', '1');
INSERT INTO `b_model` VALUES ('7', '4', '指导单位', 'zddw', '2');
INSERT INTO `b_model` VALUES ('8', '4', '战略合作单位', 'zlhzdw', '3');
INSERT INTO `b_model` VALUES ('9', '4', '支持单位', 'zcdw', '4');

-- ----------------------------
-- Table structure for `b_order`
-- ----------------------------
DROP TABLE IF EXISTS `b_order`;
CREATE TABLE `b_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `organ` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `order_date` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_order
-- ----------------------------
INSERT INTO `b_order` VALUES ('11', '6', '郑航', 'thunisoft', '程序员', '329247585@qq.com', '18201117315', '2', '1', '1413972405');
INSERT INTO `b_order` VALUES ('12', '6', '郑航', 'thunisoft', '程序员', '329247585@qq.com', '13476875187', '56', '2', '1413972420');
INSERT INTO `b_order` VALUES ('13', '6', '郑航', 'thunisoft', '哈哈', '329247585@qq.com', '18201117315', '16', '3', '1413972431');
INSERT INTO `b_order` VALUES ('14', '8', 'zhenhang', 'thunisoft', '科长', 'zhkm_cb@163.com', '18203417325', '54', '2', '1414048040');
INSERT INTO `b_order` VALUES ('15', '8', 'zhenhang', 'thunisoft', '地方', 'zhkm_cb@163.com', '15687587549', '546546', '3', '1414048052');
INSERT INTO `b_order` VALUES ('16', '9', '张金卡', '金卡给认同感是的', '反馈', 'zhkm_cb1@163.com', '13487589658', '3', '2', '1414048118');
INSERT INTO `b_order` VALUES ('17', '9', '张金卡', '金卡给认同感是的', '黑', 'zhkm_cb1@163.com', '13354875869', '8', '3', '1414048129');

-- ----------------------------
-- Table structure for `b_pictures`
-- ----------------------------
DROP TABLE IF EXISTS `b_pictures`;
CREATE TABLE `b_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `md5` varchar(255) NOT NULL,
  `model_id` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL COMMENT '链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_pictures
-- ----------------------------
INSERT INTO `b_pictures` VALUES ('39', '/uploadfile/images/1414572966_LgOKg.jpg', '/uploadfile/images/thumb_1414572966_LgOKg.jpg', '639f718f202b5e146c46bec71b75969e', '1', 'http://www.baidu.com');
INSERT INTO `b_pictures` VALUES ('40', '/uploadfile/images/1414572966_7fX4K.jpg', '/uploadfile/images/thumb_1414572966_7fX4K.jpg', '40e439e96ea932220863ccfafe069f89', '1', null);
INSERT INTO `b_pictures` VALUES ('44', '/uploadfile/images/1414573474_YQwI8.jpg', '/uploadfile/images/thumb_1414573474_YQwI8.jpg', 'b36a8ca8c8b898446256b6ca80e5561a', '1', null);
INSERT INTO `b_pictures` VALUES ('47', '/uploadfile/images/1415416610_meOKg.jpg', '/uploadfile/images/thumb_1415416610_meOKg.jpg', '6aab01e731d25fef19d169472b0f1e16', '1', null);

-- ----------------------------
-- Table structure for `b_team`
-- ----------------------------
DROP TABLE IF EXISTS `b_team`;
CREATE TABLE `b_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) DEFAULT NULL COMMENT '团队名称',
  `team_info` longtext COMMENT '团队简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_team
-- ----------------------------
INSERT INTO `b_team` VALUES ('1', '编写团队', '<p>		</p><p style=\"text-align: center;\"><img src=\"/uploadfile/ueditor/image/20141108/1415456412832277.jpg\" title=\"1415456412832277.jpg\" alt=\"td_pic.jpg\"/></p><p>文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内</p><p>	</p>');

-- ----------------------------
-- Table structure for `b_user`
-- ----------------------------
DROP TABLE IF EXISTS `b_user`;
CREATE TABLE `b_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `organ` varchar(255) DEFAULT NULL,
  `sculpture` varchar(255) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `reg_date` bigint(20) NOT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_user
-- ----------------------------
INSERT INTO `b_user` VALUES ('1', 'admin', 'e07f12824b7795391fba1af0411b106d', '管理员', 'thunisoft', '/uploadfile/20141022/1413971368_xyJwu.png', '172.16.203.216', '1415480417', '1413971368', '0');
INSERT INTO `b_user` VALUES ('2', 'zhenghang', 'e07f12824b7795391fba1af0411b106d', '测试账户', 'thunisoft', '/uploadfile/20141022/1413971368_xyJwu.png', '172.16.203.216', '1414859070', '1413971368', '1');
INSERT INTO `b_user` VALUES ('3', 'zhkm_cb@163.com', 'e07f12824b7795391fba1af0411b106d', '郑航', 'thunisoft', null, '127.0.0.1', null, '1414870909', '4');
INSERT INTO `b_user` VALUES ('4', '329247585@qq.com', 'e07f12824b7795391fba1af0411b106d', 'zhe', 'thunisoft', null, '127.0.0.1', null, '1414907611', '4');
INSERT INTO `b_user` VALUES ('5', '391360116@qq.com', 'e07f12824b7795391fba1af0411b106d', 'zh', 'thunisoft', null, '127.0.0.1', null, '1414908087', '4');

-- ----------------------------
-- View structure for `v_order_list`
-- ----------------------------
DROP VIEW IF EXISTS `v_order_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order_list` AS select `o`.`id` AS `id`,`o`.`user_id` AS `user_id`,`o`.`realname` AS `realname`,`o`.`organ` AS `organ`,`o`.`position` AS `position`,`o`.`email` AS `email`,`o`.`phone` AS `phone`,`o`.`quantity` AS `quantity`,`o`.`book_id` AS `book_id`,`o`.`order_date` AS `order_date`,`b`.`name` AS `bookName` from (`b_order` `o` join `b_book` `b`) where (`o`.`book_id` = `b`.`id`) ;
