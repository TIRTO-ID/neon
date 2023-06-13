<?php

use Illuminate\Support\Facades\Route;

use Liulinnuha\Neon\Controllers\NeonController;

Route::prefix('neon')->middleware(['web'])->group(function(){
    // Route::get('callback', [NeonController::class, 'login'])->name('callback');
    Route::get('login', function() {

        if(session()->get('neon_data')) return redirect(config('app.url'));
        // if(auth()->check()) return redirect(config('app.url'));

        $url = strtr(
            config('neon.url.login'),
            [
                '{src}' => route('callback') ,
                '{clientid}' => config('neon.client_id'),
            ]
        );

        return view('neon::login', compact('url'));
    })->name('google-login');

    Route::get('logout', [NeonController::class, 'logout'])->name('logout');


    Route::middleware('neon')->group(function(){
        Route::get('check-email/{email}', [NeonController::class, 'mailCheck'])->name('check-email');
        Route::get('check-session', [NeonController::class, 'sessionCheck'])->name('check-session');
    });

});
