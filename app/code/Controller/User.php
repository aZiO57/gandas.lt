<?php

declare(strict_types=1);

namespace Controller;

use Core\CollectionAbstract;

class User extends CollectionAbstract
{
    public function register()
    {
        echo $this->twig->render('user/register.html');
    }

    public function login()
    {
        echo $this->twig->render('user/login.html');
    }

    public function check()
    {
        $user = new \Model\User();
        $user = $user->loginUser($_POST['username'], $_POST['password']);
        if ($user !== null) {
            $user->save();
            $_SESSION['user_id'] = $user->getId();
        } else {
            echo 'Blogas prisijungimas';
        }
    }

    public function create()
    {
        $insert = $this->insert();
        $insert->into('users');
        $insert->cols([
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'nickname' => $this->nickname,
        ]);
        $insert->save();
    }
}
