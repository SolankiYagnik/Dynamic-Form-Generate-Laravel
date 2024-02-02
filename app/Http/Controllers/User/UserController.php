<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DynamicForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserDashboard() {
        return view('user.index');
    }

    public function getFormBuilder() {
        $data = DynamicForm::where('id',1)->first();
        return response()->json($data);
    }

    public function logout() {  
        return redirect('login')->with(Auth::logout());
    }

    public function userSaveForm(Request $request) {
        dd($request->all());
    }
}
