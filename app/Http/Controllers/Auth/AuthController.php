<?php

namespace App\Http\Controllers\Auth;

use App\Libs\MojangAPI;
use App\Models\Player\Player;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct() {
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

		$mojangPlayer = MojangAPI::getProfile($request->get('username'));
        if($mojangPlayer == false) {
            return redirect()->back()
                ->withErrors(['username' => 'This username is not registered with Mojang. Please use your Minecraft username.'])
                ->withInput();
        }

        $player = Player::where('uuid', $mojangPlayer['id'])->first();
		if(!$player) {
			Player::create([
				'uuid' => $mojangPlayer['id'],
				'username' => $request->get('username')
			]);
		}

        $user = User::create([
            'username' => $request->get('username'),
            'uuid' => $mojangPlayer['id'],
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'location' => $request->get('location'),
            'dob' => $request->get('dob')
        ]);

        Auth::guard($this->getGuard())->login($user);

        return redirect($this->redirectPath());
    }

}
