<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('Auth.login');

    }
    function login(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'email harus diisi',
                'password.required' => 'password harus diisi',
            ]
            );

            $infologin = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if(Auth::attempt($infologin)){
                if (Auth::user()->role == "admin") {
                    return redirect()->route('admin.index');
                } else if (Auth::user()->role == "customer") {
                    return redirect()->route('customer.index');
                } else if (Auth::user()->role == "bank") {
                    return redirect()->route('bank.index');
                } else if (Auth::user()->role == "kantin") {
                    return redirect()->route('kantin.index');

                }
            }else {

                return redirect(route('login'))->withErrors('Email dan password yang dimasukan tidak sesuai')->withInput();
                
            }


    }

    public function regist(){
        return view('Auth.register');
    }

    function register(Request $request){

        $request->validate(
            [   
                'name' => 'required|min:4',
                'email' => 'required|unique:users|email',
                'password' => 'required|min:6'
            ],
        );
        $inforegister = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'customer',
        ];

        $userRegist = User::create($inforegister);
        $rek = '18'. auth()->id() . now()->format('YmdHis');
        $wallet = Wallet::create([
            'id_user' => $userRegist->id,
            'rekening' => $rek,
            'saldo' => 0,
            'status' => 'aktif',
        ]);

        return redirect()->route('auth')->with('success', 'berhasil register');
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
