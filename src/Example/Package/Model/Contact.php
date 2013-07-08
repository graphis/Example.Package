<?php
namespace Example\Package\Model;

use Example\Package\Model\AbstractModel;

class Contact extends AbstractModel
{
    protected $table = 'contact';

    public function insert($bind)
    {
        $connection = $this->getConnection();
        // create a new Insert object
        $insert = $connection->newInsert();

        // INSERT INTO foo (name, state, message, created_at)
        // VALUES (:name, :state, :message, NOW());
        $insert->into($this->table)
               ->cols(['name', 'state', 'message'])
               ->set('created_at', 'NOW()');

        $stmt = $connection->query($insert, $bind);
        return $stmt;
    }

    public function update($bind)
    {
        $connection = $this->getConnection();
        // create a new Update object
        $update = $connection->newUpdate();

        $cols = ['name', 'state', 'message'];
        $update->table($this->table)
               ->cols($cols)
               ->set('updated_at', 'NOW()')
               ->where('id = :id');

        $stmt = $connection->query($update, $bind);
        return $stmt;
    }
}
