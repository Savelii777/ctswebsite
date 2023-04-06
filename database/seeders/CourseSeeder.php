<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'title' => 'Раздел 1: Типовой береговой ракетный комплекс (БРК) «Бал»',
            'img_url' => 'https://sun9-50.userapi.com/impg/g6Z-IlgvY388h-2vAjZyVBpJlcqhwh1QxuMBkw/RrWSO4bT2NM.jpg?size=512x512&quality=96&sign=00e0c3ce21e7cb7cae3567121d0cb444&type=album',
            'description' => 'Учбно-методическое пособие по береговым системам.',
            'hours' => "40",
            'user_id' => 1
        ]);
    }
}
