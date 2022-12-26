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
use App\Http\Controllers\OderFilterController;
use App\Http\Controllers\OdersController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;

Route::group([
    'middleware' => 'guest'
], function(){
Route::get('/', [mainauthcontroller::class, 'index'])->name('index');
Route::POST('/login', [mainauthcontroller::class, 'login'])->name('login');

Route::POST('/reg', [regcontroller::class, 'add'])->name('addUser');
Route::get('/registration', [regcontroller::class, 'index'])->name('indexReg');

Route::get('/fogot-password', [ForgotPasswordController::class, 'index'])->name('indexResetPassword');
Route::post('/fogot-password', [ForgotPasswordController::class, 'store'])->name('ResetPassword');
Route::get('/reset-password', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.request');
});


Route::group([
    'middleware' => 'auth'
], function(){
 // Только аутентифицированные пользователи могут получить доступ к этому маршруту ...
 Route::get('/logout', [mainauthcontroller::class, 'logout'])->name('logout');
 Route::get('/main', [DashBoardController::class, 'index'])->name('dashboard');
 Route::get('/main/edit{ID}', [DashBoardController::class, 'edit'])->name('dashboardEdit');
 Route::POST('/main/edit{ID}', [DashBoardController::class, 'update'])->name('dashboardUpdate');

 Route::get('/user/{id}', [UserController::class, 'index'])->name('userIndex');
 Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
 Route::POST('/user/edit/{id}', [UserController::class, 'update'])->name('userUpdate');

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
     Route::get('/verifier/create', [VerifierController::class, 'createForm'])->name('verifierCreateForm');
     Route::POST('/verifier/create', [VerifierController::class, 'create'])->name('verifierCreate');

     Route::get('/oder', [OdersController::class, 'index'])->name('OderIndex');
     Route::get('/oder/create', [OdersController::class, 'create'])->name('OderForm');
     Route::post('/oder/create', [OdersController::class, 'store'])->name('OderAdd');
     Route::get('/oder/edit{ID}', [OdersController::class, 'edit'])->name('OderEdit');
     Route::POST('/oder/edit{ID}', [OdersController::class, 'update'])->name('OderUpdate');
     Route::delete('/oder{id}', [OdersController::class, 'delete'])->name('OderDelete');
     Route::get('/oder/update', [OdersController::class, 'updateStatus']);
     Route::get('/oder/sortByObject', [OderFilterController::class, 'sort'])->name('OderSort');
});

   



        

