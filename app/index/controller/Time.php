<?php
/**
 * User: Lh
 * Date: 2019/6/9 13:50
 */

namespace app\index\controller;


class Time extends Base
{
    public function index()
    {
        return $this->fetch("time");
    }
}