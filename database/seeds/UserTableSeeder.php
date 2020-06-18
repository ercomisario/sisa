<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        App\User::create([
            'name' => 'Ramón',
            'email' => 'monchito1997@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 1,
            'role_id' => 3
        ]);
        
       
        App\User::create([
            'name' => 'Angel',
            'email' => 'angelpinto@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 2,
            'role_id' => 2

        ]);

        App\User::create([
            'name' => 'Jhosue',
            'email' => 'jjbravo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 3,
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'Maria',
            'email' => 'mariajoca@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 4,
            'role_id' => 4
        ]);

        App\User::create([
            'name' => 'Manuel',
            'email' => 'mnlalbani@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 5,
            'role_id' => 2
        ]);

        App\User::create([
            'name' => 'Miguel',
            'email' => 'miguelsalazar302@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 6,
            'role_id' => 1
        ]);
        
        App\User::create([
            'name' => 'Wladmir',
            'email' => 'wjrs.xxxx@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 7,
            'role_id' => 2
        ]);

        App\User::create([
            'name' => 'Rosa',
            'email' => 'rosaroja@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 8,
            'role_id' => 3
            
        ]);

        App\User::create([
            'name' => 'Luisa',
            'email' => 'Luisaramos@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 9,
            'role_id' => 4
        ]);

        App\User::create([
            'name' => 'Rafael',
            'email' => 'RafaLara@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 10,
            'role_id' => 1
        ]);

        App\User::create([
            'name' => 'Orgemis',
            'email' => 'orgemis@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'person_id' => 9,
            'role_id' => 4
            ]);

    }
}
