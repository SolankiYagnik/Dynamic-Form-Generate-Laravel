<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/adminDashboard');
        }
        elseif(auth()->user()->role == 'user'){
            return redirect('/dashboard');
        }
        else{
            return auth()->logout();
        }
    }
}
