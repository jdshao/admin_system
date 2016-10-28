<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/9/28
 * Time: 19:47
 */

/**
 * 下拉菜单实例
 * @Entity
 * @Table(name="menu_item")
 * @GeneratedValue(strategy="AUTO")
 **/
class MenuItem {

    /**
     * @Id
     * @Column(type="integer")
     **/
    protected $id ;
    /**
     * @Column(name="name", type="string", nullable=false, options={"comment"="菜单名称"})
     **/
    protected $name;
    /**
     * @Column(name="parent_id", type="integer", nullable=false, options={"comment"="父节点id"})
     */
    protected $parentId;
    /**
     * @Column(name="permission_value", type="integer", nullable=false, options={"comment"="权限值"})
     */
    protected $permssionValue;
    /**
     * @Column(name="created_at", type="datetime", nullable=false, options={"comment"="创建时间"})
     */
    protected $createdAt;

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
}

