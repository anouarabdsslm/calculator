<?php
namespace App\Services\Operators;

interface OperatorInterface {
    public function calculate(float $firstValue, float $secondValue);
}