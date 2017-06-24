<?php

use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('tr_TR');
        $classrooms = \App\Models\Classroom::classroom()->get();
        $faculty_members = \App\Models\FacultyMember::all();
        $data = [['Data Structures ', '1'],
            ['Computer Architecture', '1'],
            ['Computer Networks', '1'],
            ['Calculus', '1'],
            ['Algorithm', '1'],
            ['Artifical Engineering', '0'],
            ['Human Computer Interaction', '0'],
            ['Web Technologies', '0'],
            ['Game Design', '0'],
            ['Data Mining', '0'],
        ];

        foreach ($data as $val)
        {
            \App\Models\Lecture::create([
                'classroom_id' => $classrooms->shuffle()->take(1)[0]->id,
                'faculty_member_id' => $faculty_members->shuffle()->take(1)[0]->id,
                'code' => $faker->unique()->numerify('L###'),
                'name' => $val[0],
                'is_mandatory' => $val[1],
                'day' => $faker->randomElement($array = array(1,2,3,4,5,6,7)),
                'time' => $faker->randomElement($array = array(0,1,2,3,4,5,6,7))
            ]);
        }
    }
}
