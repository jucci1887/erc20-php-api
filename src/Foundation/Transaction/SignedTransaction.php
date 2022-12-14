<?php
namespace Jucci1887\Ethereum\Foundation\Transaction;


use Exception;
use Jucci1887\Ethereum\Foundation\Eth;

class SignedTransaction
{
    private $hash;
    private $eth;

    public function __construct(string $hash, Eth $eth = null)
    {
        $this->hash = $hash;
        $this->eth  = $eth;
    }

    public function getSignedHash()
    {
        return $this->hash;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function send()
    {
        if (!isset($this->eth))
        {
            throw new Exception('Eth client not provided. Signed transaction have not be broadcasted');
        }

        return $this->eth->sendRawTransaction($this->hash);
    }
}
