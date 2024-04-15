<?php

namespace App\Services;

class CalculatorService
{
    /**
     * Perform the calculation based on the given operation and operands.
     *
     * @param string $operation
     * @param float $num1
     * @param float $num2
     * @return float
     * @throws \InvalidArgumentException
     */
    public function calculate(string $operation, float $num1, float $num2): float
    {
        // Initialize result variable
        $result = 0.0;

        // Perform the requested calculation
        switch ($operation) {
            case 'plus':
                $result = $num1 + $num2;
                break;
            case 'minus':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 == 0) {
                    throw new \InvalidArgumentException('Division by zero is not allowed.');
                }
                $result = $num1 / $num2;
                break;
            default:
                throw new \InvalidArgumentException('Invalid operation.');
        }

        return $result;
    }
}
