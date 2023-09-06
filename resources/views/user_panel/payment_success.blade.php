<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strip Payment Successful - FALCON</title>
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    <style>
        body {
            width: 100vw;
            height: 100vh;
            background-color: var(--light_green);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success {
            background: var(--gold);
            width: 20rem;
            padding: 1rem;
            border-radius: .5rem;
            font-size: 2rem;
            text-align: center;
            margin-top: -10rem;
        }

        a {
            background: var(--primary);
            color: var(--light);
            padding: .5rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: .3rem;
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <div class="success">
        Your payment is successful 😊
        <a href="{{ route('dashboard') }}">Back to Dashboard</a>
    </div>
</body>

</html>
