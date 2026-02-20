<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // if(auth()->user()->can('view_dashboard')){
        //    return view('dashboard');
        // }else{
        //     abort(403, 'Unauthorized');
        // }
        return view('dashboard');
    }
}
