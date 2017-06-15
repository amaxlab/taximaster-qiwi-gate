<?php

namespace Exception;

use Exception;
use Model\QiwiResponse;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
abstract class AbstractQiwiException extends Exception
{
    /**
     * @var int
     */
    protected $qiwiCode = QiwiResponse::RESPONSE_ERROR;

    /**
     * @return int
     */
    public function getQiwiCode()
    {
        return $this->qiwiCode;
    }
}
