<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class TodoRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths(
            [
                'controller' => 'todo',
            ]
        );

        $this->setPrefix('/todo');
        
        $this->addGet(
            '/:int',
            [
                'action'     => 'show',
                'id'         => 1,
            ]
        );

        $this->addPost(
            '/store',
            [
                'action' => 'store',
            ]
        );
        
    }
}

