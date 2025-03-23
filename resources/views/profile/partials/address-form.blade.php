    <!-- Header Section -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="lg:text-2xl text-lg font-semibold text-gray-800">My Addresses</h2>
        <a href="" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg flex items-center gap-2 text-xs lg:text-lg">
            <i data-lucide="plus" class="w-4 h-4 lg:h-6 lg:w-6"></i> Add New Address
        </a>
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
                <a href="" class="text-blue-500 hover:underline flex items-center gap-1 mt-2  text-xs lg:text-md">
                    <i data-lucide="notebook-pen" class="w-4 h-4 lg:h-6 lg:w-6 "></i> Edit
                </a>
                <form method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:underline flex items-center gap-1 mt-2  text-xs lg:text-md">
                        <i data-lucide="trash2" class="w-4 h-4 lg:h-6 lg:w-6"></i> Delete
                    </button>
                </form>
            </div>
        </div>


    </div>