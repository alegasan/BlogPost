@props([
    'title' => config('app.name', 'Blog Post'),
    'bodyClass' => '',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="{{ trim('min-h-screen bg-[radial-gradient(circle_at_0%_0%,#fff6e3_0%,#f4f0e8_35%,#ece8de_100%)] text-[#1f2b26] antialiased [font-family:\'DM_Sans\',sans-serif] ' . $bodyClass) }}">
        {{ $slot }}
    </body>
</html>
