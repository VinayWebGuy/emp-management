<?php
namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;



class AllEmployees extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingDelete = false;
    public $deleteId = null;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }

    public function deleteEmployee()
    {
        Employee::find($this->deleteId)->delete();
        $this->confirmingDelete = false;
        session()->flash('message', 'Employee deleted successfully.');
    }

    public function redirectToEdit($id)
    {
        return redirect()->route('admin.edit_employee', ['id' => $id]);
    }

    public function exportToPDF()
    {
        $employees = Employee::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('contact_number', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->get();

        $pdf = PDF::loadView('livewire.employees-pdf', compact('employees'));
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'employees.pdf');
    }

    public function render()
    {
        $employees = Employee::query()
            ->when($this->search, function($query) {
                $query->where('employee_register_number', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('contact_number', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('date_of_birth', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.all-employees', [
            'employees' => $employees,
        ])->layout('layouts.app');
    }
}