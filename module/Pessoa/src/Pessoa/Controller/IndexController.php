<?php

namespace Pessoa\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Paginator;
use Zend\View\Model\JsonModel;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\View\Model\ViewModel;

use Pessoa\Model\Pessoa;
use Pessoa\Form\PessoaForm;


class IndexController extends AbstractActionController
{
    protected $pessoaTable;

    public function homeAction()
    {
      return $this->redirect()->toRoute('home', array(
         'action' => 'index'
      ));
    }

    public function indexAction()
    {
      $form = new PessoaForm();

    	$pessoas = $this->getPessoaTable()->fetchAll();
    	$page =  $this->params()->fromRoute('page');

    	$paginator = new Paginator(new ArrayAdapter($pessoas));
    	$paginator->setCurrentPageNumber($page);
    	$paginator->setDefaultItemCountPerPage(10);

    	return new ViewModel(array('data' => $paginator, 'page' => $page, 'form' => $form));
    }


    public function addAction()
     {
         $form = new PessoaForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $pessoa = new Pessoa();
             $form->setInputFilter($pessoa->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $pessoa->exchangeArray($form->getData());
                 $this->getPessoaTable()->savePessoa($pessoa);

                 return $this->redirect()->toRoute('home', array(
                 		'action' => 'index'
                 ));
             }
         }
         return array('form' => $form);
     }

     public function editAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('home', array(
                 'action' => 'add'
             ));
         }


         try {
             $pessoa = $this->getPessoaTable()->getPessoa($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('home', array(
                 'action' => 'index'
             ));
         }

         $form  = new PessoaForm();
         $form->bind($pessoa);
         $form->get('submit')->setAttribute('value', 'Salvar');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($pessoa->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getPessoaTable()->savePessoa($pessoa);

                 return $this->redirect()->toRoute('home', array(
                 		'action' => 'index'
                 ));
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
     }


     public function deleteAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
         	return $this->redirect()->toRoute('home', array(
         			'action' => 'index'
         	));
         } else{
         		$this->getPessoaTable()->deletePessoa($id);
         		return $this->redirect()->toRoute('home' , array(
         				'action' => 'index'
         		));
         }

         return array(
             'id'    => $id,
             'pessoa' => $this->getPessoaTable()->getPessoa($id)
         );
     }



    public function getPessoaTable()
     {
         if (!$this->pessoaTable) {
             $sm = $this->getServiceLocator();
             $this->pessoaTable = $sm->get('Pessoa\Model\PessoaTable');
         }
         return $this->pessoaTable;
     }
}
