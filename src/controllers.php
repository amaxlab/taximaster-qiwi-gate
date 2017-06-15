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
        return new Response($app['serializer']->serialize($app['qiwi.transformer.qiwi_response']->transform($form->getErrors(true, false)), 'xml'));
    }

    return $app['serializer']->serialize($app['service.qiwi']->handleRequest($form->getData()), 'xml');
})
->bind('homepage')
;

$app->error(function (\Exception $e) use ($app) {
//    if ($app['debug']) {
//        return;
//    }
    return new Response($app['serializer']->serialize(($app['qiwi.transformer.qiwi_response']->transform($e)), 'xml'));
});
