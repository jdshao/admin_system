<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/10/1
 * Time: 10:35
 */

class MenuModel extends BaseModel
{
    public function __construct()
    {
        // 加载父类构造函数
        parent::__construct();
    }

    /**
     * 获取全部菜单元素
     */
    function getAllMueuItem()
    {

        var_dump(count($products));
    }
}