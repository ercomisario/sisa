<?php

use Illuminate\Database\Seeder;

class AttentionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\AttentionType::create([
            'name' => 'Consulta'
        ]);

        App\AttentionType::create([
            'name' => 'Revision de Examenes'
        ]);

        App\AttentionType::create([
            'name' => 'Registro de Anamnesis'
        ]);
    }
}
