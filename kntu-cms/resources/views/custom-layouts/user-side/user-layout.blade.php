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
<body class="bg-gray-100">
    <div><!--main wrapper-->

        <div class="flex relative mb-12" id="headNav"><!--Site top-->
            <div>
                <nav class="w-full h-12 flex justify-around items-center absolute bg-gray-800 text-gray-50" dir="rtl">
                    <div>
                        <!--Logo-->
                        <h2>
                            کی ان تی یو
                        </h2>
                    </div>

                    <ul class="flex">
                        <!--Navbar list-->
                        <li class="mx-2">
                            <a href="/cv">رزومه</a>
                        </li>
                        <li class="mx-2">
                            <a href="/posts">اطلاعیه</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <main>
            @yield('mainContent')
        </main>

    </div>

</body>
</html>
