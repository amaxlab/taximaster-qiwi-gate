<?php

namespace CommandHandler;

use Model\QiwiRequest;
use Model\QiwiResponse;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
interface CommandHandlerInterface
{
    /**
     * @param QiwiRequest $request
     * @return QiwiResponse
     */
    public function handle(QiwiRequest $request);
}
