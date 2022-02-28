<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\UserChannel;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; 

use App\Rules\Recaptcha;


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
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'months' => 'required',
            'days' => 'required',
            'years' => 'required',
            'gender' => 'required',
            'location' => 'required',
            'recaptcha_token' => ['required', new Recaptcha($request->recaptcha_token)]
        ]);
        // $randomStr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5);

        $randomStr = Str::random(5);
        $plan_default = UserPlan::where('plan_status','default')->first()->id;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'editor',
            'gender' => $request->gender,
            'birthday' => $request->months." ".$request->days.", ".$request->years,
            'country' => $request->location,
            'age' => '0',
            'plan' => $plan_default,
            'alias' => "User".$randomStr,
            'about' => ' ',
            
        ]);

        // event(new Registered($user));

        session()->flash('status', 'Account Succesfully created');

        return redirect()->to('/login');

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
}
