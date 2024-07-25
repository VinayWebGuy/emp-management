<div class="container mx-auto py-12">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Employees</h2>
        <div class="flex space-x-4">
            <input type="text" wire:model.lazy="search"
                class="appearance-none rounded-md px-3 py-2 border border-gray-300 text-gray-900"
                placeholder="Search employees...">
            <button wire:click="exportToPDF" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Export to PDF
            </button>
        </div>
    </div>

    @if (session('message'))
    <div class="bg-green-500 text-white p-2 rounded mb-4">
        {{ session('message') }}
    </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 text-left">Register Number</th>
                <th class="py-2 text-left">Name</th>
                <th class="py-2 text-left">Contact Number</th>
                <th class="py-2 text-left">Email</th>
                <th class="py-2 text-left">Date of Birth</th>
                <th class="py-2 text-left">Address</th>
                <th class="py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td class="py-2">{{ $employee->employee_register_number }}</td>
                <td class="py-2">{{ $employee->name }}</td>
                <td class="py-2">{{ $employee->contact_number }}</td>
                <td class="py-2">{{ $employee->email }}</td>
                <td class="py-2">{{ $employee->date_of_birth }}</td>
                <td class="py-2">{{ $employee->address }}</td>
                <td class="py-2">
                    <button wire:click="redirectToEdit({{ $employee->id }})" class="text-blue-500">Edit</button>
                    <button wire:click="confirmDelete({{ $employee->id }})" class="text-red-500">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }}

    <!-- Confirm Delete Modal -->
    @if ($confirmingDelete)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Delete Employee
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Are you sure you want to delete this employee? This action cannot be undone.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" wire:click="deleteEmployee"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Delete
                    </button>
                    <button type="button" wire:click="$set('confirmingDelete', false)"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>