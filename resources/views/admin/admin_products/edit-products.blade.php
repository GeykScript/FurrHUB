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
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 w-72 h-full bg-white border-l shadow-lg z-50">
            <div class="p-4 ">
                <div class="flex items-center mb-8">
                    <img src="{{ asset('logo/logo1.png') }}" alt="FurrHub Logo" class="h-[70px] w-[150px] lg:h-[125px] lg:w-[300px]" />
                </div>

                <nav class="font-bold">
                    <ul>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{ route('admin_dashboard') }}" class="block p-3 flex items-center text-lg text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="house" class="w-10 h-10 pr-2 ml-2"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_messages')}}" class="block p-3 text-lg flex items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="messages-square" class="w-10 h-10 pr-2 ml-2"></i>
                                Messages
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_services')}}" class="block p-3 flex items-center text-lg  text-black hover:bg-gray-300rounded transition duration-200">
                                <i data-lucide="heart" class="w-10 h-10 pr-2 ml-2"></i>
                                Services
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_services_history')}}" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notebook-text" class="w-10 h-10 pr-2 ml-2"></i>
                                Service History
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="{{route('admin_products')}}" class="block p-3 flex text-lg items-center text-white bg-[#F0A02C]   rounded transition duration-200">
                                <i data-lucide="shopping-basket" class="w-10 h-10 pr-2 ml-2"></i>
                                Manage Products
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="orders" class="block p-3 flex text-lg items-center text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="shopping-cart" class="w-10 h-10 pr-2 ml-2"></i>
                                Orders
                            </a>
                        </li>
                        <li class="mb-2 border border-gray shadow-sm rounded-lg">
                            <a href="appointments" class="block p-3 flex items-center text-lg text-black hover:bg-gray-300 rounded transition duration-200">
                                <i data-lucide="notepad-text" class="w-10 h-10 pr-2 ml-2"></i>
                                Appointments
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="absolute bottom-0 w-full p-6 ">
                <button class="w-full bg-[#4B4B4B] text-white font-bold py-2 rounded hover:bg-gray-300 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400">Log Out</button>
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
                    <a href="{{route('admin_products.page')}}" class="hover:underline text-orange-500">Edit Product</a>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center mt-5 w-full px-8">

                <div class="bg-white shadow-md rounded-lg p-6 w-full px-20 ">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

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
                                    <textarea id="product_description" name="product_description" rows="4" class="shadow appearance-none border rounded w-full py-2  text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    {{$product->description }}
                                    </textarea>
                                </div>

                                <div class="grid grid-cols-2 gap-2 ">
                                    <div class="mb-4">
                                        <label for="product_quantity" class="block text-gray-700 text-sm font-bold mb-2">Product Quantity</label>
                                        <input type="number" id="product_quantity" name="product_quantity" value="{{$product->stock_quantity}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="expiration_date" class="block text-gray-700 text-sm font-bold mb-2">Expiration Date</label>
                                        <input type="date" id="expiration_date" name="expiration_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>

                                </div>


                            </div>
                            <div class="col-span-1">

                                <div class="mt-4">
                                    <label for="uploadPhoto" class="block text-gray-700">Upload Photo</label>
                                    <div class="border-dashed border-2 border-gray-300  text-center rounded-lg cursor-pointer mt-2 w-full h-20 flex items-center justify-center hover:bg-gray-100" onclick="document.getElementById('uploadPhoto').click()">
                                        <p id="text-uploadPhoto" class="text-gray-500">
                                            Drag your photo here or <span class="text-orange-500 cursor-pointer">Browse from device</span>
                                        </p>
                                        <p id="fileName-uploadPhoto" class="mt-2 text-sm text-orange-600 px-3 py-1 rounded-md w-fit max-w-full truncate" hidden></p>
                                        <input type="file" id="uploadPhoto" name="uploadPhoto" class="hidden" accept="image/*">
                                    </div>
                                </div>
                                <div class="mt-4"><label class="block text-gray-700  text-xs">Upload Optional Photo</label></div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div class="col-span-1 ">
                                        <div class="border-dashed border-2 border-gray-300  text-center rounded-lg cursor-pointer mt-2 w-full h-20 flex items-center justify-center hover:bg-gray-100" onclick="document.getElementById('uploadPhoto2').click()">
                                            <p id="text-uploadPhoto2" class="text-gray-500 text-xs">
                                                Drag your photo here or <span class="text-orange-500 cursor-pointer">Browse from device</span>
                                            </p>
                                            <p id="fileName-uploadPhoto2" class="mt-2 text-sm text-orange-600 px-3 py-1 rounded-md w-fit max-w-full truncate" hidden></p>
                                            <input type="file" id="uploadPhoto2" name="uploadPhoto2" class="hidden" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-span-1">
                                        <div class="border-dashed border-2 border-gray-300 text-center rounded-lg cursor-pointer mt-2 w-full h-20 flex items-center justify-center hover:bg-gray-100" onclick="document.getElementById('uploadPhoto3').click()">
                                            <p id="text-uploadPhoto3" class="text-gray-500 text-xs">
                                                Drag your photo here or <span class="text-orange-500 cursor-pointer">Browse from device</span>
                                            </p>
                                            <p id="fileName-uploadPhoto3" class="mt-2 text-sm text-orange-600 px-3 py-1 rounded-md w-fit max-w-full truncate" hidden></p>
                                            <input type="file" id="uploadPhoto3" name="uploadPhoto3" class="hidden" accept="image/*">
                                        </div>
                                    </div>
                                </div>



                                <div class="grid grid-cols-2 gap-2 mt-2">
                                    <div class="mb-4">
                                        <label for="product_price" class="block text-gray-700 text-sm font-bold mb-2">Product Price</label>
                                        <input type="number" id="product_price" name="product_price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="discount" class="block text-gray-700 text-sm font-bold mb-2">Discount</label>
                                        <select id="discount" name="discount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                            <option value="">Select Discount</option>
                                            @foreach ($discounts as $discount)
                                            <option value="{{ $discount->id }}">{{ $discount->discount_value*100 }}%</option>
                                            @endforeach
                                            <option value="">No Discount</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <button type="submit" class="bg-[#F0A02C] hover:bg-orange-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                                        submit
                                    </button>
                                    <a href="{{route('admin_products')}}    " class="text-center bg-gray-100  hover:bg-gray-200 text-gray-600 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Cancel</a>
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
        document.getElementById('uploadPhoto').addEventListener('change', function() {
            const fileNameDisplay = document.getElementById('fileName-uploadPhoto');
            const text = document.getElementById('text-uploadPhoto');

            if (this.files.length > 0) {
                fileNameDisplay.removeAttribute('hidden');
                fileNameDisplay.textContent = `📁 Selected file: ${this.files[0].name}`;
                text.textContent = '';
            } else {
                fileNameDisplay.textContent = '';
                text.textContent = 'Drag your photo here or Browse from device';
            }
        });

        document.getElementById('uploadPhoto2').addEventListener('change', function() {
            const fileNameDisplay = document.getElementById('fileName-uploadPhoto2');
            const text = document.getElementById('text-uploadPhoto2');

            if (this.files.length > 0) {
                fileNameDisplay.removeAttribute('hidden');
                fileNameDisplay.textContent = `📁 Selected file: ${this.files[0].name}`;
                text.textContent = '';
            } else {
                fileNameDisplay.textContent = '';
                text.textContent = 'Drag your photo here or Browse from device';
            }
        });
        document.getElementById('uploadPhoto3').addEventListener('change', function() {
            const fileNameDisplay = document.getElementById('fileName-uploadPhoto3');
            const text = document.getElementById('text-uploadPhoto3');

            if (this.files.length > 0) {
                fileNameDisplay.removeAttribute('hidden');
                fileNameDisplay.textContent = `📁 Selected file: ${this.files[0].name}`;
                text.textContent = '';
            } else {
                fileNameDisplay.textContent = '';
                text.textContent = 'Drag your photo here or Browse from device';
            }
        });




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