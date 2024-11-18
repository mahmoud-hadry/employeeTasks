Employee Management System
Description
The Employee Management System is a Laravel-based web application designed to streamline employee, department, and task management. It provides features such as creating, editing, and managing employees, tasks, and departments while allowing managers to assign tasks and monitor their completion status.

Features
Login and Authentication: Login with email or phone and enforce predefined complex passwords.
Employee Management: Add, edit, search, and delete employees. Display information like name, salary, manager name, and photo.
Task Management: Assign tasks to employees under a manager's supervision, and allow employees to update task statuses.
Department Management: Manage departments with features like add, edit, search (with employee count and salary sum), and delete (restricted if employees are assigned).
DataTables Integration: Enhanced search, export to Excel/PDF functionality for employee, department, and task listings.
Prerequisites
Ensure the following are installed on your system:

PHP 8.1 or higher
Composer
Node.js and npm
MySQL (or another compatible database)
Installation Steps
Clone the Repository

bash
Copy code
git clone <repository-url>
cd <repository-folder>
Install Dependencies
Run the following command to install PHP and JavaScript dependencies:

bash
Copy code
composer install
npm install
Set Up Environment File
Copy .env.example to .env and configure the database, email, and other application settings:

bash
Copy code
cp .env.example .env
Generate Application Key

bash
Copy code
php artisan key:generate
Run Database Migrations and Seeders
Execute the following command to reset the database, run migrations, and seed initial data:

bash
Copy code
php artisan migrate:fresh --seed
Build Frontend Assets
Compile the frontend assets using Vite:

bash
Copy code
npm run dev
Start the Application
Serve the application using Laravel's built-in server:

bash
Copy code
php artisan serve
Access the Application
Open your browser and navigate to http://127.0.0.1:8000.

Usage
Default Credentials
Admin Login:
Email: get an email or phone from employees table
Password: P@$$w0rd
Employee Features
Add, edit, search, and delete employees.
Each employee can view and update their tasks and statuses.
Manager Features
Managers can assign tasks to employees within their department.
View tasks with filters for statuses and assignments.
Department Features
Add, edit, search, and delete departments.
Departments with assigned employees cannot be deleted.
Contribution Guide
We welcome contributions to improve this project!
Please fork the repository and create a pull request for any proposed changes.

License
This project is open-sourced software licensed under the MIT license.

This updated README provides a clear guide to the project's setup and functionality while maintaining professionalism and adhering to best practices.
