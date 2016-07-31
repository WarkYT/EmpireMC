<?php

return [
    'connection' => [
        'orm_default' => [
//            'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
            'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
            'params' => [
                'host' => 'localhost',
//                'port' => '3306',
                'port' => '5432',
                'dbname' => 'tests_mc',
                'user' => 'LOGIN_TESTS_MC',
                'password' => 'aKaRAmb4',
//                'charset' => 'utf8',
//                'driverOptions' => [
//                    1002 => 'SET NAMES utf8'
//                ]
            ]
        ],
    ]
];
