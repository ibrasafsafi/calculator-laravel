<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CalculateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:run {first_number} {operation} {second_number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perform a calculation based on given first_number, operation, and second_number';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the input arguments
        $first_number = $this->argument('first_number');
        $operation = $this->argument('operation');
        $second_number = $this->argument('second_number');

        // Calculate the result
        try {
            $result = app()->make('App\Services\CalculatorService')->calculate($operation, $first_number, $second_number);
            // Output the result
            $this->info("Result: $result");
        } catch (\Exception $e) {
            // Output error message if calculation fails
            $this->error($e->getMessage());
        }

        return 0;
    }
}
