<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(StudentSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(FacultyMemberSeeder::class);
        $this->call(LectureSeeder::class);
        $this->call(LectureRegisterSeeder::class);

        DB::table('users')->insert([
            'role' => '1',
            'name' => 'Öğrenci işleri',
            'email' => 'uzman@mail.com',
            'password' => Hash::make( '123123' )
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'name' => 'İlk',
            'surname' => 'Öğrenci',
            'code' => '1231231231',
            'email' => 'ogr1@mail.com',
            'password' => Hash::make( '123123' )
        ]);
        DB::table('users')->insert([
            'role' => '2',
            'name' => 'İkinci',
            'surname' => 'Öğrenci',
            'code' => '1231231232',
            'email' => 'ogr2@mail.com',
            'password' => Hash::make( '123123' )
        ]);
    }
}
