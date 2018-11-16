<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;

class UserController extends BaseController
{
    public function beforeExecuteRoute()
    {
        $restricted = ['create', 'store'];

        $this->_middleware($this->dispatcher->getActionName(), $restricted);
    }

    protected function _middleware($calledAction, $restrictedActions)
    {
        // Act as middleware to check whether the user is already log in or not
        // Can be overridden as needed

        if(in_array($calledAction, $restrictedActions))
        {
            if($this->session->has('auth'))
            {
                $this->response->redirect()->send();
            }
        }
    }

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