<?php

namespace Database\Seeders;

use App\Models\Vendor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        $vendor  = new Vendor();
        $vendor->banner = 'uploads/1234.jpg';
        $vendor->phone = '7838195948';
        $vendor->email = 'tabrezzayan1@gmail.com';
        $vendor->address = 'xyz india';
        $vendor->description = 'Shop Description';
        $vendor->user_id = $user->id;
        $vendor->status = '1';
        $vendor->save();
    }
}
