<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/23
 * Time: 10:50
 */

class ExceptionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
  
    public function showError ($errInfo)
    {
        $this->smarty->assign('info', 123123);
        $this->smarty->display('exception/errInfo.html');
    }
}

