<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class VendorRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    public function showRegisterForm()
    {
        return view('auth.vendor-register',['signIn'=>'signUp']);
        //return view('auth.vendor-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'img'=> 'required|image|mimes:jpg,png,gif,jpeg|max:2048'
        ]);

        $request['password'] = Hash::make($request->password);
        //Vendor::create($request->all());
        $imageName = $request->img->getClientOriginalName();
        $request->img->move(public_path('assets/site/images/organizers'), $imageName);

        DB::table('vendors')->insert([
            [
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'img' => $imageName,   
                'state' => 'pending',   
        ]]);
        
        return redirect()->route('homePage')->with('success','your request created successfully!');
    }
}
