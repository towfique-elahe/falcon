<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Query Form</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap");

        /* variables */
        :root {
            --light: #fffdf9;
            --light_green: #fafff2;
            --light_gold: #fffaec;
            --gold: #e5d9b6;
            --green1: #a4be7b;
            --green2: #5f8d4e;
            --green3: #285430;
            --primary: #0f3015;
            --dark: #011204;
            --border: solid 0.3rem #0f30150f;
            --shadow-light: #0f30151c 0 0 10px;
            --shadow-dark: #0f30151c 0 0 10px 5px;
        }

        /* universal stuff */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Montserrat;
        }

        .container {
            background-color: var(--light_gold);
            width: 100%;
            max-width: 30rem;
            padding: 1rem;
            border-radius: .5rem;
            margin: 0 auto;
            border: var(--border);
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .info {
            width: 100%;
            display: flex;
        }

        .title {
            font-weight: 500;
        }

        .title,
        .data {
            flex: 1;
        }

        .desc h3 {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{ asset('assets/pictures/logo-light.svg') }}" alt="" class="logo">

        <dl class="info">
            <div class="title">
                <dt>First Name:</dt>
                <dt>Last Name:</dt>
                <dt>Email:</dt>
                <dt>Phone:</dt>
            </div>
            <div class="data">
                <dd>{{ $fname }}</dd>
                <dd>{{ $lname }}</dd>
                <dd>{{ $email }}</dd>
                <dd>{{ $phone }}</dd>
            </div>
        </dl>

        <div class="desc">
            <h3>Description</h3>
            <p>{{ $description }}</p>
        </div>
    </div>
</body>

</html>
