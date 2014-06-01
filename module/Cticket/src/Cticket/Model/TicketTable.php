<?php
namespace Cticket\Model;

use Zend\Db\TableGateway\TableGateway;

class TicketTable
{
	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
        return $resultSet;
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

	public function save(Ticket $ticket)
	{
		$data = array(
            'subject'		=> $ticket->subject,
            'body' 			=> $ticket->body,
            'created_at'	=> $ticket->created_at,
            'updated_at'	=> $ticket->updated_at,
            'status'		=> $ticket->status,
            'priority'		=> $ticket->priority,
            'email'			=> $ticket->email,
            'contact'		=> $ticket->contact,
            'category'       => $ticket->category,
        );

        $id = (int)$ticket->id;
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