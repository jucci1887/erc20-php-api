<?php
namespace Jucci1887\Ethereum\Utils;


use phpseclib\Math\BigInteger;
use Web3\Utils;

class Number
{
    public static function scaleDown(string $number, int $decimals)
    {
        return bcdiv($number, bcpow("10", strval($decimals)), 0);
    }

    public static function scaleUp(string $number, int $decimals): string
    {
        return bcmul($number, bcpow("10", strval($decimals)),0);
    }

    public static function bigIntegerPow($base, $power)
    {
        $number = new BigInteger($base);
        for ($i = 1; $i < $power; $i++)
        {
            $number = $number->multiply(new BigInteger($base));
        }
        return $number;
    }

    public static function fromWei($number, $unit)
    {
        return Utils::fromWei($number, $unit);
    }

    public static function toWei($number, $unit)
    {
        return Utils::toWei($number, $unit);
    }

    public static function toHex($number)
    {
        return Utils::toHex($number);
    }
}
