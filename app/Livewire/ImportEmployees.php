<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;

class ImportEmployees extends Component
{
    use WithFileUploads;

    public $file;

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        try {
            Excel::import(new EmployeesImport, $this->file->getRealPath());
            session()->flash('message', 'Employees imported successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error importing the file: ' . $e->getMessage());
        }

        return redirect()->route('admin.import_employees');
    }

    public function render()
    {
        return view('livewire.import-employees')->layout('layouts.app');
    }
}