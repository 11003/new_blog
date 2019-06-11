<?php
/**
 * User: Lh
 * Date: 2019/6/9 15:06
 */

namespace app\index\controller;


class Search extends Base
{
    public function index()
    {
        return $this->fetch("search");
    }
}