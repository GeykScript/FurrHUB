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

    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">

    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome-page.css', 'resources/js/carousel.jsx'])

</head>

<body class="bg-gray-100">
    <div class="flex ">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 w-72 h-full bg-white border-l shadow-lg z-50">
            <div class="p-4">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('logo/logo1.png') }}" alt="FurrHub Logo" class="h-[60px] w-[130px] lg:h-[110px] lg:w-[245px]" />
                </div>

                <nav class="font-semibold">
                    <ul>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="house" class="w-7 h-7 pr-2 ml-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_messages') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="messages-square" class="w-7 h-7 pr-2 ml-2"></i>
                                Messages
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_services') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="heart" class="w-7 h-7 pr-2 ml-2"></i>
                                Services
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_services_history') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notebook-text" class="w-7 h-7 pr-2 ml-2"></i>
                                Service History
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_products') }}" class="block p-3 flex items-center text-base text-white bg-[#F0A02C] rounded transition duration-200">
                                <i data-lucide="shopping-basket" class="w-7 h-7 pr-2 ml-2"></i>
                                Manage Products
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_orders') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-cart" class="w-7 h-7 pr-2 ml-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="mb-2 border border-gray-300 shadow-sm rounded-lg">
                            <a href="{{ route('admin_appointments') }}" class="block p-3 flex items-center text-base text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notepad-text" class="w-7 h-7 pr-2 ml-2"></i>
                                Appointments
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="absolute bottom-0 w-full p-4">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-[#4B4B4B] text-white font-semibold py-2 rounded hover:bg-gray-400 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Log Out
                    </button>
                </form>
            </div>
        </div>


        <!-- Main Content -->
        <main class="flex-1 ml-72 w-full bg-gray-100">
            <div class="bg-[#F0A02C] shadow-sm h-26">
                <div class="max-w-full mx-auto px-4 py-3 flex justify-between items-center">
                    <div class="flex items-center">
                        <i data-lucide="calendar-clock" class=" w-16 h-16 pr-2 ml-4 text-white"></i>
                        <div id="datetime" class="text-2xl text-white font-bold mr-6 ml-4"></div>
                    </div>
                    <div class="flex items-center ">
                        <div class="flex items-center justify-between ">
                            <span class="text-2xl text-black  font-semibold">{{$admin->fname}} {{$admin->lname}}</span>
                            <i data-lucide="circle-user" class=" w-10 h-10 pr-2 ml-2"> </i>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex flex-row items-center justify-start md:px-10 px-2 mt-5 h-20  ">
                    <div class="flex flex-row items-center md:gap-2 gap-1 ">
                        <div> <i data-lucide="shopping-basket" class="md:w-12 md:h-12 w-6 h-6 text-orange-500 mx-auto"></i></div>
                        <h1 class="md:text-4xl text-md font-bold text-orange-500 ">Edit Products</h1>
                    </div>
                </div>
            </div>
            <div class="mt-2 w-full">
                <div class="md:px-[5rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('admin_dashboard')}}" class="hover:underline hover:text-orange-400">Dashboard</a>
                    <div> > </div>
                    <a href="{{route('admin_products')}}" class="hover:underline hover:text-orange-500">Products</a>
                    <div> > </div>
                    <p class="hover:underline text-orange-500">Edit Product</p>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center mt-5 w-full px-8">

                <div class="bg-white shadow-md rounded-lg p-6 w-full px-20 ">
                    <form action="{{route('admin_products.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->product_id}}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div class="col-span-1">

                                <div class="mb-4">
                                    <label for="product_psn" class="block text-gray-700 text-sm font-bold mb-2">Product Serial Number</label>
                                    <input type="text" id="product_psn" name="product_psn" value="{{$product->serial_number}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>

                                <div class="mb-4">
                                    <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                                    <input type="text" id="product_name" name="product_name" value="{{$product->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                </div>

                                <div class="mb-4">
                                    <label for="product_category" class="block text-gray-700 text-sm font-bold mb-2">Product Category</label>
                                    <select id="product_category" name="product_category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                        <option value="{{$product->category_id}}" selected>{{ $product->category->name ?? 'Unknown' }}</option>
                                        <option value="{{$product->category_id}}">Food</option>
                                        <option value="{{$product->category_id}}">Treats</option>
                                        <option value="{{$product->category_id}}">Toys</option>
                                        <option value="{{$product->category_id}}">Grooming Supplies</option>
                                        <option value="{{$product->category_id}}">Accessories</option>
                                        <option value="{{$product->category_id}}">Health Needs</option>
                                        <option value="{{$product->category_id}}">Essentials</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="product_description" class="block text-gray-700 text-sm font-bold mb-2">Product Description</label>
                                    <textarea id="product_description" name="product_description" rows="4" class="shadow appearance-none border rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{$product->description}}</textarea>

                                </div>

                                <div class="grid grid-cols-2 gap-2 ">
                                    <div class="mb-4">
                                        <label for="product_quantity" class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
                                        <input type="number" id="product_quantity" name="product_quantity" value="{{$product->stock_quantity}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="expiration_date" class="block text-gray-700 text-sm font-bold mb-2">Expiration Date</label>
                                        <input type="date" id="expiration_date" name="expiration_date" value="{{$product->expiry_date}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>

                                </div>


                            </div>
                            <div class="col-span-1">
                                <div class="grid grid-cols-3 gap-2">
                                    <!-- Image Preview -->
                                    <div class="col-span-3">
                                        Product Images
                                    </div>
                                    @if($product->image_url != null)
                                    <div>
                                        <img src="{{ asset('storage/Products/' . $product->image_url) }}"
                                            alt="Preview Image" class="w-20 h-20 object-cover rounded-lg border border-gray-300">
                                    </div>
                                    @endif
                                    <!-- Image Preview -->
                                    @if($product->image_url_2 != null)
                                    <div id="">
                                        <img src="{{ asset('storage/Products/' . $product->image_url_2) }}"
                                            alt="Preview Image" class="w-20 h-20 object-cover rounded-lg border border-gray-300">
                                    </div>
                                    @endif
                                    <!-- Image Preview -->
                                    @if($product->image_url_3 != null)
                                    <div>
                                        <img src="{{ asset('storage/Products/' . $product->image_url_3) }}"
                                            alt="Preview Image" class="w-20 h-20 object-cover rounded-lg border border-gray-300">
                                    </div>
                                    @endif

                                </div>
                                <div class="mt-4">
                                    <label for="uploadPhoto" class="block text-gray-700">Upload Images to Update</label>
                                    <div class="col-span-1">
                                        <div class="border-dashed border-2 border-gray-300 p-5 text-orange-500">
                                            <input type="file" id="uploadPhoto" name="uploadPhoto" class="" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4"><label class="block text-gray-700  text-sm">Upload Optional Photo</label></div>
                                <div class="grid grid-cols-2 gap-2 mt-2">
                                    <div class="col-span-1">
                                        <div class="border-dashed border-2 border-gray-300 p-5 text-orange-500">
                                            <input type="file" id="uploadPhoto2" name="uploadPhoto2" class="" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="border-dashed border-2 border-gray-300 p-5 text-orange-500">
                                            <input type="file" id="uploadPhoto3" name="uploadPhoto3" class="" accept="image/*">
                                        </div>
                                    </div>
                                </div>



                                <div class="grid grid-cols-2 gap-2 mt-2">
                                    <div class="mb-4">
                                        <label for="product_price" class="block text-gray-700 text-sm font-bold mb-2">Product Price</label>
                                        <input type="number" id="product_price" name="product_price" value="{{$product->price}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="discount" class="block text-gray-700 text-sm font-bold mb-2">Discount</label>
                                        <select id="discount" name="discount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            <option value="">Select Discount</option>
                                            @foreach ($discounts as $discount)
                                            @if ($product->discount_id == $discount->discount_id)
                                            <option value="{{ $discount->discount_id }}" selected data-discount="{{ $discount->discount_value }}">{{ $discount->discount_value * 100 }}%</option>
                                            @else
                                            <!-- Check if the discount value is not already selected -->
                                            @if (!isset($selectedDiscounts) || !in_array($discount->discount_value, $selectedDiscounts))
                                            <option value="{{ $discount->discount_id }}" data-discount="{{ $discount->discount_value }}">{{ $discount->discount_value * 100 }}%</option>
                                            @php
                                            // Store the selected discount value to avoid repeating it in the options
                                            $selectedDiscounts[] = $discount->discount_value;
                                            @endphp
                                            @endif
                                            @endif
                                            @endforeach
                                            <option value=" ">No Discount</option>
                                        </select>

                                    </div>
                                </div>
                                <div>
                                    <p id="final_price_result" class="text-sm text-orange-500 font-semibold mb-4"></p>
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit" class="bg-[#F0A02C] hover:bg-orange-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                                        submit
                                    </button>
                                    <a href="{{route('admin_products')}}" class="text-center bg-gray-100  hover:bg-gray-200 text-gray-600 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


        </main>
    </div>
    </div>
    </div>

    <script>
        const priceInput = document.getElementById('product_price');
        const discountSelect = document.getElementById('discount');
        const finalPriceResult = document.getElementById('final_price_result');

        function calculateDiscount() {
            const price = parseFloat(priceInput.value);
            const selectedOption = discountSelect.options[discountSelect.selectedIndex];
            const discount = parseFloat(selectedOption.getAttribute('data-discount')); // Get the actual discount value (e.g., 0.10)

            if (!isNaN(price) && !isNaN(discount)) {
                // Calculate the discount amount and final price
                const discountValue = price * discount;
                const finalPrice = price - discountValue;

                // Display results
                finalPriceResult.textContent = `Discounted Price: ₱${finalPrice.toFixed(2)}`;
            } else {
                finalPriceResult.textContent = '';
            }
        }

        // Add event listeners to recalculate when price or discount changes
        priceInput.addEventListener('input', calculateDiscount);
        discountSelect.addEventListener('change', calculateDiscount);





        function updateDateTime() {
            const now = new Date();

            // Format date
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            const month = months[now.getMonth()];
            const day = now.getDate();
            const year = now.getFullYear();

            // Format time
            let hours = now.getHours();
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12; // Convert 0 to 12

            // Create formatted strings
            const dateString = `${month} ${day}, ${year}`;
            const timeString = `${hours}:${minutes} ${ampm}`;

            // Update DOM
            document.getElementById('datetime').innerHTML = `${dateString} <br> ${timeString}`;
        }

        // Update immediately and then every second
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>