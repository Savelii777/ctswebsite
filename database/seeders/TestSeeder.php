<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chapters = Chapter::all();

        foreach ($chapters as $chapter)
        {
            Test::create([
                'minutes' => 90,
                'min_correct' => 1,
                'chapter_id' => $chapter->id
            ]);
        }
    }
}
