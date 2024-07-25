<div class="container mx-auto py-12">
    <h2 class="text-2xl font-semibold mb-6">Edit Employee</h2>

    @if (session('message'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="saveEmployee">
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name"
                class="appearance-none rounded-md px-3 py-2 border border-gray-300 text-gray-900 w-full">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="contact_number" class="block text-gray-700">Contact Number</label>
            <input type="text" id="contact_number" wire:model="contact_number"
                class="appearance-none rounded-md px-3 py-2 border border-gray-300 text-gray-900 w-full">
            @error('contact_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" wire:model="email"
                class="appearance-none rounded-md px-3 py-2 border border-gray-300 text-gray-900 w-full">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="date_of_birth" class="block text-gray-700">Date of Birth</label>
            <input type="date" id="date_of_birth" wire:model="date_of_birth"
                class="appearance-none rounded-md px-3 py-2 border border-gray-300 text-gray-900 w-full">
            @error('date_of_birth') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="block text-gray-700">Address</label>
            <input type="text" id="address" wire:model="address"
                class="appearance-none rounded-md px-3 py-2 border border-gray-300 text-gray-900 w-full">
            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Save</button>
        </div>
    </form>
</div>