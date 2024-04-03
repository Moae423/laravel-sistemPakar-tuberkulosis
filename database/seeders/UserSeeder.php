<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $u = new User;
        $u->namaPasien = 'Chevien Walidain';
        $u->userType = 'admin';
        $u->email = 'kepin@gmail.com';
        $u->password = bcrypt('123');
        $u->umur = 22;
        $u->alamat = 'Guguak Bulek';
        $u->save();
        User::factory(10)->create();

    }
}
