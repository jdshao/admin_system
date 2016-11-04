<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/10/1
 * Time: 10:35
 */

class MenuModel extends BaseModel
{
    // 内部仓库变量
    private $menuRepo ;

    public function __construct()
    {
        $this->entityManager = parent::getEntityManager();
        require_once Entity."/MenuItem.php";
        $this->menuRepo = $this->entityManager->getRepository("MenuItem");
    }

    /**
     * 获取菜单标签元素信息
     * @param $infoArray  // array(id=?, name=?)
     */
    public function getItemInfo($infoArray)
    {
        if (empty($infoArray)) {
            return null;
        }

        $item = $this->entityManager->getRepository("MenuItem")->findBy($infoArray);

        return $item;
    }

    /**
     * 获取全部菜单元素
     */
    function getAllMueuItem()
    {
        // 查询所有配置的菜单元素
        $menuItems = $this->menuRepo->findAll();

        $parentItem = array();
        foreach ($menuItems as $items) {
            if ($items->getParentId() == 0) {
                $parentItem[$items->getId()] = array('id'=>$items->getId(), 'text' => $items->getName(), 'attributes'=>array('url'=>$items->getUrl(), 'permission_value'=>$items->getPermssionValue()));
            } else {
                $parentItem[$items->getParentId()]['children'][] = array(
                    'id'=>$items->getId(),
                    'text' => $items->getName(),
                    'attributes' => array(
                        'url' => $items->getUrl()
                    )
                );
            }
        }
        return array_values($parentItem);
    }

    /**
     * 获取所有的菜单列表
     */
    public function getMenuList()
    {
        // 查询所有配置的菜单元素
        $menuItems = $this->menuRepo->findAll();
        $result = array();
        foreach ($menuItems as $item) {
            $tmp['id'] = $item->getId();
            $tmp['name'] = $item->getName();
            $tmp['permission_value'] = $item->getPermssionValue();
            $tmp['created_at'] = $item->getCreatedAt()->format('Y-m-d H:i:s');
            $tmp['updated_at'] = $item->getUpdatedAt()->format('Y-m-d H:i:s');
            $tmp['modify_user'] = $item->getModifyUser();

            $result[] = $tmp;
        }

        return $result;
    }

    /**
     * @param $name        // 标签名
     * @param $url         // 标签地址
     * @param $parentItem   // 父标对象
     * @param $userName     // 操作用户对象
     * @param $itemId       // 元素id 不为空时用于更新菜单元素
     */
    public function saveUpdateItem($name, $url, $parentItem = 0, $user, $itemId = null)
    {
        // 获取菜单数量
        $totalNum = count($this->menuRepo->findAll());

        $menuItem = new MenuItem();
        if ($itemId != null) {
            $menuItem = $this->menuRepo->find($itemId);
        } else {
            $menuItem->setCreatedAt(new \DateTime());
            $menuItem->setCreateUser($user->getName());
        }
        $menuItem->setName($name);
        $menuItem->setUrl($url);
        $menuItem->setParentId($parentItem);
        $menuItem->setUpdatedAt(new \DateTime());
        $menuItem->setModifyUser($user->getName());
        $menuItem->setPermssionValue(2^($totalNum+1));
        $this->entityManager->persist($menuItem);
        $this->entityManager->flush();

        return $menuItem->getId();
    }

    /**
     * 删除标签
     * @param $delIds  // id1,id2
     */
    public function deleteItem($delIds)
    {
        $query = $this->entityManager->createQuery("delete from MenuItem m where m.id in (". $delIds .")");
        $res = $query->execute();

        return $res;
    }
}