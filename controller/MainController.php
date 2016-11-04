<?php

/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/23
 * Time: 15:15
 */

class MainController extends BaseController
{
    private $userModel;
    private $menuModel;
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new AdminUserModel();
        $this->menuModel = new MenuModel();
    }

    public function loginAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        if ($request->getMethod() == "POST") {
            $userName = $request->request->get("userName");
            $userPasswd = $request->request->get("userPasswd");
            $verifyCode = $request->request->get("validCode");
            if (!$userName || !$userPasswd || !$verifyCode) {
                echo json_encode(array('success' => -1, 'errMsg' => "用户名、密码或验证码为空!"));
                exit;
            }
            $option = array('name' => $userName, 'password' => $userPasswd);
            $user = $this->userModel->getUser($option);
            if (!$user) {
                echo json_encode(array('success' => -1, 'errMsg' => "用户不存在!"));
                exit;
            } else if ($verifyCode != $_SESSION['validCode']) {
                echo json_encode(array('success' => -1, 'errMsg' => "验证码不正确!"));
                exit;
            } else {
                $_SESSION['userName'] = $user[0]->getName();
                $_SESSION['userId'] = $user[0]->getId();
                echo json_encode(array('success' => 1));
                exit;
            }
        }

        $this->smarty->display("login.html");
    }

    /**
     * 展示主页面
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function indexAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $this->smarty->display("admin/main.html");
    }

    /**
     * 显示所有菜单列表 json串返回
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\HttpFoundation\Response $response
     */
    public function menuAction()
    {
        $menuList = $this->menuModel->getAllMueuItem();
        $user = $this->userModel->getUser(array('id' => $_SESSION['userId']));
        if (!$user) {
            echo json_encode(array('success' => -1));
            exit;
        }

        $result = array();
        foreach ($menuList as $k => $menu) {
            if ($menu['attributes']['permission_value'] & $user[0]->getPermissionValue()) {
                $result[] = $menu;
            }
            /*if(!isset($menu['children'])) {
                if ($menu['permission_value'] & $user[0]->getPermissionValue()) {
                    $menuList[$k]['checked'] = true;
                }
            }*/
        }

        echo json_encode(array('success' => 1, 'data' => $result));
    }
}