<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Mail;

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
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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


        //tanggal
        $pisah = explode('/',$data['tanggallahir']);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('-',$urutan);
         
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'jeniskelamin' => $data['jeniskelamin'],
            'no_hape' => $data['no_hape'],
            'tempatlahir' => $data['tempatlahir'],
            'alamat' => $data['alamat'],
            'role' => $data['role'],
            'tanggallahir' => $ubahtgl,
        ]);
    }

    public function register(Request $request)
    {
        
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        //create anak-anak nya
        if ($request['role']=='siswa') {
            $siswa = new \App\siswa();
            $siswa->user_id = $user->id;
            $siswa->save(); 
            $redirectTo = '/siswa';
        } else 
        if ($request['role']=='pengajar') {
            $siswa = new \App\pengajar();
            $siswa->user_id = $user->id;
            $siswa->save(); 
            $redirectTo = '/pengajar';
        } else 
        if ($request['role']=='petugas') {
            $siswa = new \App\petugas();
            $siswa->user_id = $user->id;
            $siswa->save(); 
            $redirectTo = '/petugas';
        }

        $this->guard()->login($user);
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
