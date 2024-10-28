<!DOCTYPE html>
<html>
<head>
    <title>Processing Payment</title>
</head>
<body>
    <form id="payment-form" action="{{ route('process-payment') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order_id }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
    </form>
    <script type="text/javascript">
        document.getElementById('payment-form').submit();
    </script>
</body>
</html>
