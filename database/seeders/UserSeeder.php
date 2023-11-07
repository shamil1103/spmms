<?php

namespace Database\Seeders;

use App\Enums\CommonStatusEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status'   => CommonStatusEnum::ACTIVE->value,
        ]);
    }
}
