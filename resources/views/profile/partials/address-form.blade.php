    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="lg:text-2xl text-lg font-semibold text-gray-800">My Addresses</h2>
        <!-- Add New Address Button -->
        <button onclick="document.getElementById('addressModal').showModal()"
            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg flex items-center gap-2 text-xs lg:text-lg">
            <i data-lucide="plus" class="w-4 h-4 lg:h-6 lg:w-6"></i> Add New Address
        </button>
    </div>

    <p class="text-sm px-3  text-gray-600">Please ensure that you have at least one default address saved for smooth order processing and delivery.</p>
    <!-- Address List -->
    <div class="border-t grid grid-cols-3 px-4">
        @if (session()->has('success'))
        <div class="col-span-3 mt-1 text-white bg-green-400  border border-green-400 p-3 rounded relative">
            <span class="text-sm font-medium ">{{ session('success') }}</span>
        </div>
        @endif


        @php
        $count = 0;
        @endphp
        @if ($addresses->isEmpty())
        <div class="col-span-3 mt-1 ">
            <h1 class="text-md  text-gray-500 text-center">No addresses found.</h1>
            <p class="text-gray-700 mt-1 text-center">
                You can add a new address by clicking the "Add New Address" button above.
            </p>
        </div>
        @else
        @foreach ($addresses as $address)
        @php
        $count = $count + 1;
        @endphp
        <div class="col-span-2 mt-2 border-b border-gray-200 pb-4 px-4">
            <h3 class="text-sm text-gray-500 font-semibold">Address {{$count}}</h3>
            <p class="text-gray-700  font-semibold mt-1">
                {{ $address->street }}, {{ $address->barangay }}, {{ $address->city }}, {{ $address->province }}, {{ $address->postal_code }} , ({{$address->description}})
            </p>


        </div>

        <div class="col-span-1 border-b border-gray-200 pb-4 px-12">
            <!-- Action Buttons -->
            <div class="mt-4  lg:flex items-center justify-end  gap-5 ">
                @if($address->default == 1)
                <p class="border border-orange-500 text-orange-500 px-3 py-1 rounded-lg hover:border-orange-500 hover:text-orange-500  text-[10px] lg:text-[14px] mt-2">Default Adress</p>
                @endif


                <!-- Modal edit Address -->
                <dialog id="addressModalEdit" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30">
                    <form method="POST" action="{{ route('address.update') }}" class="relative bg-white p-6 rounded-lg">
                        @csrf
                        <input type="hidden" name="UpdateAddressId" id="UpdateAddressId">
                        <!-- Close Button -->
                        <div class="absolute top-2 right-2">
                            <button type="button" onclick="document.getElementById('addressModalEdit').close()"
                                class="text-orange-500 hover:text-orange-600 "> <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" /> </button>
                        </div>

                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Address</h2>

                        <!-- Address Form -->
                        <div class="grid lg:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="fullname">Full Name</x-input-label>
                                <x-text-input type="text" id="fullname" name="fullname" class="border p-2 rounded w-full mt-1" required></x-text-input>
                            </div>
                            <div>
                                <x-input-label for="contact_number">Contact Number</x-input-label>
                                <x-text-input type="text" id="contact_number" name="contact_number" class="border p-2 rounded w-full mt-1" required></x-text-input>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="province">Province</x-input-label>
                            <x-text-input type="text" id="province" name="province" class="border p-2 rounded w-full mt-1" required></x-text-input>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="city">City</x-input-label>
                            <x-text-input type="text" id="city" name="city" class="border p-2 rounded w-full mt-1" required></x-text-input>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="barangay">Barangay</x-input-label>
                            <x-text-input type="text" id="barangay" name="barangay" class="border p-2 rounded w-full mt-1" required></x-text-input>
                        </div>

                        <div class="grid lg:grid-cols-2 gap-4">
                            <div class="mt-4">
                                <x-input-label for="street">Street, Building, House No.</x-input-label>
                                <x-text-input type="text" id="street" name="street" class="border p-2 rounded w-full mt-1" required></x-text-input>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="postal_code">Postal Code</x-input-label>
                                <x-text-input type="text" id="postal_code" name="postal_code" class="border p-2 rounded w-full mt-1" required></x-text-input>
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description">Description</x-input-label>
                            <x-text-input
                                type="text"
                                id="description"
                                name="description"
                                placeholder="e.g., Landmark, house color, etc."
                                class="border p-2 rounded w-full mt-1"
                                required>
                            </x-text-input>
                        </div>

                        <div class="mt-4 flex items-center">
                            <label for="default" class="inline-flex items-center cursor-pointer">
                                <input id="default" type="checkbox" name="default"
                                    class="rounded border-gray-300 text-sky-600 w-[1.3rem] h-[1.3rem]">
                                <span class="ml-2 text-md text-gray-600">Set as Default Address</span>
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-5 mt-6">
                            <button type="button" onclick="document.getElementById('addressModalEdit').close()"
                                class="text-sky-500 hover:text-sky-600">Cancel</button>
                            <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded-lg">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </dialog>

                <!-- Modal Delete Address -->
                <dialog id="AddressDeleteModal" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30">
                    <form method="POST" action="{{route('address.delete')}}" class="bg-white p-6 rounded-lg">
                        @csrf
                        <input type="hidden" name="DeleteAddressId" id="DeleteAddressId">

                        <!-- Close Button -->

                        <div class="absolute top-2 right-2">
                            <button type="button" onclick="document.getElementById('AddressDeleteModal').close()"
                                class="text-orange-500 hover:text-orange-600 "> <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" /> </button>
                        </div>

                        <!-- Confirmation Message -->
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
                        <p class="text-gray-600">Are you sure you want to delete this address? This action cannot be undone.</p>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-3 mt-6">
                            <button type="button" onclick="document.getElementById('AddressDeleteModal').close()"
                                class="text-gray-600 hover:text-gray-900">Cancel</button>
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                                Delete
                            </button>
                        </div>
                    </form>
                </dialog>

                <button
                    class="edit-address-btn text-blue-500 hover:underline flex items-center gap-1 mt-2 text-xs lg:text-md"
                    data-id="{{$address->address_id}}"
                    data-fullname="{{$address->fullname}}"
                    data-contact_number="{{$address->contact_number}}"
                    data-province="{{$address->province}}"
                    data-city="{{$address->city}}"
                    data-barangay="{{$address->barangay}}"
                    data-street="{{$address->street}}"
                    data-postal_code="{{$address->postal_code}}"
                    data-description="{{$address->description}}"
                    data-default="{{$address->default}}"
                    onclick="openEditModal(this)">
                    <i data-lucide="notebook-pen" class="w-4 h-4 lg:h-6 lg:w-6"></i> Edit
                </button>

                <button
                    class="text-red-500 hover:underline flex items-center gap-1 mt-2 text-xs lg:text-md"
                    data-id="{{$address->address_id}}"
                    onclick="openDeleteModal(this)">
                    <i data-lucide="trash2" class="w-4 h-4 lg:h-6 lg:w-6"></i> Delete
                </button>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <!-- -----------------Modal Add Address-->
    <dialog id="addressModal" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30">
        <form method="POST" action="{{ route('address.add') }}" class="relative bg-white p-6 rounded-lg">
            @csrf
            <!-- Close Button -->
            <div class="absolute top-2 right-2">
                <button type="button" onclick="document.getElementById('addressModal').close()"
                    class="text-orange-500 hover:text-orange-600 "> <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" /> </button>
            </div>

            <h2 class="text-lg font-semibold text-gray-800 mb-4">New Address</h2>

            <!-- Address Form -->
            <div class="grid lg:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="fullname">Full Name</x-input-label>
                    <x-text-input type="text" id="fullname" name="fullname" class="border p-2 rounded w-full mt-1" required></x-text-input>
                </div>
                <div>
                    <x-input-label for="contact_number">Contact Number</x-input-label>
                    <x-text-input type="text" id="contact_number" name="contact_number" class="border p-2 rounded w-full mt-1" required></x-text-input>
                </div>
            </div>

            <div class="mt-4">
                <x-input-label for="province">Province</x-input-label>
                <x-text-input type="text" id="province" name="province" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>

            <div class="mt-4">
                <x-input-label for="city">City</x-input-label>
                <x-text-input type="text" id="city" name="city" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>

            <div class="mt-4">
                <x-input-label for="barangay">Barangay</x-input-label>
                <x-text-input type="text" id="barangay" name="barangay" class="border p-2 rounded w-full mt-1" required></x-text-input>
            </div>

            <div class="grid lg:grid-cols-2 gap-4">
                <div class="mt-4">
                    <x-input-label for="street">Street, Building, House No.</x-input-label>
                    <x-text-input type="text" id="street" name="street" class="border p-2 rounded w-full mt-1" required></x-text-input>
                </div>

                <div class="mt-4">
                    <x-input-label for="postal_code">Postal Code</x-input-label>
                    <x-text-input type="text" id="postal_code" name="postal_code" class="border p-2 rounded w-full mt-1" required></x-text-input>
                </div>
            </div>

            <div class="mt-4">
                <x-input-label for="description">Description</x-input-label>
                <x-text-input
                    type="text"
                    id="description"
                    name="description"
                    placeholder="e.g., Landmark, house color, etc."
                    class="border p-2 rounded w-full mt-1"
                    required>
                </x-text-input>
            </div>

            <div class="mt-4 flex items-center">
                <label for="default" class="inline-flex items-center cursor-pointer">
                    <input id="default" type="checkbox" name="default" checked
                        class="rounded border-gray-300 text-sky-600 w-[1.3rem] h-[1.3rem]"
                        onclick="return false;">
                    <span class="ml-2 text-md text-gray-600">Set as Default Address</span>
                </label>
            </div>

            <div class="flex justify-end gap-5 mt-6 items-center">
                <button type="button" onclick="document.getElementById('addressModal').close()" class="text-orange-500 hover:text-orange-600">Cancel</button>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg">Add Address</button>
            </div>
        </form>
    </dialog>

    <script>
        function openEditModal(button) {
            // Get the clicked button's data attributes
            const addressId = button.getAttribute('data-id');
            const fullname = button.getAttribute('data-fullname');
            const contactNumber = button.getAttribute('data-contact_number');
            const province = button.getAttribute('data-province');
            const city = button.getAttribute('data-city');
            const barangay = button.getAttribute('data-barangay');
            const street = button.getAttribute('data-street');
            const postalCode = button.getAttribute('data-postal_code');
            const description = button.getAttribute('data-description');
            const defaultAddress = button.getAttribute('data-default'); 

            // Get modal and show it
            const modal = document.getElementById('addressModalEdit');
            modal.showModal();

            // Set hidden input value
            document.getElementById('UpdateAddressId').value = addressId;

            // Set values of form fields
            document.getElementById('fullname').value = fullname;
            document.getElementById('contact_number').value = contactNumber;
            document.getElementById('province').value = province;
            document.getElementById('city').value = city;
            document.getElementById('barangay').value = barangay;
            document.getElementById('street').value = street;
            document.getElementById('postal_code').value = postalCode;
            document.getElementById('description').value = description;


            // Check or uncheck the default checkbox
            const defaultCheckbox = document.getElementById('default');
            defaultCheckbox.checked = (defaultAddress == 1); // Set to true if defaultAddress is 1

            console.log(addressId); // You can remove this in production
        }

        // Delete Address
        function openDeleteModal(button) {
            const address_id = button.getAttribute('data-id');
            const modal = document.getElementById('AddressDeleteModal');
            modal.showModal();

            document.getElementById('DeleteAddressId').value = address_id;

            console.log(address_id); 
        }
    </script>