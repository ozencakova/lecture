<?php

use Illuminate\Database\Seeder;

class FacultyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('tr_TR');
        $data = [['Kökten Ulaş', 'Birant'],['Derya ', 'Pakalın '],['Özlem ', 'Aktaş'],['Mehmet Hilal ', 'Özcanhan']];

        foreach ($data as $val)
        {
            \App\Models\FacultyMember::create([
                'code' => $faker->unique()->numerify('#####'),
                'name' => $val[0],
                'surname' => $val[1],
                'email' => $faker->unique()->email,
                'start_date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = date_default_timezone_get())
            ]);
        }
    }
}
