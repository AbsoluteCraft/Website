<?php

namespace App\Http\Controllers\Auth;

use App\Libs\MojangAPI;
use App\Models\Player\Player;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {

    use RegistersUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    private $mailchimp;
	private $mailchimpListId = '220613f72e';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');

        Validator::extend('mojangplayer', function ($attribute, $value, $parameters, $validator) {
            $mojangPlayer = MojangAPI::getProfile($value);
            return $mojangPlayer != false;
        });
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'username' => 'required|min:3|max:16|unique:users|mojangplayer',
            'code' => 'required|array|arraylength:4',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|email|unique:users',
            'location' => 'required',
            'dob' => 'required|date'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        $mojangPlayer = MojangAPI::getProfile($data['username']);
        $player = Player::where('uuid', $mojangPlayer['id'])->first();
		if(!$player) {
			Player::create([
				'uuid' => $mojangPlayer['id'],
				'username' => $data['username']
			]);
		}

		$flash = 'You are registered as ' . $data['username'] . '!';

		if($data['newsletter']) {
			$mailchimp = new \Mailchimp(env('MAILCHIMP_API_KEY'));

			try {
				$mailchimp->lists->subscribe($this->mailchimpListId, [
                    'email' => $data['email']
                ]);
			} catch(\Mailchimp_List_AlreadySubscribed $e) {
				$flash .= ' (But you were already signed up to our newsletter?!)';
			} catch(\Mailchimp_Error $e) {
				$flash .= ' (Failed to subscribe to newsletter. <a href="http://eepurl.com/biTv71">Click here to manually sign up!</a>)';
			}
		}

        return User::create([
            'username' => $data['username'],
            'uuid' => $mojangPlayer['id'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'location' => $data['location'],
            'dob' => $data['dob']
        ]);
    }

}
