<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch all employees
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function search(Request $request)
    {
        // Fetch a record by register number, contact number, or email address
        $query = $request->query('q');

        if (!$query) {
            return response()->json(['message' => 'Query parameter is required'], 400);
        }

        $employee = Employee::where('employee_register_number', $query)
            ->orWhere('contact_number', $query)
            ->orWhere('email', $query)
            ->first();

        if ($employee) {
            return response()->json($employee);
        }

        return response()->json(['message' => 'Employee not found'], 404);
    }
}