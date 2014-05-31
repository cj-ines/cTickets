<?php 
namespace Cticket\Model;

class Category
{
	public $id;
	public $name;
	public $description;
	public $status;
	public $created_at;
	public $updated_at; 

	public function exchangeArray($data)
	{
		$this->id 			= (isset($data['id'])) ? $data['id'] : null;
		$this->name 		= (isset($data['name'])) ? $data['name'] : null;
		$this->description 	= (isset($data['description'])) ? $data['description'] : null;
		$this->status 		= (isset($data['status'])) ? $data['status'] : null;
		$this->created_at 	= (isset($data['created_at'])) ? $data['created_at'] : null;
		$this->updated_at 	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
	}

}