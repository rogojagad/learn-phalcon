<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;

class SessionController extends BaseController
{
    public function beforeExecuteRoute()
    {
        $restricted = ["create", "store"];
        
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
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $user = Users::findFirst("name='$username'");

        if ($user && $password === $user->password)
        {
            $this->_registerSession($user);

            (new Response())->redirect()->send();
        }
    }

    private function _registerSession($user)
    {
        $this->session->set(
            'auth',
            [
                'id' => $user->id,
                'username' => $user->name,
            ]
        );
    }

    public function destroyAction()
    {
        $this->session->destroy();
        $this->response->redirect();
    }
}
