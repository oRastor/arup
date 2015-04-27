<?php

return array('db' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'auto',
        'options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8;',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        )
    )
);
