<?php

namespace Core;

use Aura\SqlQuery\QueryFactory;

class ModelAbstract
{
    protected $id;

    protected QueryFactory $queryFactory;

    protected DB $db;

    protected const TABLE = '';

    public function __construct()
    {
        $this->queryFactory = new QueryFactory('mysql');
        $this->db = new DB();
    }

    protected function select()
    {
        return  $this->queryFactory->newSelect();
    }

    protected function insert()
    {
        return  $this->queryFactory->newInsert();
    }

    protected function update()
    {
        return $this->queryFactory->newUpdate();
    }


    protected function delete()
    {
        return $this->queryFactory->newDelete();
    }

    public function save(): void
    {
        $this->assignData();
        $this->create();
    }

    protected function assignData(): void
    {
        $this->data = [];
    }
    protected function create()
    {
        $insert = $this->insert();
        $insert->into(static::TABLE)->cols($this->data);
        $this->db->execute($insert);
    }
    protected function edit(): void
    {
        $update = $this->update();
        $update->table(static::TABLE)->cols($this->data);
        $this->db->execute($update);
    }
}
