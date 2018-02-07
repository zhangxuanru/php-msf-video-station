<?php
$config['redis']['active'] = 'tw';
/**
 * 本地环境
 */
$config['redis']['p1']['ip']               = '127.0.0.1';
$config['redis']['p1']['port']             = 6379;
$config['redis']['tw']['ip'] = '127.0.0.1';
$config['redis']['tw']['port'] = 6379;
$config['redis']['asyn_max_count'] = 10;
return $config;
