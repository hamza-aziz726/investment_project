<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function fetchUserData()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    public function verifyPassword(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        if (Hash::check($request->input('u_old_password'), $user->password)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updatePersonalInfo(Request $request)
    {
        $user = Auth::user();

        if (!$user || !($user instanceof User)) {
            return response()->json(['error' => 'Authenticated user is not an instance of User model'], 500);
        }

        $request->validate([
            'u_name' => 'required|string|max:255',
            'u_father_name' => 'required|string|max:255',
            'u_nominee_name' => 'required|string|max:255',
            'u_relation_with_nominee' => 'required|string|max:255',
            'u_other_relation' => 'nullable|string|max:255',
        ]);

        $user->name = $request->u_name;
        $user->father_name = $request->u_father_name;
        $user->nominee_name = $request->u_nominee_name;
        $user->relation_with_nominee = $request->u_relation_with_nominee;
        $user->other_relation = $request->u_relation_with_nominee === 'Other' ? $request->u_other_relation : null;

        $user->save(); // Ensure this is being called on an Eloquent User model

        return response()->json(['success' => true]);
    }

    public function updateAddress(Request $request)
    {
        $user = Auth::user();

        if (!$user || !($user instanceof User)) {
            return response()->json(['error' => 'Authenticated user is not an instance of User model'], 500);
        }

        $request->validate([
            'u_address' => 'required|string|max:255',
            'u_block_tahsil' => 'required|string|max:255',
            'u_police_station' => 'required|string|max:255',
            'u_post_office' => 'required|string|max:255',
            'u_district' => 'required|string|max:255',
            'u_state' => 'required|string|max:255',
            'u_pincode' => 'required|string|max:10',
        ]);

        $user->address = $request->u_address;
        $user->block_tahsil = $request->u_block_tahsil;
        $user->police_station = $request->u_police_station;
        $user->post_office = $request->u_post_office;
        $user->district = $request->u_district;
        $user->state = $request->u_state;
        $user->pincode = $request->u_pincode;

        $user->save(); // Ensure this is being called on an Eloquent User model

        return response()->json(['success' => true]);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        if (!$user || !($user instanceof User)) {
            return response()->json(['error' => 'Authenticated user is not an instance of User model'], 500);
        }

        // Validate password input
        $validatedData = $request->validate([
            'u_new_password' => 'required|string|min:8|confirmed', // 'confirmed' expects 'u_new_password_confirmation'
        ]);

        // Hash and update password
        $user->password = Hash::make($validatedData['u_new_password']);
        $user->save();

        return response()->json(['success' => true]);
    }


}


