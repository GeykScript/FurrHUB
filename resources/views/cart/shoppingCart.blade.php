<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'FurrHUB') }}</title>
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="{{ asset('logo/logo1.png') }}" type="image/png">

    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/welcome-page.css', 'resources/js/carousel.jsx' ])


</head>


<dialog id="noItemsSelectedDialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="triangle-alert " class="text-center w-32 h-32 text-orange-500"></i>
        </div>
        <p class="mt-2 text-lg text-gray-800">No items selected to remove.</p>
        <button onclick="document.getElementById('noItemsSelectedDialog').close();" class="mt-4 w-80 outline-none focus:outline-none border-white bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
            Okay
        </button>
    </div>
</dialog>

<dialog id="deleteConfirmationDialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="triangle-alert " class="text-center w-20 h-20 text-red-500"></i>
        </div>
        <p class="mt-2 text-lg text-gray-800">Are you sure you want to delete the selected items?</p>
        <div class="flex justify-center mt-4">
            <button id="confirmDeleteBtn" class="mr-4 w-full outline-none focus:outline-none border-white bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                Yes
            </button>
            <button onclick="document.getElementById('deleteConfirmationDialog').close();" class="w-full outline-none focus:outline-none border-red-500 bg-white text-red-600 py-2 px-4 rounded-lg hover:border-red-600 hover:bg-red-100">
                No
            </button>
        </div>
    </div>
</dialog>

<dialog id="no-items-dialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="triangle-alert" class="text-center w-32 h-32 text-orange-500"></i>
        </div>
        <p class="mt-2 text-lg text-gray-800">No items selected.</p>
        <button id="close-dialog" class="mt-4 w-80 outline-none focus:outline-none border-white bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
            Okay
        </button>
    </div>
</dialog>

<!-- Success Dialog -->
<dialog id="removeItemSuccessDialog" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30 border-none outline-none">
    <div class="bg-white p-6 rounded-lg text-center justify-center">
        <div class="flex justify-center items-center text-center">
            <i data-lucide="circle-check-Big" class="text-center w-20 h-20 text-green-500"></i>
        </div>
        <p id="dialogMessage" class="mt-2 text-lg text-gray-800"></p>
        <button onclick="document.getElementById('removeItemSuccessDialog').close();" class="mt-4 w-full outline-none focus:outline-none border-white bg-orange-500 text-white py-2 px-4 rounded-lg hover:bg-orange-600">
            Okay
        </button>
    </div>
</dialog>


<!-- navbar section -->
<x-nav-bar />
<div class="lg:pt-[90px] pt-[110px] lg:mb-10"></div>

<!-- Main Body-->

<body class="font-sans antialiased bg-white-600 dark:text-black/50 min-h-screen flex flex-col">
    <div class="bg-white flex-grow">
        <div class="relative  p-2">
            <!-- title cart part -->
            <div class="flex flex-row xl:text-5xl text-xl font-bold xl:px-[10rem]">
                <i data-lucide="shopping-bag" class="xl:w-[5rem] xl:h-[5rem] w-[2rem] h-[2rem] mt-3 xl:mt-0 text-orange-500"> </i>
                <div class="items-center justify-center p-4">
                    <h1 class="items-center text-orange-500">Shopping Cart </h1>
                </div>
            </div>
            <div class="lg:mt-10   ">
                <div class="md:px-[10rem] flex gap-5 items-center px-4  text-sm md:text-lg">
                    <a href="{{route('dashboard')}}" class="hover:underline hover:text-orange-400">Home</a>
                    <div> > </div>
                    <a href="{{route('shoppingCart')}}" class="hover:underline text-orange-500">Shopping Cart</a>
                </div>
            </div>
            <div class="xl:px-[10rem] xl:py-8 lg:px-5 lg:py-5 ">
                <!-- table head part -->
                <div class="w-full text-xl text-gray-500 dark:text-gray-400">
                    <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 text-xl font-bold text-gray-800 uppercase border border-sky-300 bg-sky-200 p-4 hidden xl:grid rounded-xl">
                        <div class="flex justify-between pr-[20rem] col-span-2">
                            <div class="px-20 py-3 text-center xl:text-left">Product</div>
                        </div>
                        <div class="px-6 py-3 text-center col-span-1">Total Price</div>
                        <div class="px-6 py-3 text-center col-span-1">Quantity</div>
                        <div class="px-6 py-3 text-center col-span-1">Actions</div>
                    </div>
                </div>
                <!-- product part -->
                <div class="relative h-full mt-2 gap-4">
                    @if(session('remove_success'))
                    <div class="bg-green-500 text-white p-2 rounded-md">
                        {{ session('remove_success') }}
                    </div>
                    @endif

                    @if($cartItems->isEmpty())
                    <div class="flex bg-white py-40 border-gray-300 text-gray-900 lg:text-xl items-center justify-center bg-[#FAFAFA]">
                        <p>No items in your cart.</p>
                    </div>
                    @else

                    @foreach ($cartItems as $item)
                    <form action="{{ route('checkoutPage') }}" method="POST" id="checkout-form" onsubmit="return false;">
                        @csrf
                        <div class=" grid grid-rows-1 xl:grid-cols-5 xl:gap-5 gap-4 bg-white p-4 border-b border-gray-300 text-gray-900 text-xl items-center bg-[#FAFAFA] mt-2">
                            <div class="flex flex-col xl:flex-row items-center xl:gap-20 gap-2 col-span-2">
                                <div class="flex flex-row items-center gap-10">
                                    <div class="flex justify-center xl:justify-start">
                                        @php
                                        $isChecked = session()->has('buy_now_product_id') && session('buy_now_product_id') == $item->product_id;
                                        @endphp
                                        <input
                                            id="checkbox-item-{{ $item->product_id }}"
                                            type="checkbox"
                                            value="{{ $item->product_id }}"
                                            class="rounded border-2 border-sky-400 text-sky-600 shadow-sm focus:ring-sky-500 w-[1.3rem] h-[1.3rem] hover:cursor-pointer"
                                            {{ $isChecked ? 'checked' : '' }}
                                            data-product-id="{{ $item->product_id }}">

                                        <input type="text" name="product_id" value="{{ $item->product->discounted_price }}" hidden>
                                        <label for="checkbox-item-{{ $item->product_id }}" class="sr-only">checkbox</label>
                                        @if($isChecked)
                                        {{ session()->forget('buy_now_product_id') }}
                                        @endif
                                    </div>
                                    <label for="checkbox-item-{{ $item->product_id }}" class="w-40 h-40 rounded-2">
                                        <img src="{{ asset('storage/Products/' . $item->product->image_url) }}" alt="product" class="w-40 h-40 rounded-md object-cover">
                                    </label>
                                </div>
                                <p class="lg:w-80 text-wrap text-center text-xl font-bold xl:text-left"><label for="checkbox-item-{{ $item->product_id }}">{{ $item->product->name }}</label></p>
                            </div>
                            <div class="flex justify-center font-bold col-span-1 items-center">
                                <p class="text-orange-500 text-xl">{{ number_format($item->product->discounted_price, 2) }}</p>
                            </div>
                            <div class="flex justify-center col-span-1">
                                <div id="Quantity-inputs" class="relative flex items-center max-w-[10rem] bg-white border border-gray-200 rounded-xl" data-quantity-stocks="{{ $item->product->stock_quantity }}">
                                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-s-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="minus" class="text-gray-500"></i>
                                    </button>
                                    <input type="number" id="quantity-input" data-input-counter="quantity-input" data-id="{{ $item->id }}"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-white border-x-0 border-gray-100 h-11 text-center text-gray-900 text-xl focus:outline-none focus:ring-0 focus:border-transparent block w-10 xl:w-full py-2.5 appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                        value="{{ $item->quantity }}" min="1" required readonly max="{{$item->product->stock_quantity}}" />
                                    <input type="hidden" name="price-amount" value="{{ $item->product->discounted_price }}">
                                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input"
                                        class="bg-white hover:bg-gray-100 border-gray-100 border rounded-e-xl p-3 h-11 focus:outline-none">
                                        <i data-lucide="plus" class="text-gray-500"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-start md:justify-center col-span-1">
                                <a href="" class="font-medium text-red-500 hover:text-red-400 flex gap-1 remove-item" data-id="{{ $item->id }}">
                                    <i data-lucide="trash-2"></i>
                                    <span class="text-xs lg:text-lg p-1 md:p-0">Remove</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif


                        <!-- fixed bottom part -->
                        @if(!$cartItems->isEmpty())
                        <div class="sticky bottom-0 p-4 border-t-0 border-gray-300 shadow-[0_-2px_10px_rgba(0,0,0,0.2)] mt-5 bg-orange-200 rounded-lg xl:h-24">
                            <div class="grid grid-cols-1 xl:grid-cols-5 gap-4 xl:mt-3">
                                <div class="col-span-2 flex flex-row justify-between lg:pr-[10rem] ">
                                    <div class="flex flex-row items-center gap-2">
                                        <input id="checkbox-all" type="checkbox" class="rounded border-2 border-orange-400 text-orange-600 shadow-sm focus:ring-orange-500 w-[1.3rem] h-[1.3rem] hover:cursor-pointer">
                                        <label for="checkbox-all" class="xl:text-xl font-bold text-gray-800 ">Select All</label>
                                    </div>
                                    <div class="flex justify-start">
                                        <button id="remove-selected" class="font-medium text-red-500 hover:text-red-400 flex gap-1 items-center">
                                            <i data-lucide="trash-2"></i>
                                            <span class="text-xs lg:text-lg p-1 md:p-0 font-semibold hidden md:block">Remove</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center gap-2 col-span-1 xl:col-span-1">
                                    <p class="xl:text-xl text-sm text-gray-800">Total</p>
                                    <p id="total-quantity-display" class="xl:text-xl text-sm text-orange-500">
                                        (<span>0</span> items)
                                    </p>
                                </div>
                                <div class="flex flex-row items-center gap-2 col-span-1 xl:col-span-1 lg:justify-center">
                                    <p class="xl:text-3xl text-lg font-bold text-orange-500">₱</p>
                                    <p id="total-amount-display" class="xl:text-2xl text-lg font-bold text-orange-500">0.00</p>
                                </div>
                                <!-- Hidden input to store selected items id -->
                                <input type="text" name="selected_items" id="selected-items-input" hidden>
                                <!-- Checkout Button -->
                                <button type="button" id="checkout-button" class="col-span-2 md:col-span-1 bg-orange-500 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded-xl w-full  xl:h-12">
                                    Checkout
                                </button>
                            </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
</body>
<!-- Footer -->
<x-footer bgColor=" bg-gradient-to-r from-orange-600" />

<!-- Scripts -->
<script>
        // Show the success dialog if the session data is set
        //Shows the success and error message in a dialog/ modal
        window.onload = function() {
            const message = sessionStorage.getItem('removeItemMessage');
            const success = sessionStorage.getItem('removeItemSuccess');

            if (success === 'true' && message) {
                // Show the dialog with the success message
                const successDialog = document.getElementById('removeItemSuccessDialog');
                const dialogMessage = document.getElementById('dialogMessage');

                dialogMessage.innerText = message; // Set the success message
                successDialog.showModal(); // Show the dialog

                // Clear the session data after showing the dialog
                sessionStorage.removeItem('removeItemMessage');
                sessionStorage.removeItem('removeItemSuccess');
            }
        };


        //-----------------script for the shopping cart
        //it also handles CRUD operations for the cart items
        //this script is used to update the cart when the page loads
        //and when the user selects or deselects items
        //it also updates the total quantity and amount of the selected items
        document.addEventListener("DOMContentLoaded", function() {
            const checkAllCheckbox = document.getElementById("checkbox-all");
            const itemCheckboxes = document.querySelectorAll("input[type='checkbox'][id^='checkbox-item-']");
            const removeSelectedButton = document.getElementById("remove-selected");
            const selectedItemsInput = document.getElementById("selected-items-input");


            const updateCart = () => {
                const selectedItems = [];
                document.querySelectorAll("input[type='checkbox'][id^='checkbox-item-']:checked").forEach((checkbox) => {
                    selectedItems.push(checkbox.value);
                });

                //this is the products id that are selected to be submitted to checkout using POST
                //IN AN ARRAY
                // Set the value of the hidden input to the selected items
                // console.log("Selected items:", selectedItems); // for debugging
                selectedItemsInput.value = selectedItems.join(",");


                // Update the total quantity and amount
                //display the total quantity and amount of the selected items
                if (selectedItems.length > 0) {
                    $.ajax({
                        url: "{{ route('cart.updateSelectedItems') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            selected_items: selectedItems,
                        },
                        success: function(response) {
                            document.getElementById("total-quantity-display").innerHTML = `(${response.total_quantity} items)`;
                            document.getElementById("total-amount-display").textContent = Number(response.total_amount).toLocaleString('en-US', {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    document.getElementById("total-quantity-display").innerHTML = `(0 items)`;
                    document.getElementById("total-amount-display").textContent = (0).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            };

            // "Check All" functionality
            checkAllCheckbox.addEventListener("change", function() {
                const isChecked = this.checked;
                itemCheckboxes.forEach((checkbox) => {
                    checkbox.checked = isChecked;
                });
                updateCart();
            });

            // Add event listener for individual item checkboxes
            itemCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    if (!this.checked) {
                        checkAllCheckbox.checked = false; // Uncheck "Check All" if any item is unchecked
                    } else if (document.querySelectorAll("input[type='checkbox'][id^='checkbox-item-']:checked").length === itemCheckboxes.length) {
                        checkAllCheckbox.checked = true; // Check "Check All" if all items are checked
                    }
                    updateCart();
                });
            });


            // Update total quantity and amount on page load
            updateCart();


            // Remove all selected items
            // Show confirmation dialog if items are selected
            // Otherwise, show "No Items Selected" modal dialog
            // Remove selected items using AJAX
            // and update the cart
            removeSelectedButton.addEventListener("click", function(e) {
                e.preventDefault();

                const selectedItems = [];
                document.querySelectorAll("input[type='checkbox'][id^='checkbox-item-']:checked").forEach((checkbox) => {
                    selectedItems.push(checkbox.value);
                });

                if (selectedItems.length > 0) {
                    // Show confirmation dialog
                    const deleteDialog = document.getElementById("deleteConfirmationDialog");
                    deleteDialog.showModal();

                    // Handle confirmation button
                    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
                    confirmDeleteBtn.onclick = function() {
                        // Close the dialog
                        deleteDialog.close();

                        $.ajax({
                            url: "{{ route('cart.deleteSelectedItems') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                selected_items: selectedItems,
                            },
                            success: function(response) {
                                if (response.success) {
                                    sessionStorage.setItem('removeItemMessage', response.message);
                                    sessionStorage.setItem('removeItemSuccess', 'true');
                                    location.reload();
                                } else {
                                    alert("Error: " + (response.error || "Unexpected error occurred."));
                                }
                            },
                            error: function(xhr) {
                                console.error("Error removing items:", xhr.responseText);
                                alert("Failed to remove selected items. Please try again.");
                            }
                        });
                    };
                } else {
                    // Show "No Items Selected" modal dialog
                    const noItemsDialog = document.getElementById("noItemsSelectedDialog");
                    noItemsDialog.showModal();
                }
            });


            // Quantity update logic (already present)
            //update the quantity of the item using ajax
            //updates quantity and pass the value to a function
            //to update the total price and quantity
            //also updates the quantity in the database
            document.querySelectorAll("#Quantity-inputs").forEach((container) => {
                const decrementButton = container.querySelector("[data-input-counter-decrement]");
                const incrementButton = container.querySelector("[data-input-counter-increment]");
                const quantityInput = container.querySelector("[data-input-counter]");
                const itemId = quantityInput.getAttribute("data-id");
                const Quantitystock = parseInt(container.getAttribute("data-quantity-stocks"), 10);


                function updateQuantity(newQuantity) {
                    $.ajax({
                        url: "{{ route('cart.updateQuantity') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            item_id: itemId,
                            quantity: newQuantity
                        },
                        success: function(response) {
                            quantityInput.value = newQuantity;
                            updateCart(); // Recalculate totals after quantity change
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });
                }

                decrementButton.addEventListener("click", function() {
                    let value = parseInt(quantityInput.value, 10);
                    if (value > 1) {
                        updateQuantity(value - 1);
                    }
                });

                incrementButton.addEventListener("click", function() {
                    let value = parseInt(quantityInput.value, 10);
                    if (value < Quantitystock) {
                        updateQuantity(value + 1);
                    }
                });
            });
        });





        //script for remove  specific item using ajax
        //also shows the delete confirmation dialog
        $(document).on('click', '.remove-item', function(e) {
            e.preventDefault(); // Prevent default action

            // Get the item ID from the clicked element's data-id attribute
            let itemId = $(this).data('id');
            // console.log("Item ID being sent:", itemId); // for debugging if the id is being sent correctly

            if (!itemId) {
                document.getElementById('noItemsSelectedDialog').showModal();
                return;
            }

            // Show the delete confirmation dialog
            const confirmationDialog = document.getElementById('deleteConfirmationDialog');
            confirmationDialog.showModal();

            // Store item ID in a temporary variable
            confirmationDialog.dataset.itemId = itemId;

        });

        // Handle user's confirmation for deletion
        $('#confirmDeleteBtn').on('click', function() {
            const confirmationDialog = document.getElementById('deleteConfirmationDialog');
            let itemId = confirmationDialog.dataset.itemId; // Retrieve the stored ID

            if (!itemId) return; // Ensure ID exists

            confirmationDialog.close(); // Close the dialog

            // Proceed with AJAX request
            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    item_id: itemId
                },
                success: function(response) {
                    console.log("Success Response:", response); // Debugging

                    if (response.success) {
                        sessionStorage.setItem('removeItemMessage', response.message);
                        sessionStorage.setItem('removeItemSuccess', 'true');
                        location.reload();
                    } else {
                        alert("Error: " + (response.error || "Unexpected error occurred."));
                    }
                },
                error: function(xhr) {
                    console.log("Error Response:", xhr.responseText); // Debugging

                    let response = xhr.responseJSON;
                    alert("Error: " + (response?.error || "An unexpected error occurred. Please try again."));
                }
            });

            delete confirmationDialog.dataset.itemId; // Remove stored ID after request
        });

        // Ensure item ID is reset when dialog is closed
        $('#deleteConfirmationDialog').on('close', function() {
            delete this.dataset.itemId; // Clear stored item ID
        });




        // Checkout button functionality
        //shows a dialog if no items are selected
        //otherwise submits the form
        document.getElementById("checkout-button").addEventListener("click", function() {
            let selectedItems = document.getElementById("selected-items-input").value.trim();
            event.preventDefault(); // Prevent form submission

            if (selectedItems === "") {
                document.getElementById("no-items-dialog").showModal(); // Show dialog

            } else {
                document.getElementById("checkout-form").submit(); // Submit if valid
            }
        });

        // Close the dialog when the button is clicked
        document.getElementById("close-dialog").addEventListener("click", function() {
            document.getElementById("no-items-dialog").close();
        });
    </script>
</html>