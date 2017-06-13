<?php

namespace ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Service\QiwiService;

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
        $pimple['service.qiwi'] = function ($pimple) {
            return new QiwiService($pimple);
        };
    }
}
