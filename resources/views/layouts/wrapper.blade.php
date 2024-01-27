<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>@section('title') @show </title>

    <style>
        label,
        h1,
        h2,
        h3 {
            color: #FFE300
        }

        table {
            font-size: 13px;
            line-height: 1.42857143;
            color: #3a3f44;
            background-color: #f5f5f5;
        }

        a {
            color: #c8c8c8;
        }
        table a {
            color: black;
        }
        ul li {
            list-style: none;
        }

    </style>
</head>
<body style="width: 1440px; margin: 0 auto; font-family: Helvetica, Arial, sans-serif; background-color: #272b30">
    <header>
        <nav style="margin: 20px 0;">
            <a href="{{route('homepage')}}" style="text-decoration: none">Home</a>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
