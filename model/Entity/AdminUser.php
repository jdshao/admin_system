<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/7/5
 * Time: 23:21
 */


use Doctrine\ORM\Mapping as ORM;
/**
 * 用户表
 * @ORM\Entity
 * @ORM\Table(name="admin_user")
 **/
class AdminUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     **/
    protected $id ;
    /**
     * @ORM\Column(name="name", type="string", nullable=false, options={"comment"="用户名"})
     **/
    protected $name;
    /**
     * @ORM\Column(name="password", type="string", nullable=false, options={"comment"="密码"})
     */
    protected $password;
    /**
     * @ORM\Column(name="telephone", type="integer", options={"comment"="电话"})
     */
    protected $telephone;
    /**
     * @ORM\Column(name="mail", type="string", options={"comment"="邮箱"})
     */
    protected $mail;
    /**
     * @ORM\Column(name="regist_time", type="datetime", options={"comment"="注册时间"})
     */
    protected $registTime;
    /**
     * @ORM\Column(name="last_login", type="datetime", options={"comment"="上次登录时间"})
     */
    protected $lastLogin;

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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return AdminUser
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return AdminUser
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     * @return AdminUser
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return AdminUser
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistTime()
    {
        return $this->registTime;
    }

    /**
     * @param mixed $registTime
     * @return AdminUser
     */
    public function setRegistTime($registTime)
    {
        $this->registTime = $registTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     * @return AdminUser
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

}