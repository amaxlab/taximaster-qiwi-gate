<?php

namespace ServiceProvider;

use It2k\TMApi\Manager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class TMAPIServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['tmapi.manager'] = function ($pimple) {
            return new Manager($pimple['config.tmapi']);
        };
    }
}
