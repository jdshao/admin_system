<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/7/5
 * Time: 23:21
 */

/**
 * @Entity @Table(name="admin_user")
 **/
class AdminUser {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     **/
    protected $id ;
    /**
     * @Column(type="string")
     **/
    protected $name;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return AdminUser
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


}