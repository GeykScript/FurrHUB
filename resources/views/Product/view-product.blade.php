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

<!-- ADDED TO CART DIALOG -->
@if(session('success'))
<dialog id="successDialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="circle-check-Big" class="text-center w-20 h-20 text-green-500"></i>

        </div>
        <p class="mt-2 text-lg text-gray-800">{{ session('success') }}</p>
        <button onclick="document.getElementById('successDialog').close();" class="mt-4 w-full  outline-none focus:outline-none border-white  bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
            Okay
        </button>
    </div>
</dialog>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successDialog = document.getElementById("successDialog");
        if (successDialog) {
            successDialog.showModal();
        }
    });
</script>
@endif
<!-- ADDED TO CART DIALOG -->
@if(session('info'))
<dialog id="infoDialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="triangle-alert " class="text-center w-32 h-32 text-orange-500"></i>

        </div>
        <p class="mt-2 text-lg text-gray-800">{{ session('info') }}</p>
        <button onclick="document.getElementById('infoDialog').close();" class="mt-4 w-full  outline-none focus:outline-none border-white  bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
            Okay
        </button>
    </div>
</dialog>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successDialog = document.getElementById("infoDialog");
        if (infoDialog) {
            infoDialog.showModal();
        }
    });
</script>
@endif

<!-- bg-[#60E1FF] blue -->
<!-- F0A02C  orange-->
<!-- 38B6FF -->
<!-- nav part -->
<x-nav-bar />


<div class="lg:pt-[150px] pt-[100px]"></div>

<!-- product menu -->

<body class="font-sans antialiased bg-white-400 dark:text-black/50">
    <div class="bg-white">
        <div class="flex flex-row justify-start items-center lg:px-10 px-2 gap-5 text-gray-600 text-semibold text-xs lg:text-lg mt-10 lg:mt-3 mb-3">
            @if (Route::has('login'))
            @auth
            <a href="{{route('dashboard')}}" class="hover:text-orange-500">Home</a>
            <h1>
                < </h1>
                    <h1 class="text-orange-500 font-semibold">{{ $product->name }}</h1>
                    @else
                    <a href=" {{route('welcome')}}" class="hover:text-orange-500">Home</a>
                    <h1>
                        < </h1>
                            <h1 class="text-orange-500 font-semibold">{{ $product->name }}</h1>
                            @endauth
                            @endif
        </div>

        <!-- product details -->
        <div class="grid grid-cols-1 lg:grid-cols-5    gap-5 lg:px-10 p-4  2xl:px-20 ">
            <div class="lg:col-span-2 col-span-5 p-4 rounded-lg shadow-xl border-2 border-gray-100">
                <div class="swiper progress-slide-carousel swiper-container relative w-full h-full">
                    <div class="swiper-wrapper">

                        <!-- First Product Image -->
                        <div class="swiper-slide w-full h-full">
                            <img src="{{ asset('storage/Products/' . $product->image_url) }}" alt="carousel-products"
                                class="w-full h-64 md:h-96 lg:h-full rounded-md object-cover md:object-contain" />
                        </div>
                        <!-- 2nd  Product Image if it exists -->
                        @if (!empty($product->image_url_2))
                        <div class="swiper-slide w-full h-full">
                            <img src="{{ asset('storage/Products/' . $product->image_url_2) }}" alt="carousel-products"
                                class="w-full h-64 md:h-96 lg:h-full rounded-md object-cover md:object-contain" />
                        </div>
                        @endif
                        <!-- 3rd  Product Image if it exists -->
                        @if (!empty($product->image_url_3))
                        <div class="swiper-slide w-full h-full">
                            <img src="{{ asset('storage/Products/' . $product->image_url_3) }}" alt="carousel-products"
                                class="w-full h-64 md:h-96 lg:h-full rounded-md object-cover md:object-contain" />
                        </div>
                        @endif
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>


            <!-- product details -->
            <div class="lg:col-span-3  col-span-5  rounded-lg shadow-xl border-2 border-gray-100 lg:p-20 p-4">
                <div class="">
                    <h1 class="lg:text-4xl text-xl font-bold text-gray-700 text-wrap">{{ $product->name }}</h1>
                    <div class="flex flex-row gap-5 lg:mt-5  mt-2 lg:text-lg  text-sm text-gray-700">
                        <h1>FurrHUB</h1>
                        <h1>|</h1>
                        <h1>PSN: <span>{{ $product->serial_number }}</span></h1>
                    </div>
                    <hr class="lg:border-2 border-1 border-gray-400 mt-2">
                    <div class="flex justify-end gap-1 mt-3 font-semibold lg:text-xl text-orange-400">
                        <h1>{{ $product->quantity_sold }}</h1>
                        <h1>Sold</h1>
                    </div>
                    @if (!empty($product->expiry_date))
                    <div class="lg:text-lg  text-gray-700 flex lg:gap-2 gap-1  mt-2">
                        <h1>Expiration Date:</h1>
                        <h1>{{$product->expiry_date}}</h1>
                    </div>
                    @endif
                    <div class="flex flex-col lg:gap-2 gap-1 mt-5  text-orange-500 font-semibold bg-orange-200 p-4  rounded-lg">

                        @if (!empty($product->discount) && $product->discount->status_id == 7)
                        <div class="flex flex-row items-center gap-2 ">
                            <h1>₱</h1>
                            <h1 class="line-through ">{{ number_format($product->price, 2) }}</h1>

                            <h1 class="text-sm">{{ $product->discount_value }} <span class="text-sm">Discount</span></h1>

                        </div>
                        <div class="flex flex-row items-center gap-2">
                            <h1 class="lg:text-4xl text-xl">₱</h1>
                            <h1 class="lg:text-4xl text-xl">{{ number_format($product->discounted_price, 2) }}</h1>
                        </div>
                        @else
                        <div class="flex flex-row items-center gap-2">
                            <h1 class="lg:text-4xl text-xl">₱</h1>
                            <h1 class="lg:text-4xl text-xl">{{ number_format($product->price, 2) }}</h1>
                        </div>
                        @endif
                    </div>

                    @if (!empty($product->stock_quantity))
                    <div class="flex flex-row gap-5 mt-5 lg:text-lg text-gray-700">
                        <h1 class="font-semibold">Stock: </h1>
                        <li class="text-green-500 font-semibold">In Stock <span class="text-xs">({{$product->stock_quantity}} items )</span>
                        </li>

                    </div>
                    @else
                    <div class="flex flex-row gap-5 mt-5 lg:text-lg text-gray-700">
                        <h1 class="font-semibold">Stock: </h1>
                        <li class="text-red-500 font-semibold">Out of Stock</li>
                    </div>
                    @endif

                    <div class="flex flex-row gap-5 mt-5 lg:text-lg text-gray-700 items-center">
                        <h1 class="font-semibold">Quantity:</h1>
                        <div class="flex justify-start col-span-1">


                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ encrypt($product->product_id) }}">
                                <div id="Quantity-inputs-view" class="relative flex items-center max-w-[10rem] bg-white border border-gray-200 rounded-xl" data-stock-quantity="{{ $product->stock_quantity }}">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input-view"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-s-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="minus" class="text-gray-500"></i>

                                    </button>
                                    <input type="number" id="quantity-input-view" name="quantity" data-input-counter
                                        class="bg-white border-x-0 border-gray-100 h-11 text-center text-gray-900 text-xl focus:outline-none  focus:ring-0 focus:border-transparent block w-10 xl:w-full py-2.5 appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                        value="1" min="1" required readonly max="{{$product->stock_quantity}}" />
                                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input-view"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-e-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="plus" class="text-gray-500"></i>
                                    </button>
                                </div>
                        </div>
                    </div>

                    @if ($product->stock_quantity <= 0)
                        <div class="flex justify-start px-4 font-semibold lg:text-md text-sm text-gray-500 mt-3">
                        <h1 class="">
                            NOTE: This product is currently out of stock and unavailable for purchase. Add to your wishlist instead.
                        </h1>
                </div>
                @else
                <div id="note" class="flex justify-start px-4 font-semibold lg:text-md text-sm text-gray-500 mt-3 hidden">
                    <h1>NOTE: This product can only be added to your wishlist when it is out of stock. Thank you!</h1>
                </div>
                <div class="flex justify-end px-4 font-semibold lg:text-lg text-sm text-sky-500 mt-3">
                    <a id="wishlistBtn" class="hover:text-sky-600 hover:cursor-pointer">Add to Wishlist?</a>
                </div>

                <div class="flex flex-row items-center lg:gap-5 gap-2 mt-3 lg:text-lg text-gray-700 grid grid-cols-1 lg:grid-cols-6 px-2">
                    <button type="submit" name="action" value="add_to_cart" class="col-span-3 w-full border-2 border-orange-500 hover:bg-orange-500 hover:text-white text-orange-500 font-bold py-2 px-4 rounded-lg flex justify-center items-center gap-2">
                        <i data-lucide="shopping-basket"></i>
                        <p class="">Add to Cart</p>
                    </button>
                    <button type="submit" name="action" value="buy_now" class="col-span-3 w-full bg-orange-500 hover:bg-orange-600 text-white text-center font-bold py-2 px-4 rounded-lg">
                        <p>Buy Now</p>
                    </button>
                </div>
                @endif
                </form>
                @if ($product->stock_quantity <= 0)
                    <div class="flex justify-end px-4 font-semibold lg:text-lg text-sm text-sky-500 mt-3">
                    <form action=" {{ route('wishlist.add') }}" method="POST" class="flex justify-end">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ encrypt($product->product_id) }}">
                        <button type="submit" name="action" value="add_to_wishlist" class="hover:text-sky-400 hover:cursor-pointer">
                            Add to Wishlist?
                        </button>
                    </form>
            </div>
            <div class=" flex flex-row items-center lg:gap-5 gap-2 mt-3 lg:text-lg text-gray-700 grid grid-cols-1 lg:grid-cols-6 px-2">
                <a class="col-span-3 w-full border-2 border-orange-300 text-orange-300 font-bold py-2 px-4 rounded-lg flex justify-center items-center gap-2" disabled>
                    <i data-lucide="shopping-basket"></i>
                    <p class="">Add to Cart</p>
                </a>
                <a class="col-span-3 w-full bg-orange-400 text-white text-center font-bold py-2 px-4 rounded-lg" disabled>
                    <p>Buy Now</p>
                </a>
            </div>
            @endif

        </div>
    </div>

    <!-- product details -->
    <div class="col-span-5 mt-2 ">
        <h1 class="lg:text-3xl text-xl font-bold text-gray-700 text-wrap">Product Details</h1>
        <h1 class="text-wrap mt-1 px-2">{{$product->description}}</h1>
    </div>

    <!-- product reviews -->
    <h1 class="lg:text-2xl text-md font-bold text-gray-700 text-wrap">Customer Reviews</h1>

    @if($reviews->count() > 0)
    @foreach($reviews as $review)
    <div class="col-span-5  rounded-lg shadow-xl border-2 border-gray-100">
        <div class="flex flex-col gap-1 p-4">
            <div class="flex flex-row gap-2">
                <i data-lucide="circle-user"></i>
                <h1 class="lg:text-sm text-sm font-bold text-gray-700 text-wrap "> {{ Str::title(strtolower($review->user->first_name)) }} {{ Str::title(strtolower($review->user->last_name)) }}
                </h1>
            </div>
            <!-- Review Ratings -->
            @if ($review->ratings)
            <div class="px-7 flex flex-row gap-2 text-yellow-400">
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $review->ratings)
                    <!-- Filled star -->
                    <i data-lucide="star" class="fill-yellow-300"></i>
                    @else
                    <!-- Outlined star -->
                    <i data-lucide="star"></i>
                    @endif
                    @endfor
            </div>
            @endif


            <small class="px-7">Reviewed on: {{ $review->review_date }}</small>
            <p class=" px-7">{{$review->review_text}}</p>
            <div class="flex flex-row gap-2 mt-2 px-7">
                <!-- Review Images  -->
                <div class="grid grid-cols-3 lg:grid-cols-12 gap-2">
                    @foreach (['review_img', 'review_img2', 'review_img3'] as $index => $img)
                    @if (!empty($review->$img))
                    <button onclick="document.getElementById('view-pic{{ $index + 1 }}').showModal()">
                        <img src="{{ asset('storage/order_reviews/' . $review->$img) }}" alt="review-photo" class="lg:h-[10rem] lg:w-[10rem] w-[5rem] h-[5rem] object-contain" />
                    </button>
                    @endif
                    @endforeach
                </div>
                <!-- Review Modal  -->
                @foreach (['review_img', 'review_img2', 'review_img3'] as $index => $img)
                @if (!empty($review->$img))
                <dialog id="view-pic{{ $index + 1 }}" class="backdrop:bg-black/50 p-4 rounded-lg shadow-lg">
                    <div class="relative bg-white p-4 rounded-lg">
                        <button onclick="document.getElementById('view-pic{{ $index + 1 }}').close()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl">&times;</button>
                        <img src="{{ asset('storage/order_reviews/' . $review->$img) }}" alt="review-photo" class="h-[20rem] w-[20rem] object-contain mx-auto" />
                    </div>
                </dialog>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="col-span-5  rounded-lg shadow-xl border-2 border-gray-100">
        <div class="flex flex-col gap-1 p-4 items-center justify-center">
            <i data-lucide="star" class=" w-20 h-20"></i>
            <h1 class="lg:text-xl text-md font-bold  text-wrap">No Reviews Yet.</h1>
        </div>
    </div>
    @endif
    </div>

    <!-- related products -->
    <div class="md:px-[3rem]  px-2">
        <div class="flex flex-row items-center justify-between md:px-10 px-2 mt-5 h-20  rounded-lg bg-gradient-to-r from-orange-600  to-orange-400    ">
            <div class="flex flex-row items-center md:gap-5 gap-1 ">
                <div> <i data-lucide="paw-print" class="md:w-10 md:h-10 w-6 h-6 text-white mx-auto"></i></div>
                <h1 class="md:text-4xl text-md font-bold text-white ">You also may like</h1>
            </div>
        </div>
    </div>
    <div class="md:px-[3rem] mt-3 px-[1rem]">
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-4  ">
            @foreach($relatedProducts as $relatedProduct)
            <div class="group relative xl:min-w-[230px] min-w-[150px] p-4 bg-white rounded-lg shadow-lg border-2 border-gray-100 hover:cursor-pointer transition-transform duration-300 ease-in-out transform hover:scale-105 hover:opacity-90">
                <form action="{{ route('product.view') }}" method="GET">
                    <input type="hidden" name="product_id" value="{{ encrypt($relatedProduct->product_id) }}">
                    <button type="submit" class="focus:outline-none">
                        <img src="{{ asset('storage/Products/' . $relatedProduct->image_url) }}" alt="Best-Product" class="aspect-square w-full rounded-lg bg-gray-500 object-cover lg:aspect-auto lg:h-74">
                        <div class="mt-2 flex justify-between flex flex-col gap-1">
                            <p class="text-sm font-normal text-gray-500 text-end">{{ $relatedProduct->quantity_sold }} sold</p>
                            <h5 class="font-normal text-wrap text-orange-500 text-start text-sm">{{ $relatedProduct->category->name ?? 'Unknown' }}</h5>
                            <h4 class="font-semibold text-wrap text-black text-md text-start">{{ $relatedProduct->name }}</h4>
                            @if (!empty($relatedproduct->discount) && $relatedproduct->discount->status_id == 7)
                            <h6 class="font-bold text-wrap text-orange-400 text-xs text-start line-through">
                                <span class="text-xs">₱</span> {{ number_format($relatedProduct->price, 2) }}
                            </h6>
                            <h4 class="font-bold text-wrap text-orange-500 text-lg text-start">
                                <span class="text-xl">₱</span> {{ number_format($relatedProduct->discounted_price, 2) }}
                            </h4>
                            @else
                            <h4 class="font-bold text-wrap text-orange-500 text-lg text-start">
                                <span class="text-xl">₱</span> {{ number_format($relatedProduct->price, 2) }}
                            </h4>
                            @endif
                        </div>
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- banner -->
        <x-authenticity-banner />

    </div>
    </div>

    <!-- Return to Top Button -->
    <x-return-top />

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.querySelector("#Quantity-inputs-view"); // The container element
        const decrementButton = container.querySelector("[data-input-counter-decrement]"); // Decrement button
        const incrementButton = container.querySelector("[data-input-counter-increment]"); // Increment button
        const quantityInput = container.querySelector("[data-input-counter]"); // The quantity input field

        // Get the stock quantity from a data attribute
        const stockQuantity = parseInt(container.getAttribute("data-stock-quantity"), 10);

        // Decrement button logic
        decrementButton.addEventListener("click", function() {
            let value = parseInt(quantityInput.value, 10);
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });

        // Increment button logic (Prevent exceeding stock quantity)
        incrementButton.addEventListener("click", function() {
            let value = parseInt(quantityInput.value, 10);
            if (value < stockQuantity) {
                quantityInput.value = value + 1;
            }
        });
    });
</script>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

</html>