<?php
namespace app\admin\controller;

use app\common\Config\Config;
use think\Db;

class Menu extends Base
{


    public function initialize()
    {
        return parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function add() {
        $menu_list = $this->getMenuOrderList();
        $this->assign('menu_list',$menu_list);
        return $this->fetch();
    }

    /**
     * [Get the list by menu category and descendant order]
     * @param int $parent_id   parent id
     * @param array $list   storage arrays
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getMenuOrderList($parent_id = 0, $list = array()) {
        $old_list = Db::name('admin_menu')->where('parent_id',$parent_id)->select();
        if ($old_list) {
            foreach ($old_list as $key => $val) {
                $list[] = $val;
                $this_res = $this->getMenuOrderList($val['menu_id'],$list);
                $list = $this_res?$list+$this_res:$list;
            }
            return $list;
        }
    }
}