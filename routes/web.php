<?php

use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\DashboardPage;
use App\Livewire\Admin\ProductsPage as AdminProductsPage;
use App\Livewire\Admin\CategoriesPage as AdminCategoriesPage;
use App\Livewire\Admin\OrdersPage as AdminOrdersPage;
use App\Livewire\Admin\OrderDetailPage as AdminOrderDetailPage;
use App\Livewire\Admin\UsersPage as AdminUsersPage;
use App\Livewire\Admin\UserDetailPage as AdminUserDetailPage;
use App\Livewire\Admin\UserCreatePage as AdminUserCreatePage;
use App\Livewire\Admin\UserEditPage as AdminUserEditPage;
use App\Livewire\Admin\ProductCreatePage as AdminProductCreatePage;
use App\Livewire\Admin\ProductEditPage as AdminProductEditPage;
use App\Livewire\Admin\CategoryCreatePage as AdminCategoryCreatePage;
use App\Livewire\Admin\CategoryEditPage as AdminCategoryEditPage;
use App\Livewire\Admin\OrderCreatePage as AdminOrderCreatePage;
use App\Livewire\Admin\OrderEditPage as AdminOrderEditPage;

	


Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);


Route::middleware('guest')->group(function () {
	Route::get('/login', LoginPage::class)->name('login');
	Route::get('/register', RegisterPage::class);
	Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
	Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});


Route::middleware('auth')->group(function () {
	Route::get('/logout', function () {
		auth()->logout();
		return redirect('/');
	});
	Route::get('/checkout', CheckoutPage::class);
	Route::get('/my-orders', MyOrdersPage::class);
	Route::get('/my-orders/{order_id}', MyOrderDetailPage::class)->name('my-orders.show');
	Route::get('/success', SuccessPage::class)->name('success');
	Route::get('/cancel', CancelPage::class)->name('cancel');
});
