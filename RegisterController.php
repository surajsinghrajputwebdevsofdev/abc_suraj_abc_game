<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use PHPMailer\PHPMailer\PHPMailer;

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
    protected $redirectTo = '/otp_page';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        $otp = rand(1000, 9999);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'age' => $data['age'],
            'country' => 'India',
            'state' => $data['state'],
            'city' => $data['city'],
            'password' => Hash::make($data['password']),
            'otp' => $otp,
        ]);

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'closeanimation@gmail.com';
        $mail->Password = 'ouoaccutdmnszywm';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($data['email']);
        $mail->addAddress($data['email']);

        $mail->isHTML(true);
        $mail->Subject = 'OTP Send successfully';
        $mail->Body = "Dear {$data['name']} ThankYou to Register This page and Your OTP is $otp";

        $mail->send();

        return $user;
    }
        public function verifyOTP(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
               
            ]);
    
            $email = $request->input('email');
            $otp = implode('', $request->input('otp_input'));
    
            $user = User::where('email', $email)->first();
    
            if ($user && $user->otp == $otp) {
                $user->email_verified_at = now();
                $user->otp = null; 
                $user->save();
    
                auth()->login($user);
    
                return redirect('/home')->with('status', 'Email verified successfully.');
            }
    
            return redirect('/otp_page')->withErrors(['otp' => 'Invalid OTP.']);
        }
    

    // public function getallCountry(Request $request)
    // {
    //     $countries = Country::all();
    //     $states = State::all();

    //     $country_id = $request->input('country_id');
    //     $states = State::where('country_id', $country_id)->get();  
    //     $cities = City::all();

    //     return view('auth.register', compact('countries', 'states', 'cities'));
    // }
    // public function getState($id){
    //     $states = State::where('country_id', $id)->get();
    //   return view('auth.register', compact('states'));
    // }

    // public function otp()
    // {
    //     return view('auth.passwords.otp');
    // }
    // public function getCity($id){
    //     $cities = City::where('state_id', $id)->get();
    //   return view('auth.register', compact('cities'));
    // }

}
