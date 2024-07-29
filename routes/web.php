<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Auth::routes();

Route::get( '/{vue_route?}', function () {
    return view('index-vue');
})->where( 'vue_route', '(.*)' );
