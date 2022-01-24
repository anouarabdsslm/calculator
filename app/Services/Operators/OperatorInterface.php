<?php
namespace App\Services\Operators;

interface OperatorInterface {
    public function calculate($firstValue, $secondValue);
}
