<?php
namespace Application\Model\Base;


use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;

class AbstractModel extends AbstractTableGateway
{

    public function __construct(Adapter $adapter,$table,$object)
    {
        $this->adapter = $adapter;
        $this->table=$table;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype($object);

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function get($id)
    {
        $id  = (int) $id;

        $rowset = $this->select(array(
            'id' => $id,
        ));

        $row = $rowset->current();

        if (!$row) {
            throw new \Exception("Could not find row $id");
        }

        return $row;
    }

    public function save($user)
    {
        $data = array(
            'artist' => $user->artist,
            'title'  => $user->title,
        );

        $id = (int) $user->id;

        if ($id == 0) {
            $this->insert($data);
        } elseif ($this->get($id)) {
            $this->update(
                $data,
                array(
                    'id' => $id,
                )
            );
        } else {
            throw new \Exception('Form id does not exist');
        }
    }

    public function delete($id)
    {
        parent::delete(array(
            'id' => $id,
        ));
    }
} 