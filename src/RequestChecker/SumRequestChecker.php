<?php

namespace RequestChecker;

use Exception\BadMaxSumException;
use Exception\BadMinSumException;
use Model\QiwiRequest;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class SumRequestChecker implements RequestCheckerInterface
{
    const MIN_SUM = 1;

    const MAX_SUM = 1000000;

    /**
     * @param QiwiRequest $request
     * @throws BadMaxSumException
     * @throws BadMinSumException
     */
    public function check(QiwiRequest $request)
    {
        if ($request->getSum() < SumRequestChecker::MIN_SUM) {
            throw new BadMinSumException();
        }

        if ($request->getSum() > SumRequestChecker::MAX_SUM) {
            throw new BadMaxSumException();
        }
    }
}
