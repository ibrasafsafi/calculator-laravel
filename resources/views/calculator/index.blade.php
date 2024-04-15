<!DOCTYPE html>
<html lang="utf-8">
<head>
    <title>INVENTIV IT Calculator</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">INVENTIV IT Calculator Test</h1>

    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Calculator form -->
    <form method="POST" action="{{ route('calculator.calculate') }}">
        @csrf

        <!-- First Number input -->
        <div class="mb-3">
            <label for="first_number" class="form-label">First Number:</label>
            <input type="number" class="form-control @error('first_number') is-invalid @enderror" id="first_number"
                   name="first_number" value="{{ old('first_number') }}">
            <!-- Show validation error for first_number -->
            @error('first_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Operation selection -->
        <div class="mb-3">
            <label for="operation" class="form-label">Operation:</label>
            <select class="form-select" id="operation" name="operation" required>
                <option value="plus" @if (old('operation') == 'plus') selected @endif>+</option>
                <option value="minus" @if (old('operation') == 'minus') selected @endif>-</option>
                <option value="multiply" @if (old('operation') == 'multiply') selected @endif>*</option>
                <option value="divide" @if (old('operation') == 'divide') selected @endif>/</option>
            </select>
            @error('operation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Second Number input -->
        <div class="mb-3">
            <label for="second_number" class="form-label">Second Number:</label>
            <input type="number" class="form-control @error('second_number') is-invalid @enderror" id="second_number"
                   name="second_number" value="{{ old('second_number') }}">
            <!-- Show validation error for second_number -->
            @error('second_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>

    <!-- Display the result if set -->
    @if (isset($result))
        <div class="mt-4">
            <h3 class="alert alert-success">Result: {{ $result }}</h3>
        </div>
    @endif
</div>

<!-- Bootstrap JavaScript (Bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
