<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/23
 * Time: 10:50
 */

class BaseController
{
    // smartyʵ��
    protected $smarty;

    public function __construct()
    {
        $this->smarty = new SmartyLibrary();
        $this->smarty->assign('common', Common);
    }
}
