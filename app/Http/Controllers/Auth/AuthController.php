<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function  logout(Request $req){
        Auth::logout();
        $req->session()->put('cart.list',json_encode([

        ]));
        return redirect(route('home'));
    }
    public function login(Request $req){
        if($req->isMethod('get')){
            return view('user.login');
        }
        if($req->isMethod('post')){
            $val=Validator::make($req->input(),
                [
                    'email' => 'required|email|max:255',
                    'password' => 'required|min:6',
                ]
            );
            if($val->fails()){
                return redirect(route('login'))
                    ->withErrors($val)
                    ->withInput();
            }
            if(Auth::attempt(['email'=>$req->input('email'),'password'=>$req->input('password')])){
                return 'You are entered to system <a href="/">Home</a> <a href="/profile">Profile</a>';
            }

        }

    }


	public function registrate(Request $req){

		if ($req->isMethod('get')){
            return view('user.registration');
        }
        if($req->isMethod('post')){
		    $val=$this->validator((array)$req->input());
            if($val->fails()){

               return redirect(route('registration'))
                   ->withErrors($val)
                   ->withInput();
            }else{

                $us=$this->create((array)$req->input());
                if($us){
                    $us->phone=$req->input('phone');
                    $us->save();

                    return 'Thank for registration <a href="/">Home</a>';
                }
                else{
                    return 'ERROR AuthController@registration';
                }
            }

        }

	}
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone'=> ['required','regex:/.+375\s.((25|29|44|33).)\s(\d{3})(\-(\d{2})){2}/']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone'=>   $data['phone'],
        ]);
    }
}
