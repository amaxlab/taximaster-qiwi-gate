<?php

namespace ServiceProvider;

use CommandHandler\CheckCommandHandler;
use CommandHandler\PayCommandHandler;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use RequestChecker\DriverRequestChecker;
use RequestChecker\SumRequestChecker;
use Service\QiwiService;
use Transformer\QiwiResponseTransformer;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiServiceProvider implements ServiceProviderInterface
{

    /**
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['qiwi.request.checkers'] = ['driver', 'sum'];

        $pimple['service.qiwi'] = function ($pimple) {
            return new QiwiService($pimple);
        };

        $pimple['qiwi.command.handler.check'] = function () {
            return new CheckCommandHandler();
        };

        $pimple['qiwi.command.handler.pay'] = function ($pimple) {
            return new PayCommandHandler($pimple['tmapi.manager'], $pimple['config.payment.hold_percent']);
        };

        $pimple['qiwi.request.checker.driver'] = function ($pimple) {
            return new DriverRequestChecker($pimple['tmapi.manager'], $pimple['config.account.format']);
        };

        $pimple['qiwi.request.checker.sum'] = function () {
            return new SumRequestChecker();
        };

        $pimple['qiwi.transformer.qiwi_response'] = function () {
            return new QiwiResponseTransformer();
        };
    }
}
