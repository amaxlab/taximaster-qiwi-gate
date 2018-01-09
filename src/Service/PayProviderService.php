<?php

namespace Service;

use Model\PayProvider;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class PayProviderService
{
    /**
     * @param string $ip
     * @return PayProvider
     */
    public function getPayProvider($ip)
    {
        return (new PayProvider());
    }
}
