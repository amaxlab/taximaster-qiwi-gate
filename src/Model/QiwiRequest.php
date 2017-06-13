<?php

namespace Model;

use DateTime;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiRequest
{
    /**
     * @var string
     */
    protected $command;

    /**
     * @var int
     */
    protected $txnId;

    /**
     * @var DateTime
     */
    protected $txnDate;

    /**
     * @var string
     */
    protected $account;

    /**
     * @var float
     */
    protected $sum;

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param string $command
     *
     * @return $this
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @return int
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * @param int $txnId
     *
     * @return $this
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTxnDate()
    {
        return $this->txnDate;
    }

    /**
     * @param DateTime $txnDate
     *
     * @return $this
     */
    public function setTxnDate($txnDate)
    {
        $this->txnDate = $txnDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param string $account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     *
     * @return $this
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }
}
