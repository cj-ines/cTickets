<?php
namespace Cticket\Form;
 
use Zend\InputFilter\InputFilter;

class TicketFilter extends InputFilter 
{
	public function __construct()
	{
		
        $this->add(array(
            'name' => 'subject',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 3,
                    ),
                ),
            ),
        ));

		$this->add(array(
			'name' => 'category',
			'validators' => array(
				//'RegisterInArrayValidator' => false,
			),
		));

		$this->add(array(
            'name' => 'body',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 500,
                    ),
                ),
            ),
        ));
	}
}
