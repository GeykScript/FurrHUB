<header class="fixed top-0 left-0 w-full z-50 flex flex-col flex-col-reverse md:flex-row justify-between items-center lg:px-10 bg-[#F0A02C] shadow-lg">
    <div class="flex h-[90px] w-[220px] lg:h-[120px] lg-w-[240px] hidden md:block">
        <a href="{{route('dashboard')}}" class="border-none focus:outline-none focus:ring-0 focus:border-transparent">
            <img src="{{ asset('logo/furrhub.png') }}" alt="furrhub-logo" class="h-[100px]  lg:h-[120px] lg:w-[290px] object-cover" /></a>
    </div>

    <div class="relative flex flex-row lg:w-[60rem] w-auto p-2 justify-around lg:gap-10">
        <form id="search-form" action="{{ route('search.products') }}" method="GET" class="flex items-center w-full p-2 rounded-lg">
            <input type="search" id="search" name="search" placeholder="Search" required
                class="w-full h-[40px] lg:h-[50px] px-4 text-[13px] lg:text-[18px] rounded-l-lg outline-none border-none"
                autocomplete="off" />

            <button type="submit" class="bg-[#35B5D3] h-[40px] lg:h-[50px] lg:w-[80px] w-[50px] flex items-center justify-center rounded-r-lg">
                <img src="{{ asset('logo/search-white.svg') }}" alt="search" class="h-[22px] w-[22px] lg:h-[30px] lg:w-[30px]" />
            </button>
        </form>
        <!-- Dropdown for Search Results -->
        <div id="search-results" class="absolute top-[4rem] left-4 right-4  lg:w-[46rem] bg-white shadow-lg rounded-b-lg hidden z-50 overflow-hidden border border-gray-200 mt-1 focus:outline-none">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#search').on('keyup', function() {
                        let query = $(this).val();

                        if (query.length > 1) { // Only search when more than 1 character
                            $.ajax({
                                url: "{{ route('search.products') }}",
                                type: "GET",
                                data: {
                                    search: query
                                },
                                success: function(response) {
                                    let resultsDiv = $('#search-results');
                                    resultsDiv.empty();

                                    if (response.length > 0) {
                                        response.forEach(product => {
                                            let form = `
                                    <form action="{{ route('product.view') }}" method="GET" class="block px-4 py-2 hover:bg-orange-200 search-item">
                                        <input type="hidden" name="product_id" value="${product.encrypted_product_id}">
                                        <button type="submit" class="w-full lg:text-lg text-xs text-left">${product.name}</button>
                                    </form>
                                `;
                                            resultsDiv.append(form);
                                        });
                                        resultsDiv.removeClass('hidden');
                                    } else {
                                        resultsDiv.addClass('hidden');
                                    }
                                }
                            });
                        } else {
                            $('#search-results').addClass('hidden');
                        }
                    });

                    // Hide results when clicking outside
                    $(document).on('click', function(e) {
                        if (!$('#search-form').is(e.target) && $('#search-form').has(e.target).length === 0) {
                            $('#search-results').addClass('hidden');
                        }
                    });
                });
            </script>

        </div>


        <div class="flex flex-row text-white  font-semibold mt-4">
            @if (Route::has('login'))

            @auth
            <a href="{{route('shoppingCart')}}" class="flex flex-row gap-0 align-center">
                @else
                <a href="{{route('login')}}" class="flex flex-row gap-0 align-center">
                    @endauth
                    @endif
                    <img src="{{ asset ('logo/cart.svg')}}" alt="user" class="h-[27px] w-[30px] lg:h-[35px] lg:w-[43px]" />
                    <div class="bg-[#F23D3D] h-[20px] w-[35px] lg:h-[27px] lg:w-[45px] rounded-full flex justify-center items-center">
                        <p id="cart-item-count" class="xl:text-[16px] text-[10px] text-white font-bold">
                            {{ session('cart_items_count', 0) }}
                        </p>
                    </div>
                    <script>
                        function updateCartCount() {
                            fetch('/cart/counts') // Adjust the URL to match your route
                                .then(response => response.json())
                                .then(data => {
                                    const count = data.count || 0;

                                    // Update the badge text
                                    const badgeElement = document.getElementById('cart-item-count');
                                    badgeElement.textContent = count;

                                    // Hide the badge if the count is 0

                                })
                                .catch(error => {
                                    console.error('Error fetching cart counts:', error);
                                });
                        }

                        // Call the function once on page load
                        document.addEventListener('DOMContentLoaded', () => {
                            updateCartCount();
                        });
                    </script>

                </a>
                <!-- <p class="pt-1 text-">Cart</p> -->
        </div>
    </div>



    <div class="flex flex-row gap-3 ml-auto xl:ml-0">
        <div class="flex flex-row text-black text-[12px] lg:text-[20px] font-semibold px-3 lg:px-0">
            <nav class="flex flex-row gap-1 md:gap-1 align-center">
                @if (Route::has('login'))

                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md  hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex flex-row items-center gap-2 justify-center">

                                <p class="">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>

                                @if (Auth::user()->profile_img)
                                <img id="profile" src="{{ asset('storage/profile_picture/' . Auth::user()->profile_img) }}" alt="Profile Picture" class="h-[25px] w-[25px] lg:h-[37px] lg:w-[39px] border border-gray-800 rounded-full object-cover">
                                @else
                                <img id="profile" src="{{ asset('logo/user.png') }}" alt="Profile Picture" class="h-[25px] w-[25px] lg:h-[35px] lg:w-[35px]  rounded-full object-cover">
                                @endif
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')" class="hover:bg-orange-300">
                            <div class="flex flex-row items-center gap-1">

                                <i data-lucide="circle-user" class=" text-black"></i>

                                {{ __('Profile') }}
                            </div>
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('orders')" class="hover:bg-orange-300">
                            <div class="flex flex-row items-center gap-1">
                                <i data-lucide="shopping-bag" class=" text-black"></i>
                                {{ __('My Orders') }}
                            </div>
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('wishlists')" class="hover:bg-orange-300">
                            <div class="flex flex-row items-center gap-1">
                                <i data-lucide="heart" class=" text-black "></i>
                                {{ __('My Wishlists') }}
                            </div>
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('notifications')" class="hover:bg-orange-300">
                            <div class="flex flex-row items-center space-x-2 relative gap-1">
                                <div class="relative">
                                    <!-- Bell Icon -->
                                    <i data-lucide="bell" class="text-black text-lg"></i>

                                    <!-- Notification Badge -->
                                    <span id="unreadNotificationBadge" class="absolute -top-1 -left-1 bg-red-500 text-white rounded-full h-[16px] w-[16px] text-[9px] font-semibold flex items-center justify-center">
                                        0
                                    </span>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $.ajax({
                                            url: '/notification/count', // <-- your new route
                                            type: 'GET',
                                            success: function(response) {
                                                if (response.unreadNotificationCount > 0) {
                                                    $('#unreadNotificationBadge')
                                                        .text(response.unreadNotificationCount)
                                                        .removeClass('hidden');
                                                }
                                            }
                                        });
                                    });
                                </script>

                                {{ __('Notifications') }}
                            </div>

                        </x-dropdown-link>

                        <x-dropdown-link :href="route('messages')" class="hover:bg-orange-300">
                            <div class="flex flex-row items-center space-x-2 relative gap-1">
                                <div class="relative">
                                    <i data-lucide="message-square-text" class=" text-black"></i>
                                    <!-- Notification Badge -->

                                    <span id="unreadReplyBadge" class="absolute -top-1 -left-1 bg-red-500 text-white rounded-full h-[16px] w-[16px] text-[9px] font-semibold flex items-center justify-center">
                                        0
                                    </span>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $.ajax({
                                            url: '/message/count',
                                            type: 'GET',
                                            success: function(response) {
                                                if (response.unreadReplyCount > 0) {
                                                    $('#unreadReplyBadge')
                                                        .text(response.unreadReplyCount)
                                                        .removeClass('hidden');
                                                }
                                            }
                                        });
                                    });
                                </script>
                                {{ __('Messages') }}
                            </div>

                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout') " class="hover:bg-orange-300"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <div class="flex flex-row items-center gap-1">
                                    <i data-lucide="log-out" class=" text-black"></i>
                                    {{ __('Log Out') }}
                                </div>
                            </x-dropdown-link>
                        </form>





                    </x-slot>
                </x-dropdown>
                @else <a class="pt-1   hover:text-white" href="{{ route('login') }}">Log in </a>
                <p class="pt-1">|</p>
                @if (Route::has('register'))
                <a class="pt-1 hover:text-white" href="{{ route('register') }}">Sign up</a>
                @endif
                @endauth

                @endif
            </nav>
        </div>
    </div>
</header>