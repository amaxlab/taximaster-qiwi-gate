<?php

namespace Model;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class PayProvider
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $commission;

    /**
     * @var string
     */
    private $comment;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getCommission()
    {
        return $this->commission;
    }

    /**
     * @param float $commission
     *
     * @return $this
     */
    public function setCommission($commission)
    {
        $this->commission = $commission;

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
