@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
   
</head>

<body>
    {{-- Header here --}}
    @include('components.header')
    <main>
        {{ $slot }}
        @php(@dd($contacts))
    </main>
    {{-- Footer here --}}
    @include('components.footer', compact('contacts'))
</body>

</html>
