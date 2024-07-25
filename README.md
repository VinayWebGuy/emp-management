# Employee Management System

## Introduction

This is an Employee Management System built with Laravel, Livewire, Alpine.js, and Tailwind CSS. The system allows you to manage employee records, including adding, editing, deleting, and viewing employee details. Additionally, it supports bulk importing employees via an Excel file and exporting employee records to PDF.

## How to Set Up

### Clone the Repository

```bash
git clone https://github.com/VinayWebGuy/emp-management.git
cd emp-management
```

## Setup the .env File and Database

Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Open the .env file and update the following lines with your database information:

```bash
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Generate the application key:

```bash
php artisan key:generate
```

Run Migration Command

```bash
php artisan migrate
```

Run Seed Command

```bash
php artisan db:seed
```

Start the Application

```bash
php artisan serve
```

You will be redirected to the login page.

### Login

Use the following credentials to log in:
**Username: Vinay**
**Password: hellovinay**
You can change these details in the AdminSeeder.

### Employee Management

After logging in, you will be redirected to the Employee Form where you can add employee details.

#### Features

_Employee Form_: Fill in the details of a new employee.
_All Employees_: View a table of all employees. You can filter the records by entering a keyword and defocusing from the input. You can also export the records to a PDF.
_Import Employees_: Import employee records from an Excel file.

#### Additional Features

_Logout_: You can log out from the system.

#### API Endpoints

Fetch All Employees
**Endpoint: GET /api/employees**
Example Request: http://localhost:8000/api/employees
Search Employee
**Endpoint: GET /api/employees/search?q={query}**
Example Request: http://localhost:8000/api/employees/search?q=EMP001
