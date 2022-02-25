<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        @include('includes.Landing.meta')

        <title>@yield('title') | Klinik Citra Sehat</title>

        @stack('before-style')

        @include('includes.Landing.style')

        @stack('after-style')


    </head>

    <body>

        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">

                    @yield('content')

                </div>
            </div>
        </div>


        @stack('before-script')

        @include('includes.Landing.script')

        @stack('after-script')

    </body>
</html>