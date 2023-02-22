<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectPath()
    {
        return '/top';
    }


    public function registerForm(){
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

          // バリデーション
            $rulus = [
                'username' => 'required|between:2,11',
                'mail' => 'required|between:4,39|email|unique:users,mail',
                'password' => 'required|between:8,19|regex:/^[a-zA-Z0-9]+$/',
                'password-confirm' => 'required|between:8,19|alpha-num|regex:/^[a-zA-Z0-9]+$/|same:password'
            ];
            $message = [
            'username.required' => '名前を入力してください',
            'username.between' => '名前は2文字以上,12文字以内で入力してください',
            'mail.required' => 'メールアドレスを入力してください',
            'mail.email' => 'メールアドレスの形式で入力してください',
            'mail.between' => 'メールアドレスは5文字以上,40文字以内で入力してください',
            'mail.unique' => 'すでに登録されているメールアドレスです',
            'password.required' => 'パスワードを入力してください',
            'password.between' => 'パスワードは8文字以上,20文字以内で入力してください',
            'password.regex' => 'パスワードは英数字で入力してください',
            'password-confirm.required' => 'パスワード確認を入力してください',
            'password-confirm.between' => 'パスワード確認は8文字以上,20文字以内で入力してください',
            'password-confirm.regex' => 'パスワード確認は英数字で入力してください',
            'password-confirm.same' => 'パスワードが一致しません',


            ];
            $validatedData = Validator::make($request->all(), $rulus, $message);
            $data = $request->input();
            if ($validatedData->fails()) {
                $this->validator($data);
                return redirect('register')
                ->withErrors($validatedData)
                ->withInput();
            }
            // バリデーション




            $this->create($data);//リクエストの取得
            $username = $request->get('username');// セッションの取得
            return redirect('added')->with('username',$username); // フラッシュメッセージ
           
        }

        return view('auth.register');


    }

    // バリデーション
    public function validation(Request $request) {

    }

    public function added(Request $request){

        return view('auth.added');

    }


}
