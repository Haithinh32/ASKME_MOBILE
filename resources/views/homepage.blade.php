<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Styles -->
    <style>
        .swiper-container {
            width: 100%;
            height: 350px;
        }

        .swiper-wrapper {
            height: 100%;
            width: 100%
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper {
            width: 100%;
            height: 50%;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 80%;
            width: 100%;
            margin: 0;
        }

        .mySwiper {
            height: 20%;
            width: 98%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: flex;
            flex-shrink;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .main-content {
            max-width: 80%;
            margin: auto;
            display: flex;
            align-items: center;
        }

        .navi-container {
            height: 350px;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@extends('components.mainlayout')
@section('maincontent')
<body class="bg-orange-200">
        <div class="main-content">
            <div class="grid grid-cols-12">
                <x-navi/>
                <x-bannerhomepage/>
                <h1 class ="m-2 col-span-2">NEW PHONE</h1>
                <div class="m-2 col-span-12 border rounded-lg bg-white grid grid-cols-12">
                    @foreach($listproducts as $product)
                    <div class="m-2 col-span-3 border rounded-lg bg-white">
                        <div class="m-2"><img src="{{ asset($product->image) }}" class="rounded-lg w-100" /></div>
                        <div class="m-2 text-bold">{{ $product->pname }}</div>
                        <div class="m-2 text-red-500">{{ $product->price }}₫</div>
                        <div class="m-2">{{ $product->description }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
</body>
@endsection
</html>