# Calculator App with Laravel 11

## Description

This project is a simple web application that provides a calculator capable of handling the following operations:
addition, subtraction, multiplication, and division. It has a web-based interface as well as a CLI command for
performing calculations. The application uses the Laravel framework and follows best practices such as using services
and request validation for clean code and separation of concerns.

## Installation

### Requirements

- PHP 8.2
- Composer
- Internet connection to use the CDN for Bootstrap and jQuery (optional)

### Installation Steps

1. **Clone the repository**

2. **Install dependencies**:
    ```shell
    composer install
    ```

3. **Create `.env` file**:
    ```shell
    cp .env.example .env
    ```

4. **Generate application key**:
    ```shell
    php artisan key:generate
    ```

5. **Start the development server**:
    ```shell
    php artisan serve
    ```

6. Visit [http://localhost:8000/calculator](http://localhost:8000/calculator) to access the calculator.

7. **Enjoy**.

## Project Structure

- `app/Http/Controllers/CalculatorController.php`: Handles incoming requests and interacts with the CalculatorService.
- `app/Services/CalculatorService.php`: Contains the logic for performing calculations.
- `app/Http/Requests/CalculatorRequest.php`: Validates incoming requests to the calculator endpoint.
- `resources/views/calculator/index.blade.php`: Contains the HTML form for user interaction with the calculator.
- `routes/web.php`: Defines the calculator route.

## Routes

- `GET /calculator`: Renders the calculator form.
- `POST /calculator`: Processes the calculation form and returns the result.

## CLI Commands

- **Calculate**:
    - Command: `php artisan calculate:run {first_number} {operation} {second_number}`
    - Description: Runs a calculation with the provided inputs.
    - Example: `php artisan calculate:run 5 plus 3` returns `8`.

## Tests

The project includes feature tests that check the calculator routes and interactions.

### Running Tests

1. To run all tests, use the command:
    ```shell
    php artisan test
    ```

2. To run a specific test class, use the command:

#### test calculator using web interface

```shell
    php artisan test --filter=CalculatorTest
```

#### test calculator using CLI

```shell
    php artisan test --filter=CalculateCommandTest
```

