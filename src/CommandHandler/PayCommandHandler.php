<?php

namespace CommandHandler;

use It2k\TMApi\Manager;
use Model\QiwiRequest;
use Model\QiwiResponse;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class PayCommandHandler implements CommandHandlerInterface
{
    const OPERATION_NAME = 'Qiwi платеж %s';

    const OPERATION_TYPE = 'receipt';

    const SUM_ROUND = 2;


    /**
     * @var Manager
     */
    private $manager;

    /**
     * @var float
     */
    private $paymentHoldPercent;

    /**
     * PayCommandHandler constructor.
     * @param Manager $manager
     * @param float $paymentHoldPercent
     */
    public function __construct($manager, $paymentHoldPercent)
    {
        $this->manager = $manager;
        $this->paymentHoldPercent = $paymentHoldPercent;
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
                $this->calcOperSum($request->getSum()),
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
     * @param string $tnxId
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

    /**
     * @param float $sum
     * @return float
     */
    protected function calcOperSum($sum)
    {
        return round($sum - ($sum * $this->paymentHoldPercent / 100), PayCommandHandler::SUM_ROUND);
    }
}
