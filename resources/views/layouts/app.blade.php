<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- icon image link --}}
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />
    {{-- style links --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    {{-- pre defined scripts --}}
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        @include('layouts.navigation')
        <div class="main">
            @include('layouts.header')
            <main class="content">
                <div class="container-fluid p-0">
                    {{ $slot }}
                </div>
            </main>
            @include('layouts.footer')
        </div>
    </div>
    <script>
        const categoryUrl = "{{ route('inventory.categoryByProductType') }}";
    </script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
