<?php

namespace App\Services\Operators;

use App\Services\Operators\OperatorInterface;

class Minus implements OperatorInterface
{
    function calculate($firstValue, $secondValue)
    {
        return $firstValue - $secondValue;
    }
}
