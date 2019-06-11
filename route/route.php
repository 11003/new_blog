<?php
Route::group([ 'method'=> 'get','prefix' => 'index'],[
    '/' => '/index/index',
    'article/:cid' => '/article/index',
    'article' => '/article/index',
    'page' => '/page/index',
    'p/:cid/:id' => '/read/index',
    'c/:id' => '/read/index',
    'message' => '/message/index',
    'time' => '/time/index',
    'link' => '/link/index',
]);

Route::group([ 'method'=> 'post','prefix' => 'index'],[
    'like/:aid/:cid' => '/read/like',
    'search' => '/search/index',
]);
