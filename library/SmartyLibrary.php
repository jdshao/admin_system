<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/23
 * Time: 10:10
 */

class SmartyLibrary extends Smarty
{
    public function __construct()
    {
        parent::__construct();
        $this -> template_dir = array(VIEWS . '/');
        $this -> compile_dir = __DIR__ . '/smarty/compile/';
        $this -> config_dir = __DIR__ . '/smarty/configs/';
        $this -> cache_dir = __DIR__ . '/smarty/cache/';
        $this -> left_delimiter = '<{';
        $this -> right_delimiter = '}>';
    }
}
