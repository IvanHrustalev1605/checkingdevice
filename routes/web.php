<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\auth\mainauthcontroller;
use App\Http\Controllers\auth\regcontroller;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ObjectsController;
use App\Http\Controllers\PriboriController;
use App\Http\Controllers\WhereController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceFilterController;
use App\Http\Controllers\VerifierController;
 use App\Http\Controllers\Auth\Employee\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\Employee\RegController as EmployeeRegController;

Route::get('/', [mainauthcontroller::class, 'index'])->name('index');
Route::POST('/login', [mainauthcontroller::class, 'login'])->name('login');

Route::POST('/reg', [regcontroller::class, 'add'])->name('addUser');
Route::get('/registration', [regcontroller::class, 'index'])->name('indexReg');


Route::group([
    'middleware' => 'auth'
], function(){
 // Только аутентифицированные пользователи могут получить доступ к этому маршруту ...
 Route::get('/logout', [mainauthcontroller::class, 'logout'])->name('logout');
 Route::get('/main', [DashBoardController::class, 'index'])->name('dashboard');
 Route::get('/main/edit{ID}', [DashBoardController::class, 'edit'])->name('dashboardEdit');

 Route::POST('/loginEmployee', [LoginController::class, 'loginEmployee'])->name('AuthEmployee');
 Route::get('/employee', [LoginController::class, 'indexEmployee'])->name('EmloyeeLogin');

 Route::get('/employee/reg', [EmployeeRegController::class, 'indexEmployee'])->name('indexEmployee');
 Route::POST('/employee', [EmployeeRegController::class, 'add'])->name('addEmployee');

 Route::get('/objects', [ObjectsController::class, 'index'])->name('ObjectsIndex');
     Route::get('/objects/create', [ObjectsController::class, 'create'])->name('AddFormObject');
     Route::post('/objects/create', [ObjectsController::class, 'store'])->name('AddObject');
     Route::get('/objects/edit{ObjID}', [ObjectsController::class, 'edit'])->name('EditObject');
     Route::post('/objects/edit{ObjID}', [ObjectsController::class, 'update'])->name('UpdateObject');
     Route::delete('/objects{ObjID}', [ObjectsController::class, 'delete'])->name('objectDelete');

     Route::get('/pribori', [PriboriController::class, 'index'])->name('PriboriIndex');
     Route::get('/create', [PriboriController::class, 'create'])->name('AddFormPribor');
     Route::post('/create', [PriboriController::class, 'store'])->name('AddPribor');
     Route::get('/pribori/edit{ID}', [PriboriController::class, 'edit'])->name('EditPribor');
     Route::post('/pribori/edit{ID}', [PriboriController::class, 'update'])->name('UpdatePribor');
     Route::delete('/pribori{id}', [PriboriController::class, 'delete'])->name('PriborDelete');

     Route::get('/pribori/sortByObject', [DeviceFilterController::class, 'sort'])->name('Sort');

     Route::get('/accounting', [AccountingController::class, 'index'])->name('AccountingIndex');

     Route::get('/where/{id}', [WhereController::class, 'Index'])->name('WhereIndex');
     Route::get('/where/edit/{id}', [WhereController::class, 'edit'])->name('editWhereForm');
     Route::post('/where/edit{ID}', [WhereController::class, 'update'])->name('UpdateDeviceLocation');

     Route::get('/verifier', [VerifierController::class, 'index'])->name('VerifierIndex');
});

   



        

