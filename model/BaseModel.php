<?php
/**
 * Created by PhpStorm.
 * User: jdshao
 * Date: 2016/6/30
 * Time: 14:48
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


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
    public function __construct( $entityClass = 'AdminUser' )
    {
        $entityPath = array( Entity . $entityClass . '.php');
        $this->dbParams = array(
                                'driver'   => 'pdo_mysql',
                                'user'     => $_SERVER['DATABASE_USER'],
                                'password' => $_SERVER['DATABASE_PASSWORD'],
                                'dbname'   => 'admin_system',
                            );
        $config = Setup::createYAMLMetadataConfiguration($entityPath, $this->isDevMode);
        $this->entityManager = EntityManager::create($this->dbParams, $config);
    }

    /**
     * @param null $entityClass // 更换操作实例
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager( $entityClass = null ) {
        // 是否更换数据库实例 不为空的时候
        if ( $entityClass != null ) {
            $entityPath = array( Entity . $entityClass . '.php');
            $config = Setup::createYAMLMetadataConfiguration($entityPath, $this->isDevMode);
            $this->entityManager = EntityManager::create($this->dbParams, $config);
        }

        return $this->entityManager;
    }
}
