<?php

namespace CommandHandler;

use Model\QiwiRequest;
use Model\QiwiResponse;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class CheckCommandHandler implements CommandHandlerInterface
{
    /**
     * @param QiwiRequest $request
     * @return QiwiResponse
     */
    public function handle(QiwiRequest $request)
    {
        return (new QiwiResponse())->setResult(0)->setOsmpTxnId($request->getTxnId());
    }
}
