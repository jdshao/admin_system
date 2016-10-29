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
     * ��ҳ��
     * @param \Symfony\Component\HttpFoundation\Request $request // http����������
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $this->smarty->display("admin/main.html");
    }

    /**
     * ��ȡ�˵��б�json��
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     */
    public function menuAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $menuModel = new MenuModel();
        $menuList = $menuModel->getAllMueuItem();var_dump($menuList);exit;

    }
}