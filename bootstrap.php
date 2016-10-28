<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/7/28
 * Time: 19:41
 */

// bootstrap.php
// Include Composer Autoload (relative to project root).
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// 实例 Entity 路径
define("Entity", __DIR__.'/model/Entity');

// 获取命令行输入的参数  $argv[0]
$paths = array( Entity );
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'port'     => '3306',
    'user'     => 'root',
    'password' => 'shao10908',
    'dbname'   => 'admin_system',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
