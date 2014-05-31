<?php
namespace Cticket\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class TicketForm extends Form
{
	public function __construct($name = null) 
	{
		parent::__construct();

		$this->setName($name);
		$this->setAttribute('method', 'post');

		$this->add(array(
			'name' => 'id',
			'type' => 'hidden',
		));

		$this->add(array(
			'name'	=> 'subject',
			'type'	=>	'text',
			'options' => array(
				'label' => 'Subject',
			),
		));
	}
}