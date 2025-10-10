<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['id' => '1', 'acc_id' => 'ADM'.strtoupper(uniqid()), 'name' => 'Admin User', 'email' => 'admin@gmail.com', 'password' => bcrypt(config('services.password.admin')),  'role' => 'admin'],
            ['id' => '2', 'acc_id' => 'ADM'.strtoupper(uniqid()), 'name' => 'Oluwatobi', 'email' => 'solotob@gmail.com', 'password' => bcrypt(config('services.password.admin')),  'role' => 'admin'],
            ['id' => '3', 'acc_id' => 'ADM'.strtoupper(uniqid()), 'name' => 'Samuel', 'email' => 'samuel@gmail.com', 'password' => bcrypt(config('services.password.admin')),  'role' => 'admin']
        ];

        foreach($users as $user)
        {
            $user= User::updateOrCreate($user);
            $user->email_verified_at = now();
            $user->save();
        }

    }
}
