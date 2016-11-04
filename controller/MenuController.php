<?php

/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/10/30
 * Time: 19:10
 */
class MenuController extends BaseController
{
    private $menuModel;
    private $adminUserModel;

    public function __construct()
    {
        parent::__construct();
        $this->menuModel = new MenuModel();
        $this->adminUserModel = new AdminUserModel();
    }

    /**
     * 获取菜单列表
     * @param \Symfony\Component\HttpFoundation\Request $request // http参数处理类
     */
    public function menuListAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        // 获取所有的菜单
        $this->smarty->display('admin/menuList.html');
    }

    /**
     * 获取所有的父标签
     */
    public function getParentItemAction()
    {
        $menuList = $this->menuModel->getItemInfo(array('parentId' => 0));
        $result[] = array('id' => 0, 'name' => "根节点");
        foreach ($menuList as $item) {
            $result[] = array('id' => $item->getId(), 'name' => $item->getName());
        }

        echo json_encode($result);
    }

    /**
     * ajax获取菜单列表
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function getMenuListAction()
    {
        $menuList = $this->menuModel->getMenuList();

        echo json_encode($menuList);
    }

    /**
     * 保存新建菜单元素
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function doSaveItemAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        // 请求方式为非POST时，抛出异常
        if ($request->getRealMethod() != 'POST') {
            throw new \RuntimeException("request mehtod is not valid!");
        }

        $name = $request->request->get("name");
        $url = $request->request->get("url");
        $parentId = $request->get("parent_id");
        if ($parentId == "请选择" || $parentId === "") {
            echo json_encode(array('success' => 0, 'errorMsg' => "请选择父节点"));
            exit;
        }
        $userId = 1;// $request->get("user_id");

        // 不是根节点检测节点是否存在
        if ($parentId) {
            $parentItem = $this->menuModel->getItemInfo(array('id' => $parentId));
            if (!$parentItem) {
                echo json_encode(array('success' => 0, 'errorMsg' => "父节点不存在"));
                exit;
            }
        }

        $user = $this->adminUserModel->getUser(array('id' => $userId));
        $res = $this->menuModel->saveUpdateItem($name, $url, $parentId, $user[0]);
        if ($res) {
            echo json_encode(array("success" => 1));
        } else {
            echo json_encode(array("success" => 0, "errorMsg" => "添加标签失败"));
        }
    }

    /**
     * 删除菜单元素
     * @param \Symfony\Component\HttpFoundation\Request $request
     */
    public function deleteItemAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        // 请求方式为非POST时，抛出异常
        if ($request->getRealMethod() != 'POST') {
            throw new \RuntimeException("request mehtod is not valid!");
        }

        // 删除id
        $delIds = $request->request->get("delIds");
        if (!$delIds) {
            echo json_encode(array('success' => 0, "errorMsg" => "删除菜单标签为空"));
            exit;
        }
        $res = $this->menuModel->deleteItem($delIds);

    }
}