<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/30
 * Time: 14:48
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver;


class BaseModel
{
    // entity 管理实例
    protected $entityManager ;
    // doctrine 设置
    protected $isDevMode = true;
    // 数据库配置
    private $dbParams ;

    /**
     * @param string $entityClass // 默认为AdminUser类
     * @throws \Doctrine\ORM\ORMException
     */
    private function __construct()
    {
    }

    /**
     * @param null $entityClass // 更换操作实例
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager( $entityClass = null ) {
        // 是否更换数据库实例 不为空的时候
        if ( !$this->entityManager ) {
            // 数据库连接配置
            $this->dbParams = array(
                'driver'   => 'pdo_mysql',
                'host'     => '127.0.0.1',
                'port'     => '3306',
                'user'     => $_SERVER['DATABASE_USER'],
                'password' => $_SERVER['DATABASE_PASSWORD'],
                'dbname'   => 'admin_system',
                'charset' => 'utf8'
            );

            // entity配置路径
            $paths = array( BASE_PATH.'/model/Entity' );

            $classLoader = new \Doctrine\Common\ClassLoader('Entity', BASE_PATH.'/model/Entity');
            $classLoader->register();

            $driver = new Doctrine\ORM\Mapping\Driver\AnnotationDriver(new Doctrine\Common\Annotations\AnnotationReader(), array(BASE_PATH.'/model/Entity'));
            $config = Setup::createAnnotationMetadataConfiguration($paths, $this->isDevMode);
            $config->setMetadataDriverImpl($driver);
            $this->entityManager = EntityManager::create($this->dbParams, $config);
        }

        return $this->entityManager;
    }
}
