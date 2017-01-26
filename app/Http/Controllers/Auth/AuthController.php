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

	private $mailchimp;
	private $mailchimpListId = '220613f72e';

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
                ->withInput($request->except('password'));
        }

        $player = Player::where('uuid', $mojangPlayer['id'])->first();
		if(!$player) {
			Player::create([
				'uuid' => $mojangPlayer['id'],
				'username' => $request->get('username')
			]);
		}

		$flash = 'You are registered as ' . $request->get('username') . '!';

		if($request->has('newsletter')) {
			$mailchimp = new \Mailchimp(env('MAILCHIMP_API_KEY'));

			try {
				/** @noinspection PhpParamsInspection */
				$mailchimp->lists
					->subscribe($this->mailchimpListId, [
						'email' => $request->get('email')
					]);
			} catch(\Mailchimp_List_AlreadySubscribed $e) {
				$flash .= ' (But you were already signed up to our newsletter?!)';
			} catch(\Mailchimp_Error $e) {
				$flash .= ' (Failed to subscribe to newsletter. <a href="http://eepurl.com/biTv71">Click here to manually sign up!</a>)';
			}
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

		flash_message($flash, 'success');

        return redirect($this->redirectPath());
    }

    public function logout() {
    	Auth::logout();

		return redirect()->route('home');
	}

}
