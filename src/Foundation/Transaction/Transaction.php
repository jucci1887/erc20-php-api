<?php
namespace Jucci1887\Ethereum\Foundation\Transaction;

use kornrunner\Ethereum\Transaction as BaseTransaction;
use Jucci1887\Ethereum\Foundation\Eth;

class Transaction
{
    private $transaction;
    private $eth;

    public function __construct(BaseTransaction $transaction, Eth $eth = null)
    {
        $this->transaction = $transaction;
        $this->eth         = $eth;
    }

    public function sign($privateKey)
    {
        $privateKey = str_replace('0x', '', $privateKey);
        return new SignedTransaction('0x' . $this->transaction->getRaw($privateKey), $this->eth);
    }
}
