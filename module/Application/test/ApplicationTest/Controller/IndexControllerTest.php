<?php
namespace ApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{

    protected $traceError = true;

    protected $em;

    public function setUp()
    {
        $this->setApplicationConfig(include '/var/www/project.linebuild.ru/config/application.config.php');
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/');
        
        $this->assertResponseStatusCode(200);
        
//        $this->assertModuleName('Application');
//        $this->assertControllerName('Application\Controller\Index');
//        $this->assertControllerClass('IndexController');
//        $this->assertActionName('index');
//        $this->assertMatchedRouteName('application');
    }


}

?>