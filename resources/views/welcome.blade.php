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

<body>
    <header>
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class=" bg-red-300 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                Register
            </a>
            @endif
            @endauth
        </nav>
        @endif
    </header>

    <main>
        <div class="main-content">
            <div class="grid grid-cols-12">
                <div class="col-span-2">
                    <div class="border rounded-lg m-2">
                        <div class="navi-container">
                            <ul class="p-1 px-2">
                                <li class="py-2">
                                    <a href="#">Iphone</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">Samsung</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">Xiaomi</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">OPPO</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">realmi</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">Vivo</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">ASUS</a>
                                </li>
                                <li class="py-2">
                                    <a href="#">Nokia</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-span-10">
                    <div class="border rounded-lg m-2">
                        <div class="swiper-container">
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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

</html>