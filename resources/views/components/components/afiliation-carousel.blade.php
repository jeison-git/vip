<head>
    <script>
        var cont = 0;

        function loopSlider() {
            var xx = setInterval(function() {
                switch (cont) {
                    case 0: {
                        $("#slider-1").fadeOut(400);
                        $("#slider-2").delay(400).fadeIn(400);
                        $("#sButton1").removeClass("bg-purple-800");
                        $("#sButton2").addClass("bg-purple-800");
                        cont = 1;

                        break;
                    }
                    case 1: {

                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton2").removeClass("bg-purple-800");
                        $("#sButton1").addClass("bg-purple-800");

                        cont = 0;

                        break;
                    }


                }
            }, 8000);

        }

        function reinitLoop(time) {
            clearInterval(xx);
            setTimeout(loopSlider(), time);
        }

        function sliderButton1() {

            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 0

        }

        function sliderButton2() {
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            reinitLoop(4000);
            cont = 1

        }

        $(window).ready(function() {
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");


            loopSlider();

        });
    </script>
</head>

<body>
    <div class="h-auto sliderAx">

        <div id="slider-1" class="container mx-auto">
            <div class="h-auto px-10 py-24 bg-center text-gold" style="background-image: url({{ asset('img/aficarousel/uno.jpg') }});
                                background-position: center;
                                background-repeat: no-repeat;
                                background-size: contain;">

                <div class="hidden md:block">
                    <div class="md:w-1/2">
                        <p class="text-sm font-bold uppercase">afiliate</p>
                        <p class="font-bold md:text-3xl">HOLA</p>
                        <p class="mb-10 leading-none md:text-2xl">¡No esperes mas y únete!</p>
                        <a href="{{ route('contacts.index') }}"
                            class="px-8 py-4 text-xs font-bold text-white uppercase rounded bg-gold hover:bg-gray-200 hover:text-gray-800">
                            Contáctanos</a>
                    </div>
                </div>

            </div>
            <br>
        </div>

        <div id="slider-2" class="container mx-auto">
            <div class="object-fill h-auto px-10 py-24 bg-top text-gold" style="background-image: url({{ asset('img/aficarousel/dos.jpg') }});
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;">

                <div class="hidden md:block ">
                    <p class="text-sm font-bold uppercase">afiliate</p>
                    <p class="mb-10 leading-none md:text-2xl">¿ CÓMO PODEMOS AYUDARTE ?</p>
                    <a href="{{ route('contacts.index') }}"
                        class="px-8 py-4 text-xs font-bold text-white uppercase rounded bg-gold hover:bg-gray-200 hover:text-gray-800">
                        Contáctanos</a>
                </div>

            </div> <!-- container -->
            <br>
        </div>

    </div>
    <div class="flex justify-between w-12 pb-2 mx-auto">
        <button id="sButton1" onclick="sliderButton1()" class="w-4 pb-2 bg-purple-400 rounded-full "></button>
        <button id="sButton2" onclick="sliderButton2() " class="w-4 p-2 bg-purple-400 rounded-full"></button>
    </div>

</body>
