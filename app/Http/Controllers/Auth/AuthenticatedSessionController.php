<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);

        $email  =  $request->input('email'); 
        $user = User::where(['email'=>$email]);
        if($user->count() == 0){
            session()->flash('status', 'Email does not exist');

            return redirect()->to('/login');
        }else{


            $request->authenticate();
            $request->session()->regenerate();

            if (Auth::user()->roles == 'editor') {
                if(Auth::user()->firstlogin == 0){
                    return redirect('editor/setup');
                }else{
                    return redirect('editor/dashboard');
                }

            }elseif(Auth::user()->roles == 'collaborators'){
                return redirect('collaborators/channel');
            }else{
                 // return redirect(RouteServiceProvider::HOME);
                return redirect('admin/dashboard');
            }

        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        if(\Auth::check()){
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
            
        }else{
            return redirect('/'); 
        }
        
    }
}
