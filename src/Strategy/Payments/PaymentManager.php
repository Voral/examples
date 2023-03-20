<?php

namespace Vasoft\Examples\Strategy\Payments;

use Vasoft\Examples\Strategy\Contracts\PayMethodInterface;

class PaymentManager
{

    /** @props PayMethodInterface[] */
    public function __construct(
        private readonly array $payments = []
    )
    {
    }

    public function get(string $paymentCode): PayMethodInterface
    {
        if (!array_key_exists($paymentCode, $this->payments)) {
            throw new \Exception('Unknown payment method ' . $paymentCode);
        }
        return new $this->payments[$paymentCode]();
    }
}