<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OtpVerificationController extends Controller
{
    public function showOtpVerificationForm(Request $request)
    {
        // dd($request->email);
        return view('otp', ['email' => $request->email]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)->where('otp', $request->otp)->first();

        if ($user) {
            $user->is_verified = true;
            $user->otp = null;
            $user->save();

            return redirect()->route('login')->with('success', 'Your account has been verified.');
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }
    }
}
