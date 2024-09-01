<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PHPMailerController;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'nominee_name' => ['required', 'string', 'max:255'],
            'relation_with_nominee' => ['required', 'string'],
            'other_relation' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'block_tahsil' => ['required', 'string', 'max:255'],
            'police_station' => ['required', 'string', 'max:255'],
            'post_office' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['nullable', 'exists:users,referral_code'],
        ]);
    }

    protected function create(array $data)
    {
        $otp = random_int(100000, 999999);
        $referralCode = $this->generateReferralCode();

        $referrer = null;
        if (isset($data['referral_code'])) {
            $referrer = User::where('referral_code', $data['referral_code'])->first();
        }
        // dd($referrer->id);
        $user = User::create([
            'role' => "user",
            'name' => $data['name'],
            'father_name' => $data['father_name'],
            'nominee_name' => $data['nominee_name'],
            'relation_with_nominee' => $data['relation_with_nominee'],
            'other_relation' => $data['relation_with_nominee'] === 'Other' ? $data['other_relation'] : null,
            'address' => $data['address'],
            'block_tahsil' => $data['block_tahsil'],
            'police_station' => $data['police_station'],
            'post_office' => $data['post_office'],
            'district' => $data['district'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'otp' => $otp,
            'referral_code' => $referralCode,
            'referral_by' => $referrer ? $referrer->id : null,
        ]);

        if ($referrer) {
            Referral::create([
                'user_id' => $referrer->id,
                'referred_user_email' => $data['email'],
            ]);
        }

        // Debugging
        if (!$user->email) {
            \Log::error('User email is null');
        } else {
            \Log::info('User email: ' . $user->email);
        }

        $email = $data['email'];
        $subject = 'Please Verify Your Email Address'; 
        $name = $data['name'];

        $site_title = 'Next Millioner';
        $output = "Dear $name,

        Thank you for signing up with $site_title! To complete the registration process and access all our features, we need to verify your email address.
        
        Please use the OTP below to verify your email:<br>
        
        <strong>Your OTP Code: </strong> <b>$otp</b>";

        $phpmailer = new PHPMailerController;
        $phpmailer->sendEmail($output, $name, $email, $subject);

        return $user;
    }

    protected function generateReferralCode()
    {
        do {
            $referralCode = strtoupper(Str::random(3)) . random_int(10000, 99999);
        } while (User::where('referral_code', $referralCode)->exists());

        return $referralCode;
    }

    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     $user = $this->create($request->all());

    //     // dd($user->email);
    //     // $this->guard()->login($user);

    //     // Redirect to the OTP verification page with the email
    //     return redirect()->route('otp.verify')->with('email', $user->email);
    // }
}