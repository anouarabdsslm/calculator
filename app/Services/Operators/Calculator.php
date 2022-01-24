<?php

namespace App\Services\Operators;

use App\Services\Operators\CalculatorInterface;


class Calculator implements CalculatorInterface
{
    public function calc(OperatorInterface $operator , $firstValue, $secondValue) {
        
        //By typhinting the OperatorInterface we will be able call calculate function 
        // safely even if the we switch the operator (We refer to it as Polymorphism)
        return $operator->calculate($firstValue, $secondValue);
    }
}