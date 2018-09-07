<?php

// configure your app for the production environment

//$app['twig.path'] = array(__DIR__.'/../templates');
//$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app['config.account.format'] = '/^\d/';
$app['config.payment.hold_percent'] = 5;
$app['config.tmapi'] = [
    'schema' => 'https',
    'ip' => '127.0.0.1',
    'port' => 8089,
    'timeout' => 10,
    'secret_key' => 'secret',
];
