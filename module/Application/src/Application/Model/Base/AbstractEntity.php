<?php
namespace Application\Model\Base;


class AbstractEntity
{
    public function __construct()
    {
        $this->exchangeArray(array());
    }

    public function exchangeArray($data = array())
    {
        if (is_array($data) && !empty($data)) {
            $fields = get_object_vars($this);
            foreach ($fields as $field=>$value) {
                $this->$field = isset($data[$field]) ? $data[$field] : null;
            }
        }

    }
} 