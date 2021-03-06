<?php
namespace Cticket;

use Cticket\Model\Ticket;
use Cticket\Model\TicketTable;
use Cticket\Model\Category;
use Cticket\Model\CategoryTable;

use Cticket\Form\TicketForm;
use Cticket\Form\TicketFilter;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
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
                'TicketTable' =>  function($sm) {
                    $tableGateway = $sm->get('TicketTableGateway');
                    $table = new TicketTable($tableGateway);
                    return $table;
                },
                'CategoryTable' =>  function($sm) {
                    $tableGateway = $sm->get('CategoryTableGateway');
                    $table = new CategoryTable($tableGateway);
                    return $table;
                },
                'TicketTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Ticket());
                    return new TableGateway('cticket_ticket', $dbAdapter, null, $resultSetPrototype);
                },
                'CategoryTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Category());
                    return new TableGateway('cticket_category', $dbAdapter, null, $resultSetPrototype);
                },
                // FORMS
                'TicketForm' => function ($sm) {
                    $form = new TicketForm();
                    $form->setInputFilter($sm->get('TicketFilter'));
                    return $form;
                },

                // FILTERS
                'TicketFilter' => function ($sm) {
                    return new TicketFilter();
                }
            ),
        );
    }
}
