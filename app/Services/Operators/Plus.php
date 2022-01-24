<?php

namespace App\Services\Operators;

use App\Services\Operators\OperatorInterface;

class Plus implements OperatorInterface
{
    function calculate($firstValue, $secondValue)
    {
        return $firstValue + $secondValue;
    }
}