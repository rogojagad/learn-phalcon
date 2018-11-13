<?php

use Phalcon\Config;

return new Config([

    'database' => [
        'adapter' => 'Phalcon\Db\Adapter\Pdo\Mysql',
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'dbname' => 'example-phalcon',
    ],
    'url' => [
        'baseUrl' => 'http://localhost/example-phalcon/'
    ]
]);