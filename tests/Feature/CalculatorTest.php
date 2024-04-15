<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * Test the calculator page loading.
     */
    public function testCalculatorPageLoads()
    {
        $response = $this->get('/calculator');

        $response->assertStatus(200);
        $response->assertSee('INVENTIV IT Calculator');
    }

    /**
     * Test addition operation.
     */
    public function testAddition()
    {
        $response = $this->post('/calculator', [
            'first_number' => 5,
            'operation' => 'plus',
            'second_number' => 3,
        ]);

        $response->assertStatus(200);
        $response->assertSee('Result: 8');
    }

    /**
     * Test subtraction operation.
     */
    public function testSubtraction()
    {
        $response = $this->post('/calculator', [
            'first_number' => 5,
            'operation' => 'minus',
            'second_number' => 3,
        ]);

        $response->assertStatus(200);
        $response->assertSee('Result: 2');
    }

    /**
     * Test multiplication operation.
     */
    public function testMultiplication()
    {
        $response = $this->post('/calculator', [
            'first_number' => 5,
            'operation' => 'multiply',
            'second_number' => 3,
        ]);

        $response->assertStatus(200);
        $response->assertSee('Result: 15');
    }

    /**
     * Test division operation.
     */
    public function testDivision()
    {
        $response = $this->post('/calculator', [
            'first_number' => 6,
            'operation' => 'divide',
            'second_number' => 3,
        ]);

        $response->assertStatus(200);
        $response->assertSee('Result: 2');
    }

    /**
     * Test division by zero.
     */
    public function testDivisionByZero()
    {
        $response = $this->post('/calculator', [
            'first_number' => 5,
            'operation' => 'divide',
            'second_number' => 0,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrorsIn('Division by zero is not allowed.');
    }
}
