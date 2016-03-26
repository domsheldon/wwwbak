/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : dsheldon

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-21 12:02:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `blog_article`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL DEFAULT '',
  `click` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `digest` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `author` varchar(20) NOT NULL DEFAULT '' COMMENT '作者',
  `user_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户uid',
  `category_cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类cid',
  `is_recycle` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `fk_article_user_idx` (`user_uid`),
  KEY `fk_article_category1_idx` (`category_cid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '有梦想就要去坚持', '0', '1456845491', '0', 'Upload/2991456845491_thumb.jpg', '从丽江到拉萨，近2000公里，沿着滇藏线，丽江、奔子栏、盐井、曲孜卡、邦达、然乌、林芝、拉萨。\r\n\r\n每个人心里都有座等待去翻的山，有条没有走完的路，有个想跨过去的界碑，有的界碑都是为了跨越，而我们有梦想，就要去坚持。 ', '程程', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('2', '心灵的旅行', '1', '1456845839', '0', 'Upload/59031456845839_thumb.jpg', '318', '科儒', '1', '1', '0');
INSERT INTO `blog_article` VALUES ('3', '算法--最短时间找出十包粉末中的两蓝粉末。', '0', '1456848487', '0', 'Upload/75721456848487_thumb.jpg', '', 'y丫t', '1', '2', '0');
INSERT INTO `blog_article` VALUES ('4', '通往全栈工程师的捷径 —— react', '1', '1456848558', '0', 'Upload/21231456848558_thumb.jpg', '', '腾讯bugly', '1', '3', '0');
INSERT INTO `blog_article` VALUES ('5', '我们前端是怎么找到工作的', '1', '1456848946', '0', 'Upload/67381456848946_thumb.jpg', '', '豪情', '1', '3', '0');

-- ----------------------------
-- Table structure for `blog_article_data`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article_data`;
CREATE TABLE `blog_article_data` (
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字seo',
  `des` varchar(255) NOT NULL DEFAULT '' COMMENT '文章描述 seo',
  `content` text COMMENT '文章内容',
  `article_aid` int(10) unsigned NOT NULL,
  KEY `fk_article_data_article1_idx` (`article_aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章数据表';

-- ----------------------------
-- Records of blog_article_data
-- ----------------------------
INSERT INTO `blog_article_data` VALUES ('318，程程 ', '', '<p style=\"text-align: center;\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai; font-size: 32px;\"></span><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-weight: bold;\">&nbsp;从丽江到拉萨，近2000公里，沿着滇藏线，丽江、奔子栏、盐井、曲孜卡、邦达、然乌、林芝、拉萨。<br/><br/>每个人心里都有座等待去翻的山，有条没有走完的路，有个想跨过去的界碑，有的界碑都是为了跨越，而我们有梦想，就要去坚持。 </span><br/><br/><br/><span style=\"color: rgb(51, 51, 51); font-family: 宋体;\"><img style=\"width:800px;height:533px\" alt=\"图片\" src=\"http://b326.photo.store.qq.com/psb?/7b08855e-1641-40cb-bbe3-1c71214a3943/r4JG3RxoDzs3OmhgwUND.*eNmqtA2TDAR35kBzoR44M!/b/dNvfW8JDLwAA&ek=1&kp=1&pt=0&bo=IAMVAiADFQIBACc!&su=4146960801&sce=0-12-12&rf=2-9\" data-src=\"http://b326.photo.store.qq.com/psb?/7b08855e-1641-40cb-bbe3-1c71214a3943/r4JG3RxoDzs3OmhgwUND.*eNmqtA2TDAR35kBzoR44M!/b/dNvfW8JDLwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;bo=IAMVAiADFQIBACc!&amp;su=4146960801&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"0\"/>&nbsp; </span></span><br/><br/><br/><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(51, 51, 51); font-family: 宋体;\">&nbsp; <span style=\"font-family: 楷体,楷体_GB2312,SimKai; font-weight: bold;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;滇藏线骑行攻略&nbsp;<br/></span><br/></span><span style=\"font-family: 楷体,楷体_GB2312,SimKai; font-weight: bold;\">云南大理古城——喜洲古镇——周城村——蝴蝶泉——沙坪村——鹤庆县——丽江古城——拉市海——虎跳峡镇——香格里拉（中甸）——纳帕海——尼西乡——奔子栏——白马（芒）雪山垭口之一———书松村——白马（芒）雪山的三个垭口——德钦——飞来寺——西藏盐井——红拉山垭口——芒康县（这段760公里，自行车码表测距），下面的线路痛川藏线，即：芒康县——拉乌山垭口——如美镇——觉巴山垭口——邓巴村——荣许兵站——东达山口——左贡县——田妥镇——邦达镇——业拉山垭口——怒江桥——八宿县——吉达乡——安久拉山口——然乌镇——松宗镇——波密县——古乡——102塌方区——通麦镇——排龙村——鲁朗镇——舍（色）季拉山口——林芝镇——八一镇——巴河镇——工布江达县——金达镇——加兴乡——松多村——米拉山垭口——日（如）多乡——墨竹工卡县——拉萨市，全程约1924公里，约27天。</span><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-weight: bold;\">&nbsp;</span><br/><br/><br/><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-weight: bold;\">&nbsp;横贯在横断山脉的地安葬公路，被金沙江、澜沧江、怒江分割，盘玉龙雪山、哈巴雪山、白茫雪山、太子雪山及梅里雪山而过，还需穿过长江第一湾、虎跳峡等天然屏障，起落差异很大，在十公里内，公路急降又再上升，气候也随高度而变化，充分领略“立体气候”——短暂的路程中，经历一年四季的气候。&nbsp;&nbsp;</span><br/><br/>&nbsp;</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; font-weight: bold;\">&nbsp;</span><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-weight: bold;\">装备：自行车（山地）、头盔、魔术方巾、骑行手套、副把、后货架、骑行裤、备胎、打气筒、组合工具包、驮包、手电或头灯、车尾灯、反光车贴、头盔贴、分体式雨衣、码表、卡、证件类、护肤、洗漱用品、 &nbsp; <br/>【选择类】：骑行服、睡袋、束裤带、运动眼镜、后视镜、防潮垫、刀具、餐具、水壶、火种、食品、口袋书、 &nbsp;<br/> 【药品】：创可贴、医用胶布、绷带、高锰酸钾（脸盆等都是公用，消毒用）、复方阿司匹林（退烧用）、红霉素软膏（皮肤磨破可用）、治拉肚子的药 &nbsp;<br/>【应对高反】及时预防，不要逞强，不合车友比速度，建议第一次进藏请选择青藏线缓上。 &nbsp;<br/><br/><br/>【骑行中的注意事项】 &nbsp; &nbsp;·&#39;新手上路，进行适当训练 &nbsp; ·不要长期处于极限状态 &nbsp; &nbsp;·骑行时间不要安排太紧，下大雨、雪尽量不要骑行 &nbsp; ·注重保暖、防暑 &nbsp; &nbsp;·熟悉攻略、检查车况 &nbsp; ·不要过度相信自己的车技 &nbsp; ·搭车不丢人 &nbsp;<br/> 【消费预算】 &nbsp;骑行中的食宿费用，不包括装备费用、乘车费用及景点门票费。滇藏线需1000——2500元。 &nbsp; <br/>【骑行最佳时间】 &nbsp;春秋两季，尽量不要再雨季骑行 &nbsp; &nbsp;<br/><br/><br/>【骑行者组队报名】：时间2014.6月初.滇藏线，丽江汇合。 有意的 QQ联系。<br/><br/></span></span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai; font-weight: bold;\">&nbsp;【穿衣指数】&nbsp;&nbsp;单裤、秋裤、长袖速干衣、外套（冲锋衣）、旅游鞋、凉鞋（可替代拖鞋）、抓绒衣。&nbsp;&nbsp;&nbsp;<br/><br/>&nbsp;【全线的吃住】&nbsp;&nbsp;沿线吃住并不困难，但是费用不低 。<br/><br/><br/></span><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">【具体骑行攻略】<br/> &nbsp;D1：云南大理古城（海拔2090米）——喜洲古镇——周城村——蝴蝶泉——沙坪村——鹤庆县（海拔2000米），约128公里。 &nbsp;沙坪村到鹤庆县约94.6公里。 【吃】午饭在沙坪村吃，经济又实惠；晚饭在鹤庆解决，那里的米糕出名。 【住】鹤庆家庭旅馆，20~40/人 &nbsp; <br/><br/>&nbsp;D2：鹤庆县（海拔2000米）——丽江古城（海拔2400米），约46公里。 【吃】午晚饭都在丽江解决。 &nbsp;【住】很多客栈，价钱不等，建议住青旅。桃园客栈20元一床，基本设施齐全外，还可租用山地车。 <br/>&nbsp;<br/> D3：丽江休整 &nbsp;<br/><br/>&nbsp;D4：丽江古城（海拔2400米）——拉市海——虎跳峡镇（桥头，海拔1853米），约79公里。 &nbsp;<br/><br/>&nbsp;D5：虎跳峡徒步 &nbsp;<br/> &nbsp;<br/>D6：虎跳峡镇（桥头，海拔1853米）——香格里拉（中甸，海拔3200米），约100公里。 【吃】午饭在沿途小饭馆解决，晚饭在香格里拉解决。 &nbsp;【住】融聚客栈（harmony guest house ）不错，位于香格里拉北门街22号。<br/>联系方式：13988747739<br/>（手机） &nbsp; &nbsp; &nbsp; 永生旅馆中心镇古城中甸仓房街28号，适合背包客。联系方式：0887-8222448 &nbsp;<br/><br/>D7：香格里拉（中甸）休整 &nbsp; <br/><br/>&nbsp;D8：香格里拉（中甸，海拔3200米）——纳帕海——尼西乡——奔子栏——白马（芒）雪山垭口之一（海拔4400米）——书松村，约109公里。 &nbsp;【吃】午饭在奔子栏，晚饭在书松，书松交通旅馆能吃+住，约20元一人。 【住】书松小旅馆，10~20元一人，洗澡条件有限 &nbsp; <br/><br/>&nbsp;D9：书松村——白马（芒）雪山的三个垭口（海拔：4350米、4392米、4400米）——德钦（海拔3200米），约80公里。 &nbsp;【吃】午饭自带，晚饭在德钦县城解决&nbsp;</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">【住】德钦县城内20元一人的客栈还是比较多，条件不是很好。宾馆不错，80元一人。 &nbsp;<br/><br/>D10：德钦（3200米）——飞来寺——西藏盐井（海拔2500米），约112公里。 【吃】午饭自带，晚饭在盐井解决 【住】住宿条件不好，早民居借住。 &nbsp; &nbsp;<br/><br/>D11：盐井镇（2500米）——红拉山垭口（4253米）——芒康县（3780米），约106公里。 【吃住】午饭自带，晚饭在芒康解决。 &nbsp;<br/><br/>D12：芒康县（3850米）——拉乌山垭口（4338米）——如美镇（澜沧江大桥，2650米）——，约50公里。 &nbsp;【吃住】半天可以骑到，午饭晚饭在如美解决。如美小旅馆，10元一人。 &nbsp;<br/> &nbsp;<br/>D13：如美镇（2640米）——觉巴山垭口（3908米）——邓巴村（3440米）——荣许兵站（4100米），约48公里。 【吃】午饭在&nbsp;邓巴村解决，晚饭在荣许兵站或对面的藏族老大爷家的小卖部解决——小卖部亦可住宿（不提供卧具），5元一人 &nbsp;【住】荣许兵站，晚餐+早餐10元（早八点开饭）+住40元 &nbsp;<br/> &nbsp;<br/>D14：荣许兵站（4100米）——东达山口（5008米）——左贡县（3877米），约62公里。 【吃】自备午饭，晚饭在左贡解决。 &nbsp; &nbsp;&nbsp;【住】左贡对面的“川味住宿店”10元一人，左贡县招待所10~15元一人。 <br/>&nbsp; <br/>&nbsp;D15：左贡县（3877米）——田妥镇（3906米）——邦达镇（4120米），约113公里。 【吃住】午饭在田妥镇解决，同时补水。<br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;晚饭在邦达解决。邦达青年旅社（背包客之家）15元一人，川渝宾馆，15元一人。 <br/>&nbsp; &nbsp;<br/>D16邦达镇(4120米）——业拉山垭口（4600米）——怒江桥（2740米）——八宿县（3300米），约97公里。 &nbsp;带足水和食物，半 &nbsp;路补给不方便。 &nbsp;【吃住】午饭自带，晚饭在八宿县。武装部招待所，25元一人，24小时可洗澡。<br/> &nbsp;<br/> D17：八宿县（3300米）——吉达乡（3824米）——安久拉山口（4320米）——然乌镇（3920米），约93公里。 此段消耗体力非常大。 &nbsp;【吃住】午饭在吉达乡解决，饭菜很贵。住宿很多。 &nbsp; <br/><br/>D18：然乌休整 &nbsp;然乌湖、来古冰川、瓦村 &nbsp; <br/>&nbsp;<br/>D19：然乌镇（3920米）——松宗镇（3030米）——波密县（2750米），约136公里。 【吃住】午饭松宗镇，面条8元一碗，量大。晚饭在波密解决。住波麦宾馆，可洗澡。 &nbsp; <br/><br/>D20：波密县（2750米）——故乡镇（2600米）——102塌方区——通麦镇（塘麦镇，2080米），约95公里。 &nbsp;【吃住】午饭在古乡，晚饭在通麦镇。通麦宾馆，20元一人。 &nbsp;</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">&nbsp;<br/>D21：通麦镇（2080米）——排龙村（2030米）——鲁朗镇（3270米），约78公里。 路及其艰险，排龙天险。 &nbsp;【吃住】午饭自带，晚饭在鲁朗。石锅鸡出名较贵。住鲁朗兵站或小卖部。 &nbsp;<br/> &nbsp;<br/>D22：鲁朗镇（3270米）——色季拉山口（4620米）——林芝县（2500米）——八一镇（3000米），约75公里。 【吃住】午饭自带，晚饭咋八一解决。八一教育宾馆超值，八一渡口客栈推荐。 <br/>&nbsp; &nbsp;<br/>D23：八一镇（3000米）——巴河镇（3228米）——工布江达县（3440米），约127公里。 【吃住】午饭在巴河镇，晚饭在工布达江县。住粮食局招待所，10元一人。 <br/><br/>D24：工布江达县（3440米）——金达镇（3650米）——加兴乡（3903米）——松多村（4170米），约96公里。 【吃住】午饭在金达镇或新兴镇解决，松多道班可借宿，离开时请打理干净。送多兵站亦可。 &nbsp;<br/><br/>D25：松多村(4170米)——米拉山垭口（5030米）——日多乡（4380米）——墨竹工卡乡（3830米），约82公里。 &nbsp;【吃住】午饭自带，晚饭在墨竹工卡解决。小旅社，10~20元一人。 &nbsp; D26：墨竹工卡乡（3830米）——拉萨市（3650米），约74公里。<br/><br/><br/></span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">骑行</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">——人生的一个转折点，失去什么，又会得到什么？</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">只有先失去什么，而后才会得到什么。</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">失去了工作，得到了自由？</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">失去了时间，得到了经验？</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">失去了队友，得到了思念，泪水？</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">……</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">失去已成心里的那份沉甸甸的思念，珍惜现在才是最应该做的事情，</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">同时失去了什么都不可怕，可怕的是失去了信念，失去了信心，自信，自我</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">请你珍惜现在吧，珍惜现在的每分每秒，珍惜现在的工作，珍惜现在的生活，珍惜现在的不愉快和愉快，珍惜现在的快乐与痛苦</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">珍惜此时此刻 。。。&nbsp;</span></p><p><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\">&nbsp;</span></p><p></p><p><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-weight: bold;\"><br/>&nbsp;<br/></span></p><p><br/><br/><br/></p><p></p><p><br/></p></p>', '1');
INSERT INTO `blog_article_data` VALUES ('318', '', '<p><span id=\"paperTitle\" style=\"color: rgb(255, 255, 255); padding-top: 25px; font-family: 楷体,楷体_GB2312,SimKai; font-size: 26px; display: block; word-break: break-all;\">心灵的旅行</span></p><p><br/></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">——写给因各种原因囚困自己的年轻人<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; </span><strong><span style=\"color: rgb(15, 36, 62); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px; font-weight: normal;\">我是陈科儒，1988年出生于川中丘陵子昂故里，骑行源于天生对地图的好奇和对地理的热爱，回首一路走来的心路历程，就像</span><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px; font-weight: bold;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px; font-weight: normal;\">是是一颗种子纯净的发芽生长的过程，那么的简洁而让人回味。</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px; font-weight: normal;\">&nbsp;<br/>&nbsp;</span></span></span></strong></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><strong><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px; font-weight: normal;\">&nbsp; &nbsp;&nbsp;02年5月14号，探索的种子开始发芽，利用中考全校放假的机会我和邻居徐氏兄弟骑车去了23公里外的金华镇；03年初中毕业，骑了一趟50公里外的三台县；04年高一暑假骑车到125公里外的绵阳市，夜宿东方红大桥底下草地；高二那年姑父送我一辆二手喜德盛，欣喜不已给妈妈留下纸条后偷偷骑到220公里外的成都，却遭遇小偷狼狈回家；高三时每周放半天假，便跟班上几个哥们骑车去周边乡镇，由于各种状况导致晚自习迟到，被班主任批评后为了专心备考而主动转学，直到高考结束。<br/><br/>&nbsp; &nbsp; 在上大学之前，我一直没有走出过四川盆地。</span></strong></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><strong><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px; font-weight: normal;\">&nbsp; &nbsp; 06年高考填志愿的时候脑海里只想着去祖国中部，以完成周游祖国的梦想，于是来到上昆京广交叉的湖南，就读于湘潭大学旅游管理专业。</span></strong></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><strong><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px; font-weight: normal;\">&nbsp; &nbsp; 于是开始了下面的故事。<br/>&nbsp;</span></strong></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/uxoWeje9UXR9Mn0tngjs6MHriX.FvgmbDHDX7m9Il94!/b/Ye73J4C0JgAAYjIiNIBBJgAA&ek=1&kp=1&pt=0&su=054961361&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/uxoWeje9UXR9Mn0tngjs6MHriX.FvgmbDHDX7m9Il94!/b/Ye73J4C0JgAAYjIiNIBBJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=054961361&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"0\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;（07年7月摄于香格里拉三中围墙）</span></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 上大学后，行走四方的梦想被埋藏在心底最深处，那时的我，从思想意识，人生阅历，物质条件上都是一片空白，环游中国犹如痴人说梦，</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">只有潜意识在暗暗指使自己，要不断行走。所以大学的前两年，我一直在尝试极度穷游——以最少的钱去到最多的地方。</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\"><br/>&nbsp; &nbsp; 大学的第一个假期去了当时最向往的城市——上海。小姑赞助了这部800多元的欧亚马折叠车，大一的暑假它带着我去了当时心中最美的地方，叫做香格里拉。那是07年7月上旬的事。从昆明到香格里拉8天时间，总共花了226块。那时满天下打听谁认识云南的，以便经过时借宿。那时自己用横幅做了个帐篷，在风花雪月的苍山半坡上被风刮得一夜未寐。<br/></span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img style=\"width:480px;height:360px\" alt=\"图片\" src=\"http://b3.photo.store.qq.com/psu?/511722390/weeLbeikILN8uOrLSsfeHeKYalEgHntFPWKtk7s1xBk!/b/YXbnzwFTXwAAYgOc3QHlQwAA&ek=1&kp=1&pt=0&su=0223118753&sce=0-12-12&rf=2-9\" data-src=\"http://b3.photo.store.qq.com/psu?/511722390/weeLbeikILN8uOrLSsfeHeKYalEgHntFPWKtk7s1xBk!/b/YXbnzwFTXwAAYgOc3QHlQwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0223118753&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"1\"/></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp; 记得那时路上遇到三男一女走滇藏线去拉萨的，当时还很无知</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">的研究别人的车，看到码表的时候，觉得这个玩意太不可思议了，顿时一阵膜拜。“哇塞，骑车还可以去西藏的啊！”那时的我对骑游是没有概念的，我就像小孩一样好奇的逼问他们各种弱智的问题。</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/KNnkIH3vq.LdmxQFHMu24*ClDXrmZMIgPDunxGmXtqc!/b/YcBGOoCZJgAAYjvCOICdJgAA&ek=1&kp=1&pt=0&su=05602017&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/KNnkIH3vq.LdmxQFHMu24*ClDXrmZMIgPDunxGmXtqc!/b/YcBGOoCZJgAAYjvCOICdJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=05602017&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"2\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 20</span><span style=\"color: rgb(15, 36, 62); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">08年1月，大学里唯一一次放假就回家的假期，那一年南方发生了罕见的冰雪灾害，再晚几天我险些就回不到四川了。这一年我刚二十岁，看似青涩，却是家里最懂事的孩子。<br/><br/></span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 从小到大，没有任何人指点过“你应该去旅行”，而是与大部分少年一样，耳边只有长辈的“好好读书，不许到处玩”的告诫。过早的思想独立让我开始萌生大胆的想法，当然这个“大胆”只是相对于当时的我而言，这些年的经历就好比是登山——登上来一点过后看到了比平地上更广的视野，越往上便尝到越多的甜头，于是不可收拾的往上登。<br/>&nbsp;</span></span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/2E.I4vckrEDD3ZRhmvdyTIH7tlfVDYiALxWwcZpwfIU!/b/YWtSZ35enwAAYkNpan6dngAA&ek=1&kp=1&pt=0&su=0295761&sce=0-12-12&rf=2-9\" data-src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/2E.I4vckrEDD3ZRhmvdyTIH7tlfVDYiALxWwcZpwfIU!/b/YWtSZ35enwAAYkNpan6dngAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0295761&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"3\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;08年夏天，在学生会勤工俭学赚的钱买来这辆二手喜德盛，怀着满腔对共和国首都的向往，和同学瞿勇一起沿107国道走向北京。在学校里打听了所有认识的人，为路上的借宿绞尽脑汁，结果十四个晚上有一半都是在之前联系好的朋友家里过的，另外七个晚上则是住的十块一晚的小旅馆，七天的住宿费70元。当时省钱的方法是，即便某天晚上到了一个城市或者县城，也要再往前走一二十公里，到达下一个小镇，因为小镇上的吃住都比城市便宜一些。这一趟，总共花了500块。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/Cj0zhea1tx0cG0doTNGVdCzSYUl7xjoh0lxwAzOVPN0!/b/YVybw4AHJgAAYiaTwID5JQAA&ek=1&kp=1&pt=0&su=0150205585&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/Cj0zhea1tx0cG0doTNGVdCzSYUl7xjoh0lxwAzOVPN0!/b/YVybw4AHJgAAYiaTwID5JQAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0150205585&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"4\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;&nbsp;当时除了自己做帐篷，还用喷绘缝了一个驼包——在四根绳子的帮助下坚持到了北京，最后连车全送人了，弄得西单地铁入口那个清洁工许久没有思索明白为啥天上会掉馅饼——因为当时急着回家，又没钱托运。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/r2iEaaPSOVXacOYU*CU8b3QI972uGUKWoVYLKCtozlQ!/b/YUNvAX9yUwAAYlvr*36AUwAA&ek=1&kp=1&pt=0&su=0125304865&sce=0-12-12&rf=2-9\" data-src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/r2iEaaPSOVXacOYU*CU8b3QI972uGUKWoVYLKCtozlQ!/b/YUNvAX9yUwAAYlvr*36AUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0125304865&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"5\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;&nbsp;七月的中国大陆，闷热的南方，简陋的装备，累得全身发软，每当遇到这样的清凉小河，便激动不已。于是把车往路边一靠，跳进水里尽情浸泡，洗去一路风尘和疲惫。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/igsVpuc4rBdKn5N3ln14zHX1OGIbnsuE4Hu5EM.Ueeo!/b/YXiHLICMJgAAYiKAKYCPJQAA&ek=1&kp=1&pt=0&su=011480737&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/igsVpuc4rBdKn5N3ln14zHX1OGIbnsuE4Hu5EM.Ueeo!/b/YXiHLICMJgAAYiKAKYCPJQAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=011480737&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"6\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;当时学生会璐姐的朋友在武汉招待了我，一夜饱餐后神清气爽过长江。回头想想，这三年多来足迹是踏遍了大江南北，但人情债也是欠了一屁股，不管是认识的人还是陌生人，每一个帮助过我的人我都铭记在心，我想我会以自己的方式回报社会。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b211.photo.store.qq.com/psb?/V13JGZm715lRIx/4Cc2DCIXVH6lzTjGyaMl7Chsl68NhMbskErkPWMg.qE!/b/YYVf030AoQAAYj7K0X3GngAA&ek=1&kp=1&pt=0&su=0233163761&sce=0-12-12&rf=2-9\" data-src=\"http://b211.photo.store.qq.com/psb?/V13JGZm715lRIx/4Cc2DCIXVH6lzTjGyaMl7Chsl68NhMbskErkPWMg.qE!/b/YYVf030AoQAAYj7K0X3GngAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0233163761&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"7\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp; 花了半个月到了北京，参观天安门，长城，颐和园，也许是作为一个中国人的必修课。那时上大二的我，登上长城时很激动，很有成就感。也是那一年，湘潭一些朋友走了川藏，全国进藏洪流开始火喷，网上流传的西藏帖子融化了数以万计的年</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">轻心灵。&nbsp;<br/><br/>&nbsp; &nbsp;&nbsp;一直以来，我都行走在自己的世界中，按照自己所设计的道路一步一步向前走，不关注论坛贴吧，也没有博客和微博，不关心别人怎么了，当然也没有人知道我。从灵魂上，我一直是一个人在行走。这样的方式保存了真正的自己，但是也错过了许多交流学习的机会，得失之间的夹缝，是人成长的必经之路。<br/>&nbsp; &nbsp; 直到今天，我仍然庆幸，我坚持了自我。&nbsp;<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/bMH9TRKERRvnkoAiep.5xHlrVXrGvtAZdSarO5Z42UE!/b/Ybsso3*wUgAAYiSKmH8pUwAA&ek=1&kp=1&pt=0&su=0225981793&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/bMH9TRKERRvnkoAiep.5xHlrVXrGvtAZdSarO5Z42UE!/b/Ybsso3*wUgAAYiSKmH8pUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0225981793&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"8\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 08年11月16号，怀着对大海的无限憧憬，我决定南下。当时花了四百元买的二手勇士，破旧不堪，但对我已经是非常happy的事了，这是我第一次有自己的所谓山地车，性能比起之前的杂牌货强多了。头盔货架都是借的，带了一床超市里19.9元买的薄薄的毯子出去作被子，带了520块就出发了，经衡山，桂林，阳朔，南宁，北海海口到三亚，总共花了430块，其中渡海坐船120，三亚回湘坐火车花了130。<br/>&nbsp;</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/EmCsgtjwKvbvVurCqrpaH3tjynQf.bBS.KMKFx6Xn7o!/b/YTJBzoCbJgAAYveVw4DaJgAA&ek=1&kp=1&pt=0&su=04011025&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/EmCsgtjwKvbvVurCqrpaH3tjynQf.bBS.KMKFx6Xn7o!/b/YTJBzoCbJgAAYveVw4DaJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=04011025&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"9\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; 这次旅行对我的意义在于，这是我第一次抱定决心不进旅馆，果然收获了自己想要的故事，也打开了自己对旅行认知的大门。从那以后，我旅行的重点就是借宿，最大的乐趣就是和当地人聊天，交流，做了朋友后他们邀请我到家里共餐或者留宿，这是我最乐意看到的。如果没有遇到说话投机或是热情的老乡，我也不悲观埋怨，借他们的屋檐或院子过一夜，晚上去客厅跟他们聊天，我也会满足，因为不论善恶，这就是我看到的最真实的人性。我从不求人收留我，因为睡一觉不是我的最终目的，而是从交流中了解当地文化习俗。<br/><br/>&nbsp; &nbsp; 借宿给我的旅途增添了许多故事，但更多的，是这种方式让我认识到的中国大地上生活的各个族群，以及他们身上所保存的原始人性。这种人性体现在生活方式，饮食习惯，婚嫁习俗等等。<br/>&nbsp; &nbsp; 海南之行过后，我的旅行不再是一味的穷游，而是带着探访、学习性质的游历。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/ApkZIvB8iAUVpj7qcYrurha0dhFPzDD7Ra1jxM0eqlI!/b/YVKNLIAAJgAAYmHIO4DXJgAA&ek=1&kp=1&pt=0&su=0174189025&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/ApkZIvB8iAUVpj7qcYrurha0dhFPzDD7Ra1jxM0eqlI!/b/YVKNLIAAJgAAYmHIO4DXJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0174189025&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"10\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;我热爱祖国，我认为旅行不单单是对自己的磨砺和积累，也是爱国的一种体现——认真的了解祖国的每一座山，每一条河，每一个民族，每一种文化，在介绍给国际友人时可以滔滔不绝，如数家珍。<br/>&nbsp;<br/>&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; 第一次见海是在北海银滩，那时觉得银滩的沙子好细好细，见到海浪卷来是多么激动啊！几天后到达亚龙湾，才感慨一山更比一山高，一海更比一海深。趴在洁白细腻的沙滩上，任滚滚海浪拍打，抱着2.5元一个的椰子幸福的吮吸，有这样的体验我奔波千里也知足了。<br/>&nbsp;<br/>&nbsp; &nbsp; </span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">每完成一次旅行，就像登上了一层台阶，让我看到了更多风景，于是计划着下一次更远的旅行，人类也就是这样一步一步走远的，正所谓不积跬步无以至千里。慢慢的，走得多了以后，便从得失之中明白了自己的追求，开始有了明确的方向。</span><span style=\"color: rgb(15, 36, 62); font-family: 隶书; font-size: large;\"><span style=\"color: rgb(15, 36, 62); font-family: 楷体,楷体_GB2312,SimKai;\"><br/></span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/wOC4v9pFKlIJ6UsiaMwe1DprePyI*x.SwHvO*83wy7c!/b/YVOELIC1JgAAYqxHOoCuJgAA&ek=1&kp=1&pt=0&su=061724993&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/wOC4v9pFKlIJ6UsiaMwe1DprePyI*x.SwHvO*83wy7c!/b/YVOELIC1JgAAYqxHOoCuJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=061724993&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"11\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 2008年12月，原本组织了长株潭几所高校去灾区慰问，到最后无人出来担责只好自己一个人走。第一次在寒冬骑行，经张家界，湘西，重庆，成都到达汶川映秀镇，一路借宿下来，花了240块。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img style=\"width:670px;height:502px\" alt=\"图片\" src=\"http://b12.photo.store.qq.com/psu?/a8f10ab2-b4cb-45a1-b561-fabb056f5abc/pfAto.Ft3KvP6uiqd7doEs*5Yg9siUHWySV4PWXldoM!/b/Yd1dOQcVTAAAYgQjKgebSwAA&ek=1&kp=1&pt=0&su=0130113585&sce=0-12-12&rf=2-9\" data-src=\"http://b12.photo.store.qq.com/psu?/a8f10ab2-b4cb-45a1-b561-fabb056f5abc/pfAto.Ft3KvP6uiqd7doEs*5Yg9siUHWySV4PWXldoM!/b/Yd1dOQcVTAAAYgQjKgebSwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0130113585&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"12\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 经过半个月到达震中映秀镇，目光所及之处，山塌石裂，满目疮痍。</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">原本靠着岷江边的陡崖修的这座百花大桥，被震中喷出的石流冲垮，这股沿着山沟流下几公里的石流，差点阻断了岷江。地震后的景象让人震惊，身在山谷里看着这一切，仍能感受到地震爆发时的天昏地暗。活下来的人都是幸运的，劫后余生的他们擦干眼泪继续投入到重建家园的队伍中来，跟他们聊天时，听到的满是一种无奈的豁达。&nbsp;<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img style=\"width:670px;height:502px\" alt=\"图片\" src=\"http://b20.photo.store.qq.com/psu?/cf19eb74-1ea3-4a7a-857f-5ef7342fe1c5/elRgIbNGnfW4iTF3H.3wxd.aDjhEowTh4izFctQJhJM!/b/YdxdNQ3DDAAAYhaA.QuUrwAA&ek=1&kp=1&pt=0&su=019279889&sce=0-12-12&rf=2-9\" data-src=\"http://b20.photo.store.qq.com/psu?/cf19eb74-1ea3-4a7a-857f-5ef7342fe1c5/elRgIbNGnfW4iTF3H.3wxd.aDjhEowTh4izFctQJhJM!/b/YdxdNQ3DDAAAYhaA.QuUrwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=019279889&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"13\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 20</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">09年6月，我也随进藏大流走了川藏线，以平均一天50块的花销走了22天，全程骑下来路上花了1200块，加上当时为川藏买的车和装备总共花掉2300块。&nbsp;这次旅行我自己理解为国家支助我的旅行，钱的来源大部分是地震受灾学生的抚慰金。自始自终，我没有因旅行向家里伸手。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/2VRafsYDQUVBBhjJfoy9BOZ5ODER*Nt0mSYRJV6JpqY!/b/YYRi*n4CVAAAYgVz*n5qVAAA&ek=1&kp=1&pt=0&su=0255210561&sce=0-12-12&rf=2-9\" data-src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/2VRafsYDQUVBBhjJfoy9BOZ5ODER*Nt0mSYRJV6JpqY!/b/YYRi*n4CVAAAYgVz*n5qVAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0255210561&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"14\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; 西藏波密的洁白雪山锐气冲天，山的那边就是中国最后一个通公路的县城——墨脱，山的那边，有两倍于台湾岛的富饶领土被阿三的军队占领，喜马拉雅的圣洁雪山融水，却滋养着别国子民。<br/><br/>&nbsp; &nbsp; 一提起藏南，总是让人痛心和惋惜。世界原本是由陆地和海洋构成，人类快乐的生活在陆地上，春夏秋冬周而复始。然而人类文明开始成熟，人群分成了各个部落，然后有了国家，为了利益而爆发战争，国家和政治将这块陆地划分成许多小块，我真不知道应该感谢她还是该憎恨她。<br/><br/>&nbsp; &nbsp;&nbsp;国界和板块、阶梯交界处一样，通常是山水险阻，人迹罕至的地方，这原本是现代人游历世界的绝佳去处，却通常在一块“军事禁区禁止进入”的路牌下停下脚步。藏南便是这样一块让我辈只能在叹息中冥想的地方，希望有朝一日可以挖掉地雷，重新变成人类的乐土。<br/><br/>&nbsp;</span><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/9dMijjotgQakbTo3Tt45qfoJmxzCEFQc16xwa4CRKbY!/b/YV01N4DGJgAAYih3KYCHJgAA&ek=1&kp=1&pt=0&su=0214005745&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/9dMijjotgQakbTo3Tt45qfoJmxzCEFQc16xwa4CRKbY!/b/YV01N4DGJgAAYih3KYCHJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0214005745&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"15\"/></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 川藏线一共有14个4000米以上的山口，每个山口都是一个悦耳的音符，整段旋律才那么跌宕动听。卡子拉山口的云轻柔如海绵，让人不由得感叹</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">云淡风轻，天人合一。</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/oC.tKiEq65JkueZmY3IOENn0OPT4HBs.upG9ZWcgOWY!/b/YTtnan6enwAAYl.0X35engAA&ek=1&kp=1&pt=0&su=0201914753&sce=0-12-12&rf=2-9\" data-src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/oC.tKiEq65JkueZmY3IOENn0OPT4HBs.upG9ZWcgOWY!/b/YTtnan6enwAAYl.0X35engAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0201914753&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"16\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp; &nbsp;在雅江以东30公里处遇到的藏族女孩，十八岁的花季，如同青稞田边静默绽放的格桑，用她淡魅的嫣红，一年又一年的守望着高原的白雪和绿草。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b211.photo.store.qq.com/psb?/V13JGZm715lRIx/NX4hMd591WbSKnHra3RZ1YyqsjI1pnAwlg8QZ.UP06s!/b/YQ1P033LngAAYg6*y33pngAA&ek=1&kp=1&pt=0&su=0252405793&sce=0-12-12&rf=2-9\" data-src=\"http://b211.photo.store.qq.com/psb?/V13JGZm715lRIx/NX4hMd591WbSKnHra3RZ1YyqsjI1pnAwlg8QZ.UP06s!/b/YQ1P033LngAAYg6*y33pngAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0252405793&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"17\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp; &nbsp;在成都买的一辆捷安特680，陪我走完了川藏，除了这辆车，其他东西基本上都是朋友支援的。感谢小贝借的驼包，李彬给的头巾，华波借的帽子，尚文送的背包，姑父送的相机，和尚借的速干衣裤，全身上下承载着太多人的梦想。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/r71d6XRj.*xzhUAQEnaihMpU6ILk8jPNlmL5Y3AvpI0!/b/YaERmn8fVAAAYkMLmn.FVAAA&ek=1&kp=1&pt=0&su=0154853889&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/r71d6XRj.*xzhUAQEnaihMpU6ILk8jPNlmL5Y3AvpI0!/b/YaERmn8fVAAAYkMLmn.FVAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0154853889&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"18\"/></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp; 理塘县城，世界高城，海拔将近四千米，多位藏族名人的诞生地，</span><span style=\"color: rgb(0, 0, 0); text-indent: 30px; font-family: 宋体; font-size: 24px;\">包括第七世达赖喇嘛给桑降措、第十世达赖喇嘛、外蒙古佛教的精神领袖哲布尊丹巴、拉卜楞寺第五世嘉木样活佛等。</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b217.photo.store.qq.com/psb?/V13JGZm715lRIx/p5YEeYURK.*4654uV2ys3jSQUOhWaOEumq5oXFJc2q4!/b/YSPaZoF*JgAAYjjUY4EiJgAA&ek=1&kp=1&pt=0&su=082027441&sce=0-12-12&rf=2-9\" data-src=\"http://b217.photo.store.qq.com/psb?/V13JGZm715lRIx/p5YEeYURK.*4654uV2ys3jSQUOhWaOEumq5oXFJc2q4!/b/YSPaZoF*JgAAYjjUY4EiJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=082027441&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"19\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">理塘草原拍的一块突兀的岩石，那时遇到了从上海骑过来的于哥，后半程便一起走。这张照片拍了之后四个小时，在翻海子山的时候遭遇冰雹雷雨。第一次遇到极端恶劣天气，惊慌失措而不知躲往何处，刹那间头顶被雷电划过，九死一生。于哥也是第一次骑长途，所有的事都得自己去经历，没人告诉你哪里危险哪里困难，就算做了很充分的准备，也无法等同于避免危险的经验，经验的获取很多的时候都是需要代价的。<br/>&nbsp; &nbsp;&nbsp;其实危险并不可怕，可怕的是之前你并不知道那是一个危险，这便是经验的价值所在。用危险经历换来的宝贵经验，去告诉其他人不要在同一个地方跌倒，这便是分享的意义所在。<br/>&nbsp; &nbsp; 我和西藏的第一次亲密接触，非常忐忑，却也让人怀念，有一种初恋的心跳与慌张。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/pLAvAWUJHxl4kccrDT95*P1L18acu*jhJ1SOLBTugrY!/b/YaSxoX8mVAAAYj6xoX8yUwAA&ek=1&kp=1&pt=0&su=0202202929&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/pLAvAWUJHxl4kccrDT95*P1L18acu*jhJ1SOLBTugrY!/b/YaSxoX8mVAAAYj6xoX8yUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0202202929&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"20\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 山口往西两公里遇见姊妹海，绝世奇观刹那间铺展在眼前，让人没有一丝心理准备，只好不停摇头赞美，海子山便由此湖而得名。姊妹海的美在于她的波澜不惊，宛如大山怀拥的两面美人镜，亦如同上天撒落凡尘的两滴销魂泪——在经历生死过后见到这么壮美的景象，真的是欢笑中含着泪花。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/5CQhm9RhbxmTImZ.VXKdDRsuPNqyev3RFIxDdxGRSt0!/b/YevpaH7tnwAAYgLgaH7rnwAA&ek=1&kp=1&pt=0&su=0256668753&sce=0-12-12&rf=2-9\" data-src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/5CQhm9RhbxmTImZ.VXKdDRsuPNqyev3RFIxDdxGRSt0!/b/YevpaH7tnwAAYgLgaH7rnwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0256668753&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"21\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; </span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">越过金沙江进入西藏，便进入了危险的三江五山地带，三条大江夹着五座大山。川藏线有三条著名的“危险山沟”——海通沟、怒江沟、牛踏沟，以及一条地质灾害频发的“高危地段”——排龙天险。<br/>&nbsp; &nbsp;&nbsp;这里是刚进西藏界的海通沟，脚下便是汹涌浑黄的金沙江支流。庆幸的是那天我们赶到了芒康，而没有如攻略所说住在日荣温泉山庄，当晚那条山沟下暴雨引发泥石流而砸扁了两辆赶夜路的货车。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/ApijPF0YrlX8ZVsOZ709Wp5USsLWgdHn6Sg4t6Ne*vY!/b/YTtzlX.dVAAAYqkwo3.QVAAA&ek=1&kp=1&pt=0&su=041771057&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/ApijPF0YrlX8ZVsOZ709Wp5USsLWgdHn6Sg4t6Ne*vY!/b/YTtzlX.dVAAAYqkwo3.QVAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=041771057&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"22\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;澜沧江与318相交的地方，下拉乌山的路全是沙石，进藏之前在网上听说有个人从这个地方冲下去没回来，让人不得不提高警惕。一般的下山路我只会在弯道处捏一把刹车，而下拉乌山是我唯一一次下山绷紧神经的捏紧刹车，极度小心的。当我见到这个交汇点时，心有余悸的安慰自己，还好比较慢，因为那个转弯的地方很多沙石，速度稍快就会导致轮胎打滑而坠入澜沧江。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/x7KiIm8w59s15W0OOoBXK*zhpewPbzUBaP.Hs8aw6lQ!/b/YfSFmH9vUwAAYvAAl3*XUwAA&ek=1&kp=1&pt=0&su=0182490177&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/x7KiIm8w59s15W0OOoBXK*zhpewPbzUBaP.Hs8aw6lQ!/b/YfSFmH9vUwAAYvAAl3*XUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0182490177&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"23\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; </span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">怒江七十二拐，如同大山肩上的丝带，连通山巅与谷底，第一眼看见它的时候激动异常。之前在国家地理上看到过这张照片的全景图，便开始无限向往，真正来到跟前时，不由得赞叹不已，赞叹大自然，也赞叹英雄的筑路工人。从成都出发时装的一副3块钱的刹车皮，一直坚持到这里才换上新的。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/iYkz0acwARSRGSo9E8VGbE61fXstoGvl5uFVIWnneW0!/b/YRO4yYBiJgAAYoafw4B.JgAA&ek=1&kp=1&pt=0&su=0251390529&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/iYkz0acwARSRGSo9E8VGbE61fXstoGvl5uFVIWnneW0!/b/YRO4yYBiJgAAYoafw4B.JgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0251390529&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"24\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;怒江上空的雄鹰，是我无意间甚至没看镜头的对着天空的一拍，竟获得如此绚烂的光彩和雄鹰翱翔的英姿，让我分外惊喜。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/*4qIV3AqXQc0SAdStQaJJUWYVroq24DA7UeBrBdpanI!/b/YXA.OoBRJgAAYq.ALIAtJwAA&ek=1&kp=1&pt=0&su=094063633&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/*4qIV3AqXQc0SAdStQaJJUWYVroq24DA7UeBrBdpanI!/b/YXA.OoBRJgAAYq.ALIAtJwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=094063633&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"25\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;色季拉山的晨光打印着我艰难的爬坡姿势，川藏线上的倒数第二座山，翻过去就到林芝，就到了尼洋河谷地，川藏线也差不多胜利了。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/IqjhQC7u4690GTc0ycjOijDXkrPH7RWynpxbb8ILlik!/b/YYeHmH9lUwAAYi0ooH.0UwAA&ek=1&kp=1&pt=0&su=0161141297&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/IqjhQC7u4690GTc0ycjOijDXkrPH7RWynpxbb8ILlik!/b/YYeHmH9lUwAAYi0ooH.0UwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0161141297&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"26\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;在</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">到达松多之前，离拉萨200公里处路边休憩。在离松多镇两公里的一个小木屋泡温泉时严重高反，再次险些丧命。那里海拔4300，我又连续骑行急冲冲的到了温泉，很激动，因为没泡过，再加上没喝水没休息，直接下到四十多度的水里，感觉很累，当时也不知道是什么原因，便起来休息片刻后再下水，但仍然很难受，于是再下去了一次，拍了两张照片后，上来准备穿衣服，结果在十秒内失去知觉。多亏于哥在场，多亏包里还留了两支葡萄糖救了我的命。<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b217.photo.store.qq.com/psb?/V13JGZm715lRIx/z5I40D0gCugqbDLTEFlWPA*0w1alD*9Ws6qhcfuc4hY!/b/YQfXY4ELJwAAYkwsXIFnJgAA&ek=1&kp=1&pt=0&su=0103485841&sce=0-12-12&rf=2-9\" data-src=\"http://b217.photo.store.qq.com/psb?/V13JGZm715lRIx/z5I40D0gCugqbDLTEFlWPA*0w1alD*9Ws6qhcfuc4hY!/b/YQfXY4ELJwAAYkwsXIFnJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0103485841&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"27\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;我和拉萨的第一次亲密接触，虽费劲千辛万苦，却感觉行走在藏族的世界之外，身体征服了，但内心却未曾真正走进西藏。因为去之前担心的东西太多，只好老老实实的按攻略走，跟车友一起出发，到达，</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">住旅店，便错过了更精彩的内容</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">。于是，我开始带强迫症一样的坚持借宿，从川藏线过后，再没有主动进过旅店。<br/>&nbsp; &nbsp; </span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">川藏线上遇到了很多磕长头的虔诚藏民，他们给了我深深的触动——像他们那样艰苦卓绝的条件都可以坚持到拉萨，在压倒一切的信念面前，世上还有什么可以称为</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">困难呢？<br/>&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/FWSxuVnl1B1wLkfjIxlDLzraqaInC8UTOE*An2PKnkc!/b/YQXNO4CbJgAAYte.OICcJgAA&ek=1&kp=1&pt=0&su=0118325617&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/FWSxuVnl1B1wLkfjIxlDLzraqaInC8UTOE*An2PKnkc!/b/YQXNO4CbJgAAYte.OICcJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0118325617&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"28\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;离开西藏后，搭火车到了兰州，然后比较落魄的走了陕甘宁晋蒙五个西北省份，那是一种连爬带滚的方式，十几天走遍了这五个省花了不到一百块。这是在内蒙古库布齐沙漠响沙湾景区，我第一次见到沙漠，甚是开心，虽然只是其边缘地带。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;09年底，也就是大四的上学期，我对自己毕业后的生活有了大至规划，也如愿实现了——把所有想去的地方一次走完，完成心愿后再工作。<br/>&nbsp;</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(15, 36, 62); font-family: 隶书;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 我的整个2010，就是为了这趟旅行。起初是很简单的想在毕业前后这段时间把中国剩下的没走过的地方全给走一遍，但走到路上后思欲就如洪水泛滥，狠下心一鼓作气做了所有自己当时想做的事，真的是想到什么就做什么，想去哪里，立马就可以改变路线朝那奔去。于是1-3这年初三个月在四川海螺沟实习，赚了3000块，买了帐篷睡袋炉具等装备后，带着2100块上路。<br/></span><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span><img alt=\"图片\" src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/qRCDEyIMzF1gz9fO0nms.mfN*8n8lkI*05RecM3OFEo!/b/YWbU.X4jVAAAYnP7An8gUwAA&ek=1&kp=1&pt=0&su=0159729249&sce=0-12-12&rf=2-9\" data-src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/qRCDEyIMzF1gz9fO0nms.mfN*8n8lkI*05RecM3OFEo!/b/YWbU.X4jVAAAYnP7An8gUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0159729249&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"29\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;杭州太子湾公园里正值郁金香花展，鲜艳的花朵，童话世界里的城堡，醉人的绿加上雨水带来的朦胧，第一次知道城市原来可以装扮得这么漂亮，小学课本里与天堂媲美的苏杭，美得无法形容。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/cReG0hr*cgIEniNR0Juv4X0dW49PJZw6*ixI*EaLDdo!/b/YTU5y4DpJQAAYpLJzIAdJgAA&ek=1&kp=1&pt=0&su=0110379809&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/cReG0hr*cgIEniNR0Juv4X0dW49PJZw6*ixI*EaLDdo!/b/YTU5y4DpJQAAYpLJzIAdJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0110379809&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"30\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 沿着大运河从杭州到北京，当时也希望走完后做一个关于运河保护的考察报告出来，只是力量有限，没有理论储备，也得不到其它支援。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/lBjJZbFlntiz4ozZ5qUOt3trVrHtxhRjsYIJOYuN5rI!/b/YYEooH99VAAAYt3vk3.rUgAA&ek=1&kp=1&pt=0&su=079842513&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/lBjJZbFlntiz4ozZ5qUOt3trVrHtxhRjsYIJOYuN5rI!/b/YYEooH99VAAAYt3vk3.rUgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=079842513&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"31\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;&nbsp;多么快乐的骑行在苏北平原上，一片片春小麦齐刷刷的射来一层浓烈的绿，让人心情如何不清爽。杭州到北京总共的花销180块。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/TZahHfuZWtE*IWkC*kdI25HM8cyYklPoIs2.2Az.398!/b/YWg2YX43oAAAYlrwa36UoAAA&ek=1&kp=1&pt=0&su=022905041&sce=0-12-12&rf=2-9\" data-src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/TZahHfuZWtE*IWkC*kdI25HM8cyYklPoIs2.2Az.398!/b/YWg2YX43oAAAYlrwa36UoAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=022905041&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"32\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 几经周折，又辗转到南方，江西彭泽遇修路加下雨。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img style=\"width:670px;height:502px\" alt=\"图片\" src=\"http://b40.photo.store.qq.com/psu?/5ab501d4-542f-4487-8f19-e12fae260869/j2eS5GYjqWJ4Qw*pNVAJiw1Yue*6JKpp94Q1PL6Jpbo!/b/YesYShT8qgAAYiAM2RdFVwAA&ek=1&kp=1&pt=0&su=087271537&sce=0-12-12&rf=2-9\" data-src=\"http://b40.photo.store.qq.com/psu?/5ab501d4-542f-4487-8f19-e12fae260869/j2eS5GYjqWJ4Qw*pNVAJiw1Yue*6JKpp94Q1PL6Jpbo!/b/YesYShT8qgAAYiAM2RdFVwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=087271537&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"33\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 对烂路忍无可忍，于是坐火车一百多公里到九江。在火车上遇到一个流浪歌手叫奔跑的蜗牛，在站台上我一边组装单车，他一边弹唱，我们俩聚焦了乘务员和火车乘客的所有目光，当时感觉自己从发梢到屁眼都是世界上最自由的。这段日子都有点连爬带滚，偶尔会坐上两百公里的火车跳过一些让人厌恶的地方，认识了很多乘务员，甚至和一些乘务员成为了朋友。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/fMnhomX7z6L1*yhZ51BuRr*WSO757n3blX*U2prvMMM!/b/YQS6yYBIJgAAYr.*zIDkJQAA&ek=1&kp=1&pt=0&su=073557793&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/fMnhomX7z6L1*yhZ51BuRr*WSO757n3blX*U2prvMMM!/b/YQS6yYBIJgAAYr.*zIDkJQAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=073557793&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"34\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 在厦门海滨眺望着金门岛，对面的故人是否还记得，那首思乡愁情比海峡还深的《乡愁》呢。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\">&nbsp; &nbsp; 流浪东南，从武汉，九江，黄山，景德镇，武夷山，福州，厦门，汕头到深圳，加上回去的车票共花了290块。由于论文提前准备好，整个大四下学期在学校呆的时间并不多。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/2ECDvKoMsnPd3wQgPs4vMiJa*18*f30QB8nsy56kgX0!/b/YdrkaH7LnwAAYrk7YX6enwAA&ek=1&kp=1&pt=0&su=067108257&sce=0-12-12&rf=2-9\" data-src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/2ECDvKoMsnPd3wQgPs4vMiJa*18*f30QB8nsy56kgX0!/b/YdrkaH7LnwAAYrk7YX6enwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=067108257&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"35\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;在湖南呆了四年，却没走过雪峰山——这座湖南的父亲山，甚是惭愧。于是花了一个礼拜，在答辩之前跟室友小芳去了凤凰，七天花了120块。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/g3p2nJHSAIlq8Hejw1fr*TL1ew43f4ymTnkEsDKXEGM!/b/YaGexoBcJgAAYgQmxYC2JgAA&ek=1&kp=1&pt=0&su=064581601&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/g3p2nJHSAIlq8Hejw1fr*TL1ew43f4ymTnkEsDKXEGM!/b/YaGexoBcJgAAYgQmxYC2JgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=064581601&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"36\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;在娄底地区一个隧道时，我掏出相机拍下了这张“冲向光明”。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b211.photo.store.qq.com/psb?/V13JGZm715lRIx/AKo9yOoZ.RLgOWOtJkY0pyATvaxu5STcCKEdOEHNQTU!/b/YcObxX0PoQAAYiWyy31yoAAA&ek=1&kp=1&pt=0&su=0105630961&sce=0-12-12&rf=2-9\" data-src=\"http://b211.photo.store.qq.com/psb?/V13JGZm715lRIx/AKo9yOoZ.RLgOWOtJkY0pyATvaxu5STcCKEdOEHNQTU!/b/YcObxX0PoQAAYiWyy31yoAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0105630961&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"37\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;&nbsp;到达雪峰之巅，遥望绵绵群山，路上问村民要的竹条，拿来准备晚上撑帐篷。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/JTqZfNeU6EDNcs4xEC6RevYzEla4cxxxy8mk3xdpg8w!/b/YeuyX369nQAAYrC3X34vnwAA&ek=1&kp=1&pt=0&su=027228657&sce=0-12-12&rf=2-9\" data-src=\"http://b212.photo.store.qq.com/psb?/V13JGZm715lRIx/JTqZfNeU6EDNcs4xEC6RevYzEla4cxxxy8mk3xdpg8w!/b/YeuyX369nQAAYrC3X34vnwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=027228657&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"38\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;&nbsp;毕业了，就像每个学期最后一堂考试结束后一样，我依旧第一个离开学校，带着我的单车，跟着亲戚的货车搭上了宜昌去往重庆的三峡渡轮，背后便是三峡大坝。答辩的第二天，上午拍毕业照，我中午就骑着车离开前往蜀国故地，当时觉得这一去，就再也不会回湖南了。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/HNdhiFuudpx1SghhLjpcbrdZ162Alrhu1giHyi7dKlY!/b/YVzQ.X6QUwAAYv3m*H7UUwAA&ek=1&kp=1&pt=0&su=0162336385&sce=0-12-12&rf=2-9\" data-src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/HNdhiFuudpx1SghhLjpcbrdZ162Alrhu1giHyi7dKlY!/b/YVzQ.X6QUwAAYv3m*H7UUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0162336385&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"39\"/><br/><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;回成都刘哥厂里做了二十天，再赚了1200块，开始了最长的一段，也是我最最深刻的一段。7月1号，出发时身上2245块钱。</span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 从乌鲁木齐出发，翻过天山就到达了新疆最富饶的库尔勒地区，</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">博斯腾湖是中国最大的内陆淡水湖，和静和硕焉耆博湖四县，便罗列在博斯腾湖旁边，四个县城相互间隔就二三十公里，人口相当密集，蔬菜棉花等种植业</span><span style=\"color: rgb(15, 36, 62); font-family: 楷体,楷体_GB2312,SimKai; font-size: large;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">很发达。<br/></span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 博斯腾湖是南疆一块宝贵的湿地，也是蚊子的乐园。当地人笑谈“吐鲁番的葡萄哈密的瓜，博湖的蚊子一把抓”，在湖边扎帐篷，人以迅雷不及掩耳之势躲进帐篷后，黑压压的一大堆蚊子在帐篷布上拼命地冲锋，犹如高压电流的声音，让人不得安宁。&nbsp;<br/>&nbsp;</span></span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/XzNqiFoYrz2EGoaL0fXMFQyMK9gx.XTaYuOSrrnKIRs!/b/YTQxy4AqJwAAYkQ0yIDXJQAA&ek=1&kp=1&pt=0&su=0192893617&sce=0-12-12&rf=2-9\" data-src=\"http://b216.photo.store.qq.com/psb?/V13JGZm715lRIx/XzNqiFoYrz2EGoaL0fXMFQyMK9gx.XTaYuOSrrnKIRs!/b/YTQxy4AqJwAAYkQ0yIDXJQAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0192893617&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"40\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 从轮台县往南，便开始了522公里长的沙漠公路，其中432公里的沙漠路段，108个水井房，108对夫妻在这里驻守，每间房子里都是或离奇或辛酸或平淡的故事。夫妻呆一年下来两人加起来工资就一万六，收入之低可谓寒碜，但是没有人抱怨和退缩，他们的笑容驱散了沙漠腹地带给我的荒凉。这些秸秆是拿来固沙用的，公路的存在和养护都是出于塔中油田的石油开采。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/oxUZvmMA6DJz38h28ZJGx3QVxb6aKF3z52WjnwI5bcw!/b/YZ87N4AoJwAAYncoNIBZJgAA&ek=1&kp=1&pt=0&su=0226643841&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/oxUZvmMA6DJz38h28ZJGx3QVxb6aKF3z52WjnwI5bcw!/b/YZ87N4AoJwAAYncoNIBZJgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0226643841&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"41\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;茫茫沙海，往东往西各两三百公里，均杳无人烟。塔中沙漠公路穿越沙漠腹地，在石油日趋枯竭，石油收入已经无法支撑公路养护成本的窘境下，国家迫于战略资源的开采，仍然艰难的维持着公路的存在，要知道的是，一旦108个水井房人员撤离停止灌溉，公路便会转瞬间化作沙海，变成后代的考古遗迹。</span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;望不到尽头的沙漠公路，孤独的黄丝带绵延不远处，便和沙海交汇</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">于朦胧的地平线</span><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">。<br/></span><img alt=\"图片\" src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/CLWOhFNuOf5EFRiZNn5QJWm9dgnFENkE3gSrV*FRb8Q!/b/YdVK.H7FUwAAYrD*An..UgAA&ek=1&kp=1&pt=0&su=0140031185&sce=0-12-12&rf=2-9\" data-src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/CLWOhFNuOf5EFRiZNn5QJWm9dgnFENkE3gSrV*FRb8Q!/b/YdVK.H7FUwAAYrD*An..UgAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0140031185&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"42\"/></span></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 每天的11点到19点基本上热得无法骑行，所以赶路都是趁早和晚，完全缺水的艰苦，沙漠里凶狠的蚊子，驻守民工的淳朴，都给我留下了深刻的印象。沙漠并不像你所想象的那样一片荒芜，毫无生机，反而越是人少的地方就越是野生动物活动频繁的地方。</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">沙漠里，最美的，是那永不绝灭的生命。。</span></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp; 三毛说：</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">沙漠的至美，更是那一棵棵手臂张向天空的枯树；是一朵在干地上挣扎着开尽生之喜悦的小紫花；是一只孤鸟的哀鸣划破长空；是夕阳西下时，化入一轮红日中那单骑的人。</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\">&nbsp;<img alt=\"图片\" src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/AF2YKx4VWslKbRvreHgxbCCr4XT4.GhhfrPNL0q6bLk!/b/YXeFBH.7UgAAYuNu*n5DUwAA&ek=1&kp=1&pt=0&su=028936865&sce=0-12-12&rf=2-9\" data-src=\"http://b213.photo.store.qq.com/psb?/V13JGZm715lRIx/AF2YKx4VWslKbRvreHgxbCCr4XT4.GhhfrPNL0q6bLk!/b/YXeFBH.7UgAAYuNu*n5DUwAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=028936865&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"43\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp; 南疆民丰县街边琳琅满目的小吃，从此羊肺之类的小摊天天在维族热闹的地方看到。南疆人民是非常友善的，南疆也并不是人们印象中的那么多事，那么暴动，反而是人民生活非常宁静安逸，闹事的不过是西方煽动的极端势力而已。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/RruxGXhDCcxDRdMxB9HklGv87EJdco6UbYN6pg4MkHc!/b/YTcAK4BnJgAAYq8YMYD5JQAA&ek=1&kp=1&pt=0&su=0171090049&sce=0-12-12&rf=2-9\" data-src=\"http://b215.photo.store.qq.com/psb?/V13JGZm715lRIx/RruxGXhDCcxDRdMxB9HklGv87EJdco6UbYN6pg4MkHc!/b/YTcAK4BnJgAAYq8YMYD5JQAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0171090049&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"44\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp; 南疆遍地都是二三十米高的白杨林，沿着公路笔直高挺，整齐的像待检阅的卫兵，让人心旷神怡，不由得玩起自拍。</span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai; font-size: 18px;\"><img alt=\"图片\" src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/tckoz6r8RqvlKHbUo4dDhrH03*jQOg9dXFyWB5GH1oo!/b/YYIZnX*aUwAAYmSYm38JVAAA&ek=1&kp=1&pt=0&su=0191337569&sce=0-12-12&rf=2-9\" data-src=\"http://b214.photo.store.qq.com/psb?/V13JGZm715lRIx/tckoz6r8RqvlKHbUo4dDhrH03*jQOg9dXFyWB5GH1oo!/b/YYIZnX*aUwAAYmSYm38JVAAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=0191337569&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"45\"/></span></p><p style=\"margin:0px\"><span style=\"font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp; &nbsp;&nbsp;新藏线，一条穿梭于几大山脉之间的山谷和平地上的天路，确确实实的天路，按刘哥的话说，世界上难得有一条这样的国家公路，如此险峻高耸，让人远道而来，遍览美景，探险猎奇，叹服不已。平均海拔近4500米的新藏公路是进藏公路中最高的一条，路况也是最差的。从新疆叶城到西藏拉孜，全长2143公里，翻越5000米以上的山口5个，</span><span style=\"color: rgb(0, 0, 0); text-indent: 30px; font-family: 宋体; font-size: 24px;\">冰山达坂16个，冰河44条，穿越无人区几百公里</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">。夏季的雪山融水沿山谷而下，常常阻断道路，</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">像这样的淌水几乎每天都会遇到。</span></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai;\"><img style=\"width:670px;height:502px\" alt=\"图片\" src=\"http://b53.photo.store.qq.com/psu?/2c8330af-c885-4174-a51e-324fbae81b9a/iph.g.WrH3*Hn2kQEBG81YI3R1hwmc7tVjWLAueze00!/b/YTthNyC6HgAAYplmox9ZXQAA&ek=1&kp=1&pt=0&su=013071297&sce=0-12-12&rf=2-9\" data-src=\"http://b53.photo.store.qq.com/psu?/2c8330af-c885-4174-a51e-324fbae81b9a/iph.g.WrH3*Hn2kQEBG81YI3R1hwmc7tVjWLAueze00!/b/YTthNyC6HgAAYplmox9ZXQAA&amp;ek=1&amp;kp=1&amp;pt=0&amp;su=013071297&amp;sce=0-12-12&amp;rf=2-9\" data-img-idx=\"46\"/></span></p><p style=\"margin:0px\"><span style=\"color: rgb(242, 242, 242); font-family: 楷体,楷体_GB2312,SimKai;\"><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: 宋体; font-size: 24px;\">每天最期盼的事就是晚餐，晚上停下来做饭的时候便是最开心的时刻，新藏线大部分时间晚餐都是一碗泡面，在那时也算是很丰盛了。平均下来每天的食物只有一袋方便面加两块压缩饼干，现', '2');
INSERT INTO `blog_article_data` VALUES ('', '', '<p><span style=\"line-height: 1.5;\">题目：有4个杯子，10包粉末，其中有2包溶于水变蓝，其余无色，粉末溶于水2min才能显现颜色。求找出两包蓝色粉末的最短时间。假设水和粉末用不完。</span></p><p>解：以下给出四种解法，标记10包粉末为(1,2 ... ) 杯子为[1,2,3,4]<br/>首先我想会不会是有某种算法，dp 二分。。&nbsp;</p><p>&nbsp;</p><p><span style=\"color: #ff0000;\"><strong>法一：</strong></span><span style=\"line-height: 1.5;\">第一趟：[12,34,56,78] &nbsp;</span></p><p>&nbsp; &nbsp; 每个杯子分别放两包加水融化，剩下两包不管。可能的情况：</p><p>&nbsp; （1）0个杯子变色，说明剩下两包就是蓝粉末</p><p>&nbsp; （2）1个杯子变色，则蓝粉末在这个杯子两包和未融化的两包其中两包，第二趟四包融化一定可以找到</p><p>&nbsp; （3）2个杯子变色，则在这两个杯子的四包粉末中，第二趟可找到</p><p>&nbsp;</p><p><span style=\"color: #ff0000;\"><strong>法二：</strong></span> 舍友wan(3) ting(2)君想的</p><p>&nbsp; 第一趟：[123;456;789;10]</p><p>&nbsp;（1）1个杯子变色，只能在是杯子1-3变色，蓝粉在三种颜色取两个。第二趟可找到</p><p>&nbsp;（2）2个杯子变色，</p><p>&nbsp; &nbsp; - 如果是1/2/3 + 4 变色，则下一趟找1/2/3即可。</p><p>&nbsp; &nbsp; - 如果是123取二，假设是杯1和杯2，则分别在123取1和456取1，<span style=\"line-height: 1.5;\">第二趟放置[1<strong>4</strong>;<strong>2</strong>5;<strong>36</strong>;15]，</span><span style=\"line-height: 1.5;\">分析关系：杯子14有联系，24有联系。</span></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;a. 杯1变色而杯4不变则</p><p>&nbsp;</p><p><span style=\"color: #ff0000;\"><strong>法三：</strong></span>从法一和法二来尝试的：</p><p>&nbsp; 第一趟：[12<strong>34</strong>; <strong>34</strong>56; 5678;78910]</p><p>&nbsp; 连续4包，相邻两包有联系，12,23,34，所谓有联系指有两杯子放了相同的粉末</p><p>&nbsp;（1）1杯子蓝，则一定是杯1的12或杯4的9 10，2会引起13蓝，3同理。</p><p>&nbsp;（2）2杯子蓝，则有C(2,4)=6种组合。</p><p>　 &nbsp;1. 杯12蓝，则一定是1 2 3 4，因为粉末56会引起杯3蓝，第二趟可检测出；杯34蓝同理，第二趟检测7 8 9 10</p><p>&nbsp; &nbsp; &nbsp;2. 杯13蓝，则一定是1 2，因为粉末56/78会引起杯2/4蓝，第二趟可检测出；杯24蓝同理，第二趟检测9 10</p><p><span style=\"line-height: 1.5;\">&nbsp; &nbsp; &nbsp;3. 杯14蓝，则一定是1 2 9 10，因为34/78会引起2/3变蓝；第二趟在四包中观察即可</span></p><p>&nbsp; &nbsp; &nbsp;4. 杯23蓝，则一定是5 6，因为粉末34/78会引起杯1/4变蓝</p><p>&nbsp; &nbsp; &nbsp;</p><p>&nbsp;（3）3杯子蓝，则一定是杯子123或456蓝。</p><p>&nbsp; &nbsp; &nbsp;分析123蓝，如果1/2蓝，则5/6一定蓝(4种)，二者有依赖，3/4和9/10同理(4种)。答案有8种可能。</p><p>&nbsp; &nbsp; &nbsp;第二趟：[15; 26; 39; 410]</p><p>&nbsp; &nbsp; &nbsp;如果只有一个杯子蓝了，以杯1_15为例，则答案是15，如果两个杯子蓝了，如1_15蓝，则另一蓝杯一定是包含6的2_26。</p><p>&nbsp; &nbsp; &nbsp;以上是枚举时感觉有联系分析出的。</p><p>&nbsp; &nbsp;</p><p><span style=\"color: #ff0000;\"><strong>法四：</strong></span>面试官给的，我分析了下，好奇妙。这个方法我在想出法一就在看了，没找出规律，看法二觉得很像，到法三终于豁然开朗。</p><p>&nbsp; 第一趟：[<strong>1</strong>234; 2<strong>5</strong>67; 36<strong>8</strong>9; 479<strong>10</strong>]&nbsp;</p><p>&nbsp; 每个杯子只有一个独立的，每杯都与另外三杯有一个共同粉末(而且一包粉最多只能放在俩杯里)，放置方法：1234放在杯子1,234分别放在杯234,567放在杯子2,67分别放杯子34...</p><p><span style=\"line-height: 1.5;\">&nbsp; （1）不可能只有一个杯子蓝，除了1 10，每包粉末都放在两个杯子里。</span></p><p><span style=\"line-height: 1.5;\">&nbsp; （2）两个杯子蓝: 则只能是这两个杯子共有而其他两个杯子无联系的。第一个蓝杯中有两包ab与两个非蓝杯有联系，另一蓝杯中有两包cd与两个非蓝杯有关系。abcd排除后剩下3包粉末。</span><span style=\"line-height: 1.5;\">例如杯子12_[1234;2567]蓝，则可能是125</span></p><p><span style=\"line-height: 1.5;\">&nbsp; （3）三个杯子蓝，则可以排除非蓝杯的四种粉末剩下六种可能；</span><span style=\"line-height: 1.5;\">一定有一包是这三个蓝杯中两个杯子的共同颜色+另一个杯子与非蓝杯不同的颜色，比如杯12共同_2+杯3_36<strong>8</strong>，或3+2<strong>5</strong>6，或6+<strong>1</strong>23。</span></p><p><span style=\"line-height: 1.5;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;注意到粉末158是独立的，即如1蓝则6一定蓝，去掉这三个的就是（2_36,3+26,6+23），则只需检测236即可，为便于理解重写为[<span style=\"text-decoration: underline;\">6,3,2</span>;&nbsp;<span style=\"text-decoration: underline;\">1,5,</span><span style=\"text-decoration: underline;\">8;&nbsp;</span><strong>23,26,36</strong>] 。情况分析：</span></p><p><span style=\"line-height: 1.5;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- 如果出现一蓝杯(只有2/3/6)，则和对应的8/5/1组成两包即使蓝色粉末</span></p><p><span style=\"line-height: 1.5;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;- 如果两蓝杯(23,26,36)就是答案</span></p><p><span style=\"line-height: 1.5;\">&nbsp; &nbsp;（4）四个杯子蓝，则每包蓝粉都会放入两个杯子，粉末158 10放在一个杯子里，粉末2/3/4/6/7/9放在杯12,13,14,23,24,34里，互补的是：杯子[粉末] 12-34[29] 13-24[37] 14-23[46]，也就是说，如果粉末2蓝，则粉末9蓝，所以只要检测2即可。则检测三种粉末比如[2;3;4;]即可知道哪两包是蓝色的。</span></p><p><span style=\"line-height: 1.5;\">&nbsp; &nbsp;我突然觉得这是个（排列）组合问题？？</span></p><p><span style=\"line-height: 1.5;\"><strong>法五：</strong> ... &nbsp;</span></p><p>&nbsp;----------------------------------------------------------------------------</p><p><span style=\"color: #ff0000;\">概率优化</span>：</p><p>@<a id=\"a_comment_author_3367746\" href=\"http://www.cnblogs.com/mahaikai/\" target=\"_blank\">海恺</a>&nbsp;指出用法二改为[123，456，78，910]，它的时间均值为2*2/45+4*43/45 &lt; 4；&nbsp;其他方法也可以类似。。</p><p>------------------------------------------------------------------------------</p><p><span style=\"color: #ff0000;\">如果只有一包蓝色粉末？</span></p><p><strong>法一：</strong>本思路由一楼楼主&nbsp;<a id=\"a_comment_author_3367529\" href=\"http://www.cnblogs.com/kowalski/\" target=\"_blank\">kowalski</a>&nbsp;给出；</p><p>&nbsp; &nbsp;用4bit二进制给10包粉末编码，0000~1001，对所有粉末，如果某一bit为1，则放入对应bit的杯里，比如5(0101)放入杯24中。</p><p>&nbsp; &nbsp;最终变色结果对应的就是蓝色的粉末，分析：杯子变蓝说明杯中有蓝粉末，粉末对应bit为1未变蓝说明粉末对应位为0；</p><p>&nbsp; &nbsp;然而对于两包蓝色以上不能一次性检测出，比如0111和000~0110中任意一包的结果都是0111(杯子2-4蓝)；因为杯子变蓝可能是由两包引起也可能是1包引起的。</p><p>&nbsp;</p><p><strong>法二：</strong>类似二分法，[12345;12+67;45+910;4+9] &nbsp;</p><p>&nbsp; &nbsp; 杯1：1~5|6~10 检查其中之一即可；</p><p>&nbsp; &nbsp; 杯2：12|345，检查12即可知道345；</p><p>&nbsp; &nbsp; 杯3：1|34，如果杯2检查出示在12则杯3的1是检查是在1还是2，则3杯终止，如果是345则杯3检查是34还是5</p><p>&nbsp; &nbsp; 杯4：4，如果杯3检测出34则这是判断是3还是4；</p><p>&nbsp; &nbsp; 1~5和6~10在杯1对称而且互不干扰，所以杯2-4中同样放置6~10中的。</p><p>&nbsp; &nbsp;此方法类似查表；也像分阶段改成分杯子；</p><p>。。。这个方法就多了。。。</p><p>--------------------------------------------------------------------------------</p><p>枚举的思想有枚举杯子变色的种类和粉末的可能两种方式。</p><p><span style=\"color: #ff0000;\">以上分析如有错误，欢迎指出~</span></p><p>写本文时想到的，我舍友强悍的想象力，我强悍的分析力和对比总结力 哈哈哈 配一脸。</p><p>APP ： 自由选择一个二维码然后识别图中二维码。考虑分享wifi给朋友，自己想看里面的内容不行。微信里有长按识别二维码的怎么做到的呢？？ 能识别任何二维码吗？是因为输入的格式还是？？</p><p>&nbsp;</p><p>-----------------------------------------------------------------------------------</p><p>修改：<span style=\"line-height: 1.5;\">法三描述两杯蓝的情况分析不完善，法四有四杯蓝的情况，已修改，感谢12楼楼主&nbsp;</span><a id=\"a_comment_author_3367746\" style=\"line-height: 1.5;\" href=\"http://www.cnblogs.com/mahaikai/\" target=\"_blank\">海恺</a><span style=\"line-height: 1.5;\">&nbsp;指出错误；另外添加了一楼楼主对一包蓝色的解法。</span></p><p><br/></p>', '3');
INSERT INTO `blog_article_data` VALUES ('', '', '<p style=\"margin: 0px 0px 1.2em !important;\">首先，我们来看看 React 在世界范围的热度趋势，下图是关键词“房价”和 “React” 在 Google Trends 上的搜索量对比，蓝色的是 React，红色的是房价，很明显，人类对 React 的关注程度已经远远超过了对房价的关注。</p><p style=\"margin: 0px 0px 1.2em !important;\">从这些数据中，大家能看出什么？<br/> 可以很明显的看出，我在一本正经的扯淡。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/TgcGz56.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/a26pXAY.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">从2014年到现在，React、jQuery和 Angular 的热度趋势对比，可以很明显的看到（上图），React 在全球的热度趋势增长非常快。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/TozC0kM.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">上图是 React 在国内的百度搜索指数，是拿 React 和 Nodejs 做了个对比，可以看出 React 的关注度也已经逼近 nodejs。</p><p style=\"margin: 0px 0px 1.2em !important;\">虽然在关注总量上 React 还远不及 jQuery 和 Angular 等等，但它的增长幅度超乎你想象，你知道这意味着什么吗？这意味着关注 React，你就比大多数人走在了业界的前沿！</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/v1GjJNo.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">那么React到底是什么鬼？</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/N6SyWQN.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">引用官网的简介，”一个用来构建用户界面的javascript库”。</p><p style=\"margin: 0px 0px 1.2em !important;\">React 起源于 Facebook 的内部项目，因为 FB 对市场上所有 JavaScript MVC 框架，都不满意，就决定自己写一套，用来架设 Instagram 的网站。做出来以后，发现这套东西很好用，就在2013年5月开源了。</p><p style=\"margin: 0px 0px 1.2em !important;\">由于 React 的设计思想极其独特，属于革命性创新，性能出众，代码逻辑却非常简单。所以，越来越多的人开始关注和使用，认为它可能是将来 Web 开发的主流工具。</p><p style=\"margin: 0px 0px 1.2em !important;\">和 Backbone、Angular 等 MV* 框架不一样，它只处理 View 逻辑 ，它只处理 View 逻辑，它只处理 View 逻辑。所以如果你喜欢它，你可以很容易的将它接入到现有工程中，然后用 React 重写 HTML 部分即可，不用修改逻辑。</p><p style=\"margin: 0px 0px 1.2em !important;\">近几年 web 领域的技术革新非常迅速，React也是一项新技术…话说React出来也已经2年了，其实并不算什么新技术了，只是在国内还没有普及开，这篇文章的目的也是帮助大家更快的理解 react 和认识 react 能给我们带来的价值。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/OhaEPro.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">React 这么火，那么它到底有什么牛逼的地方？</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/6wiOLzc.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">上图是2015年年初的数据</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/AdqmC5h.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这是 Facebook 的好友动态页面，也是 Facebook 访问量最大的页面没有之一，通过 Chrome React 插件可以看到这个页面确实是用 React 实现的。 （有同事问我为什么关注柳岩，我说因为我是柳岩的球迷啊）</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/CIhAAtq.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">前面给大家来了一波前戏，相信大家已经有点迫不及待了，那么，进入正题： 首先，先跟大家描述下 React 最特别的部分，听完这部分大家基本就能够在脑海里建立起一个 React 的大致印象。</p><p style=\"margin: 0px 0px 1.2em !important;\">然后是 React 的核心内容，听完这部分大家待会回去就可以开始写代码然后今天晚上发布上线了。 最后是 React 能够给我们实际带来的价值，我们不作无意义的代码重构。</p><p style=\"margin: 0px 0px 1.2em !important;\">首先，我们来看JSX——</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/yqDhwHC.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/rELbq9d.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">JSX 使用的是预编译模板，React 提供了一个预编译工具，叫 react-tools，可以通过 npm 命令安装，一般是在开发时期运行，运行后它会启动一个监听程序，实时监听 JSX 源码的修改，然后自动编译为 JS 代码。</p><p style=\"margin: 0px 0px 1.2em !important;\">大家留意下，render() 方法里的被编译成了 React.createElement()，它这么做，目的就是为了实现虚拟 DOM。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/doE8vzm.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">接下来我们来了解 React 最大的亮点 ———— 虚拟 DOM。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/d9dGZJ2.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">传统 web app 和 DOM 直接交互，由App来控制DOM的构建和渲染、元素属性的读写、事件的注册和销毁等等。 当新产品刚上线的时候，这种做法看起来也挺好。但随着产品功能越来越丰富、代码量越来越多、开发团队人员越来越多 —————</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/7JgjaWw.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">一年后</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/feNFhOZ.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">你的代码可能会变成这样。</p><p style=\"margin: 0px 0px 1.2em !important;\">当然，合理的代码规划能够避免这类问题，但团队里难免会有擅长屠宰式编程的同学，分分钟把你代码改的面目全非。</p><p style=\"margin: 0px 0px 1.2em !important;\">这时，React的虚拟DOM和单项数据流就能很好的解决这个问题。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/mdCraFS.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">虚拟DOM则是在DOM的基础上建立了一个抽象层，我们对数据和状态所做的任何改动，都会被自动且高效的同步到虚拟DOM，最后再批量同步到DOM中。</p><p style=\"margin: 0px 0px 1.2em !important;\">虚拟DOM会使得App只关心数据和组件的执行结果，中间产生的DOM操作不需要App干预，而且通过虚拟DOM来生成DOM，会有一项非常可观收益——-性能。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/j6iXSBL.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">所有人都知道DOM慢，渲染一个空的DIV，浏览器需要为这个DIV生成几百个属性，而虚拟DOM只有6个，所以减少不必要的重排重绘以及DOM读写能够对页面渲染性能有大幅提升。</p><p style=\"margin: 0px 0px 1.2em !important;\">那么我们来看看虚拟DOM是怎么做的：React会在内存中维护一个虚拟DOM树，当我们对这个树进行读或写的时候，实际上是对虚拟DOM进行的。当数据变化时，然后React会自动更新虚拟DOM，然后拿新的虚拟DOM和旧的虚拟DOM进行对比，找到有变更的部分，得出一个Patch，然后将这个Patch放到一个队列里，最终批量更新这些Patch到DOM中。</p><p style=\"margin: 0px 0px 1.2em !important;\">这样的机制可以保证即便是根节点数据的变化，最终表现在DOM上的修改也只是受这个数据影响的部分，可以保证非常高效的渲染。</p><p style=\"margin: 0px 0px 1.2em !important;\">但这样也是有一定的缺陷的——首次渲染大量DOM时因为多了一层虚拟DOM的计算，会比innerHTML插入方式慢，所以使用时需要确保不要一次性渲染大量DOM。</p><p style=\"margin: 0px 0px 1.2em !important;\">几个UI组件的渲染性能对比</p><p style=\"margin: 0px 0px 1.2em !important;\"><a href=\"http://mathieuancelin.github.io/js-repaint-perfs/\">http://mathieuancelin.github.io/js-repaint-perfs/</a></p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/spIcA8d.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">一个最基本的 React 组件由数据和JSX两个主要部分构成，我们先来看看数据。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/D2DI9q3.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这是一个简单单完整的React组件【类】，细节大家先不用太在意细节，了解机制就可以。</p><p style=\"margin: 0px 0px 1.2em !important;\">props 主要作用是提供数据来源，可以简单的理解为 props 就是构造函数的参数。 state 唯一的作用是控制组件的表现，用来存放会随着交互变化状态，比如开关状态等。</p><p style=\"margin: 0px 0px 1.2em !important;\">JSX 做的事情就是根据 state 和 props 中的值，结合一些视图层面的逻辑，输出对应的 DOM 结构。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/1AB8Dsu.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">前面我们知道了一个简单的组件的构成，但单个的组件肯定不能满足实际需求，我们需要做的是将这些独立的组件进行组装，同时找出共性的部分进行复用。</p><p style=\"margin: 0px 0px 1.2em !important;\">比如这样一个场景</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/UooWhg9.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">我们以这样一个界面为例，可以看出，里面的 &lt;Pub/&gt; &lt;Article/&gt; 都是最细粒度的组件，是可以复用的。 首先，我们来看下Article的代码——</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/XM4KSU6.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这个就是我们分解出来的 Article 组件，它需要2个属性，article对象和showImage。article对象包含图片、地址、标题、描述信息，showImage是一个布尔类型，用来判断是否需要显示成一个图片。</p><p style=\"margin: 0px 0px 1.2em !important;\">这个组件本身的实现可以很简单也可以很复杂，但使用者可不关心你的内部实现，使用者关心的是组件需要什么参数就可以了。</p><p style=\"margin: 0px 0px 1.2em !important;\">外国人的组件化思想比我们国内的普及程度高很多，不只局限于软件开发，包括实体行业的咖啡机、加油站、 儿童摇摇车都有这种设计思想在里面。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/ymqOM6p.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">希望大家在设计模块的时候，也尽可能将组件逻辑对外透明，来减少维护成本。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/s5Munak.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">大家留意一下标虚线的部分，这里复用了 Article 组件。这时的 Article 组件看起来就是一个普通的标签而已，简单吧。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/jNwkLze.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这个是热问组件，也复用了 Article 组件。这就是 React 如丝般顺滑的组件复合。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/vLtC3bU.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这个，叫做竹笕，是中日传统禅文化中常见的庭院装饰品，它的构造可简单可复杂，但原理很简单，比如这个竹笕，水从竹笕顶部入口流入内部，并按照固定的顺序从上向下依次流入各个小竹筒，然后驱动水轮转动。对于强迫症患者来说，观赏竹笕的绝对是一种很享受的过程的最爱，你会发现这些小玩意竟然能这么流畅的协调起来，好神奇。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/tgWAXx2.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">如果竹笕是一个组件的话，那么水就是组件的数据流。</p><p style=\"margin: 0px 0px 1.2em !important;\">在React中，数据流是自上而下单向的从父节点传递到子节点，所以组件是简单且容易把握的，他们只需要从父节点提供的props中获取数据并渲染即可。如果顶层组件的某个prop改变了，React会递归地向下遍历整棵组件数，重新渲染所有使用这个属性的组件。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/ZxQctXs.jpg\"/> </p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/tjhHJ6m.jpg\"/> </p><p style=\"margin: 0px 0px 1.2em !important;\">这个是前面看到的 Article 题组件，拥有一个叫做 articles 的属性。</p><p style=\"margin: 0px 0px 1.2em !important;\">在组件内部，可以通过this.props来访问props，props是组件唯一的数据来源，<span style=\"color: #ff0000;\"><strong>对于组件来说</strong></span>：</p><p style=\"margin: 0px 0px 1.2em !important;\"><span style=\"color: #ff0000;\"> props永远是只读的。</span></p><p style=\"margin: 0px 0px 1.2em !important;\">组件的属性类型如果不进行声明和验证，那么很可能使用者传给你的属性值或者类型是无效的，那会导致一些意料之外的故障。好在React已经为我们提供了一套非常简单好用的属性校验机制——</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/B3jkf9M.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">React有一个PropTypes属性校验工具，经过简单的配置即可。当使用者传入的参数不满足校验规则时，React会给出非常详细的警告，定位问题不要太容易。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/XPUPbRx.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">PropTypes包含的校验类型包括基本类型、数组、对象、实例、枚举——</p><p style=\"margin: 0px 0px 1.2em !important;\">以及对象类型的深入验证等等。如果内置的验证类型不满足需求，还可以通过自定义规则来验证。 如果某个属性是必须的，在类型后面加上 .isRequired 即可。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/M4zUCyC.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">React的一大创新，就是把每一个组件都看成是一个状态机，组件内部通过state来维护组件状态的变化，这也是state唯一的作用。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/sxFEgAc.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">state一般和事件一起使用，我们先看state，然后看看state和事件怎样结合。</p><p style=\"margin: 0px 0px 1.2em !important;\">这是一个简单的开关组件，开关状态会以文字的形式表现在按钮的文本上。</p><p style=\"margin: 0px 0px 1.2em !important;\">首先看render方法，返回了一个button元素，给button注册了一个事件用来处理点击事件，在点击事件中对state的on字段取反，并执行 this.setState() 方法设置on字段的新值。一个开关组件就完成了。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/Cb2gN9l.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">组件渲染完成后，必须有UI事件的支持才能正常工作。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/YifEz4U.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">React通过将事件处理器绑定到组件上来处理事件。</p><p style=\"margin: 0px 0px 1.2em !important;\">React事件本质上和原生JS一样，鼠标事件用来处理点击操作，表单事件用于表单元素变化等，Rreact事件的命名、行为和原生JS差不多，不一样的地方是React事件名区分大小写。</p><p style=\"margin: 0px 0px 1.2em !important;\">比如这段代码中，Article组件的section节点注册了一个onClick事件，点击后弹出alert。</p><p style=\"margin: 0px 0px 1.2em !important;\">有时候，事件的处理器需要由组件的使用者来提供，这时可以通过props将事件处理器传进来。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/xk6Rk51.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这个是刚才那个Article组件的使用者，它提供给Article组件的props中包含了一个onClick属性，这个onClick指向这个组件自身的一个事件处理器，这样就实现了在组件外部处理事件回调。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/BNqjC4e.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这是一个React组件实现组件可交互所需的流程，render()输出虚拟DOM，虚拟DOM转为DOM，再在DOM上注册事件，事件触发setState()修改数据，在每次调用setState方法时，React会自动执行render方法来更新虚拟DOM，如果组件已经被渲染，那么还会更新到DOM中去。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/yr1fuUB.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">这些是React目前支持的事件列表。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/S9nJnvf.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">React的组件拥有一套清晰完整而且非常容易理解的生命周期机制，大体可以分为三个过程：初始化、更新和销毁，在组件生命周期中，随着组件的props或者state发生改变，它的虚拟DOM和DOM表现也将有相应的变化。</p><p style=\"margin: 0px 0px 1.2em !important;\"><img alt=\"\" src=\"http://i.imgur.com/AsqeogH.jpg\"/></p><p style=\"margin: 0px 0px 1.2em !important;\">首先是初始化过程，这里会着重讲，需要充分理解。</p><p style=\"margin: 0px 0px 1.2em !important;\">组件类在声明时，会先调用 getDefaultProps() 方法来获取默认props值，这个方法会且只会在声明组件类时调用一次，这一点需要注意，它返回的默认props由所有实例共享。</p><p style=\"margin: 0px 0px 1.2em !important;\">在组件被实例化之前，会先调用一次实例方法 getInitialState() 方法，用于获取这个组件的初始state。</p><p style=\"margin: 0px 0px 1.2em !important;\">实例化之后就是渲染，componentWillMount方法会在生成虚拟DOM之前被调用，你可以在这里对组件的渲染做一些准备工作，比如计算目标容器尺寸然后修改组件自身的尺寸以适应目标容器等等。</p><p style=\"margin: 0px 0px 1.2em !important;\">接下来就是渲染工作，在这里你会创建一个虚拟DOM用来表示组件的结构。对于一个组件来说，render 是唯一一个必须的方法。render方法需要满足这几点：</p><ol class=\" list-paddingleft-2\" style=\"margin: 1.2em 0px; padding-left: 2em;\"><li><p>只能通过 this.props 或 this.state 访问数据</p></li><li><p>只能出现一个顶级组件</p></li><li><p>可以返回 null、false 或任何 React 组件</p></li><li><p style=\"margin: 0.5em 0px !important;\">不能对 props、state 或 DOM 进行修改</p><p style=\"margin: 0.5em 0px !important;\">需要注意的是，render 方法返回的是虚拟DOM。</p><p style=\"margin: 0.5em 0px !important;\">渲染完成以后，我们可能需要对DOM做一些操作，比如截屏、上报日志、或者初始化iScroll等第三方非React插件，可以在 componentDidMount() 方法中做这些事情。当然，你也可以在这个方法里通过 this.getDOMNode() 方法取得最终生成DOM节点，然后对DOM节点做爱做的事情，但需要注意做好安全措施，不要缓存已经生成的DOM节点，因为这些DOM节点随时可能被替换掉，所以应该在每次用的时候去读取。</p><p style=\"margin: 0.5em 0px !important;\">组件被初始化完成后，它的状态会随着用户的操作、时间的推移、数据更新而产生变化，变化的过程是组件声明周期的另一部分 ——</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/d0dVa2E.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">更新过程。</p><p style=\"margin: 0.5em 0px !important;\">当组件已经被实例化后，使用者调用 setProps() 方法修改组件的数据时，组件的 componentWillReceiveProps() 方法会被调用，在这里，你可以对外部传入的数据进行一些预处理，比如从props中读取数据写入state。</p><p style=\"margin: 0.5em 0px !important;\">默认情况下，组件在 setState() 之后，React会遍历这个组件的所有子组件，进行“灌水”，将props从上到下一层一层传下去，并逐个执行更新操作，虽然React内部已经进行过很多的优化，这个过程并不会花费多少时间，但是程序员里永远不缺乏长期性能饥渴的同学，不用担心，React有一个能够解决你性能饥渴的办法——shouldComponentUpdate()——有时候，props发生了变化，但组件和子组件并不会因为这个props的变化而发生变化，打个比方，你有一个表单组件，你想要修改表单的name，同时你能够确信这个name不会对组件的渲染产生任何影响，那么你可以直接在这个方法里return false来终止后续行为。这样就能够避免无效的虚拟DOM对比了，对性能会有明显提升。</p><p style=\"margin: 0.5em 0px !important;\">如果这个时候有同学仍然饥渴难耐，那么你可以尝试<a href=\"https://facebook.github.io/react/docs/update.html\">不可变数据结构</a>(用过mongodb的同学应该懂)。</p><p style=\"margin: 0.5em 0px !important;\">组件在更新前，React会执行componentWillUpdate() 方法，这个方法类似于前面看到的 componentWillMount()方法，唯一不同的地方只是这个方法在执行的时候组件是已经渲染过的。需要注意的是，不可以在这个方法中修改props或state，如果要修改，应当在 componentWillReceiveProps() 中修改。</p><p style=\"margin: 0.5em 0px !important;\">然后是渲染，React会拿这次返回的虚拟DOM和缓存中的虚拟DOM进行对比，找出【最小修改点】，然后替换。</p><p style=\"margin: 0.5em 0px !important;\">更新完成后，React会调用组件的componentDidUpdate 方法，这个方法类似于前面 componentDidMount 方法，你仍然可以在这里可以通过 this.getDOMNode() 方法取得最终的DOM节点。</p><p style=\"margin: 0.5em 0px !important;\">香港电影结尾经常看到一个剧情，就是英雄打败了坏人，然后警察出来擦屁股——</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/Wt0NG7X.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">componentWillUnmount 除了擦屁股什么也做不了。</p><p style=\"margin: 0.5em 0px !important;\">你可以在这个方法中销毁非React组件注册的事件、插入的节点，或者一些定时器之类。这个过程可能容易出错，比如绑定了事件却没销毁，这个React可帮不了你，你自己约的炮，含着泪也要打完。</p><p style=\"margin: 0.5em 0px !important;\">下面我们来看看React怎样结合nodejs实现服务端渲染。</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/NubGU7H.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">服务端渲染有多快我就不多说了。</p><p style=\"margin: 0.5em 0px !important;\">因为有虚拟DOM的存在，React可以很容易的将虚拟DOM转换为字符串，这便使我们可以只写一份UI代码，同时运行在node里和和浏览器里。</p><p><br/></p><pre>var&nbsp;html&nbsp;=&nbsp;React.renderToString(elem);</pre><p style=\"margin: 0.5em 0px !important;\">在node里将react组件HTML渲染为HTML，一句代码即可。</p><p style=\"margin: 0.5em 0px !important;\">不过围绕这个renderToString我们还要做一些准备工作：</p></li><li><p>从后台server或数据库等来源拉取数据</p></li><li><p>调用React.renderToString()方法来生成HTML</p></li><li><p style=\"margin: 0.5em 0px !important;\">最后发送HTML和数据给浏览器</p><p style=\"margin: 0.5em 0px !important;\">代码就不贴了，大家自行脑补。</p><p style=\"margin: 0.5em 0px !important;\">需要注意的是这里的JSON字符串中可能出现&lt;/script&gt;结尾标签或HTML注释，可能会导致语法错误，这里需要进行转义。</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/SAt9MvE.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">页面的示例代码本来打算用大家更熟悉的HTML，但发现代码量太多了，所以换成了jade代码，没用过jade的同学也顺便了解一下，我也顺便给jade打个广告。 这个页面做了这几件事：</p></li><li><p>将前面在action里生成的HTML写到#container元素里</p></li><li><p>引入必须的JS文件</p></li><li><p>获取action提供的数据</p></li><li><p style=\"margin: 0.5em 0px !important;\">渲染组件</p><p style=\"margin: 0.5em 0px !important;\">这就是React的服务端渲染，组件的代码前后端都可以复用。</p><p style=\"margin: 0.5em 0px !important;\">是不是感觉React挺牛逼的？还没完！</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/ECZBW6M.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/UVb8skK.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">React能够用一套代码同时运行在浏览器和node里，而且能够以原生App的姿势运行在iOS和Android系统中，即拥有了web迭代迅速的特性，又拥有原生App的体验。</p><p style=\"margin: 0.5em 0px !important;\">这个姿势叫做 React-Native。</p><p style=\"margin: 0.5em 0px !important;\">这是React和React-Native在github上的数据，可以看出React-Native也是相当热门——因为React-Native能够使React的价值最大化，这个价值是什么呢——对业务来说，意味着不需要为了做终端版本就招聘和前端等量人力的终端开发，同时意味着我们成为全栈工程师有了一个捷径。</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/rAd8wLf.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">了解iOS开发的同学都知道，水果公司对应用上架的审核效率实在让人无力吐槽，很多团队上一个版本还没审核结束，下一个版本就已经做好了。而React-Native支持从网络拉取JS，这样iOS应用也能够像web一样实现快速迭代了。</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/UAMYcHH.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">上图就是react-native的调试过程，以 iOS 为例</p></li><li><p style=\"margin: 0.5em 0px !important;\">启动 xcode build</p></li><li><p>在模拟器中按下 Command + D 打开菜单，选择 Debug in Chrome</p></li><li><p style=\"margin: 0.5em 0px !important;\">在 Chrome dev tools 中调试</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/jGtOxjP.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">当然，react 并不是完美的，在实际使用时你也会发现她的一些缺点，比如：</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/4Fkwmtc.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">（如果只是做安卓 app 开发，那么“苹果两件套+开发者证书”不是必须的，在windows下面开发即可。）</p><p style=\"margin: 0.5em 0px !important;\">最后，大家在使用 react 开发时，可能会需要安装React developer tools</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/DkPJ4ca.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">最后是一点参考资料</p><p style=\"margin: 0.5em 0px !important;\"><img alt=\"\" src=\"http://i.imgur.com/1NmPthQ.jpg\"/></p><p style=\"margin: 0.5em 0px !important;\">书山有路勤为径，react 便是那通往『全栈工程师』的捷径。</p></li></ol><hr/><h3 id=\"-bugly-\" style=\"margin: 1.3em 0px 1em; padding: 0px; font-weight: bold; font-size: 1.3em;\">腾讯Bugly简介</h3><p style=\"margin: 0px 0px 1.2em !important;\">Bugly是腾讯内部产品质量监控平台的外发版本，其主要功能是App发布以后，对用户侧发生的Crash以及卡顿现象进行监控并上报，让开发同学可以第一时间了解到App的质量情况，及时机型修改。目前腾讯内部所有的产品，均在使用其进行线上产品的崩溃监控。</p><p><br/></p>', '4');
INSERT INTO `blog_article_data` VALUES ('', '', '<p>文章背景：结束d2之行或周末的前端群线下见面会，跟一些待毕业的学生或正在这个行业的从业者交流后我深切的感触到：在如今信息大爆炸的今天，搜索引擎这么方便的前提下，除了少部分乘上校招快车的幸运儿之外，大部分同学找工作很迷茫，很难。很多同学不会找工作，也不知道如何找工作，如何找一份适合自己的工作。其实任何事物都有规律的，只要掌握规律玩法，个人感觉IT行业，尤其前端大环境这么好的前提下找个工作其实并不难。</p><p>找工作的环节中最重要的无非是面试，试用期，然后就进入一个平衡期。</p><p>很多人不知道如何面试？不知道如何写简历，不知道怎么取悦hr获得面试电话？不知道面试中哪些是重要的环节，需要在哪些地方需要精力去学习或优化。</p><p>为此就个人积累的一些经验来分享一下，由于个人经历范围有限，不一定具有普遍的参考意义，请结合实际情况进行部分借鉴。</p><p>&nbsp;</p><p>很多妹子反映不好找工作，可能真的是没有琢磨工作是如何找的？或者不太清楚找工作的真正流程或者琢磨了也限于知识面的范围，仅停留在招聘会或校招这两种方式上。</p><p>其实现在大部分社招都是通过网上或朋友介绍找的。</p><p>大概有这么几个方式：</p><p>1. 通过招聘网站投简历，这是一种成本最低的方式。比如：51job，拉勾，内推，大街，linkedin。</p><p>2. 通过同事朋友内推，这是一种成功率较高的方式。</p><p>3. 通过微博，QQ群等其它社交工具互动后投递。</p><p>4. 通过各个公司的招聘网站，各个公司员工的博客招聘信息进行投递。</p><p>5. 最猛的是先斩后奏式的面试方式，就是直接到公司前台妹妹说听说你们公司招聘前端，我刚好在楼下面试，顺便过来看看有没有机会。只要妹子心情好，一般不会拒绝的。当然简历作品自信什么的要带好，杀到对方的地盘这招是具备一定的势力或自信才敢这么做。</p><p>6. 最后一种方式通过F12的console.log投递。</p><p>&nbsp;</p><p>然后在面试的整个过程，有一个分水岭，就是获得一个面试电话，也有人很疯狂的说，接到电话是成功了一半。那问题来了，如何获得面试电话，hr是通过什么标准筛选出来之后会给你电话？是随机抽取2个扔了，还是认真的一个一人看呢？</p><p>一般简历可以分为这么几个版块，分版块的目的是，虽然没有一定的设计元素来装饰简历，但从结构上来说，是比较清晰的。</p><p>你是哪儿人，电话号码，你会哪些，你想找个什么的工作，你以前干过什么，在学校成绩怎么样？等等。多余的信息千万不要写，基本信息绝对不能漏。</p><p>按照这个罗列出来就是这个结构：</p><p>&nbsp;</p><p><strong>1. 个人信息</strong></p><p>个人信息一般是姓名，联系方式，等等这几块，只写与本身信息有关的不写无关的东西。</p><p>&nbsp;</p><p><strong>2. 能力专长描述</strong></p><p>这块很多是不会写，也不知道怎么写，其实这块是一个关键。</p><p>可以这么来说，先分前端后端来写，然后前端在按css,js两块来。</p><p>后端然后按语言来。这样脉络就比较清晰了。很多人说，我不会这么多怎么办？不会就赶紧学。</p><p>&nbsp;</p><p>以下只是一个个人模板，仅供参考：</p><p>1. 热爱前端，喜欢用最扎实的代码技术做出效果上最炫，代码上最合理的页面。</p><p>2. 熟悉html,css，能够兼容主流各种浏览器，比如ie6-10, chrome,firefox,opera.</p><p>3. 熟悉js dom, event,ajax, jsonp能够编写基本的js原生代码。</p><p>4. 熟悉jquery api，能够编写最基本的动态交互效果，并擅长用jquery插件来封装日常的开发组件，能够保证代码的性能或可难搞性。</p><p>5. 熟悉backbone, angularjs,avalon等框架，熟练使用seajs, requirejs模块加载，并熟练使用grunt,glup,fis工程化工具。</p><p>6. 熟练使用svn,git等版本控制工具。</p><p>7. 能够熟练使用firebug,chrome调试工作调试代码，并能够进一步进行优化。</p><p>8. 能够熟练使用photoshop, sublime text, webstorm, vim等工具进行前端页面手工式的开发。</p><p>9.&nbsp;目前正在关注移动端的html5,css3, nodejs等。</p><p>&nbsp;</p><p>其它细解：</p><p>a. css</p><p>1. 了解ie6,7,8,9,10,11之间的差别，了解css盒模型在各个浏览器下的差异。能够熟练的解决各个浏览器下出现的bug。</p><p>2. 了解less,sass的运作原理，并在一定的条件下能熟练运用。</p><p>3. 能够熟练在ie6,7,8,9,10,11,firefox,chrome,safari下进行调试。</p><p>b. js</p><p>1. 熟悉dom, event,prototype,constructor 等基础概念。</p><p>2. 熟悉js在各个浏览器下的兼容问题。</p><p>&nbsp;</p><p><strong>3. 了解</strong></p><p>这里最主要的还是要贴作品地址，这个地址不是所在公司的作品地址，而是业余时间的作品地址。因为业余时间的作品，不受商业或需求的限制，能在一个更大的范围内实现你心中的前端战略目标。为什么要写这样一个地址，这也是向hr传达一个你白天求生存，晚上谋发展的主动学习的态度之一，也是能体现你在理想主义情怀下对前端的理解期望。(不错，又提到了情怀，情怀真的是一个不错的东西。)同时也是一个向hr传达势力的最重要信息口，hr虽然不懂技术，不懂作品的质量，但他能看到作品数量，如果能点开看到苦逼玄的效果，不给你电话还会给谁电话。另外他以此来判断你是否做过东西，能做出东西，至于做的质量方面，做的方向是否与公司招聘的岗位一致，这些细节是技术面试官的事了。换句话说，也是电话之后的事情了。</p><p>另外一个现状是很多人刚开始不会写，但又不想写，大的效果写不了，小的东西看不上，然后就进入了这样一个死循环。其实学习就是这样一个不断翻越山峰的一个过程，只是刚开始迈起来可能有点困难而已。每个人都有这样的一个坎需要来迈，如果不能超越自我，跨越自我，迈不过这坎，那一直还在门外打转。如果稍为坚持一下，迈过去了，那不得不说，前端的世界真的很精彩，虽然有时候情怀会被商业会控制，但在梦想的坚持之下，你会走得更远。</p><p>&nbsp;</p><p><strong>3. 求职意向</strong></p><p>前端还是后端一定要写清楚，要不然，糊里糊涂就被定位成打杂的了。自己没有方向或目标，被别人来引导有时候是很危险的一件事情。</p><p>&nbsp;</p><p><strong>4. 履历描述</strong></p><p>有些东西是不建议写在上面，有些东西是可以挖掘细节的。</p><p>那些东西不能写，太简短的工作经历。很多面试官对简短的工作经历非常的介意，但按我的经验来看，有时候人在江湖，为了生存，为了更好的活下去，有简短的工作经历也是有不得已的苦衷，但不是每个人都有这个经历，所以不能理解也没办法，所以不建议写上去。但不管怎样，这就是青春，这就是成长的代价，在人生之路上因为失去了一些才会收获一些。</p><p>挖掘细节，指项目中的工作内容，在自己看来是无关紧要的，也是非常熟悉，没什么出彩的地方。但在hr或面试官看来是体现你能力或人品的闪光点，所以需要写出来。尤其有些面试官会问，你在以前的项目中最为得意的作品，以前项目中最为难攻克的技术点，是怎么攻克的。这时候就可以在简历中写情感化的描述，比如，此项目经过三个月的奋战是我自认为职业生涯中最得意的一个作品，期间通过多种手段解决了某一块的性能问题，等等。</p><p>这时候还是要记得贴作品网址，如果说上面贴的业余时间作品是你理想主义的实现，那么工作的作品能很好的说明所在公司的开发流程下的妥协实现，如何在设计与后台数据之间取得平衡，如果在产品与设计之间找到爆发点。</p><p>&nbsp;</p><p>我感觉要两个方向走，业余时间根据自己的兴趣来做一些东西，业余时间的东西可以做为面试作品，他不受商业或需求的限制，能在一个更大的范围内实现你心中的前端战略目标。同是向hr传达一个你白天求生存，晚上谋发展的主动学习的态度之一，也是能体现你在理想主义情怀下对前端的理解期望。而工作之后公司的作品能很好的说明所在公司的开发流程下的妥协实现，如何在设计与后台数据产品之间取得平衡。</p><p>&nbsp;</p><p><strong>1. 如何真正的进入面试环节</strong></p><p>一般面试有这么几个步骤：技术主管面试，部门主管的面试，hr的面试。这个顺序可能会有当事人时间的空余情况，而被打乱。但一般第一面要么hr要么技术主管，部门主管一般是不会出面的。</p><p>一般技术主管面试侧重的是你以往或过去能力的一个了解，更注重技术的细节。</p><p>部门主管更侧重于对你过去经验能力了解之后对未来职业规划的一个了解，更注重宏观能力的判断。</p><p>hr着重了解你的性格，沟通，以及其它相关情况，最主要的是负责谈养薪资</p><p>&nbsp;</p><p><strong>2. 如何真正的面对hr的陷阱</strong></p><p>外部链接，仅供参考</p><p><a href=\"http://www.qlrc.com/padownload/4685.html\">http://www.qlrc.com/padownload/4685.html</a></p><p>除了上面的之外，另外一个最重要的惯例是砍1k风格，比如你要价7k，习惯性的砍1k。</p><p>这时候建议要么在原有的工资之上多要1k，或者是坚持自己的原则，相信自己的势力，以先有的能力或水平肯定会找到一个令自己满意的工作。</p><p>&nbsp;</p><p><strong>3. 如何真正的拿到适合自己的offer</strong></p><p>a. 首先要通过技术面试官，了解当前开发团队的组成形式，然后根据团队成员了解当前前端或其它岗位职责。</p><p>比如有的公司对前端的定义：只写js，有的公司则是css,js,接口数据的展现都写。</p><p>所以在面试当中要对现在候选的这个职位有明确的了解，免得入职后期望有偏差。</p><p>b. 也要了解当前对加班是如何激励的？</p><p>如果明确平时加班补助餐费周末加班换休，这是注重员工体验或成本的。如果没有则是相反的结果。</p><p>c. 还有问清试用期的期限，以及试用期期间的工资发放情况，福利是否包括住房公积金，社保养老保等等福利。</p><p>d. 另外要问清上下班时间，有的公司是8.30上班的，果断弃之。</p><p>e. 要问清楚一年几次涨薪，有没有涨薪。年终奖是双薪还是单薪还是没有？</p><p>f. 公司是否对在职员工进行体检。有的公司只有满一年的员工才有体检机会，good luck.</p><p>g. 有空的话还要问一下后台语言的种类。我是特别喜欢跟php程序员合作，当然也不排斥java,.net。struts的控制标签或razor模板是非常强悍的。</p><p>&nbsp;</p><p><strong>4. 如何度过试用期</strong></p><p>这里边我谈以下几点，</p><p>a. 明确自己在团队中的角色，明确自己只是一个前端，不是产品设计编辑或运维。有些关于核心产品的东西我们可以提建设性的意见，但并不表示在时间允许的范围内可以兼职干这些活。如果公司有这样干的就是谨慎选择了，了解其它岗位是必须的，但并不意味着可以去干这部分的活。</p><p>b. 团队必须一个明确的目标或强有力的领导：</p><p>如果进去一个月还没有一个完整的项目开发计划或一个明确的上线时间，就要慎重了。互联网的世界千变万换，在试用期还没有一个明确的开发计划或行动，基本是没戏了。</p><p>强有力的领导的意思是，根据项目上线计划，强有力的领导在适当的时候say no，中止产品的修改需求或bug提交需求。如果一个上线计划一制定，在不影响主流程功能的情况下，是可以上线的。</p><p>c. 团队中的同事中是否有经验丰富，具备一定解决实际问题的人存在，同时有达到公司战略目标的决心。</p><p>是否有大牛是吸引你加入的主要原因，跟着大牛学习工作，必须是事半功倍。</p><p>如果经过一段时间的磨合，你的水平是最好的，那就比较蹉跎了。岁月漫漫不是在填坑的路上就在去挖坑的路上。</p><p>以后就是顶梁柱，同时在此公司向别人学习的机会相对减少，独当一面的机会相对增加。</p><p>另外在公司中态度或决心是重要的，没有好的态度容易发生冲突，没有一个必胜的决心会影响团队的项目进度。</p><p>d. 是否提供必要的生产资料</p><p>电脑是否能配备两个显示器，内存是否能达到4G以上等等的一些细节决定你干活时是否有个好心情的必要条件，</p><p>也可以从侧面看出公司对技术的投入成本的决心。</p><p>e. 团队内是否有明确的沟通途径：</p><p>比如是否所有的都开会的形式讨论，会后以邮件的方式通知与会人员。是否在一定时期内大家都清楚目前所在主分支的项目开发目标。</p><p>f. 团队内是否定期做技术的分享与交流。</p><p>&nbsp;</p><p><strong>5. 如何度过风暴期</strong></p><p>在此阶段，由于新人的原因，对一些旧有的问题会有一些自己的看法，而向leader提出之后，没有达到预期的效果。这时候就是发生冲突的时候。</p><p>这时候建议要从长远的角度来考虑问题，因为一个问题的堆积不是一个单方面的原因，有其历史原因或技术因素。</p><p>&nbsp;</p><p><strong>6. 如何度过平衡期</strong></p><p>与团队成员中磨合达到一个平衡状态，有些团队成员的小毛病也可以容忍，也在有限的范围做一个力所能及的事情。</p><p>还有一种情况是，到入职之后过了平衡期，就会有一个麻木期，这时候要千万的警惕，对公司的业务情况，营收情况，利润情况都不了解。还很木然的等待着机会，这时候需要警惕，人的惰性带来的不可逆向的后果。有好的机会一定要抓住。</p><p>跳是需要一个很大的勇气或技术存储，所以平常不只是搞技术，还要关心公司的发展，营收，或对业界的影响。</p><p>当然还有一种极端的情况是，真正的公司不行了，需要等待裁员，这时候是有一笔赔偿的，有时候这个点很难把握。</p><p>&nbsp;</p><p><strong>7. 如何度过散伙期</strong></p><p>当某个事情的数量达到一定的时候就有辞职的想法。马云的那句话：干的不爽了，给的钱少了。大部分情况下是干的不爽钱还不多，果断选择离职了。</p><p>一般以我个人经验有两条分享一下：没干够一年不建议辞职，在春节前不建议辞职。</p><p>不够一年的经历虽然有客观原因，但是在履历上真不好看，充分体现了当下年轻人浮躁而不沉着的缺点。</p><p>在年前不辞职的原因是，要想过个好年，就乖乖的呆到年后领了年终奖在辞职，就算没有依然呆到年终。</p><p>在职的心态过年是踏实而忙碌的，失业的心态过年是着急而无聊的。</p><p>&nbsp;</p><p>由此看来，自从加入公司，无论最终是否决定离开，都是需要坚持学习的步骤，积累技术与职业方面的经验能力，以备下次跳槽或升职带来更大的发展机遇。越努力的人越幸运，可能就是这个道理。</p><p>公司只是你现阶段谋生的一个手段，人的成长如果高于公司岗位的要求的时候，就是需要自我突破更新颠覆的时候，这时候就需要跳。</p><p>&nbsp;</p><p>看前景，关心公司的实质发展，这样可以反过来审时自己岗位在整个开发流程中的角色，这样也能理解公司老板或领导所做的一些决策，也能主动的更好的去执行，从而更好的保证了团队目标的更快达到，从一定程度上为公司节省了成本。这样长期下去，影响是不可估量的。</p><p>&nbsp;</p><p>只是分享一些经验，真正的牛B或快乐的翱翔，需要你们自己付出的实际行动。路就在脚下，一切看你们的了。just do it。</p><p>&nbsp;</p><p>最后分享的是善待、正视、感激这些挫折，</p><p>善待意思不要浮躁，一步一步来，罗马不是一天建成的，工作也不是一天就能找到的。</p><p>正视的意思是要勇于出去碰壁，只要出去称称自己的重量才会找到自己的差距，才有努力的方向。</p><p>感激指的是，你还是比很多人幸运，有这个机会来享受这次挫折。</p><p>感激目前毕业后或现阶段遇到的所有困难与无助。正是这些所谓的困难挫折，让你的内心经历艰难的成长，让你的灵魂得到不断的升华。</p><p>咬牙坚持走过，回头看看，那只是一个插曲。人生并没有难以跨越的鸿沟，经历是一笔无形的财富，随着内心的不断强大，灵魂的不断越脱。</p><p>我们在享受成长过程带来的收获的同时，在慢慢走向成功的终点。我们相信，这一天，终究会到来。&nbsp;<br/>恩，人生路很长，多次的失败只是让你的内心更为强大，感谢那些人生路的那些人，那些事。</p><p>正是他们的各种做作，才能成就你强大的内心或无比坚固的信念。&nbsp;</p><p>正如我前面的配图一样，在你人生中最值得拼搏的时候，你奋力向前，挥洒青春，奉献了自己最宝贵的年华，</p><p>跟一群最值得怀念的小伙伴们度过了最让人难忘的很多岁月，无论是青涩还是成熟的，无论开心还是悲伤的，请记住这段岁月，</p><p>就算老天暂时的没向你转运，但依然相信有自己的一片蓝天，相信自己，相信奇迹～！&nbsp;</p><p><br/></p>', '5');

-- ----------------------------
-- Table structure for `blog_article_tag`
-- ----------------------------
DROP TABLE IF EXISTS `blog_article_tag`;
CREATE TABLE `blog_article_tag` (
  `article_aid` int(10) unsigned NOT NULL DEFAULT '0',
  `tag_tid` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `fk_article_tag_article1_idx` (`article_aid`),
  KEY `fk_article_tag_tag1_idx` (`tag_tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章标签中间表';

-- ----------------------------
-- Records of blog_article_tag
-- ----------------------------
INSERT INTO `blog_article_tag` VALUES ('1', '1');
INSERT INTO `blog_article_tag` VALUES ('2', '1');

-- ----------------------------
-- Table structure for `blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cname` char(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `ctitle` varchar(120) NOT NULL DEFAULT '' COMMENT '分类的title,作so',
  `cdes` varchar(200) NOT NULL DEFAULT '' COMMENT '分类的描述,做seo',
  `pid` smallint(6) NOT NULL DEFAULT '0' COMMENT '父级pid',
  `csort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序字段',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '行者无疆', '行者无疆', '', '0', '100');
INSERT INTO `blog_category` VALUES ('2', '代码风暴', '代码风暴', '', '0', '100');
INSERT INTO `blog_category` VALUES ('3', 'web前端', '', '', '2', '100');
INSERT INTO `blog_category` VALUES ('4', '后台', '', '', '2', '100');
INSERT INTO `blog_category` VALUES ('5', 'html5', '', '', '3', '100');
INSERT INTO `blog_category` VALUES ('6', 'css3', '', '', '3', '100');
INSERT INTO `blog_category` VALUES ('7', 'php', '', '', '4', '100');

-- ----------------------------
-- Table structure for `blog_comment`
-- ----------------------------
DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `coid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论时间',
  `article_aid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`coid`),
  KEY `fk_comment_article1_idx` (`article_aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章评论表';

-- ----------------------------
-- Records of blog_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_link`
-- ----------------------------
DROP TABLE IF EXISTS `blog_link`;
CREATE TABLE `blog_link` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lname` char(40) NOT NULL DEFAULT '' COMMENT '链接名称',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `logo` varchar(120) NOT NULL DEFAULT '' COMMENT 'logo',
  `url` char(150) NOT NULL DEFAULT '' COMMENT '地址',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of blog_link
-- ----------------------------

-- ----------------------------
-- Table structure for `blog_tag`
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE `blog_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tname` char(25) NOT NULL DEFAULT '' COMMENT '标签名称',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of blog_tag
-- ----------------------------
INSERT INTO `blog_tag` VALUES ('1', '318');
INSERT INTO `blog_tag` VALUES ('2', '214');

-- ----------------------------
-- Table structure for `blog_user`
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for `blog_webset`
-- ----------------------------
DROP TABLE IF EXISTS `blog_webset`;
CREATE TABLE `blog_webset` (
  `wid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '配置项名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '配置的标题',
  `type_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '类型id',
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='网站配置表';

-- ----------------------------
-- Records of blog_webset
-- ----------------------------
INSERT INTO `blog_webset` VALUES ('1', 'webname', 'welcome to D.Sheldon\\\'s  blog', '', '1');
INSERT INTO `blog_webset` VALUES ('2', 'adminemail', 'Your Phone Has Stopped,I Still Rember The Number.Email Me:1505906554@qq.com', '', '1');
INSERT INTO `blog_webset` VALUES ('3', 'copy', '万万没想到 节操不见了 万万没想到 世界真奇妙 万万没想到 幺幺切克闹', '', '1');
INSERT INTO `blog_webset` VALUES ('4', 'code_len', '4', '', '2');
INSERT INTO `blog_webset` VALUES ('5', 'code_color', '#ff0000', '', '2');

-- ----------------------------
-- Table structure for `v_admin`
-- ----------------------------
DROP TABLE IF EXISTS `v_admin`;
CREATE TABLE `v_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL DEFAULT '' COMMENT 'åŽå°ç”¨æˆ·å',
  `account` char(120) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·è´¦æˆ·,',
  `password` char(32) NOT NULL DEFAULT '' COMMENT 'åŽå°ç®¡ç†å‘˜çš„ç™»é™†å¯†ç ',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0',
  `loginip` char(45) NOT NULL DEFAULT '' COMMENT 'ç™»é™†ipåœ°å€ï¼›',
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid_UNIQUE` (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='åŽå°ç”¨æˆ·è¡¨';

-- ----------------------------
-- Records of v_admin
-- ----------------------------
INSERT INTO `v_admin` VALUES ('1', 'admin', 'admin', 'admin', '1458471840', '::1');
INSERT INTO `v_admin` VALUES ('2', 'cate', 'cate', 'cate', '1456737051', '::1');
INSERT INTO `v_admin` VALUES ('4', 'goods', '1505906554@qq.com', 'goods', '1456815497', '::1');
INSERT INTO `v_admin` VALUES ('5', 'brand', '1505906554@qq.com', 'brand', '1457403580', '::1');
INSERT INTO `v_admin` VALUES ('6', 'type', '1505906554@qq.com', 'type', '1456815518', '::1');
INSERT INTO `v_admin` VALUES ('7', '23', '1505906554@qq.com', '123', '1457850238', '');

-- ----------------------------
-- Table structure for `v_adress`
-- ----------------------------
DROP TABLE IF EXISTS `v_adress`;
CREATE TABLE `v_adress` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `consignee` varchar(45) NOT NULL DEFAULT '' COMMENT 'æ”¶è´§äººçš„åç§°',
  `cellphone` varchar(20) NOT NULL DEFAULT '' COMMENT 'æ”¶è´§äººç”µè¯',
  `adress` varchar(255) NOT NULL DEFAULT '' COMMENT 'æ”¶èŽ·åœ°å€',
  `postcode` varchar(10) NOT NULL DEFAULT '' COMMENT 'æ”¶èŽ·äººçš„é‚®ç¼–ã€‚',
  `telephone` varchar(45) NOT NULL DEFAULT '' COMMENT 'åº§æœºç”µè¯',
  `user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid_UNIQUE` (`aid`),
  KEY `fk_adress_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_adress
-- ----------------------------

-- ----------------------------
-- Table structure for `v_brand`
-- ----------------------------
DROP TABLE IF EXISTS `v_brand`;
CREATE TABLE `v_brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bname` char(120) NOT NULL DEFAULT '' COMMENT 'å•†å“å“ç‰Œ',
  `logo` char(255) NOT NULL DEFAULT '' COMMENT 'ç¼©ç•¥å›¾åœ°å€',
  `bsort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'å“ç‰ŒæŽ’åº',
  `is_hot` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'æ˜¯å¦çƒ­é”€,å•é€‰ï¼Œå¦‚æžœæ˜¯1 çš„è¯å°±æ˜¯çƒ­é—¨ï¼Œæ˜¯0 çš„è¯ï¼Œå°±æ˜¯ä¸çƒ­é—¨ï¼›',
  PRIMARY KEY (`bid`),
  UNIQUE KEY `bid_UNIQUE` (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_brand
-- ----------------------------
INSERT INTO `v_brand` VALUES ('1', 'Nautilus', 'Upload/37371455722049_thumb.png', '1', '1');
INSERT INTO `v_brand` VALUES ('2', 'vancl', 'Upload/23611455722110_thumb.png', '1', '1');
INSERT INTO `v_brand` VALUES ('3', 'vancl', 'Upload/34401457403119_thumb.jpg', '222', '1');

-- ----------------------------
-- Table structure for `v_cate`
-- ----------------------------
DROP TABLE IF EXISTS `v_cate`;
CREATE TABLE `v_cate` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(45) NOT NULL DEFAULT '' COMMENT 'åˆ†ç±»ç±»åž‹çš„åç§°ï¼›',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'æ— é™åˆ†ç±»çš„çˆ¶çº§ID',
  `csort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'æŽ’åºå­—æ®µï¼›',
  `type_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cid`),
  UNIQUE KEY `cid_UNIQUE` (`cid`),
  KEY `fk_cate_type_idx` (`type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_cate
-- ----------------------------
INSERT INTO `v_cate` VALUES ('1', '男装', '0', '1', '1');
INSERT INTO `v_cate` VALUES ('2', '女装', '0', '1', '1');
INSERT INTO `v_cate` VALUES ('3', '鞋/家居/内衣/袜品', '0', '2', '3');
INSERT INTO `v_cate` VALUES ('4', '衬衫', '1', '3', '1');
INSERT INTO `v_cate` VALUES ('5', '针织衫', '1', '3', '1');
INSERT INTO `v_cate` VALUES ('6', '外套', '1', '3', '1');
INSERT INTO `v_cate` VALUES ('7', '裤装', '1', '3', '3');
INSERT INTO `v_cate` VALUES ('8', '上装', '2', '3', '1');
INSERT INTO `v_cate` VALUES ('9', '裤装', '2', '3', '3');
INSERT INTO `v_cate` VALUES ('10', '鞋', '3', '2', '3');
INSERT INTO `v_cate` VALUES ('11', '家居', '3', '2', '3');
INSERT INTO `v_cate` VALUES ('12', '内衣', '3', '2', '3');
INSERT INTO `v_cate` VALUES ('13', '袜品', '3', '2', '3');
INSERT INTO `v_cate` VALUES ('14', '免烫', '4', '100', '1');
INSERT INTO `v_cate` VALUES ('15', '法兰绒', '4', '20', '1');
INSERT INTO `v_cate` VALUES ('16', '牛仔布', '4', '100', '1');
INSERT INTO `v_cate` VALUES ('17', '牛津纺', '4', '100', '1');
INSERT INTO `v_cate` VALUES ('18', '羊毛衫', '5', '50', '1');
INSERT INTO `v_cate` VALUES ('19', '羊绒纺', '5', '100', '1');
INSERT INTO `v_cate` VALUES ('20', '棉线纺', '5', '100', '1');
INSERT INTO `v_cate` VALUES ('21', '羽绒服', '6', '50', '1');
INSERT INTO `v_cate` VALUES ('22', '冲锋衣', '6', '100', '1');
INSERT INTO `v_cate` VALUES ('23', '羊毛外套', '6', '100', '1');
INSERT INTO `v_cate` VALUES ('24', '卫衣', '6', '100', '1');
INSERT INTO `v_cate` VALUES ('25', '牛仔裤', '7', '100', '3');
INSERT INTO `v_cate` VALUES ('26', '休闲裤', '7', '100', '3');
INSERT INTO `v_cate` VALUES ('27', '针织裤', '7', '100', '3');
INSERT INTO `v_cate` VALUES ('28', '运动裤', '7', '100', '3');
INSERT INTO `v_cate` VALUES ('29', '羽绒服', '8', '100', '1');
INSERT INTO `v_cate` VALUES ('30', '针织衫', '8', '100', '1');
INSERT INTO `v_cate` VALUES ('31', '卫衣', '8', '50', '1');
INSERT INTO `v_cate` VALUES ('32', '羊毛大衣', '8', '100', '1');
INSERT INTO `v_cate` VALUES ('33', '牛仔裤', '9', '50', '3');
INSERT INTO `v_cate` VALUES ('34', '运动裤', '9', '100', '3');
INSERT INTO `v_cate` VALUES ('35', '打底裤', '9', '100', '3');
INSERT INTO `v_cate` VALUES ('36', '123', '1', '100', '1');

-- ----------------------------
-- Table structure for `v_detail`
-- ----------------------------
DROP TABLE IF EXISTS `v_detail`;
CREATE TABLE `v_detail` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbigpic` varchar(255) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„æ”¾å¤§é•œå¤§å›¾',
  `dmidpic` varchar(255) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„æ”¾å¤§é•œä¸­å›¾',
  `dsmallpic` varchar(255) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„æ”¾å¤§é•œå°å›¾',
  `intro` text COMMENT 'å•†å“çš„è¯¦ç»†ä»‹ç»ä¿¡æ¯ï¼›',
  `service` text COMMENT 'å•†å“çš„å”®åŽæœåŠ¡ï¼›',
  `goods_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`did`),
  UNIQUE KEY `did_UNIQUE` (`did`),
  KEY `fk_detail_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_detail
-- ----------------------------
INSERT INTO `v_detail` VALUES ('11', 'Upload/Content/16/02/54851456746967.jpg,Upload/Content/16/02/77161456746967.jpg,Upload/Content/16/02/51741456746967.jpg,Upload/Content/16/02/72601456746966.jpg,Upload/Content/16/02/50771456746966.jpg', '', '', '<p><img alt=\"1456747090576711.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747090576711.png\"/><img alt=\"1456747178139762.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747178139762.png\"/><img alt=\"1456747245728011.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747245728011.png\"/><img alt=\"1456747342716565.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747342716565.png\"/><img alt=\"1456747402770656.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747402770656.png\"/><img alt=\"1456747456137056.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747456137056.png\"/><img alt=\"1456747536589191.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747536589191.png\"/><img alt=\"1456747601462462.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747601462462.png\"/><img alt=\"1456747642389050.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747642389050.png\"/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">古吉拉特邦生态棉（有机棉）,产自棉花发源地印度。50股线，精梳工艺织造 。多次工艺轻拉毛，绒感细密，打造羊绒般的肌肤触感。修身版型，经典工装款式，后背双边裥，短款外穿设计。高还原度对格。经典苏格兰格纹，质感素色。</p><p><br/></p>', '11');
INSERT INTO `v_detail` VALUES ('6', 'Upload/Content/16/02/81641456451718.jpg,Upload/Content/16/02/64901456451718.jpg,Upload/Content/16/02/60911456451717.jpg,Upload/Content/16/02/5011456451717.jpg,Upload/Content/16/02/16341456451717.jpg', '', '', '<p><img src=\"/vancl/Upload/ueditor/image/20160226/1456453448402347.png\" style=\"\"/></p><p><img src=\"/vancl/Upload/ueditor/image/20160226/1456452142288442.png\" style=\"\"/></p><p><img src=\"/vancl/Upload/ueditor/image/20160226/1456452142124904.png\" style=\"\"/></p><p><img src=\"/vancl/Upload/ueditor/image/20160226/1456453754500717.png\" alt=\"1456453754500717.png\"/></p>', '<p>该产品是原有“凡客80免烫衬衫 \r\n吉国武”的升级产品，适合正式场合穿着。2.0延续原有吉国武版型风格，依然使用阿克苏长绒棉制成，免烫工艺和嵌条工艺保证水洗多次不变型。2.0产品在衬衫细节上和版型方面都做了巨大革新，确保更加合身挺拔。</p>', '6');
INSERT INTO `v_detail` VALUES ('7', 'Upload/Content/16/02/33981456455210.png,Upload/Content/16/02/84541456455210.png,Upload/Content/16/02/28661456455210.png,Upload/Content/16/02/91101456455210.png,Upload/Content/16/02/73171456455209.png', '', '', '<p><img src=\"/vancl/Upload/ueditor/image/20160226/1456455654283880.png\" style=\"\"/></p><p><img src=\"/vancl/Upload/ueditor/image/20160226/1456452142288442.png\" style=\"\"/></p><p><img src=\"/vancl/Upload/ueditor/image/20160226/1456452142124904.png\" style=\"\"/></p><p><img src=\"/vancl/Upload/ueditor/image/20160226/1456452142140799.png\" alt=\"1456452142140799.png\"/><img src=\"/vancl/Upload/ueditor/image/20160226/1456453754500717.png\" alt=\"1456453754500717.png\"/></p>', '<h3>产品描述：</h3><p><span class=\"blank8\"></span></p><p class=\"productMS\" style=\"LINE-HEIGHT: 20px\">该产品是原有“凡客80免烫衬衫 \r\n吉国武”的升级产品，适合正式场合穿着。2.0延续原有吉国武版型风格，依然使用阿克苏长绒棉制成，免烫工艺和嵌条工艺保证水洗多次不变型。2.0产品在衬衫细节上和版型方面都做了巨大革新，确保更加合身挺拔。</p><p><br/></p>', '7');
INSERT INTO `v_detail` VALUES ('34', 'Upload/Content/16/03/74641456835441.jpg,Upload/Content/16/03/98181456835440.jpg,Upload/Content/16/03/67081456835440.jpg,Upload/Content/16/03/68301456835440.jpg,Upload/Content/16/03/31171456835440.jpg', '', '', '<p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456835457236932.png\" style=\"white-space: normal;\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456835457546804.png\" style=\"\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456835457317402.png\" style=\"\"/></p><p><br/></p><p><br/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">连帽绳扣大衣俗称为牛角扣大衣（Duffle Coat)，是具有代表性的英伦服饰。这一季，我们在不为人知的细节处进化经典，由澳大利亚羊毛混纺精制而成，打造出舒适而非结构感的造型。</p><p><br/></p>', '34');
INSERT INTO `v_detail` VALUES ('12', 'Upload/Content/16/02/1191456748263.jpg,Upload/Content/16/02/73951456748262.jpg,Upload/Content/16/02/30391456748262.jpg,Upload/Content/16/02/82671456748261.jpg,Upload/Content/16/02/52121456748261.jpg', '', '', '<p><img alt=\"1456748501842088.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456748501842088.png\"/><img alt=\"1456748572566298.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456748572566298.png\"/><img alt=\"1456748637117696.png\" src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456748637117696.png\"/><img alt=\"1456749017120643.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456749017120643.png\"/><img alt=\"1456748965662603.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456748965662603.png\"/><img alt=\"1456749379334356.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456749379334356.png\"/><img alt=\"1456749462331344.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456749462331344.png\"/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">新疆阿克苏长绒棉结合低捻纺纱技术，保证牛仔粗犷外观亦能提升面料亲肤舒适度。8.6盎司重磅牛仔面料，手感厚实，质感十足，更适合秋冬。经典鱼眼工装扣耐磨易解，劳拉衬布挺括舒适，AE撞色缝线还原美式牛仔粗犷线条。液态靛蓝染料和绳染技术保证了染色的均匀度和色牢度。精湛的超磨白水洗工艺还原出自然的人体穿旧效果，浅中深三色满足不同需求。</p><p><br/></p>', '12');
INSERT INTO `v_detail` VALUES ('13', 'Upload/Content/16/02/79711456750477.jpg,Upload/Content/16/02/36821456750477.jpg,Upload/Content/16/02/82351456750477.jpg,Upload/Content/16/02/90451456750476.jpg,Upload/Content/16/02/9431456750476.jpg', '', '', '<p><img alt=\"1456750544772764.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456750544772764.png\"/><img alt=\"1456750687845101.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456750687845101.png\"/><img alt=\"1456750814128553.png\" src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456750814128553.png\"/><img alt=\"1456750814391632.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456750814391632.png\"/><img alt=\"1456751052107923.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456751052107923.png\"/></p>', '<p><span class=\"blank8\"></span></p><style type=\"text/css\">#anchor1&#10;    {&#10;        width: 1px;&#10;        height: 1px;&#10;        visibility: hidden;&#10;        position: absolute;&#10;        top: 710px;&#10;        *position:static;&#10;        *display:block;&#10;        *width:1px;&#10;        *height:50px;&#10;        *overflow:hidden;&#10;        *top:none&#10;    }&#10;    &#10;    &#10;    &#10;    #feedback&#10;    {&#10;        width: 1px;&#10;        height: 1px;&#10;        visibility: hidden; &#10;        position: absolute;&#10;        bottom: 40px;&#10;        *position:static;&#10;        *display:block;&#10;        *width:1px;&#10;        *height:30px;&#10;        *overflow:hidden;&#10;        *top:none;&#10;    }</style><p><span class=\"blank15\"></span><a id=\"anchor1\"></a> &nbsp; &nbsp;</p><h3>产品描述：</h3><p><span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">采用产量稀少的新疆阿克苏长绒棉，纺织出100支牛津纺面料。保证牛津纺独特饱满颗粒感，改善肌肤触感，绵润、柔软、滑爽。吉国武企划设计，领尖扣款，领长及门襟以毫米为单位调整加宽，展现男性阳刚气质。修身版型升级，腰部更加修身，领座提高，更好搭配西装。可商务可休闲。不断研究升级，采用精致衬衫缝制工艺。精心设计的实用细节，给身体活动空间。</p><p><br/></p>', '13');
INSERT INTO `v_detail` VALUES ('14', 'Upload/Content/16/02/9941456757566.jpg,Upload/Content/16/02/49651456757566.jpg,Upload/Content/16/02/65851456757565.jpg,Upload/Content/16/02/42841456757565.jpg,Upload/Content/16/02/39331456757565.jpg', '', '', '<p><img alt=\"1456757630242182.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456757630242182.png\"/><img alt=\"1456749017120643.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456749017120643.png\"/><img alt=\"1456757688811880.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456757688811880.png\"/><img alt=\"1456758063139805.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456758063139805.png\"/><img alt=\"1456758122560187.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456758122560187.png\"/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">选自80毛条，粗纺技术，全澳洲超细美丽诺羊毛, 纱线经过防缩处理, 增强了产品的防缩水性能和抗起球性能,编织成蓬松柔软的针织衫。其出众的保暖性，非常适合在寒冷季节穿着。搭配性出众的简约素色设计，适合各个年龄层穿着。 &nbsp;<br/>&nbsp; 产品通过国际羊毛局严格检测，并授予纯羊毛吊牌使用。 &nbsp;<br/>&nbsp; &nbsp;建议您首选干洗。如果条件不允许，需用羊毛专用中性洗涤剂，轻柔手洗。 极简设计，商务休闲两相宜。</p><p><br/></p>', '14');
INSERT INTO `v_detail` VALUES ('15', 'Upload/Content/16/02/47261456758782.jpg,Upload/Content/16/02/21111456758782.jpg,Upload/Content/16/02/13141456758782.jpg,Upload/Content/16/02/87191456758782.jpg,Upload/Content/16/02/7171456758782.jpg', '', '', '<p><img alt=\"1456758856126672.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456758856126672.png\"/><img alt=\"1456758907504805.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456758907504805.png\"/><img alt=\"1456758950125872.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456758950125872.png\"/><img alt=\"1456759186667552.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456759186667552.png\"/><img alt=\"1456759354241322.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456759354241322.png\"/></p>', null, '15');
INSERT INTO `v_detail` VALUES ('16', 'Upload/Content/16/02/9851456760082.jpg,Upload/Content/16/02/64461456760082.jpg,Upload/Content/16/02/90931456760082.jpg,Upload/Content/16/02/34951456760082.jpg,Upload/Content/16/02/40211456760082.jpg', '', '', '<p></p><p></p><p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456757630242182.png\"/><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456757923910509.png\"/><img alt=\"1456760228726763.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456760228726763.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456751052107923.png\"/></p><p></p><p></p><p></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456750544772764.png\"/></p><p><br/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">采用100%精梳棉，在纺纱的过程中增加了精梳的程序，使面料看起来更光滑，质感更好，穿着更舒适， 不易起球，缩水，变形和变薄，护理起来更方便。</p><p><br/></p>', '16');
INSERT INTO `v_detail` VALUES ('17', 'Upload/Content/16/02/31591456761303.jpg,Upload/Content/16/02/33671456761303.jpg,Upload/Content/16/02/52201456761303.jpg,Upload/Content/16/02/65801456761303.jpg,Upload/Content/16/02/14251456761303.jpg', '', '', '<p><img alt=\"1456757630242182.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456757630242182.png\"/><img alt=\"1456749017120643.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456749017120643.png\"/><img alt=\"1456762683122963.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456762683122963.png\"/><img alt=\"1456762733518532.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456762733518532.png\"/><img alt=\"1456747601462462.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747601462462.png\"/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">凡客羽绒服匈牙利额绒款采用优质匈牙利进口鹅绒填充。850+蓬松度、96.5%含绒量及93.5绒子含量、户外级别的充绒量（L码充绒量达到110g），以及防风风水的东丽高密表布，凡客羽绒服匈牙利鹅绒款的厚实保暖程度更胜一筹，达到专业户外级别。适宜户外的版型设计以及内置手机袋及耳机走线口，让您的出行更无忧。</p><p><br/></p>', '17');
INSERT INTO `v_detail` VALUES ('18', 'Upload/Content/16/03/92151456793009.jpg,Upload/Content/16/03/66901456793009.jpg,Upload/Content/16/03/66031456793009.jpg,Upload/Content/16/03/75781456793009.jpg', '', '', '<p><img alt=\"1456793100907540.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456793100907540.png\"/><img alt=\"1456793230218730.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456793230218730.png\"/><img alt=\"1456793283132141.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456793283132141.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456793364345631.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456793364193556.png\"/></p><p><br/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">简约设计、轻量化的冲锋衣适用于在多变的气候及环境中穿着。外层柔软、轻盈而富有弹性,颠覆了户外装备比较硬的概念；科技面料的防水透湿特性、符合人体工学的3D设计、360度调节系统,又超越了传统外套的性能；让您轻松应对各种环境,随时随地,无惧风雨,全天候自由穿行！ <br/><br/>&nbsp; &nbsp; &nbsp; &nbsp;面料：&nbsp; 日本东丽防水透湿面料 <br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;外层100%聚酯纤维 内层100%锦纶 <br/>&nbsp; &nbsp; &nbsp; &nbsp;性能：&nbsp; 10000mm防水 10000g/m2/24h透气透湿 &nbsp;<br/>&nbsp; &nbsp; &nbsp; &nbsp;版型：&nbsp; 立体裁剪 倒梯形结构 <br/>&nbsp; &nbsp; &nbsp; &nbsp;帽子：&nbsp; 连帽设计 抽绳可调节 <br/>&nbsp; &nbsp; &nbsp; &nbsp;袖子：&nbsp; 袖口魔术贴 <br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;腋下拉链系统 <br/>&nbsp; &nbsp; &nbsp; &nbsp;下摆：&nbsp; 内侧抽绳调节</p><p><br/></p>', '18');
INSERT INTO `v_detail` VALUES ('19', 'Upload/Content/16/03/99291456794055.jpg,Upload/Content/16/03/13161456794055.jpg,Upload/Content/16/03/26681456794055.jpg,Upload/Content/16/03/44151456794055.jpg,Upload/Content/16/03/54401456794055.jpg', '', '', '<p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456794150133643.png\"/><img alt=\"1456794150206165.png\" src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456794150206165.png\"/></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456793364193556.png\"/><img alt=\"1456794217986503.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456794217986503.png\"/><img alt=\"1456794482111839.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456794482111839.png\"/><img alt=\"1456794527600250.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456794527600250.png\"/></p>', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<area href=\"http://item.vancl.com/2139629.html\" shape=\"rect\" coords=\"752,5,864,204\" target=\"_blank\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><style type=\"text/css\">#anchor1&#10;    {&#10;        width: 1px;&#10;        height: 1px;&#10;        visibility: hidden;&#10;        position: absolute;&#10;        top: 710px;&#10;        *position:static;&#10;        *display:block;&#10;        *width:1px;&#10;        *height:50px;&#10;        *overflow:hidden;&#10;        *top:none&#10;    }&#10;    &#10;    &#10;    &#10;    #feedback&#10;    {&#10;        width: 1px;&#10;        height: 1px;&#10;        visibility: hidden; &#10;        position: absolute;&#10;        bottom: 40px;&#10;        *position:static;&#10;        *display:block;&#10;        *width:1px;&#10;        *height:30px;&#10;        *overflow:hidden;&#10;        *top:none;&#10;    }</style><p><span class=\"blank15\"></span><a id=\"anchor1\"></a> &nbsp; &nbsp;</p><h3>产品描述：</h3><p><span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">连帽绳扣大衣俗称为牛角扣大衣（Duffle Coat)，是具有代表性的英伦服饰。这一季，我们在不为人知的细节处进化经典，由澳大利亚羊毛混纺精制而成，打造出舒适而非结构感的造型。</p><p><br/></p>', '19');
INSERT INTO `v_detail` VALUES ('20', 'Upload/Content/16/03/16701456794840.jpg,Upload/Content/16/03/75641456794840.jpg,Upload/Content/16/03/97691456794839.jpg,Upload/Content/16/03/1211456794839.jpg,Upload/Content/16/03/46011456794839.jpg', '', '', '<p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456795059389136.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456795059130455.png\"/></p><p><img alt=\"1456795108361208.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456795108361208.png\"/><img alt=\"1456757630242182.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456757630242182.png\"/></p>', null, '20');
INSERT INTO `v_detail` VALUES ('21', 'Upload/Content/16/03/90121456795432.jpg,Upload/Content/16/03/82821456795431.jpg,Upload/Content/16/03/52611456795431.jpg,Upload/Content/16/03/45681456795431.jpg,Upload/Content/16/03/77211456795431.jpg', '', '', '<p><img alt=\"1456795474501707.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456795474501707.png\"/><img alt=\"1456794150206165.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456794150206165.png\"/><img alt=\"1456795519371923.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456795519371923.png\"/><img alt=\"1456795889582392.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456795889582392.png\"/><img alt=\"1456747601462462.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160229/1456747601462462.png\"/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">沿袭上一季度大热的锥形窄脚版型，迎合2015秋冬的窄口裤型趋势，重型超耐磨牛仔面料经多次洗水，传递时尚、年轻、不羁的新牛仔精神。</p><p><br/></p>', '21');
INSERT INTO `v_detail` VALUES ('22', 'Upload/Content/16/03/48511456796166.jpg,Upload/Content/16/03/5221456796166.jpg,Upload/Content/16/03/78661456796166.jpg,Upload/Content/16/03/64351456796166.jpg,Upload/Content/16/03/30621456796165.jpg', '', '', '<p></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456762733518532.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456796270946484.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456796270415730.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456796270257803.png\"/></p><p><br/></p>', '<p><br/></p><style type=\"text/css\">#anchor1&#10;    {&#10;        width: 1px;&#10;        height: 1px;&#10;        visibility: hidden;&#10;        position: absolute;&#10;        top: 710px;&#10;        *position:static;&#10;        *display:block;&#10;        *width:1px;&#10;        *height:50px;&#10;        *overflow:hidden;&#10;        *top:none&#10;    }&#10;    &#10;    &#10;    &#10;    #feedback&#10;    {&#10;        width: 1px;&#10;        height: 1px;&#10;        visibility: hidden; &#10;        position: absolute;&#10;        bottom: 40px;&#10;        *position:static;&#10;        *display:block;&#10;        *width:1px;&#10;        *height:30px;&#10;        *overflow:hidden;&#10;        *top:none;&#10;    }</style><p><span class=\"blank15\"></span><a id=\"anchor1\"></a> &nbsp; &nbsp;</p><h3>产品描述：</h3><p><span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">凡客羽绒服匈牙利额绒款采用优质匈牙利进口鹅绒填充。850+蓬松度、96.5%含绒量及93.5绒子含量、户外级别的充绒量（L码充绒量达到110g），以及防风风水的东丽高密表布，凡客羽绒服匈牙利鹅绒款的厚实保暖程度更胜一筹，达到专业户外级别。适宜户外的版型设计以及内置手机袋及耳机走线口，让您的出行更无忧。</p><p><br/></p>', '22');
INSERT INTO `v_detail` VALUES ('23', 'Upload/Content/16/03/93591456796905.jpg,Upload/Content/16/03/89471456796905.jpg,Upload/Content/16/03/99221456796905.jpg,Upload/Content/16/03/1481456796904.jpg,Upload/Content/16/03/69421456796904.jpg', '', '', '<p><img alt=\"1456796959738210.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456796959738210.png\"/><img alt=\"1456797022146996.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456797022146996.png\"/></p>', null, '23');
INSERT INTO `v_detail` VALUES ('24', 'Upload/Content/16/03/6771456825401.jpg,Upload/Content/16/03/20121456825401.jpg,Upload/Content/16/03/97161456825401.jpg,Upload/Content/16/03/26871456825400.jpg', '', '', '<p><img alt=\"1456823389728054.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456823389728054.png\"/><img alt=\"1456823389873114.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456823389873114.png\"/></p><p></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456797022146996.png\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456823389115338.png\"/></p><p><br/></p><p><br/></p>', '', '24');
INSERT INTO `v_detail` VALUES ('25', 'Upload/Content/16/03/5781456825988.jpg,Upload/Content/16/03/48551456825981.jpg,Upload/Content/16/03/19091456825981.jpg,Upload/Content/16/03/41011456825981.jpg,Upload/Content/16/03/41456825980.jpg', '', '', '<p><img alt=\"1456826037593881.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456826037593881.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456823389873114.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456823389728054.png\"/></p><p><br/></p>', '', '25');
INSERT INTO `v_detail` VALUES ('26', 'Upload/Content/16/03/80381456830832.jpg,Upload/Content/16/03/68221456830831.jpg,Upload/Content/16/03/84821456830831.jpg,Upload/Content/16/03/58161456830831.jpg,Upload/Content/16/03/56091456830831.jpg', '', '', '<p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456830915100694.png\"/><img alt=\"1456830975561220.png\" src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456830975561220.png\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456830915128282.png\"/></p><p><br/></p><p><br/></p>', '<p>产品描述：<span class=\"blank8\"></span></p><p class=\"productMS\" style=\"line-height: 20px\">2015凡客超轻羽绒服，鹅绒造。无异味、更保暖。95%含绒量，91%绒子含量以及750超高蓬松度带来超高保暖效果。东丽公司20D超密面料，防风、放钻绒、防泼水，加之控压控速自动充绒技术，有效解决钻绒问题。在版型上，侧后收腰更显瘦，曲线几何绗缝线，更流畅美观。水晶拉头和夜光拉头从细节上打破常规羽绒服的沉闷。变革后的一体式收纳方式让你的出行温暖、同时更轻松便捷。</p><p><br/></p>', '26');
INSERT INTO `v_detail` VALUES ('27', 'Upload/Content/16/03/99081456832038.jpg,Upload/Content/16/03/96091456832038.jpg,Upload/Content/16/03/3641456832037.jpg,Upload/Content/16/03/80311456832037.jpg,Upload/Content/16/03/14841456832037.jpg', '', '', '<p><br/></p><p><br/></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832159724827.png\" style=\"white-space: normal;\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832160516553.png\" style=\"\"/></p><p><br/></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832160593107.png\" style=\"white-space: normal;\"/><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832160828017.png\" style=\"white-space: normal;\"/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">采用50%澳洲进口美利奴羊毛50%新疆棉为原料，纱线细腻，手感柔软温暖.</p><p><br/></p>', '27');
INSERT INTO `v_detail` VALUES ('28', 'Upload/Content/16/03/71021456832462.jpg,Upload/Content/16/03/70171456832462.jpg,Upload/Content/16/03/68761456832462.jpg,Upload/Content/16/03/33421456832462.jpg,Upload/Content/16/03/22341456832461.jpg', '', '', '<p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832565122158.png\" style=\"white-space: normal;\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832565514660.png\" style=\"\"/></p><p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832565639021.png\" style=\"\"/></p><p><br/></p>', '', '28');
INSERT INTO `v_detail` VALUES ('29', 'Upload/Content/16/03/15721456832807.jpg,Upload/Content/16/03/8641456832807.jpg,Upload/Content/16/03/97601456832807.jpg,Upload/Content/16/03/70771456832806.jpg,Upload/Content/16/03/6341456832806.jpg', '', '', '<p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832937134405.png\" style=\"white-space: normal;\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832937939814.png\" style=\"\"/><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832937184606.png\" style=\"white-space: normal;\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456832937234781.png\" style=\"\"/></p><p><br/></p><p><br/></p>', '<p><span class=\"blank15\" style=\"clear: both; display: block; font-size: 0px; overflow: hidden; height: 15px; width: 1200px; line-height: 0px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span><a id=\"anchor1\" style=\"width: 1px; height: 1px; visibility: hidden; position: absolute; top: 710px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\"></a></p><h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px;\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 1px; overflow: hidden; height: 8px;\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153);\">手工“浴袍式”系带款，及膝长度，落肩设计，今年冬季大热款式，双面呢面料品质高雅，缝线顺直，细节处理精巧。宽松简约的版型，侧开口袋兼具装饰性与实用性，连帽设计抗风效果好。“浴袍式”系带设计，随性自我，不拘一格。落肩设计，穿着舒适，及膝长度更显身材高挑，轻松穿出街拍潮味。</p><p><br/></p>', '29');
INSERT INTO `v_detail` VALUES ('30', 'Upload/Content/16/03/55701456833164.jpg,Upload/Content/16/03/40561456833164.jpg,Upload/Content/16/03/3561456833164.jpg,Upload/Content/16/03/62721456833164.jpg,Upload/Content/16/03/94851456833163.jpg', '', '', '<p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456833322895878.png\" style=\"\"/></p><p><br/></p><p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456833322128122.png\" style=\"\"/><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456833322600207.png\" style=\"white-space: normal;\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456833322105242.png\" style=\"\"/></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456833322809858.png\" style=\"white-space: normal;\"/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">高弹面料的高弹、高回复、低收缩性将紧身版型的特点发挥到了极致性感，优雅。纯净深蓝底色低调洗水，配合细长线条紧身版，凸显腿型笔直修长。时尚达人必入的一款百搭单品。</p><p><br/></p>', '30');
INSERT INTO `v_detail` VALUES ('31', 'Upload/Content/16/03/97721456833667.jpg,Upload/Content/16/03/94161456833667.jpg,Upload/Content/16/03/65561456833667.jpg,Upload/Content/16/03/55421456833667.jpg', '', '', '<p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456833773123337.png\" alt=\"1456833773123337.png\"/></p>', null, '31');
INSERT INTO `v_detail` VALUES ('32', 'Upload/Content/16/03/70411456834050.jpg,Upload/Content/16/03/51901456834050.jpg,Upload/Content/16/03/7221456834049.jpg,Upload/Content/16/03/37701456834049.jpg,Upload/Content/16/03/50611456834049.jpg', '', '', '<p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834160131246.png\" style=\"white-space: normal;\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834160974368.png\" style=\"\"/></p><p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834160677148.png\" style=\"\"/></p><p><br/></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834160687475.png\" style=\"white-space: normal;\"/></p>', null, '32');
INSERT INTO `v_detail` VALUES ('33', 'Upload/Content/16/03/45131456834714.jpg,Upload/Content/16/03/60661456834713.jpg,Upload/Content/16/03/96271456834713.jpg,Upload/Content/16/03/36681456834713.jpg,Upload/Content/16/03/6111456834713.jpg', '', '', '<p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834809525288.png\" style=\"\"/></p><p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834809118169.png\" style=\"\"/></p><p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160301/1456834809388576.png\" style=\"white-space: normal;\"/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">经典五袋百搭修身卷边牛仔短裤, 舒适合体的中高腰版型，水洗工艺，沿袭并继承经典，挽边设计，丰富细节层次，简约而不简单。12.5OZ重磅牛仔布料，手感舒适，穿着得体。</p><p><br/></p>', '33');
INSERT INTO `v_detail` VALUES ('35', 'Upload/Content/16/03/19961456880663.jpg,Upload/Content/16/03/29411456880663.jpg,Upload/Content/16/03/1491456880662.jpg,Upload/Content/16/03/63901456880662.jpg,Upload/Content/16/03/83481456880662.jpg', '', '', '<p><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456880967113483.png\"/><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456880967137383.png\"/><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456880967937404.png\"/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456880967695479.png\"/><br/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; font-weight: bold; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">凡客帆布鞋，历时22月历经16次2000人试穿。颠覆性的楦型改变，舒适度提升，针对磨脚、压脚、挤脚等问题，以亚洲人脚型为基础进行了调整，同时选用更适合亚洲人的尺码标准（级放标准5mm）。聚氨酯（PU)鞋垫低密度、重量轻、环保透气，活性碳颗粒还可以消除脚臭，底部菱形花纹，有助行走弯折，疏汗透气。全面提升的细节调整：鞋身选用环保全棉帆布，活性染色久穿不褪色；百和“特多棉”鞋带抗起球；铝质眼扣表面经过阳极氧化处理，提高表面硬度、耐磨损、抗氧化。</p><p><br/></p>', '35');
INSERT INTO `v_detail` VALUES ('36', 'Upload/Content/16/03/56371456881308.jpg,Upload/Content/16/03/62471456881307.jpg,Upload/Content/16/03/57811456881307.jpg', '', '', '<p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456881388105234.png\" alt=\"1456881388105234.png\"/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">优雅前线小碎花连裤袜是在原糖果色连裤袜的基础上生产而成。面料成分为原有的全棉+聚脂纤维+氨纶，本产品还是保持其弹力塑形修饰双腿的属性，也具防寒保暖的功效。全棉的原料使其穿着舒适行走自如，透气性能绝佳。塑形托高设计紧实压缩塑造完美腿部曲线，使腿部看起来更加苗条。优雅前线小碎花连裤袜的多色提花，也让您单一的衣着下配以时尚简约的小提花连裤袜显得更加清纯可爱，美丽多变！是爱漂亮的MM们不可多得的一款集时尚与休闲为一体的连裤袜哦！</p><p><br/></p>', '36');
INSERT INTO `v_detail` VALUES ('37', 'Upload/Content/16/03/81811456881555.jpg', '', '', '<p><br/></p><p><img src=\"/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456881645629468.png\" style=\"\"/><img src=\"http://localhost/dsheldon/vanclmall/Upload/ueditor/image/20160302/1456881645859774.png\"/></p>', '<h3 style=\"margin: 0px; padding: 0px; font-size: 12px; color: rgb(153, 153, 153); position: relative; width: 748px; font-family: 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">产品描述：</h3><p><span class=\"blank8\" style=\"clear: both; display: block; font-size: 12px; overflow: hidden; height: 8px; color: rgb(51, 51, 51); font-family: 宋体; background-color: rgb(255, 255, 255);\"></span></p><p class=\"productMS\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 25px; text-indent: 2em; line-height: 20px; color: rgb(102, 102, 102); border-bottom-width: 1px; border-bottom-style: dotted; border-bottom-color: rgb(153, 153, 153); font-family: 宋体; font-size: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">天然亲肤，透气性良好，顺滑 柔软 舒适。&nbsp;</p><p><br/></p>', '37');

-- ----------------------------
-- Table structure for `v_goods`
-- ----------------------------
DROP TABLE IF EXISTS `v_goods`;
CREATE TABLE `v_goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„åç§°',
  `gnum` varchar(100) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„è´§å·ï¼Œå¯èƒ½åŒ…å«æ•°å­—ï¼›å¯èƒ½å­—æ¯ï¼›',
  `unit` varchar(5) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„è®¡é‡å•ä½ï¼›',
  `marketprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'å•†å“å¸‚åœºä»·ï¼Œå°±æ˜¯å¤–é¢åˆ«äººå– çš„å¤šå°‘é’±ï¼›å¯ä»¥åŒ…å«ä¸¤ä½å°æ•°ç‚¹ï¼Œæ­£æ•°ä½ä¸º10ä½ï¼›',
  `shopprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'å•†å“çš„å•†åœºä»·',
  `stock` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'å•†å“åº“å­˜æ•°é‡',
  `pic` varchar(60) NOT NULL DEFAULT '' COMMENT 'å•†å“çš„åˆ—è¡¨å›¾ï¼›',
  `click` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'å•†å“çš„ç‚¹å‡»æ¬¡æ•°ï¼›',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'å•†å“çš„ä¸Šæž¶æ—¶é—´ï¼›å­˜ä¸ºæ—¶é—´æˆ³ï¼›æ—¶é—´æˆ³çš„é•¿åº¦ï¼Œæˆ‘ä¹Ÿä¸çŸ¥é“å•Šï¼',
  `type_tid` int(10) unsigned NOT NULL,
  `cate_cid` int(10) unsigned NOT NULL,
  `brand_bid` int(10) unsigned NOT NULL,
  `admin_aid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gid`),
  UNIQUE KEY `gid_UNIQUE` (`gid`),
  KEY `fk_goods_type1_idx` (`type_tid`),
  KEY `fk_goods_cate1_idx` (`cate_cid`),
  KEY `fk_goods_brand1_idx` (`brand_bid`),
  KEY `fk_goods_admin1_idx` (`admin_aid`),
  KEY `gname_key` (`gname`(2))
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='å•†å“è¡¨';

-- ----------------------------
-- Records of v_goods
-- ----------------------------
INSERT INTO `v_goods` VALUES ('13', '凡客衬衫 牛津纺 吉国武', 'vanclnjf-1', '件', '236.00', '199.00', '107', 'Upload/Content/16/02/70811456750357.jpg', '123', '1456751092', '1', '17', '1', '1');
INSERT INTO `v_goods` VALUES ('12', '凡客衬衫 牛仔重磅 浅蓝色', 'vanclnzb1', '件', '199.00', '166.00', '146', 'Upload/Content/16/02/35981456748251.jpg', '123', '1456749489', '1', '16', '2', '1');
INSERT INTO `v_goods` VALUES ('11', '凡客衬衫 法兰绒 千鸟格绿白', 'vanclflr1', '件', '199.00', '99.00', '44', 'Upload/Content/16/02/21151456746859.jpg', '123', '1456747670', '1', '15', '2', '1');
INSERT INTO `v_goods` VALUES ('6', '凡客衬衫 吉国武 免烫 温莎领', 'mtjgw-1', '件', '300.00', '249.00', '48', 'Upload/Content/16/02/42501456451708.jpg', '123', '1456453823', '1', '14', '1', '1');
INSERT INTO `v_goods` VALUES ('7', '凡客衬衫 吉国武 免烫 温莎领', 'mtjgw-2', '件', '300.00', '249.00', '22', 'Upload/Content/16/02/42291456455204.png', '123', '1456455687', '1', '14', '1', '1');
INSERT INTO `v_goods` VALUES ('35', '凡客帆布鞋 高帮', 'vanclxie-1', '件', '199.00', '149.00', '2', 'Upload/Content/16/03/21741456880654.jpg', '123', '1456881072', '3', '10', '2', '1');
INSERT INTO `v_goods` VALUES ('34', '凡客羊毛大衣 连帽绳扣', 'vanclyms-2', '件', '999.00', '699.00', '55', 'Upload/Content/16/03/94631456835429.jpg', '123', '1456835594', '1', '18', '2', '1');
INSERT INTO `v_goods` VALUES ('14', '凡客羊毛衫 V领 月牙蓝色', 'vanclyms-1', '件', '288.00', '249.00', '33', 'Upload/Content/16/02/38921456757470.jpg', '123', '1456758173', '1', '18', '2', '1');
INSERT INTO `v_goods` VALUES ('15', 'Nautilus 男款山羊绒圆领套衫', 'vanclyrs-1', '件', '600.00', '599.00', '55', 'Upload/Content/16/02/80491456758775.jpg', '123', '1456759385', '1', '19', '1', '1');
INSERT INTO `v_goods` VALUES ('16', '凡客棉线衫 开衫 浅花蓝色', 'vanclmxs-1', '件', '233.00', '149.00', '66', 'Upload/Content/16/02/34551456760072.jpg', '123', '1456760284', '1', '20', '2', '1');
INSERT INTO `v_goods` VALUES ('17', '凡客羽绒服 匈牙利鹅绒', 'vanclyrf-1', '件', '999.00', '499.00', '33', 'Upload/Content/16/02/63341456761293.jpg', '123', '1456762803', '1', '21', '2', '1');
INSERT INTO `v_goods` VALUES ('18', '凡客冲锋衣 3D轻量', 'vanclcfy-1', '件', '688.00', '499.00', '55', 'Upload/Content/16/03/44911456793000.jpg', '123', '1456793391', '1', '22', '2', '1');
INSERT INTO `v_goods` VALUES ('19', '凡客羊毛大衣 连帽绳扣', 'vanclymwt-1', '件', '999.00', '699.00', '444', 'Upload/Content/16/03/69731456794047.jpg', '123', '1456794562', '1', '23', '2', '1');
INSERT INTO `v_goods` VALUES ('20', 'Vancl by Emmanuel 男款 长袖', 'vanclwy-1', '件', '269.00', '159.00', '66', 'Upload/Content/16/03/10021456794830.jpg', '213', '1456795169', '1', '24', '2', '1');
INSERT INTO `v_goods` VALUES ('21', '凡客牛仔裤 轻弹 锥形窄脚', 'vanclnzk-1', '件', '299.00', '199.00', '55', 'Upload/Content/16/03/81931456795424.jpg', '123', '1456795947', '3', '25', '2', '1');
INSERT INTO `v_goods` VALUES ('22', '凡客羽绒服 匈牙利鹅绒', 'vanclyrf-2', '件', '999.00', '499.00', '66', 'Upload/Content/16/03/32291456796157.jpg', '123', '1456796322', '1', '21', '2', '1');
INSERT INTO `v_goods` VALUES ('23', 'Vancl by Scott 男款 长裤 BM9709', 'vanclxxk-1', '件', '299.00', '209.00', '5', 'Upload/Content/16/03/49811456796897.jpg', '123', '1456797119', '3', '26', '2', '1');
INSERT INTO `v_goods` VALUES ('24', '凡客休闲裤 弹力免烫', 'vanclxxk-1', '件', '366.00', '299.00', '44', 'Upload/Content/16/03/9381456825388.jpg', '123', '1456825632', '3', '26', '2', '1');
INSERT INTO `v_goods` VALUES ('25', '凡客 跑步短裤', 'vanclydk-1', '件', '169.00', '149.00', '55', 'Upload/Content/16/03/7411456825970.jpg', '123', '1456826629', '3', '28', '2', '1');
INSERT INTO `v_goods` VALUES ('26', '凡客羽绒服 超轻鹅绒 立领', 'vanclyrf-1', '件', '399.00', '199.00', '66', 'Upload/Content/16/03/68551456830822.jpg', '123', '1456831013', '1', '29', '2', '1');
INSERT INTO `v_goods` VALUES ('27', '凡客针织衫（女款）', 'vanclyrfnv-1', '件', '249.00', '199.00', '55', 'Upload/Content/16/03/99761456832023.jpg', '23', '1456832249', '1', '30', '2', '1');
INSERT INTO `v_goods` VALUES ('28', 'Vancl by Lecole des femmes 女款 长袖 卫衣', 'vanclweiyi-1', '件', '268.00', '199.00', '66', 'Upload/Content/16/03/9691456832454.jpg', '123', '1456832607', '1', '31', '2', '1');
INSERT INTO `v_goods` VALUES ('29', '凡客手工大衣 连帽长款大衣', 'vanclyrdy-1', '件', '799.00', '499.00', '44', 'Upload/Content/16/03/53731456832798.jpg', '231', '1456833000', '1', '32', '2', '1');
INSERT INTO `v_goods` VALUES ('30', '凡客牛仔裤 轻弹 弹力紧身', 'vanclnzk-1', '件', '266.00', '149.00', '11', 'Upload/Content/16/03/6111456833157.jpg', '123', '1456833408', '3', '33', '2', '1');
INSERT INTO `v_goods` VALUES ('31', '凡客九分裤-280D 拉绒 ', 'vanclddk-1', '件', '69.00', '29.00', '44', 'Upload/Content/16/03/78611456833658.jpg', '123', '1456833790', '3', '35', '2', '1');
INSERT INTO `v_goods` VALUES ('32', 'Lecole des femmes 女款 长袖 卫衣', 'vanclweiyinv-2', '件', '269.00', '189.00', '88', 'Upload/Content/16/03/73591456834041.jpg', '123', '1456834201', '1', '31', '2', '1');
INSERT INTO `v_goods` VALUES ('33', '凡客牛仔裤 中腰短裤', 'vanclnzknv-2', '件', '169.00', '129.00', '66', 'Upload/Content/16/03/52651456834704.jpg', '123', '1456834837', '3', '33', '2', '1');
INSERT INTO `v_goods` VALUES ('36', '凡客连裤袜-160D', 'vanclwa-1', '件', '29.00', '25.00', '2', 'Upload/Content/16/03/18801456881300.jpg', '123', '1456881420', '3', '13', '1', '1');
INSERT INTO `v_goods` VALUES ('37', '凡客内裤 天丝', 'vanclneiyi-1', '件', '59.00', '49.00', '3', 'Upload/Content/16/03/17751456881551.jpg', '123', '1456881701', '3', '12', '1', '1');

-- ----------------------------
-- Table structure for `v_goods_attr`
-- ----------------------------
DROP TABLE IF EXISTS `v_goods_attr`;
CREATE TABLE `v_goods_attr` (
  `gaid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gavalue` varchar(20) NOT NULL DEFAULT '' COMMENT 'å•†å“å±žæ€§å€¼ï¼Œå•†å“çš„å±žæ€§åç§°ä»Žç±»åž‹å±žæ€§è¡¨èŽ·å¾—ï¼ŒèŽ·å¾—å…¶taidå°±å¯ä»¥',
  `addprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'å•†å“çš„é™„åŠ ä»·æ ¼ï¼›æ¯”å¦‚å•†å“çš„æŸäº›ç¨€æœ‰åž‹å·ï¼Œä»·æ ¼è¦é«˜ä¸€ç‚¹ï¼›',
  `goods_gid` int(10) unsigned NOT NULL,
  `typeattr_taid` int(10) unsigned NOT NULL,
  `gastock` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`gaid`),
  UNIQUE KEY `gaid_UNIQUE` (`gaid`),
  KEY `fk_goods_attr_goods1_idx` (`goods_gid`),
  KEY `fk_goods_attr_typeattr1_idx` (`typeattr_taid`)
) ENGINE=MyISAM AUTO_INCREMENT=279 DEFAULT CHARSET=utf8 COMMENT='å•†å“å±žæ€§è¡¨';

-- ----------------------------
-- Records of v_goods_attr
-- ----------------------------
INSERT INTO `v_goods_attr` VALUES ('65', 'XXL', '0.00', '13', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('64', 'S', '0.00', '13', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('63', '青年', '1.00', '12', '2', '3');
INSERT INTO `v_goods_attr` VALUES ('62', '蓝', '0.00', '12', '3', '123');
INSERT INTO `v_goods_attr` VALUES ('61', 'S', '0.00', '12', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('60', 'XL', '0.00', '12', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('59', 'XXL', '0.00', '12', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('58', 'M', '0.00', '12', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('57', '青年', '0.00', '11', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('56', '红', '2.00', '11', '3', '33');
INSERT INTO `v_goods_attr` VALUES ('55', '蓝', '2.00', '11', '3', '111');
INSERT INTO `v_goods_attr` VALUES ('54', '绿', '2.00', '11', '3', '123');
INSERT INTO `v_goods_attr` VALUES ('53', 'XL', '0.00', '11', '1', '111');
INSERT INTO `v_goods_attr` VALUES ('52', 'X', '0.00', '11', '1', '111');
INSERT INTO `v_goods_attr` VALUES ('19', 'S', '0.00', '6', '1', '122');
INSERT INTO `v_goods_attr` VALUES ('20', 'XXL', '0.00', '6', '1', '122');
INSERT INTO `v_goods_attr` VALUES ('21', 'XL', '0.00', '6', '1', '122');
INSERT INTO `v_goods_attr` VALUES ('22', 'X', '0.00', '6', '1', '122');
INSERT INTO `v_goods_attr` VALUES ('23', 'M', '0.00', '6', '1', '122');
INSERT INTO `v_goods_attr` VALUES ('24', '蓝', '0.00', '6', '3', '123');
INSERT INTO `v_goods_attr` VALUES ('25', '青年', '0.00', '6', '2', '123');
INSERT INTO `v_goods_attr` VALUES ('26', 'S', '0.00', '7', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('27', 'M', '0.00', '7', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('28', 'M', '0.00', '7', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('29', 'M', '0.00', '7', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('30', 'M', '0.00', '7', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('31', '蓝', '0.00', '7', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('32', '绿', '0.00', '7', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('33', '青年', '0.00', '7', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('253', '商务', '1.00', '34', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('252', '简约', '1.00', '34', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('251', '男', '1.00', '34', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('250', '灰', '1.00', '34', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('249', '黑', '1.00', '34', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('248', 'XXL', '1.00', '34', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('246', 'X', '1.00', '34', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('247', 'XL', '1.00', '34', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('245', 'M', '1.00', '34', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('244', 'S', '1.00', '34', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('66', 'XL', '0.00', '13', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('67', 'X', '0.00', '13', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('68', 'M', '0.00', '13', '1', '123');
INSERT INTO `v_goods_attr` VALUES ('69', '蓝', '0.00', '13', '3', '55');
INSERT INTO `v_goods_attr` VALUES ('70', '绿', '0.00', '13', '3', '55');
INSERT INTO `v_goods_attr` VALUES ('71', '青年', '0.00', '13', '2', '123');
INSERT INTO `v_goods_attr` VALUES ('72', 'XXL', '1.00', '14', '1', '2');
INSERT INTO `v_goods_attr` VALUES ('73', '蓝', '1.00', '14', '3', '2');
INSERT INTO `v_goods_attr` VALUES ('74', '灰', '1.00', '14', '3', '2');
INSERT INTO `v_goods_attr` VALUES ('75', '黑', '1.00', '14', '3', '2');
INSERT INTO `v_goods_attr` VALUES ('76', '男', '0.00', '14', '2', '123');
INSERT INTO `v_goods_attr` VALUES ('77', '百搭', '1.00', '14', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('78', '休闲', '1.00', '14', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('79', '春', '1.00', '14', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('80', '棉', '1.00', '14', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('81', 'XL', '1.00', '15', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('82', '红', '1.00', '15', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('83', '灰', '1.00', '15', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('84', '蓝', '1.00', '15', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('85', '绿', '1.00', '15', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('86', '中年', '1.00', '15', '2', '2');
INSERT INTO `v_goods_attr` VALUES ('87', '百搭', '1.00', '15', '7', '2');
INSERT INTO `v_goods_attr` VALUES ('88', '休闲', '1.00', '15', '8', '2');
INSERT INTO `v_goods_attr` VALUES ('89', '春', '1.00', '15', '9', '2');
INSERT INTO `v_goods_attr` VALUES ('90', '羊毛', '1.00', '15', '10', '2');
INSERT INTO `v_goods_attr` VALUES ('91', 'X', '1.00', '16', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('92', 'XXL', '1.00', '16', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('93', 'XL', '1.00', '16', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('94', '黑', '1.00', '16', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('95', '蓝', '1.00', '16', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('96', '灰', '1.00', '16', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('97', '男', '1.00', '16', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('98', '简约', '1.00', '16', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('99', '旅行', '1.00', '16', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('100', '春', '1.00', '16', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('101', '棉', '1.00', '16', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('102', 'XL', '1.00', '17', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('103', '黑', '1.00', '17', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('104', '蓝', '1.00', '17', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('105', '红', '1.00', '17', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('106', '男', '1.00', '17', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('107', '简约', '1.00', '17', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('108', '休闲', '1.00', '17', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('109', '冬', '1.00', '17', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('110', '鸭绒', '1.00', '17', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('111', 'M', '1.00', '18', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('112', 'X', '1.00', '18', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('113', 'XL', '1.00', '18', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('114', 'XXL', '1.00', '18', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('115', '红', '1.00', '18', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('116', '黑', '1.00', '18', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('117', '蓝', '1.00', '18', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('118', '灰', '1.00', '18', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('119', '男', '1.00', '18', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('120', '简约', '1.00', '18', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('121', '运动', '1.00', '18', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('122', '冬', '1.00', '18', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('123', '棉', '1.00', '18', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('124', 'S', '1.00', '19', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('125', 'M', '1.00', '19', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('126', 'X', '1.00', '19', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('127', 'XL', '1.00', '19', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('128', 'XXL', '1.00', '19', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('129', '黑', '1.00', '19', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('130', '红', '1.00', '19', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('131', '青年', '1.00', '19', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('132', '百搭', '1.00', '19', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('133', '休闲', '1.00', '19', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('134', '冬', '1.00', '19', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('135', '棉', '1.00', '19', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('136', 'M', '1.00', '20', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('137', 'S', '1.00', '20', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('138', 'X', '1.00', '20', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('139', 'XL', '1.00', '20', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('140', '红', '1.00', '20', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('141', '青年', '1.00', '20', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('142', '百搭', '1.00', '20', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('143', '运动', '1.00', '20', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('144', '春', '1.00', '20', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('145', '棉', '1.00', '20', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('146', '33', '1.00', '21', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('147', '34', '1.00', '21', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('148', '深蓝色', '1.00', '21', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('149', '中蓝色', '1.00', '21', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('150', '牛仔', '1.00', '21', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('151', 'M', '1.00', '22', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('152', '黑', '1.00', '22', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('153', '蓝', '1.00', '22', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('154', '红', '1.00', '22', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('155', '青年', '1.00', '22', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('156', '百搭', '1.00', '22', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('157', '休闲', '1.00', '22', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('158', '冬', '1.00', '22', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('159', '鸭绒', '1.00', '22', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('160', '32', '1.00', '23', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('161', '33', '1.00', '23', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('162', '34', '1.00', '23', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('163', '灰色', '1.00', '23', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('164', '黑色', '1.00', '23', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('165', '牛仔', '1.00', '23', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('166', '31', '1.00', '24', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('167', '32', '1.00', '24', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('168', '33', '1.00', '24', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('169', '34', '1.00', '24', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('170', '35', '1.00', '24', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('171', '深蓝色', '1.00', '24', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('172', '黑色', '1.00', '24', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('173', '牛仔', '1.00', '24', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('174', '31', '1.00', '25', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('175', '32', '1.00', '25', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('176', '33', '1.00', '25', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('177', '34', '1.00', '25', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('178', '35', '1.00', '25', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('179', '黑色', '1.00', '25', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('180', '牛仔', '1.00', '25', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('181', 'S', '1.00', '26', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('182', '红', '1.00', '26', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('183', '白', '1.00', '26', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('184', '蓝', '1.00', '26', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('185', '绿', '1.00', '26', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('186', '青年', '1.00', '26', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('187', '简约', '1.00', '26', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('188', '娱乐', '1.00', '26', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('189', '冬', '1.00', '26', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('190', '棉', '1.00', '26', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('191', 'S', '1.00', '27', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('192', 'M', '1.00', '27', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('193', 'X', '1.00', '27', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('194', 'XL', '1.00', '27', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('195', 'XXL', '1.00', '27', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('196', 'XXXL', '1.00', '27', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('197', '灰', '1.00', '27', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('198', '女', '1.00', '27', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('199', '简约', '1.00', '27', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('200', '商务', '1.00', '27', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('201', '冬', '1.00', '27', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('202', '棉', '1.00', '27', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('203', 'M', '1.00', '28', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('204', 'S', '1.00', '28', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('205', 'X', '1.00', '28', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('206', '红', '1.00', '28', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('207', '黄', '1.00', '28', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('208', '女', '1.00', '28', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('209', '简约', '1.00', '28', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('210', '休闲', '1.00', '28', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('211', '春', '1.00', '28', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('212', '棉', '1.00', '28', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('213', 'M', '1.00', '29', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('214', 'S', '1.00', '29', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('215', '灰', '1.00', '29', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('216', '女', '1.00', '29', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('217', '简约', '1.00', '29', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('218', '商务', '1.00', '29', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('219', '春', '1.00', '29', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('220', '羊毛', '1.00', '29', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('221', '31', '1.00', '30', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('222', '32', '1.00', '30', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('223', '深蓝色', '1.00', '30', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('224', '牛仔', '1.00', '30', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('225', '31', '1.00', '31', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('226', '灰色', '1.00', '31', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('227', '黑色', '1.00', '31', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('228', '棉', '1.00', '31', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('229', 'S', '1.00', '32', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('230', 'X', '1.00', '32', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('231', 'XL', '1.00', '32', '1', '1');
INSERT INTO `v_goods_attr` VALUES ('232', '蓝', '1.00', '32', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('233', '灰', '1.00', '32', '3', '1');
INSERT INTO `v_goods_attr` VALUES ('234', '女', '1.00', '32', '2', '1');
INSERT INTO `v_goods_attr` VALUES ('235', '简约', '1.00', '32', '7', '1');
INSERT INTO `v_goods_attr` VALUES ('236', '休闲', '1.00', '32', '8', '1');
INSERT INTO `v_goods_attr` VALUES ('237', '春', '1.00', '32', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('238', '棉', '1.00', '32', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('239', '31', '1.00', '33', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('240', '32', '1.00', '33', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('241', '33', '1.00', '33', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('242', '中蓝色', '1.00', '33', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('243', '牛仔', '1.00', '33', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('254', '春', '1.00', '34', '9', '1');
INSERT INTO `v_goods_attr` VALUES ('255', '棉', '1.00', '34', '10', '1');
INSERT INTO `v_goods_attr` VALUES ('256', '31', '1.00', '35', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('257', '32', '1.00', '35', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('258', '33', '1.00', '35', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('259', '34', '1.00', '35', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('260', '35', '1.00', '35', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('261', '深蓝色', '1.00', '35', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('262', '黑色', '1.00', '35', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('263', '灰色', '1.00', '35', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('264', '牛仔', '1.00', '35', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('265', '31', '1.00', '36', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('266', '33', '1.00', '36', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('267', '32', '1.00', '36', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('268', '灰色', '1.00', '36', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('269', '深蓝色', '1.00', '36', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('270', '棉', '1.00', '36', '6', '1');
INSERT INTO `v_goods_attr` VALUES ('271', '31', '1.00', '37', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('272', '32', '1.00', '37', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('273', '33', '1.00', '37', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('274', '34', '1.00', '37', '4', '1');
INSERT INTO `v_goods_attr` VALUES ('275', '深蓝色', '1.00', '37', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('276', '黑色', '1.00', '37', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('277', '灰色', '1.00', '37', '5', '1');
INSERT INTO `v_goods_attr` VALUES ('278', '棉', '1.00', '37', '6', '1');

-- ----------------------------
-- Table structure for `v_goods_stock`
-- ----------------------------
DROP TABLE IF EXISTS `v_goods_stock`;
CREATE TABLE `v_goods_stock` (
  `gsid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gattr_id` varchar(45) NOT NULL DEFAULT '' COMMENT 'å•†å“å±žæ€§ç»„åˆ',
  `gsnum` varchar(100) NOT NULL DEFAULT '' COMMENT 'å•†å“å„ç§åˆ†ç±»å±žæ€§çš„è´§å·ï¼›',
  `gstock` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'å•†å“å„ä¸ªå±žæ€§çš„åº“å­˜é‡',
  `goods_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gsid`),
  UNIQUE KEY `gsid_UNIQUE` (`gsid`),
  KEY `fk_goods_stock_goods1_idx` (`goods_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='è´§å“å±žæ€§ï¼Œå­˜å‚¨æ¯ä¸€ç§å•†å“å±žæ€§ç»„åˆçš„åº“å­˜é‡ï¼›';

-- ----------------------------
-- Records of v_goods_stock
-- ----------------------------
INSERT INTO `v_goods_stock` VALUES ('1', '1|2', '1', '1', '1');
INSERT INTO `v_goods_stock` VALUES ('2', '10|13', '22', '11', '4');
INSERT INTO `v_goods_stock` VALUES ('3', '42|45', '22', '11', '10');
INSERT INTO `v_goods_stock` VALUES ('4', '64|69', '201603011111', '100', '13');
INSERT INTO `v_goods_stock` VALUES ('5', '66|69', '2', '2', '13');
INSERT INTO `v_goods_stock` VALUES ('6', '67|69', '3', '2', '13');
INSERT INTO `v_goods_stock` VALUES ('7', '68|69', '4', '3', '13');
INSERT INTO `v_goods_stock` VALUES ('8', '62|61', '2', '1', '12');
INSERT INTO `v_goods_stock` VALUES ('9', '62|60', '11', '123', '12');
INSERT INTO `v_goods_stock` VALUES ('10', '62|58', '3', '22', '12');
INSERT INTO `v_goods_stock` VALUES ('11', '55|53', '331', '12', '11');
INSERT INTO `v_goods_stock` VALUES ('12', '54|52', '1', '32', '11');
INSERT INTO `v_goods_stock` VALUES ('13', '19|24', '33', '22', '6');
INSERT INTO `v_goods_stock` VALUES ('14', '20|24', '12', '23', '6');
INSERT INTO `v_goods_stock` VALUES ('15', '21|24', '1', '3', '6');
INSERT INTO `v_goods_stock` VALUES ('16', '29|31', '33', '22', '7');
INSERT INTO `v_goods_stock` VALUES ('17', '250|248', '33', '22', '34');
INSERT INTO `v_goods_stock` VALUES ('18', '249|244', '22', '33', '34');
INSERT INTO `v_goods_stock` VALUES ('19', '72|73', '11', '22', '14');
INSERT INTO `v_goods_stock` VALUES ('20', '72|75', '44', '11', '14');
INSERT INTO `v_goods_stock` VALUES ('21', '81|82', '22', '11', '15');
INSERT INTO `v_goods_stock` VALUES ('22', '81|84', '11', '44', '15');
INSERT INTO `v_goods_stock` VALUES ('23', '91|94', '22', '11', '16');
INSERT INTO `v_goods_stock` VALUES ('24', '93|96', '11', '55', '16');
INSERT INTO `v_goods_stock` VALUES ('25', '102|103', '22', '33', '17');
INSERT INTO `v_goods_stock` VALUES ('26', '111|115', '11', '55', '18');
INSERT INTO `v_goods_stock` VALUES ('27', '124|129', '11', '444', '19');
INSERT INTO `v_goods_stock` VALUES ('28', '136|140', '11', '66', '20');
INSERT INTO `v_goods_stock` VALUES ('29', '146|148', '11', '55', '21');
INSERT INTO `v_goods_stock` VALUES ('30', '151|152', '11', '66', '22');
INSERT INTO `v_goods_stock` VALUES ('31', '160|163', '1', '5', '23');
INSERT INTO `v_goods_stock` VALUES ('32', '166|171', '11', '44', '24');
INSERT INTO `v_goods_stock` VALUES ('33', '174|179', '44', '55', '25');
INSERT INTO `v_goods_stock` VALUES ('34', '181|182', '55', '66', '26');
INSERT INTO `v_goods_stock` VALUES ('35', '191|197', '55', '55', '27');
INSERT INTO `v_goods_stock` VALUES ('36', '203|206', '44', '66', '28');
INSERT INTO `v_goods_stock` VALUES ('37', '213|215', '33', '44', '29');
INSERT INTO `v_goods_stock` VALUES ('38', '221|223', '22', '11', '30');
INSERT INTO `v_goods_stock` VALUES ('39', '225|226', '11', '44', '31');
INSERT INTO `v_goods_stock` VALUES ('40', '239|242', '22', '66', '33');
INSERT INTO `v_goods_stock` VALUES ('41', '229|232', '66', '88', '32');

-- ----------------------------
-- Table structure for `v_ordersheet`
-- ----------------------------
DROP TABLE IF EXISTS `v_ordersheet`;
CREATE TABLE `v_ordersheet` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_num` varchar(45) NOT NULL DEFAULT '' COMMENT 'è®¢å•çš„ç¼–å·',
  `total` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT 'è®¢å•çš„æ€»ä»·',
  `time` varchar(10) NOT NULL DEFAULT '' COMMENT 'è®¢å•çš„ç”Ÿæˆæ—¶é—´,ä¸ºæ—¶é—´æˆ³ã€‚',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT 'è®¢å•å¤‡æ³¨',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'è®¢å•çŠ¶æ€ï¼Œé»˜è®¤ä¸º0 ï¼Œè¡¨ç¤ºè®¢å•å‡ºäºŽå¾…æ”¯ä»˜çŠ¶æ€ã€‚è¿˜æœ‰çš„çŠ¶æ€ï¼šå·²æ”¯ä»˜1ï¼Œå·²å–æ¶ˆ2ï¼Œå·²å¤±æ•ˆ3ï¼Œå·²å®Œæˆ4ï¼Œå·²å…³é—­5ï¼Œ',
  `user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oid_UNIQUE` (`oid`),
  KEY `fk_order_user1_idx` (`user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_ordersheet
-- ----------------------------
INSERT INTO `v_ordersheet` VALUES ('18', '11456886542', '199', '1456886542', '', '2', '1');
INSERT INTO `v_ordersheet` VALUES ('14', '11456852594', '249', '1456852594', '', '0', '1');
INSERT INTO `v_ordersheet` VALUES ('15', '11456853063', '249', '1456853063', '', '0', '1');
INSERT INTO `v_ordersheet` VALUES ('16', '11456884885', '151', '1456884885', '', '0', '1');
INSERT INTO `v_ordersheet` VALUES ('17', '11456886187', '151', '1456886187', '', '2', '1');
INSERT INTO `v_ordersheet` VALUES ('19', '11457403947', '1005', '1457403947', '', '0', '1');

-- ----------------------------
-- Table structure for `v_order_list`
-- ----------------------------
DROP TABLE IF EXISTS `v_order_list`;
CREATE TABLE `v_order_list` (
  `olid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'è®¢å•çš„æ•°é‡ï¼›',
  `subtotal` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT 'æ¯ä»¶å•†å“çš„ä»·æ ¼å°è®¡',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT 'æ¯ä»¶å•†å“çš„å¤‡æ³¨ï¼›',
  `goods_gid` int(10) unsigned NOT NULL,
  `order_oid` int(11) NOT NULL,
  `adress_aid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`olid`),
  UNIQUE KEY `olid_UNIQUE` (`olid`),
  KEY `fk_orde_list_goods1_idx` (`goods_gid`),
  KEY `fk_orde_list_order1_idx` (`order_oid`),
  KEY `fk_orde_list_adress1_idx` (`adress_aid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='è®°å½•è®¢å•çš„è¯¦ç»†ä¿¡æ¯ã€‚';

-- ----------------------------
-- Records of v_order_list
-- ----------------------------
INSERT INTO `v_order_list` VALUES ('18', '1', '199', '', '13', '18', '1');
INSERT INTO `v_order_list` VALUES ('17', '1', '151', '', '25', '17', '1');
INSERT INTO `v_order_list` VALUES ('14', '1', '249', '', '6', '14', '1');
INSERT INTO `v_order_list` VALUES ('15', '1', '249', '', '6', '15', '1');
INSERT INTO `v_order_list` VALUES ('16', '1', '151', '', '25', '16', '1');
INSERT INTO `v_order_list` VALUES ('19', '5', '1005', '', '21', '19', '1');

-- ----------------------------
-- Table structure for `v_orde_list`
-- ----------------------------
DROP TABLE IF EXISTS `v_orde_list`;
CREATE TABLE `v_orde_list` (
  `olid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单的数量；',
  `subtotal` decimal(10,0) unsigned NOT NULL DEFAULT '0' COMMENT '每件商品的价格小计',
  `remark` varchar(255) NOT NULL DEFAULT '' COMMENT '每件商品的备注；',
  `goods_gid` int(10) unsigned NOT NULL,
  `order_oid` int(11) NOT NULL,
  `adress_aid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`olid`),
  UNIQUE KEY `olid_UNIQUE` (`olid`),
  KEY `fk_orde_list_goods1_idx` (`goods_gid`),
  KEY `fk_orde_list_order1_idx` (`order_oid`),
  KEY `fk_orde_list_adress1_idx` (`adress_aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='记录订单的详细信息。';

-- ----------------------------
-- Records of v_orde_list
-- ----------------------------

-- ----------------------------
-- Table structure for `v_rbac_access`
-- ----------------------------
DROP TABLE IF EXISTS `v_rbac_access`;
CREATE TABLE `v_rbac_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_rbac_access
-- ----------------------------
INSERT INTO `v_rbac_access` VALUES ('15', '10');
INSERT INTO `v_rbac_access` VALUES ('2', '1');
INSERT INTO `v_rbac_access` VALUES ('2', '2');
INSERT INTO `v_rbac_access` VALUES ('2', '3');
INSERT INTO `v_rbac_access` VALUES ('2', '6');
INSERT INTO `v_rbac_access` VALUES ('2', '11');
INSERT INTO `v_rbac_access` VALUES ('2', '9');
INSERT INTO `v_rbac_access` VALUES ('2', '10');
INSERT INTO `v_rbac_access` VALUES ('15', '11');
INSERT INTO `v_rbac_access` VALUES ('15', '27');
INSERT INTO `v_rbac_access` VALUES ('15', '26');
INSERT INTO `v_rbac_access` VALUES ('15', '9');
INSERT INTO `v_rbac_access` VALUES ('15', '25');
INSERT INTO `v_rbac_access` VALUES ('15', '1');
INSERT INTO `v_rbac_access` VALUES ('15', '4');
INSERT INTO `v_rbac_access` VALUES ('15', '5');
INSERT INTO `v_rbac_access` VALUES ('16', '9');
INSERT INTO `v_rbac_access` VALUES ('16', '17');
INSERT INTO `v_rbac_access` VALUES ('15', '43');
INSERT INTO `v_rbac_access` VALUES ('20', '20');
INSERT INTO `v_rbac_access` VALUES ('20', '19');
INSERT INTO `v_rbac_access` VALUES ('20', '18');
INSERT INTO `v_rbac_access` VALUES ('20', '6');
INSERT INTO `v_rbac_access` VALUES ('20', '1');
INSERT INTO `v_rbac_access` VALUES ('20', '2');
INSERT INTO `v_rbac_access` VALUES ('20', '3');
INSERT INTO `v_rbac_access` VALUES ('18', '20');
INSERT INTO `v_rbac_access` VALUES ('18', '19');
INSERT INTO `v_rbac_access` VALUES ('18', '18');
INSERT INTO `v_rbac_access` VALUES ('18', '6');
INSERT INTO `v_rbac_access` VALUES ('18', '1');
INSERT INTO `v_rbac_access` VALUES ('18', '2');
INSERT INTO `v_rbac_access` VALUES ('18', '3');
INSERT INTO `v_rbac_access` VALUES ('19', '41');
INSERT INTO `v_rbac_access` VALUES ('19', '40');
INSERT INTO `v_rbac_access` VALUES ('19', '39');
INSERT INTO `v_rbac_access` VALUES ('19', '37');
INSERT INTO `v_rbac_access` VALUES ('19', '38');
INSERT INTO `v_rbac_access` VALUES ('19', '43');
INSERT INTO `v_rbac_access` VALUES ('19', '10');
INSERT INTO `v_rbac_access` VALUES ('19', '1');
INSERT INTO `v_rbac_access` VALUES ('19', '9');
INSERT INTO `v_rbac_access` VALUES ('19', '11');
INSERT INTO `v_rbac_access` VALUES ('16', '16');
INSERT INTO `v_rbac_access` VALUES ('16', '15');
INSERT INTO `v_rbac_access` VALUES ('16', '14');
INSERT INTO `v_rbac_access` VALUES ('16', '13');
INSERT INTO `v_rbac_access` VALUES ('16', '43');
INSERT INTO `v_rbac_access` VALUES ('16', '10');
INSERT INTO `v_rbac_access` VALUES ('16', '11');
INSERT INTO `v_rbac_access` VALUES ('16', '1');
INSERT INTO `v_rbac_access` VALUES ('21', '42');
INSERT INTO `v_rbac_access` VALUES ('21', '2');
INSERT INTO `v_rbac_access` VALUES ('21', '1');
INSERT INTO `v_rbac_access` VALUES ('21', '10');
INSERT INTO `v_rbac_access` VALUES ('21', '11');
INSERT INTO `v_rbac_access` VALUES ('21', '27');
INSERT INTO `v_rbac_access` VALUES ('21', '26');
INSERT INTO `v_rbac_access` VALUES ('21', '25');
INSERT INTO `v_rbac_access` VALUES ('21', '9');
INSERT INTO `v_rbac_access` VALUES ('21', '4');
INSERT INTO `v_rbac_access` VALUES ('21', '5');
INSERT INTO `v_rbac_access` VALUES ('21', '20');
INSERT INTO `v_rbac_access` VALUES ('21', '19');
INSERT INTO `v_rbac_access` VALUES ('21', '13');
INSERT INTO `v_rbac_access` VALUES ('21', '18');
INSERT INTO `v_rbac_access` VALUES ('21', '6');
INSERT INTO `v_rbac_access` VALUES ('21', '3');
INSERT INTO `v_rbac_access` VALUES ('21', '43');

-- ----------------------------
-- Table structure for `v_rbac_node`
-- ----------------------------
DROP TABLE IF EXISTS `v_rbac_node`;
CREATE TABLE `v_rbac_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_rbac_node
-- ----------------------------
INSERT INTO `v_rbac_node` VALUES ('1', 'admin', null, '1', null, '100', '0', '1', '1');
INSERT INTO `v_rbac_node` VALUES ('2', 'cate', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('3', 'add', null, '1', null, '100', '2', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('4', 'goods', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('5', 'add', null, '1', null, '100', '4', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('6', 'index', null, '1', null, '100', '2', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('9', 'index', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('11', 'welcome', null, '1', null, '100', '9', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('10', 'logout', null, '1', null, '100', '9', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('13', 'brand', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('14', 'index', null, '1', null, '100', '13', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('15', 'add', null, '1', null, '100', '13', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('16', 'edit', null, '1', null, '100', '13', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('17', 'del', null, '1', null, '100', '13', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('18', 'addson', null, '1', null, '100', '2', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('19', 'edit', null, '1', null, '100', '2', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('20', 'del', null, '1', null, '100', '2', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('21', 'goods_stock', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('22', 'index', null, '1', null, '100', '21', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('23', 'edit', null, '1', null, '100', '21', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('24', 'del', null, '1', null, '100', '21', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('25', 'edit', null, '1', null, '100', '4', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('26', 'del', null, '1', null, '100', '4', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('27', 'index', null, '1', null, '100', '4', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('28', 'order', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('29', 'index', null, '1', null, '100', '28', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('30', 'edit', null, '1', null, '100', '28', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('31', 'del', null, '1', null, '100', '28', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('32', 'typeattr', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('33', 'index', null, '1', null, '100', '32', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('34', 'add', null, '1', null, '100', '32', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('35', 'edit', null, '1', null, '100', '32', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('36', 'del', null, '1', null, '100', '32', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('37', 'type', null, '1', null, '100', '1', '2', '1');
INSERT INTO `v_rbac_node` VALUES ('38', 'index', null, '1', null, '100', '37', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('39', 'add', null, '1', null, '100', '37', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('40', 'edit', null, '1', null, '100', '37', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('41', 'del', null, '1', null, '100', '37', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('42', 'rbsc', null, '1', null, '100', '9', '3', '1');
INSERT INTO `v_rbac_node` VALUES ('43', 'changeps', null, '1', null, '100', '9', '3', '1');

-- ----------------------------
-- Table structure for `v_rbac_role`
-- ----------------------------
DROP TABLE IF EXISTS `v_rbac_role`;
CREATE TABLE `v_rbac_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_rbac_role
-- ----------------------------
INSERT INTO `v_rbac_role` VALUES ('2', 'cate', null, '1', null);
INSERT INTO `v_rbac_role` VALUES ('15', 'goods', null, '1', null);
INSERT INTO `v_rbac_role` VALUES ('16', 'brand', null, '1', null);
INSERT INTO `v_rbac_role` VALUES ('19', 'type', null, '1', null);
INSERT INTO `v_rbac_role` VALUES ('18', 'good_stock', null, '1', null);
INSERT INTO `v_rbac_role` VALUES ('20', '23', null, '1', null);
INSERT INTO `v_rbac_role` VALUES ('21', '组长', null, '1', null);

-- ----------------------------
-- Table structure for `v_rbac_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `v_rbac_user_role`;
CREATE TABLE `v_rbac_user_role` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_rbac_user_role
-- ----------------------------
INSERT INTO `v_rbac_user_role` VALUES ('16', '5');
INSERT INTO `v_rbac_user_role` VALUES ('2', '2');
INSERT INTO `v_rbac_user_role` VALUES ('18', '4');
INSERT INTO `v_rbac_user_role` VALUES ('20', '3');
INSERT INTO `v_rbac_user_role` VALUES ('19', '6');
INSERT INTO `v_rbac_user_role` VALUES ('15', '4');
INSERT INTO `v_rbac_user_role` VALUES ('21', '5');
INSERT INTO `v_rbac_user_role` VALUES ('21', '7');
INSERT INTO `v_rbac_user_role` VALUES ('15', '5');
INSERT INTO `v_rbac_user_role` VALUES ('18', '5');

-- ----------------------------
-- Table structure for `v_type`
-- ----------------------------
DROP TABLE IF EXISTS `v_type`;
CREATE TABLE `v_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL DEFAULT '' COMMENT 'åˆ†ç±»ç±»åž‹ï¼›',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `tid_UNIQUE` (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='ç±»åž‹è¡¨ï¼›';

-- ----------------------------
-- Records of v_type
-- ----------------------------
INSERT INTO `v_type` VALUES ('1', '服装');
INSERT INTO `v_type` VALUES ('2', '家居');
INSERT INTO `v_type` VALUES ('3', '裤类');
INSERT INTO `v_type` VALUES ('4', '衣服');

-- ----------------------------
-- Table structure for `v_typeattr`
-- ----------------------------
DROP TABLE IF EXISTS `v_typeattr`;
CREATE TABLE `v_typeattr` (
  `taid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taname` char(120) NOT NULL DEFAULT '' COMMENT 'ç±»åž‹å±žæ€§çš„åç§°ï¼›',
  `tavalue` varchar(45) NOT NULL DEFAULT '' COMMENT 'ç±»åž‹å±žæ€§çš„å€¼ï¼Œ',
  `class` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'ç±»åž‹å±žæ€§ï¼Œåˆ¤æ–­æœ¬å±žæ€§å±žäºŽå±žæ€§çš„å“ªç§,æ¯”å¦‚æ˜¯å•†å“çš„é¢œè‰²ï¼Œå¤§å°ï¼Œç­‰ã€‚',
  `type_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`taid`),
  UNIQUE KEY `taid_UNIQUE` (`taid`),
  KEY `fk_typeattr_type1_idx` (`type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of v_typeattr
-- ----------------------------
INSERT INTO `v_typeattr` VALUES ('1', '型号', 'M|S|X|XL|XXL|XXXL', '1', '1');
INSERT INTO `v_typeattr` VALUES ('2', '适宜人群', '青年|中年|老年|男|女', '0', '1');
INSERT INTO `v_typeattr` VALUES ('3', '颜色', '红|橙|黄|绿|蓝|紫|黑|灰|白', '1', '1');
INSERT INTO `v_typeattr` VALUES ('4', '裤尺码', '31|32|33|34|35|36', '1', '3');
INSERT INTO `v_typeattr` VALUES ('5', '颜色', '深蓝色|中蓝色|灰色|黑色', '1', '3');
INSERT INTO `v_typeattr` VALUES ('6', '材质', '牛仔|棉', '0', '3');
INSERT INTO `v_typeattr` VALUES ('7', '风格', '简约|百搭|正式', '0', '1');
INSERT INTO `v_typeattr` VALUES ('8', '场合', '商务|旅行|休闲|运动|娱乐', '0', '1');
INSERT INTO `v_typeattr` VALUES ('9', '季节', '春|夏|球|冬', '0', '1');
INSERT INTO `v_typeattr` VALUES ('10', '面料', '棉|麻|羊毛|鸭绒', '0', '1');

-- ----------------------------
-- Table structure for `v_user`
-- ----------------------------
DROP TABLE IF EXISTS `v_user`;
CREATE TABLE `v_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'å‰å°ç”¨æˆ·uid',
  `uname` char(120) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·åç§°',
  `realname` char(120) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·çœŸå®žåç§°',
  `account` char(120) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·ç™»å½•è´¦å·ï¼Œå¿…é¡»å”¯ä¸€',
  `password` char(32) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·å¯†ç ï¼Œè®¾ç½®ä¸ºå­—ç¬¦æ¨¡å¼ï¼Œå¯ä»¥æ˜¯å­—æ¯ï¼Œæ•°å­—ï¼Œç­‰ï¼Œ',
  `sex` char(10) NOT NULL DEFAULT '' COMMENT 'æ€§åˆ«ï¼Œæžšä¸¾ç±»åž‹ï¼šç”·ï¼Œæˆ–å¥³ï¼›',
  `birthday` varchar(20) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·å‡ºç”Ÿæ—¥æœŸï¼Œå­˜å…¥æ—¶é—´æˆ³ï¼Œæ–¹ä¾¿è®¡ç®—ï¼›',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·é‚®ç®±ï¼›é‚®ç®±å”¯ä¸€ï¼Œæ³¨å†Œè¿‡çš„',
  `adress` varchar(20) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·è¯¦ç»†åœ°å€ï¼Œvarchar',
  `cellphone` varchar(20) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·æ‰‹æœºå·ç ï¼Œå”¯ä¸€ï¼Œæ³¨å†Œè¿‡æ‰‹æœºå·ç ä¸èƒ½å†æ³¨å†Œ',
  `telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='å‰å°ç”¨æˆ·è¡¨';

-- ----------------------------
-- Records of v_user
-- ----------------------------
INSERT INTO `v_user` VALUES ('1', '123', '123', '123', '3f40f2614cd670813c10028dd07b1d95', '1', '2012|4|7', '1505906554@qq.com', '吉林|辽源|东丰县|123', '123', '123');
