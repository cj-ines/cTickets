<?php
namespace Cticket\Model;

use Zend\Db\TableGateway\TableGateway;

class CategoryTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
	}

	public function getById($id)
	{
		$id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            return false;
        }
        return $row;
	}

	public function save(Category $object)
	{
		$data = array(
            'name'		    => $object->name,
            'description' 	=> $object->description,
            'created_at'	=> $object->created_at,
            'updated_at'	=> $object->updated_at,
            'status'		=> $object->status,
        );

        $id = (int)$object->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
	}

	public function delete($id) 
	{
		$this->tableGateway->delete(array('id' => $id));
	}
}