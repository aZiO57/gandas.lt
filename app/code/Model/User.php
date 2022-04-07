<?php

namespace Model;

use Core\ModelAbstract;

class User extends ModelAbstract
{
    const TABLE = 'users';

    private string $name;

    private string $lastName;

    private string $email;

    private string $password;

    private bool $active;

    private int $roleId;

    public function save()
    {
        if (isset($this->id)) {
        } else {
            $this->create();
        }
    }

    public function create()
    {
        $insert = $this->insert();
        $insert->into(self::TABLE);
        $insert->cols([
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->roleId,
            'actve' => 1,
        ]);
        $this->db->execute($insert);
    }

    public function assignData(): void
    {
        $this->data = [
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->active,
            'active' => $this->createdAt,
        ];
    }

    public function loginUser($username, $passwordas)
    {
        $sql = $this->select();
        $sql->cols(['*'])->from('users')->where('username = :username')->where('password = :password');
        $sql->bindValues(['username' => $username, 'password' => $passwordas]);
        $rez = $this->db->get($sql);
        if (!empty($rez)) {
            $this->load($rez['id']);
            return $this;
        } else {
            return null;
        }
    }
}
