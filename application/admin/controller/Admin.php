<?php
namespace app\admin\controller;

use app\common\Config\Config;
use think\Controller;

/**
 * Class Admin
 * 模板展示
 * @package app\admin\controller
 */
class Admin extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        return $this->fetch();
    }


    public function city()
    {
        return $this->fetch();
    }

    public function welcome1()
    {
        return $this->fetch();

    }

    public function memberlist()
    {
        return $this->fetch();

    }


    public function memberlist1()
    {
        return $this->fetch();

    }


    public function member_del()
    {
        return $this->fetch();

    }

    public function memberdel()
    {
        return $this->fetch();

    }


    public function orderlist()
    {
        return $this->fetch();

    }

    public function orderlist1()
    {
        return $this->fetch();

    }

    public function cate()
    {
        return $this->fetch();
    }

    public function adminlist()
    {
        return $this->fetch();
    }

    public function adminrole()
    {
        return $this->fetch();
    }


    public function admincate()
    {
        return $this->fetch();
    }


    public function adminrule()
    {
        return $this->fetch();
    }

    public function echarts1()
    {
        return $this->fetch();
    }

    public function echarts2()
    {
        return $this->fetch();
    }

    public function echarts3()
    {
        return $this->fetch();
    }

    public function echarts4()
    {
        return $this->fetch();
    }

    public function echarts5()
    {
        return $this->fetch();
    }

    public function echarts6()
    {
        return $this->fetch();
    }

    public function echarts7()
    {
        return $this->fetch();
    }

    public function echarts8()
    {
        return $this->fetch();
    }


    public function unicode ()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }

    public function error_e()
    {
        return $this->fetch();
    }

    public function demo()
    {
        return $this->fetch();
    }

    public function log()
    {
        return $this->fetch();
    }

    public function test () {
        $config = new Config();
        $info = $config->getConfig('getHost');
        var_dump($info);
    }

}
