<?php

// use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Cashier;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/checkout', function () {
        return view('client.checkout');
    })->name('checkout');

    Route::post('/payment', function (Request $request) {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        $paymentMethod = $request->payment_method;
        $user->updateDefaultPaymentMethod($request->payment_method);
        $amount = 2000;
        $productName = "test";

        $user->charge(
            $amount, $paymentMethod
        );

        $user->invoiceFor(
            $productName, $amount
        );

        return redirect()->route('checkout');
    })->name('payment');

    Route::get('/last/invoice', function () {
        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        return $user->downloadInvoice($user->invoices()->last()->id, [
            'vendor' => 'Your Company',
            'product' => 'Your Product',
        ]);
    })->name('last.invoice');
});

require __DIR__.'/auth.php';

// layouts.app
// Route::view('/{any}', 'api.app')
//     ->where('any', '.*');
