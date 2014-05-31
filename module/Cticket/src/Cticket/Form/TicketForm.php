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

		$this->add(array(
			'name' => 'category',
			'type' => 'select',
			'options' => array(
				'label' => 'Category',
				'empty_options' => 'Select Here',
				'value_options' => array(),
			),
		));

		$this->add(array(
			'name' => 'priority',
			'type' => 'select',
			'options' => array(
				'label' => 'Priotity',
				'empty_options' => 'Select Here',
				'value_options' => array(
					'1' => 'High',
					'2' => 'Medium',
					'3' => 'Low'),
			),
		));

		$this->add(new Element\Csrf('security'));
		$this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Submit Ticket',
            ),
        ));
	}
}