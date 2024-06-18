@php
    // @dd($sliders);
@endphp

<div {{-- bg-gradient-to-b from-[#25365E] from-85% to-[#687083] --}} class="w-full h-[530px] min-h-[450px] relative overflow-hidden swiper">
    <div class="swiper-wrapper">
        @if (!$sliders->isEmpty())
            @foreach ($sliders as $item)
                @include('app.components.Home.banner.Partials.item', ['slider' => $item])
            @endforeach
        @else
            <div class="swiper-slide flex justify-start items-center relative">
                <div class="w-full h-[530px] absolute top-0 left-0 bg-gradient-to-r from-[#25365E] to-transparent"></div>
                <div class="px-20 py-16 w-6/12 absolute z-10 space-y-3 text-gray-300">
                    <h1 class="text-[60px] font-bold uppercase leading-none font-lora title"
                        data-swiper-parallax-duration="1000" data-swiper-parallax-x="-300"
                        data-swiper-parallax-opacity="0">
                        Slider Title
                    </h1>
                    <p class=" text-base font-extralight filter drop-shadow-2xl" data-swiper-parallax-duration="1000"
                        data-swiper-parallax-x="-400" data-swiper-parallax-opacity="0">
                        Slider Description
                    </p>
                    <a href="#"
                        class="relative inline-flex items-center gap-1 leading-normal pb-1 text-gray-100 font-thin text-2xl hover:text-neutral-200 transition group mt-4"
                        data-swiper-parallax-duration="2000" data-swiper-parallax-opacity="0">
                        Link Button
                        <x-heroicon-s-arrow-long-right class="text-white w-6 h-6 group-hover:ml-1 transition-all" />
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-neutral-200 origin-bottom-right transform transition duration-200 ease-out scale-x-0 group-hover:scale-x-100 group-hover:origin-bottom-left"></span>
                    </a>
                </div>
            </div>
        @endif
    </div>
    <div class="swiper-pagination relative z-50"></div>
    <div class="next absolute right-5 top-1/2 transform -translate-y-1/2 text-white w-5 h-5 z-50">
        <x-heroicon-o-arrow-small-right />
    </div>
    <div class="prev absolute left-5 top-1/2 transform -translate-y-1/2 text-white w-5 h-5 z-50">
        <x-heroicon-o-arrow-small-left />
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.swiper', {
            speed: 800,
            // spaceBetween: 100,
            // mousewheel: true,
            // effect: "fade",
            parallax: true,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
                // pauseOnMouseEnter: true
                waitForTransition: true,
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".next",
                prevEl: ".prev",
            },
            loop: true,
        });
    });
</script>
