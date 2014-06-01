<?php 
namespace Cticket\Model;

use Zend\Stdlib\DateTime;

class Ticket
{
	public $id;
	public $subject;
	public $body;
	public $created_at;
	public $updated_at;
	public $status;
	public $priority;
	public $email;
	public $contact;
	public $category;

	public function exchangeArray($data)
	{
		$this->id 			= (isset($data['id'])) ? $data['id'] : null;
		$this->subject 		= (isset($data['subject'])) ? $data['subject'] : null;
		$this->body 		= (isset($data['body'])) ? $data['body'] : null;
		$this->created_at 	= (isset($data['created_at'])) ? $data['created_at'] : null;
		$this->updated_at 	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
		$this->status 		= (isset($data['status'])) ? $data['status'] : null;
		$this->priority 	= (isset($data['priority'])) ? $data['priority'] : null;
		$this->email 		= (isset($data['email'])) ? $data['email'] : null;
		$this->contact 		= (isset($data['contact'])) ? $data['contact'] : null;
		$this->category 	= (isset($data['category'])) ? $data['category'] : null;
	}

	public function setCreatedAt()
	{
		$date = new \DateTime();
		$date->format('Y-m-d H:i:s');
		$this->created_at = $date;
	}

	public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}