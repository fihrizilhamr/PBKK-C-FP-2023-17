<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GoGym</title>
    <link rel="stylesheet" href="{{ asset('/css/home-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/checkout-style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
<nav>
        <div class="wrapper">
            <div class="logo">
                <a href="{{ route('list-articles') }}">GoGym</a>
            </div>
        </div>
    </nav>
    <div class="checkout-container">
        <h1>Checkout</h1>

        <div class="order-summary">
            <h2>Order Summary</h2>
            <p>Total Price: Rp{{ $totalPrice }}</p>
            <p>Selected Schedules: 
                @foreach($selectedSchedules as $schedule)
                    <p>Day: {{ $schedule->day }}</p>
                    <p>Start Time: {{ $schedule->start_time }}</p>
                    <p>End Time: {{ $schedule->end_time }}</p>
                @endforeach

            </p>
            <p>Trainer: {{ $trainer->user->name }}</p>
        </div>

        <div class="payment-section">
            <h2>Payment Details</h2>
            <!-- Add payment form or details here -->
            <form action="" method="post">
                @csrf
                <!-- Add payment form fields here (e.g., credit card number, expiration date, etc.) -->
                <!-- Example: -->
                <label for="creditCardNumber">Credit Card Number:</label>
                <input type="text" id="creditCardNumber" name="creditCardNumber" required>

                <label for="expirationDate">Expiration Date:</label>
                <input type="text" id="expirationDate" name="expirationDate" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>

                <button type="submit">Submit Payment</button>
            </form>
        </div>

        <div class="confirmation-button">
    <button onclick="redirectToChat('{{ route('chat.create', ['trainer' => $trainer->id]) }}')">Confirm Order</button>
</div>

<script>
    function redirectToChat(url) {
        window.location.href = url;
    }
</script>
    </div>
</body>

</html>
