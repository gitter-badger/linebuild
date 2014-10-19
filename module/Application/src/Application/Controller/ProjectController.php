<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProjectController extends AbstractActionController
{
    public function indexAction()
    {

        $this->layout()->header="Projects";
        $this->layout()->desc_header="Projects list";

        $actionView = new ViewModel();
        $actionView->setTemplate('application/project/action');
        $this->layout()->addChild($actionView, 'action');

        $view= new ViewModel();
        $projectModel=$this->getServiceLocator()->get('ProjectModel');
        $view->setVariable('project_result',$projectModel->fetchAll());
        return $view;
    }
    public function buildAction()
    {
        $view=new ViewModel();
        $projectService = $this->getServiceLocator()->get('ProjectService');

        return $view;
    }
    public function editAction()
    {
        $view=new ViewModel();
        $projectService = $this->getServiceLocator()->get('ProjectService');

        return $view;
    }
    public function addAction()
    {
        $view=new ViewModel();
        $projectService = $this->getServiceLocator()->get('ProjectService');

        return $view;
    }
    public function deleteAction()
    {
        $id = $this->params('id', false);
        $projectService = $this->getServiceLocator()->get('ProjectService');
        $projectService->delete($id);
        $this->redirect()->toRoute('project');
    }
    public function viewAction()
    {
        return new ViewModel();
    }
}
