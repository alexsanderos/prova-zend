<?php

namespace Pessoa;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Pessoa\Model\Pessoa;
use Pessoa\Model\PessoaTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
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

    /*
    * Configurando um serviçe config para injeção de dependência
    */

    public function getServiceConfig(){
      return array(
        'factories' => array(
               'Pessoa\Model\PessoaTable' =>  function($sm) {
                   $tableGateway = $sm->get('PessoaTableGateway');
                   $table = new PessoaTable($tableGateway);
                   return $table;
               },
               'PessoaTableGateway' => function ($sm) {
                   $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                   $resultSetPrototype = new ResultSet();
                   $resultSetPrototype->setArrayObjectPrototype(new Pessoa());
                   return new TableGateway('pessoas', $dbAdapter, null, $resultSetPrototype);
               }
           ),
      );
    }
}
