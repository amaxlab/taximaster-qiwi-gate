<?php

namespace CommandHandler;

use It2k\TMApi\Manager;
use Model\PayProvider;
use Model\QiwiRequest;
use Model\QiwiResponse;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class PayCommandHandler implements CommandHandlerInterface
{
    const OPERATION_NAME = 'Qiwi платеж %s';

    const OPERATION_TYPE = 'receipt';

    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var PayProvider
     */
    private $payProvider;

    /**
     * PayCommandHandler constructor.
     * @param Manager $manager
     * @param PayProvider $payProvider
     */
    public function __construct(Manager $manager, PayProvider $payProvider)
    {
        $this->manager = $manager;
        $this->payProvider = $payProvider;
    }

    /**
     * @param QiwiRequest $request
     * @return QiwiResponse
     */
    public function handle(QiwiRequest $request)
    {
        $transactionId = $this->checkExistTransactionId($request->getAccount(), $request->getTxnDate(), $request->getTxnId());
        if (!$transactionId) {
            $transactionId = $this->manager->createDriverOperation(
                $request->getAccount(),
                $request->getSum(),
                PayCommandHandler::OPERATION_TYPE,
                sprintf(PayCommandHandler::OPERATION_NAME, $request->getTxnId())
            );
        }

        return (new QiwiResponse())
            ->setResult(0)
            ->setOsmpTxnId($request->getTxnId())
            ->setSum($request->getSum())
            ->setPrvTxn($transactionId)
            ;
    }

    /**
     * @param string $account
     * @param string $time
     * @return bool|int
     */
    protected function checkExistTransactionId($account, $time, $tnxId)
    {
        $operations = $this->manager->getDriverOperations($account, $time, $time);

        if (!empty($operations)) {
            foreach ($operations as $operation) {
                if ($operation['name'] == sprintf(PayCommandHandler::OPERATION_NAME, $tnxId)) {
                    return $operation['oper_id'];
                }
            }
        }

        return false;
    }
}
