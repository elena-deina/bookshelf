<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <title>{{ config('app.name') }} - @yield('title')</title>
    </head>
    <body>
        @yield('body')
    </body>
</html>