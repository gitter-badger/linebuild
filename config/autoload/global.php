<?php

return array(
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=project;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),

    'transport' => array(
        'host' => 'smtp.gmail.com',
        'port' => 465 ,
        'connection_class' => 'login',
        'connection_config' => array(
            'ssl'       => 'ssl',
            'username' => 'icqparty@gmail.com',
            'password' => 'askgopa999'
        ),
    ),


    'caches' => array(
        'cache-main' => array(
            'adapter' => array(
                'name' => 'filesystem',
                'namespace'=>'project',
                'options' => array(
                    'ttl' => 2000,
                    'cache_dir' => './data/cache',
                ),
            ),
            'plugins' => array(
                'serializer',
                'exception_handler' => array(
                    'throw_exceptions' => false
                ),
            )
        ),
    ),
    'session_config' => array(
        'name' => 'photopreset',
        'remember_me_seconds' => 40000000000,
        'use_cookies' => true,
        'cookie_httponly' => true,
    ),
    'service_manager' => array(
        'factories' => array(
            'db' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        )
    ),
);
