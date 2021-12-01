<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
    <ul class="slides">
        <li>
            <img src="{{ asset('img/aficarousel/banner.png') }}" />
        </li>
        <li>
            <img src="{{ asset('img/aficarousel/mtvip.gif') }}" />
        </li>
        <li>
            <img src="{{ asset('img/aficarousel/comervip.png') }}" />
        </li>
        <li>
            <img src="{{ asset('img/aficarousel/segurosvipgif.gif') }}" />
        </li>
        <li>
            <img src="{{ asset('img/aficarousel/platinumvip.png') }}" />
        </li>
        <li>
            <img src="{{ asset('img/aficarousel/plangoldvip.gif') }}" />
        </li>
        <li>
            <img src="{{ asset('img/aficarousel/franqui.png') }}" />
        </li>
    </ul>
</div>
{{-- Script para los slider bar- --}}
@push('script')
    <script>
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                itemWidth: 210,
            });
        });
    </script>
@endpush
