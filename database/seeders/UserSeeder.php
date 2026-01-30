<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Seretariat BPSDMP',
            'email' => 'sekretariat@gmail.com',
            'password' => Hash::make('yudha123'),
            'role' => 'muspin',
            'upt_id' => null,
        ]);
    }
}
