<?php

namespace RequestChecker;

use Model\QiwiRequest;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class DriverRequestChecker implements RequestCheckerInterface
{
    /**
     * @param QiwiRequest $request
     */
    public function check(QiwiRequest $request)
    {
    }
}
