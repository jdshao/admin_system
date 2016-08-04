<?php

/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/23
 * Time: 15:15
 */


class MainController extends BaseController
{
    public function loginAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        if ($request->getMethod() == "POST") {
            $userName = $request->get("userName");
            $userPasswd = $request->get("userPasswd");
            var_dump($userName);exit;
        }

        $adminUserModel = new AdminUserModel();


        $this->smarty->display("login.html");
    }

    /**
     * 主页面
     * @param \Symfony\Component\HttpFoundation\Request $request // http参数处理类
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $this->smarty->display("admin/main.html");
    }

}