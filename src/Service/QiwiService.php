<?php

namespace Service;

use Model\QiwiResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiService
{
    /**
     * @param Request $request
     *
     * @return QiwiResponse
     */
    public function handleRequest(Request $request)
    {
        return (new QiwiResponse())->setResult(300)->setSum(123.21)->setComment('asdsa')->setOsmpTxnId(123213)->setPrvTxn(123123);
    }
}
