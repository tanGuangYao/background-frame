<?php
namespace app\common\Config;

class Config {

    function getConfig($name) {
        $config = array(
            'WeChatPay' => array(
                'key' => '',//key
                'mchid'=> ''//商户id
            ),

            'WeChatH5' => array(
                'appid'=> ''
            ),

            'WeChatApp' => array(
                'appid'=> ''
            ),
            'AliPayApp' => array(
                'appid'=> '',
                'rsaPrivateKey'=> '',//长的
                'alipayrsaPublicKey'=> ''//短的
            ),
            'getHost' => getHost()
        );
        return $config[$name];

    }

}
