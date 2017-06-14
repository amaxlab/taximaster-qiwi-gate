<?php

namespace RequestChecker;

use Model\QiwiRequest;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface RequestCheckerInterface
{
    /**
     * @param QiwiRequest $request
     */
    public function check(QiwiRequest $request);
}
