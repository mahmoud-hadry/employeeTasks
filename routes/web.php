<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('employees', EmployeeController::class);
    Route::resource('departments', DepartmentController::class);
    Route::resource('tasks', TaskController::class);
    Route::get('/myEmployeeTasks', [TaskController::class, 'myEmployeeTasks'])->name('myEmployeeTasks');

    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat');

    Route::get('/messages/{user}', [ChatController::class, 'getMessages']);
    Route::post('/messages/{user}', [ChatController::class, 'sendMessage']);


});
Route::post('employeeLogin', [EmployeeController::class, 'login'])->name('employeeLogin');

require __DIR__.'/auth.php';
