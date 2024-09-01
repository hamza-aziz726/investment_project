<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->role = "admin";
        $admin->name = "admin";
        $admin->father_name = "f-admin";
        $admin->nominee_name = "nominee-admin";
        $admin->relation_with_nominee = "Father";
        $admin->other_relation = "";
        $admin->address = "admin_adsress";
        $admin->block_tahsil = "admin_block";
        $admin->police_station = "admin_police_station";
        $admin->post_office = "admin_Post_office";
        $admin->district = "admin_district";
        $admin->state = "admin_state";
        $admin->pincode = "admin_pincode";
        $admin->phone = "9123456789000";
        $admin->email = "admin@gmail.com";
        $admin->is_verified = 1;
        $admin->password = Hash::make('password');

        $admin->save();
    }
}
