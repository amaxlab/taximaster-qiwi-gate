<?php

namespace Exception;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class BadRequestCheckerException extends AbstractQiwiException
{
    const MESSAGE = 'Checker %s not instanceof RequestCheckerInterface';
}
