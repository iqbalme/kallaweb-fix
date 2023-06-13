<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('upload-thumbnail', [PostController::class, 'upload_thumbnail'])->name('thumbnail.upload');
Route::post('xendit_invoice_update', [PaymentController::class, 'updateInvoice'])->name('xendit.invoice.update');
Route::get('success_payment_callback', [PaymentController::class, 'success_payment_callback'])->name('xendit.success.route');
Route::get('failed_payment_callback', [PaymentController::class, 'failed_payment_callback'])->name('xendit.failed.route');
Route::get('event/peserta', [EventController::class, 'addPendaftarEvent'])->name('event.peserta.add');


Route::post('tes-event', [TestController::class, 'update_peserta']);