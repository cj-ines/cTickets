<?php 
namespace Cticket\Model;

class Category
{
	public $id;
	public $name;
	public $description;
	public $status;

	public function exchangeArray($data)
	{
		$this->id 			= (isset($data['id'])) ? $data['id'] : null;
		$this->name 		= (isset($data['name'])) ? $data['name'] : null;
		$this->description 	= (isset($data['description'])) ? $data['description'] : null;
		$this->status 		= (isset($data['status'])) ? $data['status'] : null;
	}

}