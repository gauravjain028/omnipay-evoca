<?php

namespace Omnipay\Evoca\Message;

/**
 * Class DepositRequest
 * @package Omnipay\Evoca\Message
 */
class DepositRequest extends AbstractRequest
{
    /**
     * @return array|mixed
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('transactionId', 'amount');

        $data = [];

        $data['orderId'] = $this->getTransactionId();

        if ($this->getAmount()) {
            $data['amount'] = $this->getAmount();
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getUrl() . '/deposit.do';
    }
}
