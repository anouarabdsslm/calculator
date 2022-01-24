<?php
namespace App\Services\Operators;

use App\Services\Operators\OperatorInterface;

interface CalculatorInterface {
    public function calc(OperatorInterface $operator , $firstValue, $secondValue);
}