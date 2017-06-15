<?php

namespace Transformer;

use Exception;
use Exception\AbstractQiwiException;
use Model\QiwiResponse;
use Symfony\Component\Form\FormErrorIterator;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class QiwiResponseTransformer
{
    /**
     * @param Exception|FormErrorIterator $data
     * @return QiwiResponse
     */
    public function transform($data)
    {
        if ($data instanceof Exception) {
            return $this->transformFromException($data);
        }

        if ($data instanceof FormErrorIterator) {
            return $this->transformFromFormErrors($data);
        }

        return (new QiwiResponse())->setResult(QiwiResponse::RESPONSE_ERROR);
    }

    /**
     * @param Exception $exception
     * @return QiwiResponse
     */
    private function transformFromException(Exception $exception)
    {
        return (new QiwiResponse())
            ->setResult((($exception instanceof AbstractQiwiException) ? $exception->getQiwiCode() : QiwiResponse::RESPONSE_ERROR))
            ->setComment($exception->getMessage())
            ;
    }

    /**
     * @param FormErrorIterator $errors
     * @return QiwiResponse
     */
    private function transformFromFormErrors($errors)
    {
        $messages = [];

        foreach ($errors as $error) {
            foreach ($error as $item) {
                $messages[] = '['.$item->getCause()->getPropertyPath().'] '.$item->getMessage();
            }
        }

        return (new QiwiResponse())
            ->setResult(QiwiResponse::RESPONSE_ERROR)
            ->setComment(implode(',', $messages))
            ;
    }
}
