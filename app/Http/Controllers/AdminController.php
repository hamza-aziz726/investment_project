<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\InvestmentPlan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function investmentPlans()
    {
        $plans = InvestmentPlan::all();
        return view('admin.investment-plans', compact('plans'));
    }

    public function storeInvestmentPlan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
        ]);

        InvestmentPlan::create($request->all());

        return back()->with('success', 'Investment plan created successfully.');
    }

    public function deleteInvestmentPlan($id)
    {
        InvestmentPlan::findOrFail($id)->delete();
        return back()->with('success', 'Investment plan deleted successfully.');
    }

    public function users()
    {
        $users = User::where('role','user')->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    public function transactions()
    {
        $transactions = Transaction::with(['investmentPlan', 'user'])->get();
        return view('admin.transactions', compact('transactions'));
    }

    public function transStatus(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        
        if ($transaction) {
            $investment = Investment::where('id', $transaction->investment_id)->first();
            if ($investment) {
                $investment->status = $request->status;
                $investment->save();
            }

            $transaction->status = $request->status;
            $transaction->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Transaction status updated successfully',
                'new_status' => $transaction->status
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Transaction not found'
        ], 404);
    }

    public function investments()
    {
        $investments = Investment::all();
        return view('admin.investments', compact('investments'));
    }

    public function withdrawals()
    {
        $withdrawals = WithdrawalRequest::all();
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function approveWithdrawal($id)
    {
        $withdrawal = WithdrawalRequest::findOrFail($id);
        $withdrawal->status = 'approved';
        $withdrawal->save();

        return back()->with('success', 'Withdrawal request approved successfully.');
    }

    public function reports()
    {
        // Implement reporting logic here
        return view('admin.reports');
    }


   
}
