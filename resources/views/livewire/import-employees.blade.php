<div class="container mx-auto py-12">
    <h2 class="text-2xl font-semibold mb-6">Import Employees</h2>

    @if (session('message'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">
        {{ session('message') }}
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-500 text-white p-2 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <form wire:submit.prevent="import" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="file" class="block text-gray-700">Select Excel File</label>
            <input type="file" id="file" wire:model="file" class="block w-full text-gray-900 mt-1">
            @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div wire:loading wire:target="file" class="text-gray-500 mb-4">
            Uploading...
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Import Employees
            </button>
        </div>
    </form>
</div>