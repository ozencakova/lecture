<?php

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['L01', 'Kat-1', '', '0'],
                 ['S1A', 'Sınıf 1A', '1', '1'],
                 ['S1B', 'Sınıf 1B', '1', '1'],
                 ['L02', 'Kat-2', '', '0'],
                 ['S2A', 'Sınıf 2A', '4', '1'],
                 ['S2B', 'Sınıf 2B', '4', '1'],
        ];

        foreach ($data as $val)
        {
            \App\Models\Classroom::create([
                'code' => $val[0],
                'name' => $val[1],
                'parent_id' => $val[2],
                'type' => $val[3]
            ]);
        }
    }
}
