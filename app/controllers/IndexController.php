<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends Controller
{
    public function show404Action($message)
    {
        $this->view->setVars([
            'message' => $message,
        ]);
    }
}