<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\InvestmentPlan;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function investmentPlans()
    {
        $plans = InvestmentPlan::all();
        return view('users.add-investment', compact('plans'));
    }

    public function investment()
    {
        $investments = Investment::with('planName')->where('user_id' , auth()->user()->id)->get();

        return view('users.investment', compact('investments'));
    }

    public function addInvestment()
    {
        $plans = InvestmentPlan::all();
        return view('users.add-invest', compact('plans'));
    }

    public function saveInvestment(Request $request)
    {
        // Validate the request
        $request->validate([
            'investment_plan_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
            'transaction_id' => 'required|string' // Assuming transaction_id is a required string
        ]);

        // Create a new investment record
        $invest = new Investment;
        $invest->user_id = auth()->user()->id;
        $invest->investment_plan_id = $request->investment_plan_id;
        $invest->amount = $request->amount;

        // Handle the file upload
        if ($request->hasFile('payment_proof')) {
            $imagePath = $request->file('payment_proof')->store('payment_proofs', 'public');
            $invest->payment_proof = $imagePath;
        }

        // Save the investment record
        $invest->save();

        // Create a new transaction record
        $trans = new Transaction;
        $trans->user_id = auth()->user()->id;
        $trans->investment_id = $invest->id;
        $trans->transaction_id = $request->transaction_id;
        $trans->status = 0;
        $trans->save();

        // Redirect to the investments page with a success message
        return redirect()->route('user.investments')->with('success', 'Investment created successfully.');
    }


    public function transactions()
    {
        $transactions = Transaction::with(['investmentPlan', 'user'])->where('user_id' , auth()->user()->id)->get();
        return view('transactions', compact('transactions'));
    }

    public function referral()
    {
        $auth_id = Auth::id();
        $referrals = User::where('referral_by', $auth_id)->get();
        $emailAmountReferralMap = [];
    
        foreach ($referrals as $referral) {
            $directReferralCount = User::where('referral_by', $referral->id)->count();
            $emailAmountReferralMap[$referral->email] = [
                'balance' => $referral->balance,
                'referral_count' => $directReferralCount
            ];
        }
    
        $matchingUsers = User::whereIn('email', array_keys($emailAmountReferralMap))->get();
    
        return view('users.referral', compact('matchingUsers', 'emailAmountReferralMap'));
    }

    public function referralDetails($id)
    {
        $user = User::where('id', $id)->first();
        $user_id = $user->id;
        $referrals = User::where('referral_by', $user_id)->get();

        $emailAmountReferralMap = [];
    
        foreach ($referrals as $referral) {
            $directReferralCount = User::where('referral_by', $referral->id)->count();
            $emailAmountReferralMap[$referral->email] = [
                'balance' => $referral->balance,
                'referral_count' => $directReferralCount
            ];
        }
        // $emailAmountMap = $referrals->pluck('balance', 'email')->toArray();
        // $matchingUsers = User::whereIn('email', array_keys($emailAmountMap))->get();
        $matchingUsers = User::whereIn('email', array_keys($emailAmountReferralMap))->get();
        return view('users.referral-detail', compact('matchingUsers', 'emailAmountReferralMap'));
    }

    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }
    public function withdrawalRequests()
    {
        $requests = Auth::user()->withdrawalRequests;
        return view('withdrawal-requests', compact('requests'));
    }

    public function submitWithdrawalRequest(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        Auth::user()->withdrawalRequests()->create([
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Withdrawal request submitted successfully.');
    }
}
