<?php

use app\admin\controller\Auth;


//截取字符串
function subtext($text, $length, $replace='...', $encoding='UTF-8'){
    if ($text && mb_strlen($text, $encoding)>$length) {
        return mb_substr($text, 0, $length, $encoding).$replace;
    }
    return $text;
}
function get_client_ip($type=0,$adv=false)
{
    return request()->ip($type,$adv);
}
function p($var) {
    echo "<pre>" . print_r($var, true) . "</pre>";
}


/**
 * 检查权限
 * 功能
 * @param $model
 * @return bool
 */
function authCheck($model)
{
    $is_alt = 2;
    $uid = session('id');
    $notCheck =  ['index/index','login/logout'];
    $auth = new Auth();
    if(in_array($model,$notCheck) || $uid == 1){
        return true;
    }
    if($auth->check($model,$uid,$is_alt)){
        return true;
    }
    return false;
}

/**
 * 检查权限
 * 导航列表
 * @param $model
 * @return bool
 */
function authList($model)
{
    $uid = session('id');
    $notCheck =  ['index/index','login/logout'];
    $auth = new Auth();
    if(in_array($model,$notCheck) || $uid == 1){
        return true;
    }
    if($auth->check($model,$uid)){
        return true;
    }
    return false;
}

/**
 * 对象转换成数组
 * @param $obj
 * @return mixed
 */
function objToArray($obj)
{
    return json_decode(json_encode($obj), true);
}


/**
 * 生成操作按钮
 * @param array $operate 操作按钮数组
 * @return string
 */
function showOperate($operate = [])
{
    if(empty($operate)){
        return '';
    }
    $option = '';
    foreach($operate as $key=>$vo){
        if(authCheck($vo['auth'])){
            $option .= '<a style="margin-right:5px" href="javascript:void(0)" class="btn btn-xs '. $vo['class'] .'" '. $vo['attr'] .'="'. $vo['url'] .'"><i class="fa '.$vo['icon'].'"></i>'. $key .'</a>';
        }
    }
    return $option;
}

/**
 * 整理菜单住方法
 * @param $param
 * @return array
 */
function prepareMenu($param)
{
    $param = objToArray($param);
    $parent = []; //父类
    $child = [];  //子类

    foreach($param as $key=>$vo){

        if(0 == $vo['pid']){
            $vo['href'] = '#';
            $parent[] = $vo;
        }else{
            $vo['href'] = url($vo['name']); //跳转地址
            $child[] = $vo;
        }
    }

    foreach($parent as $key=>$vo){
        foreach($child as $k=>$v){

            if($v['pid'] == $vo['id']){
                $parent[$key]['child'][] = $v;
            }
        }
    }
    unset($child);

    return $parent;
}


/**
 * 将图片替换为文字
 * @param $replacement
 * @param $string
 * @return null|string|string[]
 */
function isIncludedImg($replacement,$string)
{
    $pattern="/<[img|IMG].*?src=[\'\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
    return preg_replace($pattern,$replacement,$string);
}

/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}

/**
 * 人性化时间显示
 * @param $time
 * @return false|string
 */
function transfer_time($time)
{
    $time = (int) substr($time, 0, 10);
    $int = time() - $time;
    if ($int <= 2){
        $str = sprintf('刚刚', $int);
    }elseif ($int < 60){
        $str = sprintf('%d秒前', $int);
    }elseif ($int < 3600){
        $str = sprintf('%d分钟前', floor($int / 60));
    }elseif ($int < 86400){
        $str = sprintf('%d小时前', floor($int / 3600));
    }elseif ($int < 1728000){
        $str = sprintf('%d天前', floor($int / 86400));
    }else{
        $str = date('Y年m月d日 H:i:s', $time);
    }
    return $str;
}

/**
 * 解析备份sql文件
 * @param $file
 * @return array
 */
function analysisSql($file)
{
    // sql文件包含的sql语句数组
    $sqls = array ();
    $f = fopen ( $file, "rb" );
    // 创建表缓冲变量
    $create = '';
    while ( ! feof ( $f ) ) {
        // 读取每一行sql
        $line = fgets ( $f );
        // 如果包含空白行，则跳过
        if (trim ( $line ) == '') {
            continue;
        }
        // 如果结尾包含';'(即为一个完整的sql语句，这里是插入语句)，并且不包含'ENGINE='(即创建表的最后一句)，
        if (! preg_match ( '/;/', $line, $match ) || preg_match ( '/ENGINE=/', $line, $match )) {
            // 将本次sql语句与创建表sql连接存起来
            $create .= $line;
            // 如果包含了创建表的最后一句
            if (preg_match ( '/ENGINE=/', $create, $match )) {
                // 则将其合并到sql数组
                $sqls [] = $create;
                // 清空当前，准备下一个表的创建
                $create = '';
            }
            // 跳过本次
            continue;
        }

        $sqls [] = $line;
    }
    fclose ( $f );

    return $sqls;
}

/**
 * php防注入和XSS攻击通用过滤
 * @param $html
 * @return mixed
 */
function string_remove_xss($html) {
    preg_match_all("/\<([^\<]+)\>/is", $html, $ms);

    $searchs[] = '<';
    $replaces[] = '&lt;';
    $searchs[] = '>';
    $replaces[] = '&gt;';

    if ($ms[1]) {
        $allowtags = 'img|a|font|div|table|tbody|caption|tr|td|th|br|p|b|strong|i|u|em|span|ol|ul|li|blockquote';
        $ms[1] = array_unique($ms[1]);
        foreach ($ms[1] as $value) {
            $searchs[] = "&lt;".$value."&gt;";

            $value = str_replace('&amp;', '_uch_tmp_str_', $value);
            $value = string_htmlspecialchars($value);
            $value = str_replace('_uch_tmp_str_', '&amp;', $value);

            $value = str_replace(array('\\', '/*'), array('.', '/.'), $value);
            $skipkeys = array('onabort','onactivate','onafterprint','onafterupdate','onbeforeactivate','onbeforecopy','onbeforecut','onbeforedeactivate',
                'onbeforeeditfocus','onbeforepaste','onbeforeprint','onbeforeunload','onbeforeupdate','onblur','onbounce','oncellchange','onchange',
                'onclick','oncontextmenu','oncontrolselect','oncopy','oncut','ondataavailable','ondatasetchanged','ondatasetcomplete','ondblclick',
                'ondeactivate','ondrag','ondragend','ondragenter','ondragleave','ondragover','ondragstart','ondrop','onerror','onerrorupdate',
                'onfilterchange','onfinish','onfocus','onfocusin','onfocusout','onhelp','onkeydown','onkeypress','onkeyup','onlayoutcomplete',
                'onload','onlosecapture','onmousedown','onmouseenter','onmouseleave','onmousemove','onmouseout','onmouseover','onmouseup','onmousewheel',
                'onmove','onmoveend','onmovestart','onpaste','onpropertychange','onreadystatechange','onreset','onresize','onresizeend','onresizestart',
                'onrowenter','onrowexit','onrowsdelete','onrowsinserted','onscroll','onselect','onselectionchange','onselectstart','onstart','onstop',
                'onsubmit','onunload','javascript','script','eval','behaviour','expression','style','class');
            $skipstr = implode('|', $skipkeys);
            $value = preg_replace(array("/($skipstr)/i"), '.', $value);
            if (!preg_match("/^[\/|\s]?($allowtags)(\s+|$)/is", $value)) {
                $value = '';
            }
            $replaces[] = empty($value) ? '' : "<" . str_replace('&quot;', '"', $value) . ">";
        }
    }
    $html = str_replace($searchs, $replaces, $html);

    return $html;
}
//php防注入和XSS攻击通用过滤
function string_htmlspecialchars($string, $flags = null) {
    if (is_array($string)) {
        foreach ($string as $key => $val) {
            $string[$key] = string_htmlspecialchars($val, $flags);
        }
    } else {
        if ($flags === null) {
            $string = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
            if (strpos($string, '&amp;#') !== false) {
                $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1', $string);
            }
        } else {
            if (PHP_VERSION < '5.4.0') {
                $string = htmlspecialchars($string, $flags);
            } else {
                if (!defined('CHARSET') || (strtolower(CHARSET) == 'utf-8')) {
                    $charset = 'UTF-8';
                } else {
                    $charset = 'ISO-8859-1';
                }
                $string = htmlspecialchars($string, $flags, $charset);
            }
        }
    }

    return $string;
}

function getAddressByIp($ip = ''){
    if(empty($ip)){
        return '请输入IP地址';
    }
    $url="http://api.map.baidu.com/location/ip?ak=wyHh9Gt1Qn4mh8tWYrhm5IBkAAncUIYN&ip=".$ip;
    $ipinfo=json_decode(file_get_contents($url));
    $location = $ipinfo->{'content'}->{'address'};
    return $location;
}
