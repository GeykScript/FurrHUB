<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'FurrHUB') }}</title>
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">

    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome-page.css', 'resources/js/carousel.jsx'])

</head>


<!-- bg-[#60E1FF] blue -->
<!-- F0A02C  orange-->
<!-- 38B6FF -->
<!-- nav part -->

<x-nav-bar />

<div class="pt-[100px]"></div>

<!-- carousel part -->
<div class="w-full relative mt-2">
    <div class="swiper progress-slide-carousel swiper-container relative ">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/1.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/2.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/3.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/4.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/5.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{route('appointment')}}" class="">
                    <div class="rounded-2xl h-[15rem] md:h-full ">
                        <img src="{{ asset('images/Furrhub-carousel/6.jpg') }}" alt="carousel-pet-services" class="w-[100%] h-[100%] object-cover " />
                    </div>
                </a>
            </div>



        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">
        <div class="w-full overflow-x-auto flex justify-center mt-4 custom-scrollbar lg:p-4">
            <div class="w-full flex xl:gap-8 gap-2 sm:justify-center whitespace-nowrap scrollbar">

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 1]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Food.png') }}" alt="Food-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Foods</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 2]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Treats.png') }}" alt="Treats-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Treats</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 3]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Toys.png') }}" alt="Toys-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Toys</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2 text-wrap">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 4]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Grooming Supplies.png') }}" alt="Grooming Supplies-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center text-wrap">Grooming Supplies</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2 text-wrap">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 5]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Accessories.png') }}" alt="Accessories-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center text-wrap">Accessories</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 6]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Health Needs.png') }}" alt="Health Needs-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center text-wrap">Health Needs</p>
                    </a>
                </div>

                <div class="flex flex-col items-center space-y-2 min-w-[80px] sm:min-w-[100px] lg:p-2">
                    <a href="{{ route('Categories.cat-products', ['category_id' => 7]) }}" class="hover:text-[#F0A02C] flex flex-col items-center space-y-2">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 xl:w-24 xl:h-24 rounded-lg">
                            <img src="{{ asset('images/Furrhub-Product-Categories/Essentials.png') }}" alt="Essentials-category" class="transition-transform duration-300 hover:scale-110" />
                        </div>
                        <p class="text-sm sm:text-sm font-medium text-center">Essentials</p>
                    </a>
                </div>




            </div>
        </div>

        <div class="md:px-[3rem]  px-2">
            <div class="flex flex-row items-center justify-between md:px-10 px-2 mt-5 h-20  rounded-lg bg-gradient-to-r from-orange-600  to-orange-400    ">
                <div class="flex flex-row items-center md:gap-5 gap-1 ">
                    <div> <i data-lucide="paw-print" class="md:w-10 md:h-10 w-6 h-6 text-white mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-white ">Best Seller Products!</h1>

                </div>

            </div>
        </div>

        <!-- Best Seller Products -->
        <div class="md:px-[3rem] mt-3 px-[1rem]">
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4  ">
                <!-- Products-->
                @foreach ($BestSellerProducts as $product)
                <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                    <form action="{{ route('product.view') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="focus:outline-none">
                            <img src="{{ asset('storage/Products/' . $product->image_url) }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                            <div class="mt-2 flex justify-between flex flex-col gap-1">
                                <p class="text-sm font-normal text-gray-500 text-end">{{ $product->quantity_sold }} sold</p>
                                <h5 class="font-normal text-wrap text-orange-500 text-start text-sm">{{ $product->category->name ?? 'Unknown' }}</h5>
                                <h4 class="font-semibold text-wrap text-black text-md text-start">{{ $product->name }}</h4>
                                @if (!empty($product->discount))
                                <h6 class="font-bold text-wrap text-orange-400 text-xs text-start line-through">
                                    <span class="text-xs">₱</span> {{ number_format($product->price, 2) }}
                                </h6>
                                <h4 class="font-bold text-wrap text-orange-500 text-lg text-start">
                                    <span class="text-xl">₱</span> {{ number_format($product->discounted_price, 2) }}
                                </h4>
                                @else
                                <h4 class="font-bold text-wrap text-orange-500 text-lg text-start">
                                    <span class="text-xl">₱</span> {{ number_format($product->price, 2) }}
                                </h4>
                                @endif
                            </div>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>


        <x-authenticity-banner />

        <!-- discover services -->
        <div class=" lg:px-12">
            <div class="grid grid-cols-6 lg:p-4 p-2 lg:gap-4 gap-2 bg-sky-100  mt-2 rounded-lg">

                <div class="col-span-6 lg:col-span-3 justify-center items-center">
                    <a href="{{route('appointment')}}" class="focus:outline-none">
                        <img src="{{asset('images/services/book-now.jpg')}}" alt="" class="rounded-md  lg:w-full transition-transform duration-300 hover:scale-105">
                    </a>
                </div>
                <div class="lg:col-span-1 col-span-2">
                    <a href="{{route('appointment')}}" class="focus:outline-none">
                        <img src="{{asset('images/services/1.jpg')}}"
                            alt=""
                            class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                    </a>
                </div>

                <div class="lg:col-span-1 col-span-2">
                    <a href="{{route('appointment')}}" class="focus:outline-none">
                        <img src="{{asset('images/services/2.jpg')}}"
                            alt=""
                            class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                    </a>
                </div>

                <div class="lg:col-span-1 col-span-2">
                    <a href="{{route('appointment')}}" class="focus:outline-none">
                        <img src="{{asset('images/services/3.jpg')}}"
                            alt=""
                            class="lg:w-full lg:h-full rounded-md transition-transform duration-300 hover:scale-105 object-cover">
                    </a>
                </div>
            </div>
        </div>

        <!-- discover Products Section -->
        <div class=" md:px-[3rem] mt-3 px-[1rem]">
            <div class="flex flex-row  w-full items-center justify-center">
                <h1 class="text-center md:text-4xl text-xl font-bold  uppercase tracking-widest my-10 text-orange-500 ">Discover Products </h1>
                <div> <i data-lucide="paw-print" class="w-10 h-10 text-orange-500 mx-auto"></i> </div>
            </div>

            <!-- Discover Products -->
            <div id="product-container" class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                @foreach ($products as $product)
                <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90 
            {{ $loop->index >= 12 ? 'hidden more-products' : '' }}">
                    <form action="{{ route('product.view') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <button type="submit" class="focus:outline-none">
                            <img src="{{ asset('storage/Products/' . $product->image_url) }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                            <div class="mt-2 flex justify-between flex flex-col gap-1">
                                <p class="text-sm font-normal text-gray-500 text-end">{{ $product->quantity_sold }} sold</p>
                                <h5 class="font-normal text-wrap text-orange-500 text-start text-sm">{{ $product->category->name ?? 'Unknown' }}</h5>
                                <h4 class="font-semibold text-wrap text-black text-md text-start">{{ $product->name }}</h4>
                                <h6 class="font-bold text-wrap text-orange-400 text-xs text-start line-through">
                                    <span class="text-xs">₱</span> {{ number_format($product->price, 2) }}
                                </h6>
                                <h4 class="font-bold text-wrap text-orange-500 text-lg text-start">
                                    <span class="text-xl">₱</span> {{ number_format($product->discounted_price, 2) }}
                                </h4>
                            </div>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>

            <!-- Buttons Container -->
            <div class="flex justify-center mt-4">
                <button id="showMoreBtn" class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition">
                    Show More
                </button>
                <button id="showLessBtn" class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg hover:bg-orange-600 transition hidden">
                    Show Less
                </button>
            </div>

            <!-- JavaScript to Toggle Products -->
            <script>
                document.getElementById("showMoreBtn").addEventListener("click", function() {
                    document.querySelectorAll(".more-products").forEach(el => el.classList.remove("hidden"));
                    this.classList.add("hidden");
                    document.getElementById("showLessBtn").classList.remove("hidden");
                });

                document.getElementById("showLessBtn").addEventListener("click", function() {
                    document.querySelectorAll(".more-products").forEach(el => el.classList.add("hidden"));
                    this.classList.add("hidden");
                    document.getElementById("showMoreBtn").classList.remove("hidden");
                });
            </script>
        </div>

    </div>

    <!-- Return to Top Button -->
    <x-return-top />
</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>