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

    /**
     * 展示异常页面
     * @param string $errInfo  // 错误信息
     */
    public function showError ($errInfo = "oops! internal fatal error")
    {
        $this->smarty->assign('info', $errInfo);
        $this->smarty->display('exception/errInfo.html');
    }
}

