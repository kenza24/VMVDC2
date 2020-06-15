<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Administrateurs;
use App\Enseignants;
use App\Doctorants;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
        $this->middleware('guest:admins');
        $this->middleware('guest:enseignants');
        $this->middleware('guest:doctorants');
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mot_de_passe' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDoctorantsRegisterForm()
    {
        return view('auth.register', ['url' => 'doctorants']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEnseignantRegisterForm()
    {
        return view('auth.register', ['url' => 'enseignants']);
    }
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admins']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admins');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createEnseignants(Request $request)
    {
        $this->validator($request->all())->validate();
        Enseignants::create([
            'nom' => $request->name,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/connexionE');
    }
    protected function createDoctorants(Request $request)
    {
        $this->validator($request->all())->validate();
        Doctorants::create([
            'nom' => $request->name,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/connexionD');
    }



}
