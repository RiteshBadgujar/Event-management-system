<!DOCTYPE html>
<html>
<head>

    <title>
        @yield('title', 'Event Management System')
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fb;
            color: #222;
        }

        header {
            background-color: #1f2937;
            color: white;
            padding: 20px;
        }

        .header-container {
            width: 90%;
            max-width: 1100px;
            margin: auto;
        }

        header h1 {
            margin: 0;
        }

        nav {
            margin-top: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            color: #60a5fa;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .success {
            background-color: #dcfce7;
            color: #166534;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .event-card {
            background-color: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .event-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        input {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #2563eb;
            color: white;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 30px 0;
        }

        @media (max-width: 700px) {

            .container {
                width: 95%;
            }

            nav a {
                display: block;
                margin-bottom: 10px;
            }

            input {
                width: 100%;
            }

        }

    </style>

</head>

<body>

    <header>

        <div class="header-container">

            <h1>
                Event Management System
            </h1>

            <nav>

                <a href="/events">
                    Events
                </a>

                <a href="/events/create">
                    Create Event
                </a>

            </nav>

        </div>

    </header>


    <div class="container">

        @if(session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="error">
                {{ session('error') }}
            </div>

        @endif


        @yield('content')

    </div>

</body>
</html>