<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.header')
</head>

<body>
<div class="container">

    <div id="wrapper">
        @php
        if(DB::connection()->getDatabaseName())
        {
        echo "Connected to database ".DB::connection()->getDatabaseName();
        }
        $response->send();
        @endphp
        {{-- @yield('content') --}}
    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>
</div>

</body>

</html>
