<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        if (!Auth::check()) {
            $this->data['seo'] = [
                'seo_title' => 'Đăng ký',
            ];
            return view('auth.register', $this->data);
        }
        return redirect(url('/'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = array(
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        );

        return Validator::make($data, [
            'fullname.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Hãy nhập vào địa chỉ Email',
            'email.email' => 'Địa chỉ Email không đúng định dạng',
            'email.max' => 'Địa chỉ Email tối đa 255 ký tự',
            'email.unique' => 'Địa chỉ Email đã tồn tại',
            'password.required' => 'Hãy nhập mật khẩu',
            'password_confirmation.same' => 'Mật khẩu và nhập lại mật khẩu chưa trùng khớp!',
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['birthday']) && !empty($data['birthday']))
            $data['birthday'] = date('Y-m-d', strtotime(str_replace('/', '-', $data['birthday'])));
        return User::create([
            'username' => $data['username']??'',
            'email' => $data['email']??'',
            'phone' => $data['phone']??null,
            'fullname' => $data['fullname']??'',
            'firstname' => $data['firstname']??'',
            'lastname' => $data['lastname']??'',
            'address' => $data['address'] ?? '',
            'birthday' => $data['birthday'] ?? null,
            'country' => $data['country'] ?? '',
            'province' => $data['state'] ?? '',
            'district' => $data['slt_district'] ?? '',
            'city' => $data['city'] ?? '',
            'postal_code' => $data['postal_code'] ?? 0,
            'avatar' => $data['name_avatar'] ?? null,
            'password' => Hash::make($data['password']),
            'expert' => $data['expert']??0,
            'status' => 1,
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        Auth::login($user);

        $this->registered($request, $user);
        return response()->json([
            'error' => 0,
            'view' => view('auth.register_success')->render(),
            'msg'   => __('Register success')
        ]);
    }
}
