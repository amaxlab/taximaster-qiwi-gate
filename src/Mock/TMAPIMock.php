<?php

namespace Mock;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class TMAPIMock
{
    /**
     * @param $account
     *
     * @throws \Exception
     */
    public function getDriverInfo($account)
    {
        if ($account != '666') {
            throw new \Exception();
        }
    }

    /**
     * @return array
     */
    public function getDriverOperations()
    {
        return [];
    }

    /**
     * @return int
     */
    public function createDriverOperation()
    {
        return 666;
    }
}
