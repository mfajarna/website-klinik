<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        @include('includes.Dashboard.meta')

        <title>@yield('title') | Klinik Citra Sehat</title>

        @stack('before-style')

        @include('includes.Dashboard.style')

        @stack('after-style')

    </head>
        <body data-topbar="dark">
            <div id="layout-wrapper">
                @include('includes.Dashboard.header')

                @include('includes.Dashboard.vertical')

                @include('sweetalert::alert')

                <div class="main-content">
                    <div class="page-content">

                        @yield('content')
                    
                    </div>


                    @include('includes.Dashboard.footer')
                </div>

                

            </div>

                @include('includes.Dashboard.rightbar')


            @stack('before-script')

            @include('includes.Dashboard.script')
    
            @stack('after-script')
        </body>
    </html>