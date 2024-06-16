<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


// Make admin if not exist & get token
Route::get('/setup', function(){
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];
    
    if(!Auth::attempt($credentials)){
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();
        
        
        if(Auth::attempt($credentials)){
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $adminToken = $user->createToken('admin-token', ['create','update','delete']);
            
            return[
                'admin' => $adminToken->plainTextToken
            ];
        }
    }
});


Route::get('/', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/access-token', [DashboardController::class,'tokenIndex'])->middleware(['auth', 'verified'])->name('token');
Route::post('/access-token/generate', [DashboardController::class,'generateToken'])->middleware(['auth', 'verified'])->name('token.generate');
Route::post('/access-token/show', [DashboardController::class,'tokenShow'])->middleware(['auth', 'verified'])->name('token.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/docs', function(){

    $url = 'https://documenter.getpostman.com/view/10567374/2sA3XQiNHA';
    return view('open_new_tab', ['url' => $url]);

})->name('docs');

require __DIR__.'/auth.php';
