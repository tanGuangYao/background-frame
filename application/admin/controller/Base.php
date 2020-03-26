<?php
namespace app\admin\controller;

use app\common\Config\Config;
use think\Controller;
use think\Cookie;

class Base extends Controller
{
    public function initialize()
    {
        $admin = cookie('admin');
        if(!$admin) {
            return $this->error('请登录','admin/login/login');
        }
    }

    /**
     * [实例化Redis]
     * @return \Redis
     */
    private static function handler(){
        if(!self::$handler){
            self::$handler = new \Redis();
            self::$handler -> connect('127.0.0.1','6379');
        }
        return self::$handler;
    }

    /**
     * [获取用]
     * @param $key
     * @return bool|mixed|string
     */
    public static function get($key){
        $value = self::handler()->get($key);
        $value_serl = @unserialize($value);
        if(is_object($value_serl)||is_array($value_serl)){
            return $value_serl;
        }
        return $value;
    }

    /**
     * [存数据用]
     * @param $key
     * @param $value
     * @return bool
     */
    public static function set($key,$value){
        if(is_object($value)||is_array($value)){
            $value = serialize($value);
        }
        return self::handler()->set($key,$value);
    }

    //获取全部redis缓存的key
    public function getAllRedis() {
        return self::handler()->keys('*');
    }

    //清楚全部redis缓存
    public function RedisFlushall(){
        return self::handler()->flushall();
    }

}
