<?php

namespace App\Services\Operators;

use App\Services\Operators\CalculatorInterface;


class Calculator implements CalculatorInterface
{
    public function calc(OperatorInterface $operator , $firstValue, $secondValue) {
        
        //By typehinting the OperatorInterface we are able to call calculate method safely (This is what refered to it as Polymorphism)
        return $operator->calculate($firstValue, $secondValue);
    }
}
