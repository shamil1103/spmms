<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::truncate();
        Application::create([
            'name'           => 'A4b',
            'contact_number' => '0123456789',
            'email'          => 'a4b@gmail.com',
            'address'        => 'A4bbd, Dhaka',
            'user_id'        => User::first()->id,
        ]);
    }
}
