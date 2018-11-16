# Phalcon Project for Tutorial

## Before Running:
+ Create *cache* folder in /app folder
+ Create *config.php* in /app/config file that returns object of *Phalcon/Config*
```
<?php

use Phalcon\Config;

return new Config([

    'database' => [
        'adapter' => 'Phalcon\Db\Adapter\Pdo\Mysql',
        'host' => 'INSERT YOUR DB HOST HERE',
        'username' => 'INSERT YOUR DB USERNAME HERE',
        'password' => 'INSERT YOUR DB PASSWORD HERE',
        'dbname' => 'INSERT YOUR DB NAME HERE',
    ],
    'url' => [
        'baseUrl' => 'INSERT YOUR APP'S BASE URL HERE'
    ]
]);
```
