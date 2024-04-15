<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculateCommandTest extends TestCase
{
    /**
     * Test the addition command.
     */
    public function testAdditionCommand()
    {
        $this->artisan('calculate:run', ['first_number' => 5, 'operation' => 'plus', 'second_number' => 3])
            ->expectsOutput('Result: 8')
            ->assertExitCode(0);
    }

    /**
     * Test the subtraction command.
     */
    public function testSubtractionCommand()
    {
        $this->artisan('calculate:run', ['first_number' => 5, 'operation' => 'minus', 'second_number' => 3])
            ->expectsOutput('Result: 2')
            ->assertExitCode(0);
    }

    /**
     * Test the multiplication command.
     */
    public function testMultiplicationCommand()
    {
        $this->artisan('calculate:run', ['first_number' => 5, 'operation' => 'multiply', 'second_number' => 3])
            ->expectsOutput('Result: 15')
            ->assertExitCode(0);
    }

    /**
     * Test the division command.
     */
    public function testDivisionCommand()
    {
        $this->artisan('calculate:run', ['first_number' => 6, 'operation' => 'divide', 'second_number' => 3])
            ->expectsOutput('Result: 2')
            ->assertExitCode(0);
    }

    /**
     * Test division by zero in the command.
     */
    public function testDivisionByZeroCommand()
    {
        $this->artisan('calculate:run', ['first_number' => 5, 'operation' => 'divide', 'second_number' => 0])
            ->expectsOutput('Division by zero is not allowed.')
            ->assertExitCode(0);
    }
}
