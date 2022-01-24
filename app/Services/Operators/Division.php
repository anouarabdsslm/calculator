<?php

namespace App\Services\Operators;

use InvalidArgumentException;
use App\Services\Operators\OperatorInterface;

class Division implements OperatorInterface
{
    function calculate($firstValue, $secondValue)
    {
        if($secondValue == 0) {
            // We may throw a custom exception and intercept it.
            throw new InvalidArgumentException("You can not devide by 0");
        }

        return $firstValue / $secondValue;
    }
}
