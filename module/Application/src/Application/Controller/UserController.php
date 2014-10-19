<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout()->header="Users";
        $this->layout()->desc_header="user list";
        $userModel=$this->getServiceLocator()->get('UserModel');
        $view=new ViewModel();
        $user_result=$userModel->fetchAll();

        $view->setVariable('user_result',$user_result);
        return $view;
    }
    public function profileAction()
    {
        $this->layout()->header="Icqparty";
        $this->layout()->desc_header="Profile";
    }

    public function loginAction()
    {
        $this->layout()->setTemplate('onepage/layout');

        $form = $this->serviceLocator->get('FormElementManager')->get('Application\Form\LoginForm');
        if($this->getRequest()->isPost()){
            $form->setData($this->params()->fromPost());
            if($form->isValid()){

            }
        }
        $view = new ViewModel();
        $view->setVariable('form',$form);
        return $view;
    }

    public function passwordAction()
    {
        $this->layout()->setTemplate('onepage/layout');
        $form = $this->serviceLocator->get('FormElementManager')->get('Application\Form\EmailForm');
        if($this->getRequest()->isPost()){
            $form->setData($this->params()->fromPost());
            if($form->isValid()){

            }
        }
        $view = new ViewModel();
        $view->setTemplate('application/user/email');
        $view->setVariable('form',$form);
        return $view;
    }
    public function passwordCodeAction()
    {
        $this->layout()->setTemplate('onepage/layout');
        $form = $this->serviceLocator->get('FormElementManager')->get('Application\Form\NewPasswordForm');
        if($this->getRequest()->isPost()){
            $form->setData($this->params()->fromPost());
            if($form->isValid()){

            }
        }
        $view = new ViewModel();
        $view->setVariable('form',$form);
        return $view;
    }

    public function logoutAction()
    {
        $this->redirect()->toRoute("user/login");
    }

    public function editAction()
    {
        $id = $this->params('id', false);
        $userModel = $this->getServiceLocator()->get('UserModel');
        $userModel->delete($id);
        $this->redirect()->toRoute('user/list');
    }

    public function addAction()
    {
        $this->layout()->header="Create User";
        $this->layout()->desc_header="New create user system";

        $view=new ViewModel();
        $view->setTemplate('/application/user/form');
        return $view;
    }

    public function deleteAction()
    {
        $id = $this->params('id', false);
        $userModel = $this->getServiceLocator()->get('UserModel');
        $result=$userModel->delete($id);
        $this->redirect()->toRoute('user');

    }
}
