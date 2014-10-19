<?php
namespace Application;

use Application\Auth\Adapter;
use Application\Model\Build;
use Application\Model\BuildModel;
use Application\Model\Project;
use Application\Model\ProjectModel;
use Application\Model\User;
use Application\Model\UserModel;
use Application\Service\BuildService;
use Application\Service\ProjectService;
use Application\Service\UserService;
use Zend\Authentication\AuthenticationService;
use Zend\Console\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module implements ConsoleBannerProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'ProjectModel' => function ($sm) {
                        return new ProjectModel($sm->get('db'),'project',new User());
                    },
                'BuildModel' => function ($sm) {
                        return new BuildModel($sm->get('db'),'build',new User());
                    },
                'UserModel' => function ($sm) {
                        return new UserModel($sm->get('db'),'user',new User());
                    },

                'ProjectService' => function ($sm) {
                        return new ProjectService();
                    },
                'BuildService' => function ($sm) {
                        return new BuildService();
                    },
                'UserService' => function ($sm) {
                        return new UserService();
                    },
            )
        );
    }
    public function getConsoleBanner(AdapterInterface $console)
    {
        return
            "==------------------------------------------------------==\n".
            "==        Welcome to LINE BUILD Console                 ==\n".
            "==                 version 1.0.1                        ==\n" .
            "==------------------------------------------------------==\n" ;
    }
    public function getConsoleUsage(AdapterInterface $console){
        return array(
            'run [--daemon|-d] [--verbose|-v]'=> 'Show application statistics',
            'project list'=> 'Show list projects',
            'project delete [--id|repository=]'=> 'Show list projects',
            'install' => 'Run install processe'
        );
    }
}
