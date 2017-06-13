<?php

namespace CommandHandler;

use Model\QiwiRequest;
use Model\QiwiResponse;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class PayCommandHandler implements CommandHandlerInterface
{
    /**
     * @param QiwiRequest $request
     * @return QiwiResponse
     */
    public function handle(QiwiRequest $request)
    {
        return new QiwiResponse();
    }
}
