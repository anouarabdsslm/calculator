<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\SupportedOperators;
use App\Services\Operators\OperatorFactory;
use App\Services\Operators\CalculatorInterface;

class CalculatorController extends Controller
{
    protected $operatorFactory;
    protected $calculator;

    // laravel will automaticly resolve OperatorFactory and calculator.
    // The binding for the Calculator is defined under App\Providers\AppServiceProvider
    function __construct(OperatorFactory $operatorFactory, CalculatorInterface $calculator)
    {
        $this->operatorFactory = $operatorFactory;
        $this->calculator = $calculator;
    }

    function __invoke(Request $request)
    {
        // Validate inputs
        $attributes = $request->validate([
            'first_value' => ['required', 'numeric'],
            'second_value' => ['required', 'numeric'],
            // We can use enums here to handle allowed operators, but in my current php it is not supported
            'operator' => ['required', 'string', Rule::in(SupportedOperators::$operators)]
        ]);

        // We use factory here to build the opertor instance
        $operator = ($this->operatorFactory)($attributes['operator']);

        return response()->json([
            'result' => $this->calculator->calc($operator, $attributes['first_value'], $attributes['second_value'])
        ], 200);
    }
}
