<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeMailNotification;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::all();
        $accounts = Account::all();
        return view('auth.login', ['users' => $user, 'accounts' => $accounts]);
    }

    public function login(Request $request)
    {
        //validate code
        $request->validate([
            'email' => 'required',
            'password' => 'required |min:8',
        ]);
        //login code
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('home')->with('success', 'you are logged in successfully');
        }
        return redirect('login')->withError('Login details are not valid');
    }

    public function register_view()
    {
        $user = User::all();
        return view('auth.register', ['users' => $user]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required',
            'address' => 'required',
            // 'account_name' => 'required',
            'password' => 'required |min:8|confirmed',
        ]);
        //save in user table
        $users = new User;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            // 'account_name' => $request->account_name,
            'password' => Hash::make($request->password),

        ]);
        $accountid = Account::find($request->account);
        $users->account()->attach($accountid);

        return redirect('login')->with('success', 'register successfully');
        // $users->notify(new WelcomeMailNotification($users));
        // return $users;
        //login user here
    }
    public function home()
    {
        return view('home');
    }
    public function logout()
    {
        Session::flush();
        \Auth::logout();
        return redirect('');
    }
    public function list()
    {
        $user = User::all();
        return view('layouts.list', ['users' => $user]);
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('layouts.edit', ['users' => $user]);
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',

                'email' => 'required|email',

            ]
        );
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        // $user->account_name = $request->account_name;
        $user->save();
        return redirect(route('list'))->with('status', 'Updated succeesfully');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect(route('list'));
    }

    public function profile()
    {
        return view('layouts.profile');
    }
    public function sidebar()
    {
        return view('layouts.sidebar');
    }
    public function footer()
    {
        return view('layouts.footer');
    }
}
