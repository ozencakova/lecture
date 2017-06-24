<!DOCTYPE html>
<html lang="tr">
<head>
    @hasSection('title')
        <title>@yield('title') | Ders Kayıt</title>
    @else
        <title>Ders Kayıt</title>
    @endif

    @include('admin-lte.fixed-partial.header')
    @include('widget.sweet-alert')
    @stack('styles')
    @stack('header-scripts')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin-lte.partial.top-bar')
        @include('admin-lte.partial.side-bar')
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    @include('admin-lte.fixed-partial.footer')
    @stack('scripts')
</body>
</html>