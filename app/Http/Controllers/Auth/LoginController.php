<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


class LoginController extends Controller
{
    /*
 |--------------------------------------------------------------------------
 | Login Controller
 |--------------------------------------------------------------------------
 |
 | This controller handles authenticating users for the application and
 | redirecting them to your home screen. The controller uses a trait
 | to conveniently provide its functionality to your applications.
 |
 */
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'  => 'required|email',
            'password' => 'required|min:6'
        ]);

        try{
            // get email domain
            $splitEmail = explode('@', $request->email);

            if ($splitEmail[1] == 'admin.com')
            {
                if (Auth::guard('admin')->attempt(['email' => $request->email,
                'password' => $request->password], $request->get('remember'))) 
                {
                    $request->session()->put('user', $request->input());
                    $request->session()->flash('success', 'Admin logged in successfully');
                    return redirect()->intended('/admin/home');
                }
                else
                {
                    return back()->with('error', 'Username or Password Incorrect. Please Enter Again')->withInput($request->only('email', 'remember'));
                }
            }
            else{

                if (Auth::guard('user')->attempt(['email' => $request->email,
                'password' => $request->password], $request->get('remember'))) 
                {
                    $request->session()->put('user', $request->input());
                    $request->session()->flash('success', 'User logged in successfully');
                    return redirect()->intended('/user/home');
                }
                else
                {
                    return back()->with('error', 'Username or Password Incorrect. Please Enter Again')->withInput($request->only('email', 'remember'));
                }
            }
        }
        catch(Exception $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check())
        {
            $this->guard('admin')->logout();
        }
        else
        {
            $this->guard('web')->logout();
        }
        
        $request->session()->flush();
        return redirect('/login');
    }

}
