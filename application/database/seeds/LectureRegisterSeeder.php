<?php

use Illuminate\Database\Seeder;

class LectureRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('tr_TR');
        $students = \App\Models\User::student();
        $mandatory = \App\Models\Lecture::mandatory()->get();
        $optional = \App\Models\Lecture::optional()->get();

        foreach ($students as $student)
        {
            for($i = 0; $i <1; $i++)
            {
                $lectureId = $mandatory->shuffle()->take(1)[0]->id;
                \App\Models\LectureRegister::create([
                    'student_id' => $student->id,
                    'lecture_id' => $lectureId,
                    'code' => 'LR00'.$lectureId.'00'.$student->id
                ]);
            }
            for($i = 0; $i <1; $i++)
            {
                $lectureId = $optional->shuffle()->take(1)[0]->id;
                \App\Models\LectureRegister::create([
                    'student_id' => $student->id,
                    'lecture_id' => $lectureId,
                    'code' => 'LR00'.$lectureId.'00'.$student->id
                ]);
            }
        }
    }
}
