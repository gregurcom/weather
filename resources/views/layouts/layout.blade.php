<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a37d065e91.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

        <title>Weather App</title>
    </head>
    <body>
        @section('header')
            <header>
                <div class = "container-fluid">
                    <nav class="navbar navbar-light bg-light mb-5">
                        <div class="container-fluid">
                            <i class="fas fa-cloud-sun fa-2x"></i>
                            <i class="fas fa-sliders-h fa-2x"></i>
                        </div>
                    </nav>
                </div>
            </header>
        @show
        @yield('content')
        @section ('footer')
            <footer class="bg-light text-center text-lg-start">
                <!-- Copyright -->
                <div class="text-center p-3">
                    Footer
                </div>
                <!-- Copyright -->
            </footer>
        @show
    </body>
</html>
