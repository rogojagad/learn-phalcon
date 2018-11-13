<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;

class UserController extends Controller
{
    public function createAction()
    {

    }

    public function storeAction()
    {
        $user = new Users();

        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        $email = $this->request->getPost('email');

        $user->name = $username;
        $user->password = $password;
        $user->email = $email;

        if ($user->save() === false)
        {
            foreach ($user->getMessages() as $message) {
                echo $message, "\n";
            }
        }
    }
}