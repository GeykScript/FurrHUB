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



<!-- catergory part -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">



        <div class="md:px-[3rem]  px-2 mt-10">
            <div class="flex flex-row items-center justify-center md:px-10 px-2 mt-5 h-20  rounded-lg bg-gradient-to-r from-orange-600  to-orange-400    ">
                <div class="flex flex-row items-center md:gap-5 gap-1 ">
                    <div> <i data-lucide="paw-print" class="md:w-10 md:h-10 w-6 h-6 text-white mx-auto"></i></div>
                    <h1 class="md:text-4xl text-md font-bold text-white ">{{$category->name}} Category</h1>
                </div>
            </div>
        </div>
        <div class="mt-10 w-full">
            <div class="md:px-20 flex gap-5 items-center px-4  text-sm md:text-lg">
                <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                <div> > </div>
                <a href="{{ route('Categories.cat-products', ['category_id' => 1]) }}" class="hover:underline text-orange-500">{{$category->name}} Category</a>
            </div>
        </div>
        <div class="md:px-20 md:p-4 rounded-lg mt-5">
            <div class="flex items-center justify-start lg:gap-2 text-xs gap-1 lg:text-lg px-4">
                <span class="text-orange-600 md:text-lg text-xs">Sort by:</span>
                <button type="button" onclick="setFilter('popular')" id="popular-btn"
                    class="filter-btn bg-orange-500 p-2 text-md rounded-md text-white">Popular</button>
                <button type="button" onclick="setFilter('latest')" id="latest-btn"
                    class="filter-btn bg-white p-2 text-md rounded-md text-gray-800">Latest</button>

                <div class="relative inline-block text-left">
                    <button type="button" onclick="toggleDropdown('dropdown-1')" class="border border-gray-300 bg-white p-2 text-md rounded-md text-gray-800 flex items-center gap-1">
                        Price Range
                        <i data-lucide="chevron-down" class="w-4 h-4 text-gray-800"></i>
                    </button>
                    <div id="dropdown-1" class="hidden absolute mt-2 w-32 lg:w-40 bg-white border border-gray-300 rounded-sm shadow-lg z-50">
                        <button type="button" onclick="setFilter('highest'); toggleDropdown('dropdown-1');" id="highest-btn"
                            class="filter-btn block w-full text-left p-2 text-md text-gray-800 hover:bg-orange-500 hover:text-white">High to Low</button>
                        <button type="button" onclick="setFilter('lowest'); toggleDropdown('dropdown-1');" id="lowest-btn"
                            class="filter-btn block w-full text-left p-2 text-md text-gray-800 hover:bg-orange-500 hover:text-white">Low to High</button>
                    </div>
                </div>

                <script>
                    function toggleDropdown(dropdownId) {
                        const dropdown = document.getElementById(dropdownId);
                        dropdown.classList.toggle('hidden');
                    }

                    document.addEventListener('click', function(event) {
                        const dropdown = document.getElementById('dropdown-1');
                        const button = dropdown.previousElementSibling;
                        if (!dropdown.contains(event.target) && !button.contains(event.target)) {
                            dropdown.classList.add('hidden');
                        }
                    });

                    function setFilter(filterValue) {
                        const filters = ['popular', 'latest', 'highest', 'lowest'];
                        const buttons = filters.map(id => document.getElementById(`${id}-btn`));

                        // Hide all product sections
                        filters.forEach(filter => {
                            const section = document.getElementById(`${filter}-products`);
                            if (section) section.style.display = 'none';
                        });

                        // Show the selected product section
                        const activeSection = document.getElementById(`${filterValue}-products`);
                        if (activeSection) activeSection.style.display = 'block';

                        // Reset all button styles
                        buttons.forEach(button => {
                            button.classList.remove('bg-orange-500', 'text-white');
                            button.classList.add('bg-white', 'text-gray-800');
                        });

                        // Highlight the selected button
                        const activeButton = document.getElementById(`${filterValue}-btn`);
                        activeButton.classList.add('bg-orange-500', 'text-white');
                        activeButton.classList.remove('bg-white', 'text-gray-800');
                    }

                    // Set "Popular" as the default filter on page load
                    document.addEventListener('DOMContentLoaded', function() {
                        setFilter('popular');
                    });
                </script>



            </div>
        </div>


        <div class="md:px-[3rem] mt-3 px-[1rem]">
            <!-- Discover Products -->
            <div id="popular-products">
                <div id="product-container" class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                    @foreach ($popular_products as $product)
                    <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90 
            {{ $loop->index >= 12 ? 'hidden more-products' : '' }}">
                        <form action="{{ route('product.view') }}" method="GET">
                            <input type="hidden" name="product_id" value="{{ encrypt($product->product_id) }}">
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
            </div>
            <div id="latest-products" style="display: none;">
                <div id="product-container" class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                    @foreach ($latest_products as $product)
                    <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90 
            {{ $loop->index >= 12 ? 'hidden more-products' : '' }}">
                        <form action="{{ route('product.view') }}" method="GET">
                            <input type="hidden" name="product_id" value="{{ encrypt($product->product_id) }}">
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
            </div>
            <div id="highest-products">
                <div id="product-container" class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                    @foreach ($highest_price as $product)
                    <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90 
            {{ $loop->index >= 12 ? 'hidden more-products' : '' }}">
                        <form action="{{ route('product.view') }}" method="GET">
                            <input type="hidden" name="product_id" value="{{ encrypt($product->product_id) }}">
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
            </div>
            <div id="lowest-products">
                <div id="product-container" class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                    @foreach ($lowest_price as $product)
                    <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90 
            {{ $loop->index >= 12 ? 'hidden more-products' : '' }}">
                        <form action="{{ route('product.view') }}" method="GET">
                            <input type="hidden" name="product_id" value="{{ encrypt($product->product_id) }}">
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
    <x-return-top />

</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>