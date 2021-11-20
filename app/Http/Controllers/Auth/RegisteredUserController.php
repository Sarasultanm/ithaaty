<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'months' => 'required',
            'days' => 'required',
            'years' => 'required',
            'gender' => 'required',
            'location' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'editor',
            'gender' => $request->gender,
            'birthday' => $request->months." ".$request->days.", ".$request->years,
            'country' => $request->location,
            'age' => '0',
        ]);

        // event(new Registered($user));

        session()->flash('status', 'Account Succesfully created');

        return redirect()->to('/login');

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
