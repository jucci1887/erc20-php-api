<?php
namespace Jucci1887\Ethereum\Foundation\Contracts;


use Jucci1887\Ethereum\Foundation\ERC20;

interface EventLogBuilderInterface
{
    public function build(\stdClass $log): array;

    public function setContract(ERC20 $contract);
}
