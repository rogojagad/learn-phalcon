<?php

use Phalcon\Mvc\Model;

class Todos extends Model
{
    public $id;
    public $content;
    public $user_id;

    public function initialize()
    {
        $this->belongsTo(
            'user_id',
            'Users',
            'id'
        );
    }
}

