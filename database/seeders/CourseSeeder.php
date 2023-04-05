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
            'title' => 'Модуль по по береговым системам',
            'img_url' => 'https://sun9-35.userapi.com/impg/PtGsswbLiIo2yJDCLfnbxczCtD7A9cZogtPihw/0d8aI1tcN2c.jpg?size=201x224&quality=96&sign=e7aa440ccad31d24aeaa16e5bc34ed82&type=album',
            'description' => 'Учбно-методическое пособие по береговым системам.',
            'hours' => "40",
            'user_id' => 1
        ]);
    }
}
