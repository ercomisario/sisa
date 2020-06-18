<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Location::create([

            'calle' => '1',
            'home' => '17',
            'sector_id' => 1
        ]);
        App\Location::create([

            'calle' => '4',
            'home' => '21',
            'sector_id' => 2
        ]);

        App\Location::create([

            'calle' => '04',
            'home' => '36',
            'sector_id' => 3
        ]);

        App\Location::create([

            'calle' => '12',
            'home' => '06',
            'sector_id' => 4
        ]);

        App\Location::create([

            'calle' => '03',
            'home' => '07',
            'sector_id' => 5
        ]);

        App\Location::create([

            'calle' => '19',
            'home' => '32',
            'sector_id' => 6
        ]);

        App\Location::create([

            'calle' => '01',
            'home' => '55',
            'sector_id' => 7
        ]);

        App\Location::create([

            'calle' => '34',
            'home' => '02',
            'sector_id' => 8
        ]);

        App\Location::create([

            'calle' => '03',
            'home' => '01',
            'sector_id' => 9
        ]);

        App\Location::create([

            'calle' => '08',
            'home' => '25',
            'sector_id' => 10
        ]);

        App\Location::create([

            'calle' => '06',
            'home' => '23',
            'sector_id' => 11
        ]);

        App\Location::create([

            'calle' => '04',
            'home' => '03',
            'sector_id' => 12
        ]);
        
        App\Location::create([

            'calle' => '11',
            'home' => '51',
            'sector_id' => 13
        ]);

        App\Location::create([

            'calle' => '15',
            'home' => '35',
            'sector_id' => 14
        ]);

        App\Location::create([

            'calle' => '25',
            'home' => '12',
            'sector_id' => 12
        ]);

        App\Location::create([

            'calle' => '13',
            'home' => '25',
            'sector_id' => 1
        ]);

        App\Location::create([

            'calle' => '13',
            'home' => '05',
            'sector_id' => 11
        ]);

        App\Location::create([

            'calle' => '03',
            'home' => '01',
            'sector_id' => 14
        ]);

    }
}
