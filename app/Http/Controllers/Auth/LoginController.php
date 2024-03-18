<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


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

//    /**
//     * Where to redirect users after login.
//     *
//     * @var string
//     */
//    protected $redirectTo = RouteServiceProvider::HOME;
//    protected $redirectTo = '/';

    protected function authenticated()
    {
        Log::channel('action_logs')->info("пользователь вошел в систему", [
            'info-context' => 'пользователь вошел в систему'
        ]);

       $token = md5(uniqid());
       User::where('id', Auth::id())->update([ 'token' => $token ]);

        if (Auth::user()->status == 2 || Auth::user()->status == 1000) {
            return redirect()->route('forthebuilder.home.index');
        }

        if (Auth::user()->status == 1 || Auth::user()->status == 1000) {
            return redirect()->route('backend.index');
        }

        if (Auth::user()->status == 0) {
//            return redirect()->route('dashboard.index');
            return redirect()->route('frontend.index');
        }

    }

    protected function validateLogin(Request $request)
    {
        // request()->validate([
        //     'mathcaptcha' => 'required|mathcaptcha',
        // ]);
        request()->validate([
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha' => translate('Invalid captcha code')]);
        // dd("You are here :) .");

    }
    public function reloadCaptcha(Request $request)
    {
        // app('mathcaptcha')->reset();
        // $data = app('mathcaptcha')->label();
        // return response()->json($data);
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function myCaptcha()
    {
        return view('myCaptcha');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha' => translate('Invalid captcha code')]);
        dd("You are here :) .");
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }


}
