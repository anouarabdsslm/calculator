<?php
namespace App\Enums;

class SupportedOperators
{
    const PLUS = 'plus';
    const MINUS = 'minus';
    const MULTIPLICATION = 'multiplication';
    const DIVISION = 'division';

    public static $operators = [self::PLUS, self::MINUS, self::MULTIPLICATION,  self::DIVISION];
}