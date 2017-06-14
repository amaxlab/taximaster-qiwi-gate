<?php

use Form\Type\QiwiRequestType;
use Model\QiwiResponse;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/** @var $app Application */
$app->get('/', function () use ($app) {
    $form = $app['form.factory']
        ->create(QiwiRequestType::class)
        ->submit($app['request_stack']->getCurrentRequest()->query->all())
    ;

    if (!$form->isValid()) {
        return new Response($app['serializer']->serialize((new QiwiResponse())->setResult(300), 'xml'));
    }

    return $app['serializer']->serialize($app['service.qiwi']->handleRequest($form->getData()), 'xml');
})
->bind('homepage')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    return new Response($app['serializer']->serialize((new QiwiResponse())->setResult(1), 'xml'));
});
