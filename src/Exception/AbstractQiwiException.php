<?php

namespace Exception;

use Exception;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
abstract class AbstractQiwiException extends Exception
{
    /**
     * @var int
     */
    protected $qiwiCode = 300;

    /**
     * @return int
     */
    public function getQiwiCode()
    {
        return $this->qiwiCode;
    }
}
