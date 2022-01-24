<?php

namespace App\Services\Operators;

use App\Services\Operators\OperatorInterface;

class Multiplication implements OperatorInterface
{
    function calculate($firstValue, $secondValue)
    {
        return $firstValue * $secondValue;
    }
}