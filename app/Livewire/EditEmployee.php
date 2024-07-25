<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EditEmployee extends Component
{
    public $employeeId;
    public $name;
    public $contact_number;
    public $email;
    public $date_of_birth;
    public $address;

    public function mount($id)
    {
        $employee = Employee::find($id);
        $this->employeeId = $employee->id;
        $this->name = $employee->name;
        $this->contact_number = $employee->contact_number;
        $this->email = $employee->email;
        $this->date_of_birth = $employee->date_of_birth;
        $this->address = $employee->address;
    }

    public function saveEmployee()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|unique:employees,contact_number,' . $this->employeeId . '|regex:/^[0-9]{10}$/',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $this->employeeId,
            'date_of_birth' => 'required|date',
            'address' => 'nullable|string|max:255',
        ]);

        $employee = Employee::find($this->employeeId);
        $employee->update([
            'name' => $this->name,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
        ]);

        session()->flash('message', 'Employee updated successfully.');

        return redirect()->route('admin.all_employees');
    }

    public function render()
    {
        return view('livewire.edit-employee')->layout('layouts.app');
    }
}