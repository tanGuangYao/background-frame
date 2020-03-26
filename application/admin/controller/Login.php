<?php
namespace app\admin\controller;

use app\common\Config\Config;
use think\Controller;
use think\Db;

class Login extends Controller
{


    public function login()
    {
        return $this->fetch();
    }



    public function login_admin()
    {
        $admin_account  = $_POST['admin_account'];
        $admin_password = $_POST['admin_password'];

        $admin_info = Db::name('admin')->where('admin_account',$admin_account)->find();

        if($admin_info) {
            if($admin_info['admin_password'] == md5(sha1($admin_password))) {
                cookie('admin',array($admin_info));
                cookie('menu_list',$this->getMenuList());
                return $this->success('登陆成功','admin/admin/index');
            }
        } else {
            return $this->error('账户不存在','admin/login/login');
        }
    }


    public function logout() {
        cookie(null, 'admin');
        cookie(null,'menu_list');

        return $this->success('退出成功','admin/login/login');

    }

    public function getMenuList($parent_id=0) {
        $menuList = Db::name('admin_menu')->where('parent_id',$parent_id)->select();
        //eturn $menuList;
        if ($menuList) {
            foreach ($menuList as $key => $val) {
                $menuList[$key]['menu_link'] = getHost().'/'.$menuList[$key]['menu_link'];
                $menuList[$key]['child'] = $this->getMenuList($val['menu_id'])?:array();
            }
            return $menuList;
        }
    }


    public function test() {
       $test = $this->getMenuList();
       echo '<pre>';
       var_dump($test);
    }

}
