<?php

use Illuminate\Database\Seeder;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Sector::create([
            
            'name' => 'Campeche',
            'parish_id' => 1,
            'longitude' => '-64.1564871',
            'latitude' => '10.4518737',
        ]);
        
        App\Sector::create([
            
            'name' => 'Cantarrana',
            'parish_id' => 1,
            'longitude' => '-64.1482554',
            'latitude' => '10.4362619',
        ]);

        App\Sector::create([
            
            'name' => 'Boca de Sabana',
            'parish_id' => 1,
            'longitude' => '-64.1576997,17',
            'latitude' => '10.4540163',
        ]);
        App\Sector::create([
            
            'name' => 'Cascajal',
            'parish_id' => 3,
            'longitude' => '-64.1820628,17',
            'latitude' => '10.4355374',
        ]);
        App\Sector::create([
            
            'name' => 'Bebedero',
            'parish_id' => 3,
            'longitude' => '-64.1816304',
            'latitude' => '10.4455733',
        ]);
        App\Sector::create([
            
            'name' => 'El Bosque',
            'parish_id' => 2,
            'longitude' => '-64.1251348',
            'latitude' => '10.4691447',
        ]);
        App\Sector::create([
            
            'name' => 'Gran Mariscal',
            'parish_id' => 2,
            'longitude' => '-64.1252499',
            'latitude' => '10.4680993',
        ]);
        App\Sector::create([
            
            'name' => 'Villa Olímpica',
            'parish_id' => 3,
            'longitude' => '-64.1807397',
            'latitude' => '10.4449294',
        ]);
        App\Sector::create([
            
            'name' => 'Las Casimba',
            'parish_id' => 3,
            'longitude' => '-64.1817297,17',
            'latitude' => '10.451956',
        ]);
        App\Sector::create([
            
            'name' => 'Las Palomas',
            'parish_id' => 3,
            'longitude' => '-64.1851157,16',
            'latitude' => '10.4740008',
        ]);

        App\Sector::create([
            
            'name' => 'Los Roques',
            'parish_id' => 3,
            'longitude' => '-64.1817449,18',
            'latitude' => '10.4387601',
        ]);

        App\Sector::create([
            
            'name' => 'Brasil',
            'parish_id' => 3,
            'longitude' => '-64.1760993',
            'latitude' => '10.4290869',
        ]);

        App\Sector::create([
            
            'name' => 'La Llanada',
            'parish_id' => 3,
            'longitude' => '-64.1935552',
            'latitude' => '10.4256524',
        ]);

        App\Sector::create([
            
            'name' => 'Caiguire',
            'parish_id' => 2,
            'longitude' => '-64.1599053',
            'latitude' => '10.4712269',
        ]);
        
    }
}
