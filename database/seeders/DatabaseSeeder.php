<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'mentor']);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '085156058404',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123'),
        ]);
        $admin->assignRole('admin');

        $mentor = User::create([
            'name' => 'mentor',
            'email' => 'mentor@gmail.com',
            'phone' => '085156058401',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123'),
        ]);
        $mentor->assignRole('mentor');

        $student = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'phone' => '0851560584123',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123'),
        ]);
        $student->assignRole('student');
    }
}
