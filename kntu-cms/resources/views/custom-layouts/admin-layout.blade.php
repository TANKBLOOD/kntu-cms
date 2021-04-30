<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body class="bg-gray-50">
    <div><!--main wrapper-->

        <div class="flex relative mb-12"><!--Site top-->
            <div>
                <nav class="w-full h-12 flex justify-around items-center absolute bg-blue-500 text-gray-50">
                    <div>
                        <!--Logo-->
                        <h2>
                            KNTU
                        </h2>
                    </div>

                    <ul class="flex">
                        <!--Navbar list-->
                        <li class="mx-2">
                            Home
                        </li>
                        <li class="mx-2">
                            Cv Config
                        </li>
                        <li class="mx-2">
                            Poster
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <main>
            @yield('mainContent')
        </main>

        <div class="absolute w-full h-52 bg-gray-400 bottom-0">
            this is the footer
        </div>
    </div>

</body>
</html>
