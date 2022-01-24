<?php
namespace App\Services\Operators;

class OperatorFactory {
    //Lookup table
    const OPERATORS = [
        'plus' => Plus::class,
        'minus' => Minus::class,
        'division' => Division::class,
        'multiplication' => Multiplication::class,
    ];

    function __invoke(string $operator)
    {
        return new (self::OPERATORS[$operator]);
    }
}