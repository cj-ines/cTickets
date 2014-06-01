<?php
// Main Controller
namespace Cticket\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cticket\Form\TicketForm;
use Cticket\Model\Ticket;
use Zend\Stdlib\Hydrator;


class MainController extends AbstractActionController
{
    
	private $ticketTable;
    private $categoryTable;

    private $ticketForm;

    public function indexAction()
    {
        
        $table = $this->getTicketTable();
        //echo $data = $table->getById(1)->subject;
        return new ViewModel();
    }

    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        if (!$ticket = $this->getTicketTable()->getById($id)) {
             $this->redirect()->toRoute('cticket',array('action' => 'index'));
        }
        return new ViewModel(array(
            'ticket' => $ticket,
        ));

    }

    public function createAction()
    {
        $error = null;
        $this->setCategoryOptions();
        $form = $this->getTicketForm();
        //$form->get('category')->setValue($categories));
        return new ViewModel(array(
            'form' => $form,
            'error' => $error,
        ));
    }

    public function saveAction()
    {
        $error = null;
        $request = $this->getRequest();
        $form = $this->getTicketForm();
        if ($request->isPost()) {
            $ticket = new Ticket();
            $form->setData($request->getPost());
            
            if (!$form->isValid()) { 
                $error = $form->getMessages();
                $model = new ViewModel(array(
                    'form' => $form,
                    'error' => $error,
                ));
                $model->setTemplate('users/user-manager/edit');
            }
            else {
                $ticket->exchangeArray($form->getData());
                //$ticket->setCreatedAt();
                $this->getTicketTable()->save($ticket);
            }
           
        }
    }

    public function editAction()
    {
        
        $error = null;
        $request = $this->getRequest();
        $form = $this->getTicketForm();
        $this->setCategoryOptions();
        $id = $this->params()->fromRoute('id');
        if (!$ticket = $this->getTicketTable()->getById($id)) {
             $this->redirect()->toRoute('cticket',array('action' => 'create'));
        }
        $form->bind($ticket);
        return new ViewModel(array(
            'form' => $form,
            'error' => $error,
        ));
    }
    
    public function setCategoryOptions()
    {
        $categories = array();
        $categories_object = $this->getCategoryTable()->fetchAllbyStatus(1);

        foreach ($categories_object as $key => $value) {
            $categories[$value->id] = $value->name;
        }
        $form = $this->getTicketForm();
        $form->get('category')->setValueOptions($categories); 
    }
    public function getTicketTable()
    {
		if (!$this->ticketTable) {
			$this->ticketTable = $this->getServiceLocator()->get('TicketTable');
		}
		return $this->ticketTable;
    }

    public function getCategoryTable()
    {
        if (!$this->categoryTable) {
            $this->categoryTable = $this->getServiceLocator()->get('CategoryTable');
        }
        return $this->categoryTable;
    }

    public function getTicketForm()
    {
        if (!$this->ticketForm) {
            $this->ticketForm = $this->getServiceLocator()->get('TicketForm');
        }
        return $this->ticketForm;
    }
}