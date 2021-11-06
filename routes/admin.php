<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommerceController;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowCommerce;

use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Livewire\Admin\AnswerContact;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\CityComponent;
use App\Http\Livewire\Admin\UserComponent;

use App\Http\Livewire\Admin\ShowContacts; 

// Registro de Productos  vista principal
Route::get('/', ShowProducts::class)->middleware('can:Ver dashboard')->name('admin.index');
Route::get('products/create', CreateProduct::class)->middleware('can:Ver dashboard')->name('admin.products.create');
Route::get('products/{product}/edit', EditProduct::class)->middleware('can:Editar productos')->name('admin.products.edit');
Route::post('products/{product}/files', [ProductController::class, 'files'])->middleware('can:Editar productos')->name('admin.products.files');

// Solucion de Ordenes
Route::get('orders', [OrderController::class, 'index'])->middleware('can:Ver dashboard')->name('admin.orders.index');
Route::get('orders/{order}', [OrderController::class, 'show'])->middleware('can:Ver dashboard')->name('admin.orders.show');

// Registro de categorias y marcas
Route::get('categories', [CategoryController::class, 'index'])->middleware('can:Ver dashboard')->name('admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->middleware('can:Ver dashboard')->name('admin.categories.show');

Route::get('brands', BrandComponent::class)->middleware('can:Ver dashboard')->name('admin.brands.index');

// Registro de publicidad
Route::get('banners', [BannerController::class, 'index'])->middleware('can:Ver dashboard')->name('admin.banners.index');

//Registro de Comercios Alia
Route::get('commerces', [CommerceController::class, 'index'])->middleware('can:Ver dashboard')->name('admin.commerces.index');
Route::get('commerces/{commerce}', ShowCommerce::class)->middleware('can:Ver dashboard')->name('admin.commerces.show');

//Registro de Direcciones, Estado o Cidudad, Municipio, Parroquias
Route::get('departments', DepartmentComponent::class)->middleware('can:Ver dashboard')->name('admin.departments.index');
Route::get('departments/{department}', ShowDepartment::class)->middleware('can:Ver dashboard')->name('admin.departments.show');
Route::get('cities/{city}', CityComponent::class)->middleware('can:Ver dashboard')->name('admin.cities.show');

// Registro y asignacion de Usuarios y Roles
/* Route::get('users', UserComponent::class)->name('admin.users.index'); */
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->middleware('can:Ver dashboard')->names('admin.users');
Route::get('roles', [RoleController::class, 'index'])->middleware('can:Only admin')->name('admin.roles.index');

//contacto y respuesta
Route::get('contacts', ShowContacts::class)->middleware('can:Ver dashboard')->name('admin.contacts.index');
Route::get('contacts/{contact}/answer', AnswerContact::class)->middleware('can:Ver dashboard')->name('admin.contacts.answer');
Route::get('contacts/{contact}/message', [ContactController::class, 'message'])->middleware('can:Ver dashboard')->name('contacts.message');
Route::post('contacts/{contact}/answered', [ContactController::class, 'answer'])->middleware('can:Ver dashboard')->name('contacts.answered');