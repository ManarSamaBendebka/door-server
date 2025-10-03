<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    $status = session('status', 'OFF'); // القيمة الافتراضية OFF
    return view('status', ['status' => $status]);
});

Route::post('/toggle', function () {
    $status = session('status', 'OFF') === 'OFF' ? 'ON' : 'OFF';
    session(['status' => $status]);
    return redirect('/');
});






