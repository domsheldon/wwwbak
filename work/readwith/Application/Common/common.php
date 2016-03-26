<?php

/**
 * Description of common
 *
 * @author  Sorci
 * @name    公共方法
 */

/**
 * 对字符串进行解密加密
 * $string       加解密字符串
 * $operation    DECODE为解密 其他为加密
 * $key          密钥
 * $expiry       密文有效期
 */
function auth_code($string, $operation = 'DECODE', $key = '', $expiry = 0) {
    $ckey_length = 4;

    $key = md5($key ? $key : MY_SUPER_KEY);
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

    $cryptkey = $keya . md5($keya . $keyc);
    $key_length = strlen($cryptkey);

    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
    $string_length = strlen($string);

    $result = '';
    $box = range(0, 255);

    $rnkey = array();
    for ($i = 0; $i <= 255; $i++) {
        $rnkey[$i] = ord($cryptkey[$i % $key_length]);
    }

    for ($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rnkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }

    for ($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }

    if ($operation == 'DECODE') {
        if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}

	/**
	*  @desc 根据两点间的经纬度计算距离
	*  @param float $lat 纬度值
	*  @param float $lng 经度值
	*  @return string {$dis}米
	*/
	function get_distance($lng1,$lat1,$lng2,$lat2){
	 if( (int)$lng1 && (int)$lng2 ){
	     $earthRadius = 6367000; //地球半径m
	     /*
	       Convert these degrees to radians
	       to work with the formula
	     */
	 
	     $lat1 = ($lat1 * pi() ) / 180;
	     $lng1 = ($lng1 * pi() ) / 180;
	 
	     $lat2 = ($lat2 * pi() ) / 180;
	     $lng2 = ($lng2 * pi() ) / 180;
	 
	     /*
	       Using the
	       Haversine formula
	       http://en.wikipedia.org/wiki/Haversine_formula
	       calculate the distance
	     */
	     $calcLongitude = $lng2 - $lng1;
	     $calcLatitude = $lat2 - $lat1;
	     $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  
		 $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
	     $calculatedDistance = $earthRadius * $stepTwo;
	 	 $dis=round($calculatedDistance);
	     return "$dis".'米';
	 	}else {
	 		return '';
	 	}
 
	}
	/**
	* 获取归还/传递剩余天数
	* @param $apply_date 	申请的天数
	* @param $get_time 		得到书的时间
	* @param $feed_type 	动态类型，0漂流1借阅
	* @return:
	*/
	 function getLeftDate($apply_date,$get_time) {
		if($get_time){
			//当前时间-得到书的时间=已过了多少天
			$date=ceil( $apply_date -  (time()-$get_time) /86400 );
			
			return "$date";
		}else{
			return '0';
		}
	}
//验证是否整数
function check($id) {
    if ($id) {
        if (filter_var($id, FILTER_VALIDATE_INT)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//验证浮点数
function isFloat($var) {
    if ($var) {
        if (filter_var($var, FILTER_VALIDATE_FLOAT)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//新建目录
function mk($path) {
    if (!file_exists($path)) {
        mkdir($path, 0777);
        chmod($path, 0777);
    }
}

//弹出框
function alert($url, $msg) {
    echo "<script type='text/javascript'>parent.location.href='" . $url . "';alert('" . $msg . "')</script>";
}

/* 表单验证部分
  -----------------------------------------------------------
  函数名称：isNumber
  简要描述：检查输入的是否为数字
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isNumber($val) {
    if (ereg("^[0-9]+$", $val))
        return true;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称：isPhone
  简要描述：检查输入的是否为电话
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isPhone($val) {
    //eg: xxx-xxxxxxxx-xxx | xxxx-xxxxxxx-xxx ...
    if (ereg("^((0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$", $val))
        return true;
    return false;
}

//验证手机号
function checkphone($phone) {
    if (preg_match('/^(1[0-9]{10})$/', $phone))
        return true;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称：isMobile
  简要描述：检查输入的是否为手机号
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isMobile($val) {
    //该表达式可以验证那些不小心把连接符“-”写出“－”的或者下划线“_”的等等
    if (ereg("(^(\d{2,4}[-_－—]?)?\d{3,8}([-_－—]?\d{3,8})?([-_－—]?\d{1,7})?$)|(^0?1[35]\d{9}$)", $val))
        return true;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称：isPostcode
  简要描述：检查输入的是否为邮编
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isPostcode($val) {
    if (ereg("^[0-9]{4,6}$", $val))
        returntrue;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称：isEmail
  简要描述：邮箱地址合法性检查
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isEmail($val, $domain = "") {
    if (!$domain) {
        if (preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $val)) {
            return true;
        } else
            return false;
    }
    else {
        if (preg_match("/^[a-z0-9-_.]+@" . $domain . "$/i", $val)) {
            return true;
        } else
            return false;
    }
}

/**
 *   -----------------------------------------------------------
  函数名称：isName
  简要描述：姓名昵称合法性检查，只能输入中文英文
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */
function daoshu($diff) {
    $chunks = array(array(31536000, '年'), array(2592000, '个月'), array(604800, '周'), array(86400, '天'), array(3600, '小时'), array(60, '分钟'));
    $since = '';
    for ($i = 0; $i < count($chunks); $i++) {
        if ($diff >= $chunks[$i][0]) {
            $num = floor($diff / $chunks[$i][0]);
            $since .= sprintf('%d' . $chunks[$i][1], $num);
            $diff = (int) ($diff - $chunks[$i][0] * $num);
        }
    }
    return $since;
}
//匹配只能由字母和数字组合
function preg_str_num($str){
	if(preg_match("/^[A-Za-z0-9]+$/", $str)){
		return true;
	}
	return false;
}
//end func

/*
  -----------------------------------------------------------
  函数名称：isName
  简要描述：姓名昵称合法性检查，只能输入中文英文
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isName($val) {
    if (preg_match("/^[\x80-\xffa-zA-Z0-9]{3,60}$/", $val)) {//2008-7-24
        return true;
    }
    return false;
}

//end func

/*
  -----------------------------------------------------------
  函数名称:isDomain($Domain)
  简要描述:检查一个（英文）域名是否合法
  输入:string 域名
  输出:boolean
  修改日志:------
  -----------------------------------------------------------
 */

function isDomain($Domain) {
    if (!eregi("^[0-9a-z]+[0-9a-z\.-]+[0-9a-z]+$", $Domain)) {
        Return false;
    }
    if (!eregi("\.", $Domain)) {
        Return false;
    }

    if (eregi("\-\.", $Domain) || eregi("\-\-", $Domain) || eregi("\.\.", $Domain) || eregi("\.\-", $Domain)) {
        Return false;
    }

    $aDomain = explode(".", $Domain);
    if (!eregi("[a-zA-Z]", $aDomain[count($aDomain) - 1])) {
        Return false;
    }

    if (strlen($aDomain[0]) > 63 || strlen($aDomain[0]) < 1) {
        Return false;
    }
    Return true;
}

/*
  -----------------------------------------------------------
  函数名称:isNumberLength($theelement, $min, $max)
  简要描述:检查字符串长度是否符合要求
  输入:mixed (字符串，最小长度，最大长度)
  输出:boolean
  修改日志:------
  -----------------------------------------------------------
 */

function isNumLength($val, $min, $max) {
    $theelement = trim($val);
    if (ereg("^[0-9]{" . $min . "," . $max . "}$", $theelement))
        return true;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称:isNumberLength($theelement, $min, $max)
  简要描述:检查字符串长度是否符合要求
  输入:mixed (字符串，最小长度，最大长度)
  输出:boolean
  修改日志:------
  -----------------------------------------------------------
 */

function isEngLength($val, $min, $max) {
    $theelement = trim($val);
    if (ereg("^[a-zA-Z]{" . $min . "," . $max . "}$", $theelement))
        return true;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称：isEnglish
  简要描述：检查输入是否为英文
  输入：string
  输出：boolean
  作者：------
  修改日志：------
  -----------------------------------------------------------
 */

function isEnglish($theelement) {
    if (ereg("[\x80-\xff].", $theelement)) {
        Return false;
    }
    Return true;
}

/*
  -----------------------------------------------------------
  函数名称：isChinese
  简要描述：检查是否输入为汉字
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isChinese($sInBuf) {
    $iLen = strlen($sInBuf);
    for ($i = 0; $i < $iLen; $i++) {
        if (ord($sInBuf{$i}) >= 0x80) {
            if ((ord($sInBuf{$i}) >= 0x81 && ord($sInBuf{$i}) <= 0xFE) && ((ord($sInBuf{$i + 1}) >= 0x40 && ord($sInBuf{$i + 1}) < 0x7E) || (ord($sInBuf{$i + 1}) > 0x7E && ord($sInBuf{$i + 1}) <= 0xFE))) {
                if (ord($sInBuf{$i}) > 0xA0 && ord($sInBuf{$i}) < 0xAA) {
                    //有中文标点
                    return false;
                }
            } else {
                //有日文或其它文字
                return false;
            }
            $i++;
        } else {
            return false;
        }
    }
    return true;
}

/*
  -----------------------------------------------------------
  函数名称：isDate
  简要描述：检查日期是否符合0000-00-00
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isDate($sDate) {
    if (ereg("^[0-9]{4}\-[][0-9]{2}\-[0-9]{2}$", $sDate)) {
        Return true;
    } else {
        Return false;
    }
}

/*
  -----------------------------------------------------------
  函数名称：isTime
  简要描述：检查日期是否符合0000-00-00 00:00:00
  输入：string
  输出：boolean
  修改日志：------
  -----------------------------------------------------------
 */

function isTime($sTime) {
    if (ereg("^[0-9]{4}\-[][0-9]{2}\-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$", $sTime)) {
        Return true;
    } else {
        Return false;
    }
}

/*
  -----------------------------------------------------------
  函数名称:isMoney($val)
  简要描述:检查输入值是否为合法人民币格式
  输入:string
  输出:boolean
  修改日志:------
  -----------------------------------------------------------
 */

function isMoney($val) {
    if (ereg("^[0-9]{1,}$", $val))
        return true;
    if (ereg("^[0-9]{1,}\.[0-9]{1,2}$", $val))
        return true;
    return false;
}

/*
  -----------------------------------------------------------
  函数名称:isIp($val)
  简要描述:检查输入IP是否符合要求
  输入:string
  输出:boolean
  修改日志:------
  -----------------------------------------------------------
 */

function isIp($val) {
    return (bool) ip2long($val);
}

//-----------------------------------------------------------------------------
// 逗号半角转全角
function make_str_comma($str) {
    $arr = array('，' => ',');
    return strtr($str, $arr);
}

//正则表达式,批配不同手机浏览器UA关键词。 
function is_mobile() {
    $regex_match = "/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
    $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
    $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
    $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
    $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
    $regex_match.=")/i";
    //如果UA中存在上面的关键词则返回真。
    return isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']) or preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
}

/**
 * 函数名称：isLength
 * 简单描述：判断长度是否符合要求
 * 参数描述： $val      字符串
 *                  $min    最小长度
 *                  $max    最大长度
 * 返回类型：boolean
 */
function isLength($val, $min, $max) {
    $val = trim($val);
    if (mb_strlen($val, 'utf-8') >= (int) $min && mb_strlen($val, 'utf-8') <= (int) $max)
        return true;
    return false;
}

/**
 * 获取中英文混合的字符串长度
 * @param $val      字符串
 * @param $min    最小长度
 * @param $max    最大长度
 * @return:boolean
 */
function utf8_Length($val, $min, $max) {
    $len = mb_strlen($val, 'utf8');
    if ($len >= $min && $len <= $max) {
        return true;
    }
    return false;
}

/* * *********************汉字转拼音 Part **************************** */

function ChineseToPinyin($_String, $_Code = 'gb2312') {
    $_String = strtolower($_String);
    $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha" .
            "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|" .
            "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er" .
            "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui" .
            "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang" .
            "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang" .
            "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue" .
            "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne" .
            "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen" .
            "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang" .
            "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|" .
            "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|" .
            "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu" .
            "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you" .
            "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|" .
            "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";
    $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990" .
            "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725" .
            "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263" .
            "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003" .
            "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697" .
            "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211" .
            "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922" .
            "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468" .
            "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664" .
            "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407" .
            "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959" .
            "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652" .
            "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369" .
            "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128" .
            "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914" .
            "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645" .
            "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149" .
            "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087" .
            "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658" .
            "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340" .
            "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888" .
            "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585" .
            "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847" .
            "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055" .
            "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780" .
            "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274" .
            "|-10270|-10262|-10260|-10256|-10254";
    $_TDataKey = explode('|', $_DataKey);
    $_TDataValue = explode('|', $_DataValue);
    $_Data = (PHP_VERSION >= '5.0') ? array_combine($_TDataKey, $_TDataValue) : _Array_Combine($_TDataKey, $_TDataValue);
    arsort($_Data);
    reset($_Data);
    if ($_Code != 'gb2312')
        $_String = _U2_Utf8_Gb($_String);
    $_Res = '';
    for ($i = 0; $i < strlen($_String); $i++) {
        $_P = ord(substr($_String, $i, 1));
        if ($_P > 160) {
            $_Q = ord(substr($_String, ++$i, 1));
            $_P = $_P * 256 + $_Q - 65536;
        }
        $_Res .= _Pinyin($_P, $_Data);
    }
    return preg_replace("/[^a-z0-9]*/", '', $_Res);
}

function _Pinyin($_Num, $_Data) {
    if ($_Num > 0 && $_Num < 160)
        return chr($_Num);
    elseif ($_Num < -20319 || $_Num > -10247)
        return '';
    else {
        foreach ($_Data as $k => $v) {
            if ($v <= $_Num)
                break;
        }
        return $k;
    }
}
//距离排序
function dis_sort($a,$b){
	return ((int)$a['distance'] < (int)$b['distance']) ? -1 : 1;
}
function _U2_Utf8_Gb($_C) {
    $_String = '';
    if ($_C < 0x80)
        $_String .= $_C;
    elseif ($_C < 0x800) {
        $_String .= chr(0xC0 | $_C >> 6);
        $_String .= chr(0x80 | $_C & 0x3F);
    } elseif ($_C < 0x10000) {
        $_String .= chr(0xE0 | $_C >> 12);
        $_String .= chr(0x80 | $_C >> 6 & 0x3F);
        $_String .= chr(0x80 | $_C & 0x3F);
    } elseif ($_C < 0x200000) {
        $_String .= chr(0xF0 | $_C >> 18);
        $_String .= chr(0x80 | $_C >> 12 & 0x3F);
        $_String .= chr(0x80 | $_C >> 6 & 0x3F);
        $_String .= chr(0x80 | $_C & 0x3F);
    }
    return iconv('UTF-8', 'GB2312', $_String);
}

function _Array_Combine($_Arr1, $_Arr2) {
    for ($i = 0; $i < count($_Arr1); $i++)
        $_Res[$_Arr1[$i]] = $_Arr2[$i];
    return $_Res;
}

/* * *********************汉字转拼音 Part End **************************** */

//截取中文字符串
function csubstr($str, $start = 0, $length = 0, $charset = "utf-8", $suffix = true) {
    if (function_exists("mb_substr")) {
        if (mb_strlen($str, $charset) <= $length) {
            return $str;
        }
        $slice = mb_substr($str, $start, $length, $charset);
    } else {
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";

        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";

        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";

        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";

        preg_match_all($re[$charset], $str, $match);

        if (count($match[0]) <= $length) {
            return $str;
        }

        $slice = join("", array_slice($match[0], $start, $length));
    }
    if ($suffix) {
        return $slice . "…";
    }
    return $slice;
}
//记录用户请求的post 和返回的json
function writeInfo($post,$uid,$return){
	$filename='/alidata/www/youshu_api/logs/'.$uid.'_'.time().'.logs';
	
	$post_str=json_encode($post);
	$return_str=json_encode($return);
	$data='post----------'.$post_str.'++++++++++++josn----------'.$return_str;
	$handle=fopen($filename, 'x');
	if ($handle) {
		if (fwrite($handle, $data)){
			
		}
	}
	fclose($handle);
//	file_put_contents($filename, $data);
}
/**
 * 字符串切割
 *
 * 功能：截取字符串（支持中文），如果字符串中包括<a title="查看与html标签有关的文章" href="http://cuelog.com/tag/html%e6%a0%87%e7%ad%be" target="_blank">html标签</a>，截取的字符串则会保留完整的<a title="查看与html标签有关的文章" href="http://cuelog.com/tag/html%e6%a0%87%e7%ad%be" target="_blank">html标签</a>
 * 如果截取的字符串中包含不完整的html标签，则从字符串位置0开始截取到html标签前
 *
 * @param string $string        	
 * @param int $length        	
 * @param string $replace        	
 * @return string
 */
function htmlSubStr($string, $length = 0, $replace = '…') {
    // 先截取指定长度的字符串，支持中文
    if (strlen($string) < $length) {
        $string = substr($string, 0);
    } else {
        $char = ord($string [$length - 1]);
        if ($char >= 224 && $char <= 239) {
            $string = substr($string, 0, $length - 1);
        } else {
            $char = ord($string [$length - 2]);
            if ($char >= 224 && $char <= 239) {
                $string = substr($string, 0, $length - 2);
            } else {
                $string = substr($string, 0, $length);
            }
        }
    }

    // 开始标签集合,当前开始标签字符串(a,span,div...),结束标签集合
    $starts = $start_str = $ends = array();
    // 提取截取的字符串中出现的开始标签结合和结束标签集合
    preg_match_all('/<\w+[^>]*>?/', $string, $starts, PREG_OFFSET_CAPTURE);
    preg_match_all('/<\/\w+>/', $string, $ends, PREG_OFFSET_CAPTURE);

    // 初始化<a title="查看与字符串截取有关的文章" href="http://cuelog.com/tag/%e5%ad%97%e7%ac%a6%e4%b8%b2%e6%88%aa%e5%8f%96" target="_blank">字符串截取</a>点
    $cut_pos = 0;
    // 最后追加的字符串
    $last_str = '';

    if (!empty($starts [0])) {
        $starts = array_reverse($starts [0]);
        if (!empty($ends [0])) {
            $ends = $ends [0];
        }

        foreach ($starts as $sk => $s) {
            // 判断开始标签是否包括XHTML语法的闭合标签<img alt="">
            $auto = false;
            if ($auto != false && $auto = strripos($s [0], '/>')) {
                // 如果有，则将<a title="查看与字符串截取有关的文章" href="http://cuelog.com/tag/%e5%ad%97%e7%ac%a6%e4%b8%b2%e6%88%aa%e5%8f%96" target="_blank">字符串截取</a>点设置为当前标签的起始位置
                if ($cut_pos < $auto) {
                    $cut_pos = $s [1];
                    $last_str = $s [0];
                    unset($starts [$sk]);
                }
            } else {
                // 提取开始标签名：a,div,span...
                preg_match('/<(\w+).*>?/', $s [0], $start_str);
                if (!empty($ends)) {
                    foreach ($ends as $ek => $e) {
                        // 提取结束标签名
                        $end_str = trim($e [0], '</>');
                        // 如果开始标签名与结束标签名一致，并且结束标签的索引值比开始标签的索引值大，则该标签是完整的有效.
                        if ($end_str == $start_str [1] && $e [1] > $s [1]) {
                            // 如果字符串截取点还没有确定，给它赋值
                            if ($cut_pos < $e [1]) {
                                $cut_pos = $e [1];
                                // 并且将闭合标签作为最后的字符串追加
                                $last_str = $e [0];
                            }
                            // 将这个正确的标签去掉结束标签，并且滚入下一个开始标签的判断
                            unset($ends [$ek]);
                            break;
                        }
                    }
                } else {
                    /*
                     * 如果empty($ends)，说明第一个开始标签没有对应的闭合标签 说明这一段截取的内容不完整，只能将字符串截取到第一个开始标签前为止
                     */
                    $last_str = '';
                    $cut_pos = $s [1];
                }
            }
        }
        // 拼凑剩余的字符串
        $res_str = substr($string, 0, $cut_pos) . $last_str;
        $less_str = substr($string, strlen($res_str));
        $less_pos = strpos($less_str, '<');
        $less_str = $less_pos !== false ? substr($less_str, 0, $less_pos) : $less_str;
        $string = $res_str . $less_str . $replace;
    }
    return $string;
}
