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
       

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // user
        $u = new User;
        $u->nama = 'Angelina';
        $u->userType = 'pasien';
        $u->email = 'angelina@gmail.com';
        $u->password = bcrypt('123');
        $u->umur = 22;
        $u->alamat = 'Birugo';
        $u->save();
        // admin
        $u = new User;
        $u->nama = 'Daffa';
        $u->userType = 'admin';
        $u->email = 'admin@admin.com';
        $u->password = bcrypt('123');
        $u->umur = 22;
        $u->alamat = 'Birugo';
        $u->save();
        User::factory(10)->create();

    }
}
