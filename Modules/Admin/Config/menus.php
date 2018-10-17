<?php return array(
    'Admin' =>
        array(
            'title' => '系统配置',
            'icon' => 'fa fa-cog',
            'permission' =>
                array(
                    0 => 'Modules\\Admin\\Http\\Controllers\\RoleController@index',
                ),
            'menus' =>
                array(
                    0 =>
                        array(
                            'title' => '角色列表',
                            'permission' => 'Modules\\Admin\\Http\\Controllers\\RoleController@index',
                            'url' => '/admin/role',
                        ),
                ),
        ),
    'Module' =>
        array(
            'title' => '其他配置',
            'icon' => 'fa fa-navicon',
            'permission' => '权限标识',
            'menus' =>
                array(
                    0 =>
                        array(
                            'title' => '模块管理',
                            'permission' => '',
                            'url' => '/admin/module',
                        ),
                    1 =>
                        array(
                            'title' => '模板管理',
                            'permission' => '',
                            'url' => '/admin/template',
                        ),
                ),
        ),
);