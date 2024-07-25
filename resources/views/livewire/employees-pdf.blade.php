<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px 12px;
        border: 1px solid #dddddd;
        text-align: left;
    }
    </style>
</head>

<body>
    <h2>Employees</h2>
    <table>
        <thead>
            <tr>
                <th>Register Number</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->employee_register_number }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->contact_number }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->date_of_birth }}</td>
                <td>{{ $employee->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>