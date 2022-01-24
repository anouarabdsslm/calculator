<?php

namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use App\Services\Operators\Calculator;
use App\Services\Operators\OperatorFactory;

class CalculatorTest extends TestCase
{
    protected $calculator;

    protected function setup(): void 
    {
        $this->operatorFactory = new OperatorFactory;
        $this->calculator = new Calculator;
    }

    public function test_should_correctlly_calculate_additions()
    {
        $additionOperator = ($this->operatorFactory)('plus');
        $this->assertEquals(10, $this->calculator->calc($additionOperator, 5, 5));
        $this->assertEquals(10.5, $this->calculator->calc($additionOperator, 5.5, 5));
    }

    public function test_should_correctlly_calculate_substitutions()
    {
        $substitutionOperator = ($this->operatorFactory)('minus');
        $this->assertEquals(5, $this->calculator->calc($substitutionOperator, 10, 5));
        $this->assertEquals(5.5, $this->calculator->calc($substitutionOperator, 10.5, 5));
        $this->assertEquals(0, $this->calculator->calc($substitutionOperator, 5, 5));
    }

    public function test_should_correctlly_calculate_multiplications()
    {
        $multiplicationOperator = ($this->operatorFactory)('multiplication');
        $this->assertEquals(50, $this->calculator->calc($multiplicationOperator, 10, 5));
        $this->assertEquals(52.5, $this->calculator->calc($multiplicationOperator, 10.5, 5));
        $this->assertEquals(0, $this->calculator->calc($multiplicationOperator, 5, 0));
        $this->assertEquals(0, $this->calculator->calc($multiplicationOperator, 0, 0));
    }

    public function test_should_correctlly_calculate_division()
    {
        $multiplicationOperator = ($this->operatorFactory)('division');
        $this->assertEquals(2, $this->calculator->calc($multiplicationOperator, 10, 5));
        $this->assertEquals(2.1, $this->calculator->calc($multiplicationOperator, 10.5, 5));
        
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calc($multiplicationOperator, 5, 0);
    }

    public function test_should_throw_exception_when_dividing_by_zero()
    {
        $multiplicationOperator = ($this->operatorFactory)('division');
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->calc($multiplicationOperator, 5, 0);
    }

}
