<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/9/28
 * Time: 19:47
 */

use Doctrine\ORM\Mapping as ORM;
/**
 * 下拉菜单实例
 * @ORM\Entity
 * @ORM\Table(name="menu_item")
 **/
class MenuItem {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id ;
    /**
     * @ORM\Column(name="name", type="string", nullable=false, options={"comment"="菜单名称"})
     **/
    protected $name;
    /**
     * @ORM\Column(name="parent_id", type="integer", nullable=false, options={"comment"="父节点id"})
     */
    protected $parentId;
    /**
     * @ORM\Column(name="permission_value", type="integer", nullable=false, options={"comment"="权限值"})
     */
    protected $permssionValue;
    /**
     * @ORM\Column(name="url", type="string", nullable=true, options={"comment"="菜单链接"})
     */
    protected $url;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"comment"="创建时间"})
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=false, options={"comment"="更新时间"})
     */
    protected $updatedAt;

    /**
     * @ORM\Column(name="create_user", type="string", nullable=false, options={"comment"="创建用户"})
     */
    protected $createUser;

    /**
     * @ORM\Column(name="modify_user", type="string", nullable=true, options={"comment"="上次操作用户"})
     */
    protected $modifyUser;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param mixed $parentId
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * @return mixed
     */
    public function getPermssionValue()
    {
        return $this->permssionValue;
    }

    /**
     * @param mixed $permssionValue
     */
    public function setPermssionValue($permssionValue)
    {
        $this->permssionValue = $permssionValue;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return MenuItem
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return MenuItem
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModifyUser()
    {
        return $this->modifyUser;
    }

    /**
     * @param mixed $modifyUser
     */
    public function setModifyUser($modifyUser)
    {
        $this->modifyUser = $modifyUser;
    }

    /**
     * @return mixed
     */
    public function getCreateUser()
    {
        return $this->createUser;
    }

    /**
     * @param mixed $createUser
     * @return MenuItem
     */
    public function setCreateUser($createUser)
    {
        $this->createUser = $createUser;
        return $this;
    }
}

