<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\MojangRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    private $mojangRepository;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct(MojangRepository $mojangRepository) {
        $this->mojangRepository = $mojangRepository;

        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function postRegister(Request $request) {
        $this->validate($request, [
            'username' => 'required|min:3|max:16|unique:users',
            'code' => 'required|array|arraylength:4',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:users',
            'location' => 'required',
            'dob' => 'required|date'
        ]);

        $player = $this->mojangRepository->getUserInfo($request->get('username'));

        if(!$player) {
            return redirect()->back()
                ->withErrors(['username' => 'This username does not exist'])
                ->withInput();
        }

        $user = User::create([
            'username' => $request->get('username'),
            'uuid' => $player->id,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'location' => $request->get('location'),
            'dob' => $request->get('dob')
        ]);

        Auth::guard($this->getGuard())->login($user);

        return redirect($this->redirectPath());
    }

}
