<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/7/28
 * Time: 20:42
 */

class AdminUserModel extends BaseModel
{
    public function __construct()
    {
        // 加载父类构造函数
        $this->entityManager = parent::getEntityManager();
        require_once Entity."/AdminUser.php";
        $this->userRepo = $this->entityManager->getRepository("AdminUser");
    }

    /**
     * 查询用户
     * @param $option // array( $userId = null, $userName = null, $telephone = null, $mail = null)
     */
    public function getUser($option)
    {
        $user = $this->userRepo->findBy($option);

        return $user;
    }

    /**
     * 获取所有用户
     */
    public function getAllUser()
    {
        $userList = $this->userRepo->findAll();

        return $userList;
    }

    /**
     * 更新用户
     * @param $option // 更新选项
     */
    public function updateUser($userId, $option)
    {
        $user = $this->userRepo->find($userId);
        if ($option['state']) {
            $user->setState($option['state']);
        }
        if ($option['permission_value']) {
            $user->setPermissionValue($option['permission_value']);
        }

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

}

