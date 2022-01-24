<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Operators\OperatorFactory;

class OperatorFactoryTest extends TestCase
{
    protected $operatorFactory;

    protected function setup(): void {

        $this->operatorFactory = new OperatorFactory;
    }

    public function test_should_return_a_correct_instance_of_theinstance_of_the_given_operator()
    {
        foreach(OperatorFactory::OPERATORS as $operatorName => $concretion) {
            $this->assertInstanceOf($concretion, ($this->operatorFactory)($operatorName));
        }
    }
}
