<?php

use Model\QiwiResponse;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/** @var $app Application */
$app->get('/', function () use ($app) {
    $response = $app['service.qiwi']->handleRequest($app['request_stack']->getCurrentRequest());

    return $app['serializer']->serialize($response, 'xml');
})
->bind('homepage')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    return new Response($app['serializer']->serialize((new QiwiResponse())->setResult(1), 'xml'), $code);
});
