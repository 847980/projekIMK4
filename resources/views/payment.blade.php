<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
</head>
<body>
    <p>$50</p>
    <form action="{{ route('paypal') }}" method="post">
        @csrf
        <input type="hidden" name="price" value="50">
        <button type="submit">Pay with PayPal</button>
    </form>
</body>
</html>
