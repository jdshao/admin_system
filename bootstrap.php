<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/7/28
 * Time: 19:41
 */

// Include Composer Autoload (relative to project root).
require_once "vendor/autoload.php";
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver;

// 数据库连接配置
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'port'     => '3306',
    'user'     => 'root',
    'password' => 'shao10908',
    'dbname'   => 'admin_system',
);

// 调试模式
$isDevMode = true;
// entity配置路径
$paths = array( __DIR__.'/model/Entity' );

$classLoader = new \Doctrine\Common\ClassLoader('Entity', __DIR__.'/model/Entity');
$classLoader->register();

$driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(new Doctrine\Common\Annotations\AnnotationReader(), array(__DIR__.'/model/Entity'));
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config->setMetadataDriverImpl($driver);
$entityManager = EntityManager::create($dbParams, $config);

require_once   __DIR__.'/model/Entity' .'/AdminUser.php';
$productRepository = $entityManager->getRepository("AdminUser");
$products = $productRepository->findAll();
var_dump($products[0]->getName());exit;