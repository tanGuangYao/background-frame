<?php
// common functions

/**
 * [Write operation log
 *  When an array is written, it is converted to XML]
 * @param $file String  file name
 * @param $post String | Array | Object   operation data
 * @param  $msg String  operation name
 */
function operationLog($file,$post,$msg='') {
    $dir = think\facade\Env::get('root_path').'payLog/'.date('Ymd',time());
    $file = $dir.'/'.$file;
    if (!file_exists($dir)) {
        mkdir($dir,0777,true);
    }
    $str="";
    $str .= "\n━━●●━━━(*^_^*)━━━(p≧w≦q)━━".$msg.'|'.date('Y-m-d H:i:s',time())."━━●●━━━━(●'◡'●)━━━φ(゜▽゜*)♪━\n";
    if(is_array($post)) {
        foreach($post as $key => $val){
            if(is_array($val)){
                $child = arr2xml($val);
                $str .= "\t<$key>$child</$key>\n";
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

function arr2xml($array)
{
    $xml='';
    foreach($array as $key=>$val){
        if(is_numeric($key)){
            $key="item id=\"$key\"";
        }else{
            list($key,)=explode(' ',$key);
        }
        $xml.="\t<$key>";
        $xml.=is_array($val)?$this->_array2xml($val):$val;
        list($key,)=explode(' ',$key);
        $xml.="</$key>\n";
    }
    return $xml;
}

/**
 * [Gets the current protocol, domain name]
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