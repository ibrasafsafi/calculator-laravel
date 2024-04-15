<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatorRequest;
use App\Services\CalculatorService;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    protected CalculatorService $calculatorService;

    public function __construct(CalculatorService $calculatorService)
    {
        $this->calculatorService = $calculatorService;
    }

    public function index()
    {
        return view('calculator.index');
    }


    /*
     * Calculate the result of the operation
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     * @throws \InvalidArgumentException
     * */
    public function calculate(CalculatorRequest $request)
    {
        $data = $request->validated();

        // Retrieve input from the form validation data array
        $firstNumber = $data['first_number'];
        $secondNumber = $data['second_number'];
        $operation = $data['operation'];

        try {
            // Use the service class to calculate the result
            $result = $this->calculatorService->calculate($operation, $firstNumber, $secondNumber);

            // Render the calculator view with the result
            return view('calculator.index', ['result' => $result]);
        } catch (\InvalidArgumentException $e) {
            // Handle errors and show an error message
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
