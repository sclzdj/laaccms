<?php return array (
  'Category' => 
  array (
    'title' => '栏目管理',
    'icon' => 'fa fa-navicon',
    'permission' => 
    array (
      0 => 'Modules\\Admin\\Http\\Controllers\\CategoryController@index',
    ),
    'menus' => 
    array (
      0 => 
      array (
        'title' => '栏目列表',
        'permission' => 'Modules\\Admin\\Http\\Controllers\\CategoryController@index',
        'url' => '/article/category',
      ),
    ),
  ),
  'Article' => 
  array (
    'title' => '文章管理',
    'icon' => 'fa fa-navicon',
    'permission' => '权限标识',
    'menus' => 
    array (
      0 => 
      array (
        'title' => '文章管理',
        'permission' => 'Modules\\Admin\\Http\\Controllers\\ContentController@index',
        'url' => '/article/content',
      ),
    ),
  ),
  'Slide' => 
  array (
    'title' => '轮播图管理',
    'icon' => 'fa fa-navicon',
    'permission' => '权限标识',
    'menus' => 
    array (
      0 => 
      array (
        'title' => '轮播图管理',
        'permission' => '',
        'url' => '/article/slide',
      ),
    ),
  ),
  'article' => 
  array (
    'title' => '评论管理',
    'icon' => 'fa fa-navicon',
    'permission' => '权限标识',
    'menus' => 
    array (
      0 => 
      array (
        'title' => '评论管理',
        'permission' => '',
        'url' => '/article/comment',
      ),
    ),
  ),
);