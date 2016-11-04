<?php

/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/11/4
 * Time: 9:32
 */
class UserController extends BaseController
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
     * 保存用户
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function doSaveUserAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $userId = $request->request->get("userId");
        $itemIds = $request->request->get("itemIds");
        $state = $request->request->get("state");

        $menuList = $this->menuModel->getMenuList();
        $selectItem = explode(',', $itemIds);
        $permValue = 0;
        foreach ($menuList as $menu) {
            if (in_array($menu['id'], $selectItem)) {
                $permValue += $menu['permission_value'];
            }
        }

        $user = $this->userModel->updateUser($userId, array('state' => $state, 'permission_value'=>$permValue));
        if ($user) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => -1));
        }
    }

}