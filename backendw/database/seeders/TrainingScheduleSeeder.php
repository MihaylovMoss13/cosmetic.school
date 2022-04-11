<?php

namespace Database\Seeders;

use App\Models\TrainingSchedule;
use Illuminate\Database\Seeder;

class TrainingScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainingSchedules = [
            [
                'date'     => '4 апреля — 19 мая',
                'weekday'  => 'пн-пт, 04.04-19.05, c 09:00 до 17:30',
                'course_id' => 1
            ]
        ];
        
        foreach ($trainingSchedules as $trainingSchedule)
        {
            TrainingSchedule::create($trainingSchedule);
        }
    }
}