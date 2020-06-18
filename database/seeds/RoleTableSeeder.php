<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        App\Role::create([

            'name' => 'person'
        ]);
        
        App\Role::create([

            'name' => 'doctor'
        ]);

        App\Role::create([

            'name' => 'nurse'
        ]);

        App\Role::create([

            'name' => 'secretary'
        ]);

        App\Role::create([

            'name' => 'resident doctor'
        ]);
    }
}
