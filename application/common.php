<?php
// 应用公共文件

/**
 * [fileOPen]
 * @Author  yygg
 * @email  245069116@qq.com
 * @param $file  文件名称  string
 * @param $post  数据  Array
 * @param $msg   操作名称  String
 */
function fileOPen($file,$post,$msg='') {
    $dir = think\facade\Env::get('root_path').'log/'.date('Ymd',time());
    $file = $dir.'/'.$file;
    if (!file_exists($dir)) {
        mkdir($dir,0777,true);
    }
    $str="";
    $str .= "\n━━●●━━━━━━━━━━━━━━━━━".$msg.'|'.date('Y-m-d H:i:s',time())."━━●●━━━━━━━━━━━━━━━━━";
    if(is_array($post)) {
        foreach($post as $key => $val){
            if(is_array($val)){
                $child = arr2xml($val, false);
                $str .= "\t<$key>$child</$key>/n";
            }else{
                $str.= "\t<$key><![CDATA[$val]]></$key>\n";
            }
        }
        $str .= "</xml>";
    } else {
        $str .= "\n".var_export($post,1);
    }
    file_put_contents($file,($str), FILE_APPEND | LOCK_EX);
}

/**
 * [获取当前协议 域名 getHost]
 * @return string
 */
function getHost() {
    if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        $_SERVER['REQUEST_SCHEME'] = 'https';
    } elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        $_SERVER['REQUEST_SCHEME'] = 'https';
    } elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        $_SERVER['REQUEST_SCHEME'] = 'https';
    }else{
        $_SERVER['REQUEST_SCHEME'] = 'http';
    }
    return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];

}