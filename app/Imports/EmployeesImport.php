<?php
namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Employee::updateOrCreate(
            ['employee_register_number' => $row['employee_register_number']],
            [
                'name' => $row['name'],
                'contact_number' => (string)$row['contact_number'],
                'email' => $row['email'],
                'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d'),
                'address' => $row['address']
            ]
        );
    }
}