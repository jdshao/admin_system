<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/23
 * Time: 11:09
 */

function Loader($className)
{
    if (strpos($className, 'Controller')) {
        require_once (Controller. '/' . $className . '.php');
    } else if (strpos($className, 'Library')) {
        require_once (LIBRARY. '/' . $className . '.php');
    } else if (strpos($className, 'Model')) {
        require_once (Model. '/' . $className . '.php');
    }
}

spl_autoload_register('Loader');

?>