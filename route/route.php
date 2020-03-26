<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
return [

];
Route::group('/', function () {
    Route::rule('admin','admin/admin/index');
    Route::rule('welcome1','admin/admin/welcome1');
    Route::rule('memberList1','admin/admin/memberList1');
    Route::rule('adminadd','admin/admin/adminadd');
    Route::rule('admincate','admin/admin/admincate');
    Route::rule('adminlist','admin/admin/adminlist');
    Route::rule('adminrole','admin/admin/adminrole');
    Route::rule('adminrule','admin/admin/adminrule');
    Route::rule('cate','admin/admin/cate');
    Route::rule('city','admin/admin/city');
    Route::rule('demo','admin/admin/demo');
    Route::rule('echarts1','admin/admin/echarts1');
    Route::rule('echarts2','admin/admin/echarts2');
    Route::rule('echarts3','admin/admin/echarts3');
    Route::rule('echarts4','admin/admin/echarts4');
    Route::rule('echarts5','admin/admin/echarts5');
    Route::rule('echarts6','admin/admin/echarts6');
    Route::rule('echarts7','admin/admin/echarts7');
    Route::rule('echarts8','admin/admin/echarts8');
    Route::rule('error_e','admin/admin/error_e');
    Route::rule('log','admin/admin/log');
    Route::rule('login','admin/admin/login');
    Route::rule('memberdel','admin/admin/memberdel');
    Route::rule('memberlist','admin/admin/memberlist');
    Route::rule('memberlist1','admin/admin/memberlist1');
    Route::rule('orderlist','admin/admin/orderlist');
    Route::rule('orderlist1','admin/admin/orderlist1');
    Route::rule('unicode','admin/admin/unicode');
    Route::rule('welcome','admin/admin/welcome');
    Route::rule('welcome1','admin/admin/welcome1');
})->mergeRuleRegex();

