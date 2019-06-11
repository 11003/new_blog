<?php
/**
 * User: Lh
 * Date: 2019/6/9 13:22
 */

namespace app\index\controller;


class Link extends Base
{
    public function index()
    {
        return $this->fetch("link");
    }
}