<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <title>{{ $title ?? config('app.name') }}</title>

     @vite(['resources/css/app.css', 'resources/js/app.js'])

     {{ $head ?? '' }}
     
</head>
<body>
     <x-header />

     <x-banner />

     <main class="container py-4">

          {{ $slot }}
          
     </main>
     
     <x-footer />

     {{ $scripts ?? '' }}

</body>
</html>