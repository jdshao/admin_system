<?php

/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/11/3
 * Time: 9:32.
 */
class PermController extends BaseController
{
    private $userModel;
    private $menuModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new AdminUserModel();
        $this->menuModel = new MenuModel();
    }

    /**
     * 显示所有用户权限.
     */
    public function listPermAction()
    {
        $this->smarty->display('admin/permList.html');
    }

    /**
     * 获取所有用户的权限列表.
     */
    public function getUserPermAction()
    {
        // 活用用户列表
        $userList = $this->userModel->getAllUser();
        // 获取菜单信息
        $menuList = $this->menuModel->getMenuList();

        $result = array();
        foreach ($userList as $user) {
            $tmp['id'] = $user->getId();
            $tmp['name'] = $user->getName();
            $tmp['state'] = $user->getState();
            $tmp['menu'] = '';
            foreach ($menuList as $menu) {
                if ($user->getPermissionValue() & $menu['permission_value']) {
                    $tmp['menu'] .= $menu['name'].',';
                }
            }
            $tmp['menu'] = substr($tmp['menu'], 0, -1);

            $result[] = $tmp;
        }

        echo json_encode($result);
    }

    /**
     * 获取菜单复选框书.
     */
    public function getMenuCheckTreeAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        if ($request->getMethod() != 'POST') {
            echo json_encode(array('success' => -1));
            exit;
        }

        // 查询用户对应菜单选择状态
        $userId = $request->request->get('userId');
        if (!$userId) {
            echo json_encode(array('success' => -1));
            exit;
        }
        $menuList = $this->menuModel->getAllMueuItem();
        $user = $this->userModel->getUser(array('id' => $userId));
        if (!$user) {
            echo json_encode(array('success' => -1));
            exit;
        }
        foreach ($menuList as $k => $menu) {
            if (!isset($menu['children'])) {
                if ($menu['attributes']['permission_value'] & $user[0]->getPermissionValue()) {
                    $menuList[$k]['checked'] = true;
                } else {
                    $menuList[$k]['checked'] = false;
                }
            }
        }

        echo json_encode(array('success' => 1, 'data' => $menuList));
    }
}
