<?php

namespace Exception;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class BadAccountFormatException extends AbstractQiwiException
{
    protected $qiwiCode = 4;
}
