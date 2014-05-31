<?php
namespace Cticket\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MainController extends AbstractActionController
{
    
	private $ticketTable;
    public function indexAction()
    {
        
        $table = $this->getTicketTable();
        //echo $data = $table->getById(1)->subject;
        return new ViewModel();
    }

    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        if ($id == 0) {
            $this->redirect()->toRoute('cticket',array('action' => 'index'));
        }
        
        $ticket = $this->getTicketTable()->getById($id);
        return new ViewModel(array(
            'ticket' => $ticket,
        ));

    }

    public function createAction()
    {
        return new ViewModel();
    }

    public function getTicketTable()
    {
		if (!$this->ticketTable) {
			$this->ticketTable = $this->getServiceLocator()->get('Cticket\Model\TicketTable');
		}

		return $this->ticketTable;
    }
}