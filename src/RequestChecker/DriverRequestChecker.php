<?php

namespace RequestChecker;

use Exception\AccountNotFoundException;
use Exception\BadAccountFormatException;
use It2k\TMApi\Manager;
use Model\QiwiRequest;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class DriverRequestChecker implements RequestCheckerInterface
{
    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var
     */
    private $accountFormat;

    /**
     * DriverRequestChecker constructor.
     * @param Manager $manager
     * @param string $accountFormat
     */
    public function __construct($manager, $accountFormat)
    {
        $this->manager = $manager;
        $this->accountFormat = $accountFormat;
    }

    /**
     * @param QiwiRequest $request
     */
    public function check(QiwiRequest $request)
    {
        $this->checkAccountFormat($request->getAccount());
        $this->checkExistingAccount($request->getAccount());
    }

    /**
     * @param string $account
     * @throws BadAccountFormatException
     */
    private function checkAccountFormat($account)
    {
        if (!preg_match($this->accountFormat, $account)) {
            throw new BadAccountFormatException();
        }
    }

    /**
     * @param string $account
     * @throws AccountNotFoundException
     */
    private function checkExistingAccount($account)
    {
        try {
            $this->manager->getDriverInfo($account);
        } catch (\Exception $exception) {
            throw new AccountNotFoundException();
        }
    }
}
