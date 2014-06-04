<?php
namespace Cticket\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cticket\Form\TicketForm;
use Cticket\Model\Ticket;
use Zend\Stdlib\Hydrator;

class TicketController extends AbstractActionController
{
	function indexAction(){
		echo "yesh";
	}
	
	function viewAction(){
		$id = $this->params()->fromRoute('id');
		echo $id;
	}
}