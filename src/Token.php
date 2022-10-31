<?php
namespace Jucci1887\Ethereum;

use Jucci1887\Ethereum\Foundation\StandardERC20Token;
use Jucci1887\Ethereum\Utils\Number;


class Token extends StandardERC20Token
{
    protected $contractAddress;

    public function __construct($contractAddress, $ethClient, $timeout = 3)
    {
        $this->contractAddress = $contractAddress;
        parent::__construct($ethClient, $timeout);
    }

    public function name(): string
    {
        return $this->call('name')[0];
    }

    public function symbol(): string
    {
        return $this->call('symbol')[0];
    }

    public function decimals(): int
    {
        return intval($this->call('decimals')[0]->toString());
    }

    /**
     * @param string $address
     * @return string
     */
    public function balanceOf(string $address)
    {
        return Number::scaleDown($this->call('balanceOf', [$address])['balance']->toString(), $this->decimals());
    }
}
