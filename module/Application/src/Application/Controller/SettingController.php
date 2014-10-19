<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SettingController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout()->header="Setting";
        $this->layout()->desc_header="System settings";
    }
}
