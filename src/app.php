<?php

use ServiceProvider\QiwiServiceProvider;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\SerializerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new QiwiServiceProvider());
$app->register(new SerializerServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new ValidatorServiceProvider());

$app['serializer.normalizers'] = function () {
    return array(new CustomNormalizer(), new GetSetMethodNormalizer(null, new CamelCaseToSnakeCaseNameConverter()));
};

$app['qiwi.command.handler.check'] = function () {
    return new \CommandHandler\CheckCommandHandler();
};

$app['qiwi.command.handler.pay'] = function () {
    return new \CommandHandler\PayCommandHandler();
};

return $app;
