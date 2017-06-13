<?php

namespace Service;

use CommandHandler\CommandHandlerInterface;
use Exception\BadCommandHandlerException;
use Model\QiwiRequest;
use Model\QiwiResponse;
use Pimple\Container;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiService
{
    /**
     * @var Container
     */
    private $pimple;

    /**
     * @param Container $pimple
     */
    public function __construct(Container $pimple)
    {
        $this->pimple = $pimple;
    }

    /**
     * @param QiwiRequest $request
     * @return QiwiResponse
     * @throws BadCommandHandlerException
     */
    public function handleRequest(QiwiRequest $request)
    {
        $commandHandler = $this->getCommandHandlerByName($request->getCommand());

        if (!$commandHandler instanceof CommandHandlerInterface) {
            throw new BadCommandHandlerException();
        }

        return $commandHandler->handle($request);
    }

    /**
     * @param string $name
     * @return CommandHandlerInterface
     */
    protected function getCommandHandlerByName($name)
    {
        return $this->pimple['qiwi.command.handler.'.$name];
    }
}
