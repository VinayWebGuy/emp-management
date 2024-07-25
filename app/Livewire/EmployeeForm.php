<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeeForm extends Component
{
    public $name;
    public $contact_number;
    public $email;
    public $date_of_birth;
    public $address;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|unique:employees|regex:/^[0-9]{10}$/',
            'email' => 'required|string|email|max:255|unique:employees',
            'date_of_birth' => 'required|date',
            'address' => 'nullable|string|max:255',
        ]);

        $lastEmployee = Employee::latest('id')->first();
        $nextNumber = $lastEmployee ? intval(substr($lastEmployee->employee_register_number, 6)) + 1 : 1;
        $employeeRegisterNumber = 'EMP001' . $nextNumber;

        Employee::create(array_merge($validatedData, [
            'employee_register_number' => $employeeRegisterNumber,
        ]));

        session()->flash('message', 'Employee successfully added.');
        return redirect()->route('admin.employee_form');
    }

    public function render()
    {
        return view('livewire.employee-form')->layout('layouts.app');
    }
}