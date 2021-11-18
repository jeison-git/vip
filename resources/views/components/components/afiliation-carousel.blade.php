<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <img class="object-contain w-full bg-center h-96" src="{{ asset('img/aficarousel/uno.jpg') }}" alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-contain w-full h-96" src="{{ asset('img/aficarousel/banner.png') }}" alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-fill w-full bg-contain h-96" src="{{ asset('img/aficarousel/mtvip.gif') }}" alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-fill w-full bg-contain h-96" src="{{ asset('img/aficarousel/comervip.png') }}"
                    alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-fill w-full bg-contain h-96" src="{{ asset('img/aficarousel/segurosvipgif.gif') }}"
                    alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-fill w-full bg-contain h-96" src="{{ asset('img/aficarousel/platinumvip.png') }}"
                    alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-fill w-full bg-contain h-96" src="{{ asset('img/aficarousel/plangoldvip.gif') }}"
                    alt="image" />
            </div>

            <div class="swiper-slide">
                <img class="object-fill w-full bg-contain h-96" src="{{ asset('img/aficarousel/franqui.png') }}"
                    alt="image" />
            </div>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
        });
    </script>
</body>

</html>
