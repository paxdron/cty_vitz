<!doctype html>
<html lang="en">
<head>
@include('templates.partials._head')
</head>
<body>
@include ('templates.partials.navigation')

<div class="container">
    <div class="row">
        @include('templates.partials._messages')
        @yield('content')
    </div>
</div>
@include('templates.partials._javascript')
@yield('scripts')
</body>
</html>