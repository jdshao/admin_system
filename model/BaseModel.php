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
    // entity ����ʵ��
    protected $entityManager ;
    // doctrine ����
    protected $isDevMode = true;
    // ���ݿ�����
    private $dbParams ;

    /**
     * @param string $entityClass // Ĭ��ΪAdminUser��
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
     * @param null $entityClass // ��������ʵ��
     * @return EntityManager
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager( $entityClass = null ) {
        // �Ƿ�������ݿ�ʵ�� ��Ϊ�յ�ʱ��
        if ( $entityClass != null ) {
            $entityPath = array( Entity . $entityClass . '.php');
            $config = Setup::createYAMLMetadataConfiguration($entityPath, $this->isDevMode);
            $this->entityManager = EntityManager::create($this->dbParams, $config);
        }

        return $this->entityManager;
    }
}
