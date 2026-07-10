<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Target;
use App\Models\Log;

class RegisterController extends Controller
{
    public function step1(){
        return view('auth.register1');
    }

    public function keep(Request $request){
        session([
            'register.name' => $request->name,
            'register.email' => $request->email,
            'register.password' => Hash::make($request->password),
        ]);

        return redirect()->route('register.step2');
    }

    public function step2(){
        return view('auth.register2');
    }

    public function create(Request $request){
        $user = User::create([
            'name' => session('register.name'),
            'email' => session('register.email'),
            'password' => session('register.password'),
        ]);

        Target::create([
            'user_id' => $user->id,
            'target_weight' => $request->target,
        ]);

        Log::create([
            'user_id' => $user->id,
            'date' => date('Y/m/d'),
            'weight' => $request->current,
        ]);

        return redirect()->route('login');
    }
}
