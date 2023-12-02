<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispatch Email</title>
</head>
<body>
    <p>From: Nepalgunj Nagarpalika</p>
    <p>To: {{ $dispatch->receiver_name }} {{ $dispatch->receiver_address }}</p>
    <div>
        {!! $dispatch->remarks !!}
    </div>






</body>
</html>
