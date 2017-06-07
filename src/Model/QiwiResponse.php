<?php

namespace Model;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiResponse
{
    /**
     * @var int
     */
    protected $osmpTxnId;

    /**
     * @var int
     */
    protected $prvTxn;

    /**
     * @var float
     */
    protected $sum;

    /**
     * @var int
     */
    protected $result;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @return int
     */
    public function getOsmpTxnId()
    {
        return $this->osmpTxnId;
    }

    /**
     * @param int $osmpTxnId
     *
     * @return $this
     */
    public function setOsmpTxnId($osmpTxnId)
    {
        $this->osmpTxnId = $osmpTxnId;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrvTxn()
    {
        return $this->prvTxn;
    }

    /**
     * @param int $prvTxn
     *
     * @return $this
     */
    public function setPrvTxn($prvTxn)
    {
        $this->prvTxn = $prvTxn;

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

    /**
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param int $result
     *
     * @return $this
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }
}
