<?php

namespace Exception;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class AccountNotFoundException extends AbstractQiwiException
{
    protected $qiwiCode = 5;
}
