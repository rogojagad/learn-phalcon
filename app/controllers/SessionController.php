<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;

class SessionController extends Controller
{
    public function beforeExecuteRoute()
    {
        $restricted = ["create", "store"];
        $this->middleware($this->dispatcher->getActionName(), $restricted);
    }

    private function middleware($calledAction ,$actions)
    {
        if(in_array($calledAction, $actions))
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
