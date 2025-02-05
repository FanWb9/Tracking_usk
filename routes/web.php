<?php

use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tracking');
});

Route::post('/track', function (Request $request) {
    $tracking = Tracking::where('No_resi', $request->No_resi)->first();
    return view('tracking', compact('tracking'));
});

// Route::redirect('/', '/admin/login'); 
