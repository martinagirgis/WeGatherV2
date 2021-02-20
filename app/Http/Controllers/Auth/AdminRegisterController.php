<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'img'=> 'required|image|mimes:jpg,png,gif,jpeg|max:2048'
        ]);

        $request['password'] = Hash::make($request->password);

        // Admin::create($request->all());
        $imageName = $request->img->getClientOriginalExtension();
        $request->img->move(public_path('assets/site/images/admin'), $imageName);

        DB::table('admins')->insert([
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->email,
                'img' => $request->img,      
        ]]);

        return redirect()->intended(route('admin.dashboard'));
    }
}
