<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
    <title>@yield('title', 'Roaa')</title>
    @stack('styles')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('frontend/css/Hero.css') }}" />
    @endpush
</head>

<body>
    @include('Frontend.Ar.layouts.header')
    @include('Frontend.Ar.layouts.hero')
    <div class="content">
        @yield('content')
    </div>

    @include('Frontend.Ar.layouts.footer')
    @push('scripts')
        <script src="{{ asset('frontend/js/loadHeader.js') }}"></script>
    @endpush
    @stack('scripts')

</body>


</html>
