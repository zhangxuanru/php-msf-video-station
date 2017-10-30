<?php
/**
 * MYSQL
 */
$config['mysql']['master']['host']            = '127.0.0.1';
$config['mysql']['master']['port']            = 3306;
$config['mysql']['master']['user']            = 'root';
$config['mysql']['master']['password']        = 'abc123123';
$config['mysql']['master']['charset']         = 'utf8';
$config['mysql']['master']['database']        = '13520v';

$config['mysql']['slave1']['host']           = '127.0.0.1';
$config['mysql']['slave1']['port']           = 3306;
$config['mysql']['slave1']['user']           = 'root';
$config['mysql']['slave1']['password']       = 'abc123123';
$config['mysql']['slave1']['charset']        = 'utf8';
$config['mysql']['slave1']['database']       = '13520v';
 

$config['mysql_proxy']['master_slave'] = [
    'pools' => [
        'master' => 'master',
        'slaves' => ['slave1'],
    ],
    'mode' => \PG\MSF\Marco::MASTER_SLAVE,
];

return $config;
