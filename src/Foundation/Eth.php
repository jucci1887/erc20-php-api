<?php
namespace Jucci1887\Ethereum\Foundation;


class Eth extends EthBase
{
    public function getTransactionCount(string $address, string $blockParameter = 'latest')
    {
        return $this->call('getTransactionCount', [$address, $blockParameter])
                    ->toString()
            ;
    }

    public function gasPrice()
    {
        return $this->call('gasPrice')
                    ->toString()
            ;
    }

    public function sendRawTransaction(string $hash)
    {
        return (string)$this->call('sendRawTransaction', [$hash]);
    }

    public function getEthBalance(string $address)
    {
        return (string)$this->call('getBalance',[$address,'latest']);
    }
}
