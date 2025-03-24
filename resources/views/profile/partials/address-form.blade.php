    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="lg:text-2xl text-lg font-semibold text-gray-800">My Addresses</h2>
        <!-- Add New Address Button -->
        <button onclick="document.getElementById('addressModal').showModal()"
            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg flex items-center gap-2 text-xs lg:text-lg">
            <i data-lucide="plus" class="w-4 h-4 lg:h-6 lg:w-6"></i> Add New Address
        </button>
    </div>




    <!-- Address List -->
    <div class="border-t grid grid-cols-3">
        <div class="col-span-2 mt-1">
            <h3 class="text-sm text-gray-500">Address</h3>
            <p class="text-gray-700 mt-1">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa eligendi odit tempora suscipit.
            </p>

            <!-- Default Badge -->
            <span class="text-xs font-semibold text-orange-500 border border-orange-500 px-2 py-1 rounded-md mt-2 inline-block">
                Default
            </span>
        </div>

        <div class="col-span-1">
            <!-- Action Buttons -->
            <div class="mt-4  lg:flex items-center justify-end  gap-5">
                <button class="border border-gray-400 text-gray-700 px-3 py-1 rounded-lg hover:border-orange-500 hover:text-orange-500  text-[10px] lg:text-[14px] mt-2">Set as Default</button>
                <button class="text-blue-500 hover:underline flex items-center gap-1 mt-2  text-xs lg:text-md" onclick="document.getElementById('addressModalEdit').showModal()">
                    <i data-lucide="notebook-pen" class="w-4 h-4 lg:h-6 lg:w-6 "></i> Edit
                </button>
                <button onclick="document.getElementById('deleteModal').showModal()"
                    class="text-red-500 hover:underline flex items-center gap-1 mt-2 text-xs lg:text-md">
                    <i data-lucide="trash2" class="w-4 h-4 lg:h-6 lg:w-6"></i> Delete
                </button>
            </div>
        </div>


    </div>


    <!-- Modal Add -->
    <dialog id="addressModal" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30">
        <form method="POST" class="relative bg-white p-6 rounded-lg">
            <!-- Close Button -->
            <div class="absolute top-2 right-2">
                <button type="button" onclick="document.getElementById('addressModal').close()"
                    class="text-orange-500 hover:text-orange-600 "> <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" /> </button>
            </div>

            <h2 class="text-lg font-semibold text-gray-800 mb-4">New Address</h2>

            <!-- Address Form -->
            <div class="grid grid-cols-2 gap-4">
                <div class="gap-5">
                    <x-input-label for="first-name">First Name</label></x-input-label>
                    <x-text-input type="text" id="first-name" class="border p-2 rounded w-full mt-1"></x-text-input>
                </div>

                <div class="gap-5">
                    <x-input-label for="last-name">Last Name</label></x-input-label>
                    <x-text-input type="text" id="last-name" class="border p-2 rounded w-full mt-1"></x-text-input>
                </div>
            </div>

            <div class="mt-4 gap-5">
                <x-input-label for="address1">Province, City, Barangay</label></x-input-label>
                <x-text-input type="text" id="address1" class="border p-2 rounded w-full mt-1 "> </x-text-input>
            </div>

            <div class="mt-4 gap-2">
                <x-input-label for="postal-code">Postal Code</label></x-input-label>
                <x-text-input type="text" id="postal-code" class="border p-2 rounded w-full mt-1"></x-text-input>
            </div>

            <div class="mt-4 gap-2">
                <x-input-label for="address2">Street Name, Building, House No.</label></x-input-label>
                <x-text-input type="text" id="address2" class="border p-2 rounded w-full mt-1"> </x-text-input>
            </div>


            <div class="mt-4 flex items-center">
                <label for="default-Address" class="inline-flex items-center hover:cursor-pointer">
                    <input id="default-Address" type="checkbox" class="rounded border-gray-300 text-sky-600 shadow-sm focus:ring-sky-500 w-[1.3rem] h-[1.3rem] hover:cursor-pointer" name="remember">
                    <span class="ms-2 text-md text-gray-600">Set as Default Address</span>
                </label>

            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-5 mt-6">
                <button type="button" onclick="document.getElementById('addressModal').close()"
                    class="text-orange-500 hover:text-orange-600">Cancel</button>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg">
                    Add Address
                </button>
            </div>
        </form>
    </dialog>

    <!-- Modal edit -->
    <dialog id="addressModalEdit" class="p-6 rounded-lg shadow-lg w-full max-w-lg backdrop:bg-black/30">
        <form method="POST" class="relative bg-white p-6 rounded-lg">
            <!-- Close Button -->
            <div class="absolute top-2 right-2">
                <button type="button" onclick="document.getElementById('addressModalEdit').close()"
                    class="text-orange-500 hover:text-orange-600 "> <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" /> </button>
            </div>

            <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Address</h2>

            <!-- Address Form -->
            <div class="grid grid-cols-2 gap-4">
                <div class="gap-5">
                    <x-input-label for="first-name">First Name</label></x-input-label>
                    <x-text-input type="text" id="first-name" class="border p-2 rounded w-full mt-1"></x-text-input>
                </div>

                <div class="gap-5">
                    <x-input-label for="last-name">Last Name</label></x-input-label>
                    <x-text-input type="text" id="last-name" class="border p-2 rounded w-full mt-1"></x-text-input>
                </div>
            </div>

            <div class="mt-4 gap-5">
                <x-input-label for="address1">Province, City, Barangay</label></x-input-label>
                <x-text-input type="text" id="address1" class="border p-2 rounded w-full mt-1 "> </x-text-input>
            </div>

            <div class="mt-4 gap-2">
                <x-input-label for="postal-code">Postal Code</label></x-input-label>
                <x-text-input type="text" id="postal-code" class="border p-2 rounded w-full mt-1"></x-text-input>
            </div>

            <div class="mt-4 gap-2">
                <x-input-label for="address2">Street Name, Building, House No.</label></x-input-label>
                <x-text-input type="text" id="address2" class="border p-2 rounded w-full mt-1"> </x-text-input>
            </div>


            <div class="mt-4 flex items-center">
                <label for="default-Address" class="inline-flex items-center hover:cursor-pointer">
                    <input id="default-Address" type="checkbox" class="rounded border-gray-300 text-sky-600 shadow-sm focus:ring-sky-500 w-[1.3rem] h-[1.3rem] hover:cursor-pointer" name="remember">
                    <span class="ms-2 text-md text-gray-600">Set as Default Address</span>
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

    <!-- Modal Delete -->


    <dialog id="deleteModal" class="p-6 rounded-lg shadow-lg w-full max-w-md backdrop:bg-black/30">
        <form method="POST" action="" class="bg-white p-6 rounded-lg">
            @csrf
            @method('DELETE')

            <!-- Close Button -->
         
            <div class="absolute top-2 right-2">
                <button type="button" onclick="document.getElementById('deleteModal').close()"
                    class="text-orange-500 hover:text-orange-600 "> <img src="{{asset ('logo/x.svg')}}" alt="cancel" class="h-5 w-5 md:h-7 md:w-7 hover:cursor-pointer" /> </button>
            </div>

            <!-- Confirmation Message -->
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-600">Are you sure you want to delete this address? This action cannot be undone.</p>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="document.getElementById('deleteModal').close()"
                    class="text-gray-600 hover:text-gray-900">Cancel</button>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                    Delete
                </button>
            </div>
        </form>
    </dialog>