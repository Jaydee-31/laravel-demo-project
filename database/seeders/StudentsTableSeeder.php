<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        // Method 1 - Seed the users table using models
        \App\Models\Student::factory(10)->create(); //10 random data

        \App\Models\Student::factory()->create([ //specific data
            'student_lrn' => '123456789123',
            'first_name' => 'John',
            'middle_name' => 'Doe',
            'last_name' => 'Smith',
            'age' => 20,
            'year_level' => 'Senior',
            'section' => 'C',
        ]);

        $students = [
            [
                'student_lrn' => '123456789012',
                'first_name' => 'John',
                'middle_name' => 'Doe',
                'last_name' => 'Smith',
                'age' => 20,
                'year_level' => 'Senior',
                'section' => 'A',
            ],
            [
                'student_lrn' => '234567890123',
                'first_name' => 'Jane',
                'middle_name' => 'Lee',
                'last_name' => 'Garcia',
                'age' => 19,
                'year_level' => 'Junior',
                'section' => 'B',
            ],
            [
                'student_lrn' => '345678901234',
                'first_name' => 'Mark',
                'middle_name' => 'Anthony',
                'last_name' => 'Reyes',
                'age' => 18,
                'year_level' => 'Sophomore',
                'section' => 'C',
            ],
            [
                'student_lrn' => '456789012345',
                'first_name' => 'Mary',
                'middle_name' => 'Ann',
                'last_name' => 'Tan',
                'age' => 17,
                'year_level' => 'Freshman',
                'section' => 'D',
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }

        // $faker = Faker::create();

        // for ($i = 0; $i < 10; $i++) {
        //     Student::create([
        //         'name' => $faker->name(),
        //         'email' => $faker->unique()->safeEmail(),
        //         'phone' => $faker->phoneNumber,
        //         // 'password' => Hash::make('password'),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // Seed the students table with FAKER data
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $student = new Student();
            $student->student_lrn = $faker->numberBetween(100000000000, 999999999999);
            $student->first_name = $faker->firstName();
            $student->middle_name = $faker->lastName();
            $student->last_name = $faker->lastName();
            $student->age = $faker->numberBetween(18, 30);
            $student->year_level = $faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']);
            $student->section = $faker->randomElement(['A', 'B', 'C', 'D', 'E']);
            $student->save();
        }
    }
}
